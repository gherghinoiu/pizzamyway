from flask import Flask, render_template, session, request, jsonify, redirect, url_for
from flask_sqlalchemy import SQLAlchemy
import os

app = Flask(__name__, static_folder='static')
app.secret_key = 'supersecretkey'  # Change this in production
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///' + os.path.join(os.getcwd(), 'instance', 'pizzamyway.db')
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Product(db.Model):
    __tablename__ = 'produse'
    id = db.Column(db.Integer, primary_key=True)
    categorie = db.Column(db.String(255), nullable=False)
    titlu = db.Column(db.String(255), nullable=False)
    descriere = db.Column(db.Text, nullable=False)
    gr = db.Column(db.String(255), nullable=False)
    pret = db.Column(db.Float, nullable=False)
    poza = db.Column(db.String(255), nullable=False)

    def to_dict(self):
        return {
            'id': self.id,
            'categorie': self.categorie,
            'titlu': self.titlu,
            'descriere': self.descriere,
            'gr': self.gr,
            'pret': self.pret,
            'poza': self.poza
        }

class Order(db.Model):
    __tablename__ = 'orders'
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(255), nullable=False)
    phone = db.Column(db.String(50), nullable=False)
    address = db.Column(db.Text, nullable=False)
    email = db.Column(db.String(255))
    notes = db.Column(db.Text)
    total = db.Column(db.Float, nullable=False)
    payment_method = db.Column(db.String(50))
    items = db.Column(db.Text, nullable=False) # JSON or simple text representation
    created_at = db.Column(db.DateTime, server_default=db.func.now())

# --- Routes ---

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/despre-pizzamyway')
def about():
    return render_template('about.html')

@app.route('/contact')
def contact():
    return render_template('contact.html')

@app.route('/cart')
def cart():
    cart_items = session.get('cart', {})
    cart_total = sum(item['price'] * item['quantity'] for item in cart_items.values())
    return render_template('cart.html', cart_items=cart_items, cart_total=cart_total)

@app.route('/checkout', methods=['GET', 'POST'])
def checkout():
    cart_items = session.get('cart', {})
    cart_total = sum(item['price'] * item['quantity'] for item in cart_items.values())

    if request.method == 'POST':
        if not cart_items:
            return redirect(url_for('cart'))

        name = request.form.get('name')
        phone = request.form.get('phone')
        address = request.form.get('address')
        email = request.form.get('email')
        notes = request.form.get('notes')
        payment_method = request.form.get('payment_method')

        # Serialize items
        import json
        items_json = json.dumps(cart_items)

        new_order = Order(
            name=name,
            phone=phone,
            address=address,
            email=email,
            notes=notes,
            total=cart_total,
            payment_method=payment_method,
            items=items_json
        )

        db.session.add(new_order)
        db.session.commit()

        # Clear cart
        session['cart'] = {}
        session.modified = True

        return render_template('thank_you.html', order_id=new_order.id)

    return render_template('checkout.html', cart_items=cart_items, cart_total=cart_total)

# Category Routes
# Mapping based on .htaccess
CATEGORY_MAPPING = {
    'pizza-craiova': {'db_cat': 'pizza', 'title': 'Pizza'},
    'salate': {'db_cat': 'salata', 'title': 'Salate'},
    'paste': {'db_cat': 'paste', 'title': 'Paste'},
    'sandwich': {'db_cat': 'sandwich', 'title': 'Sandwich-uri'},
    'platouri': {'db_cat': 'platou-1-2', 'title': 'Platouri'}, # Note: there are also platou-3-4
    'catering-myway-craiova': {'db_cat': 'platou-1-2', 'title': 'Catering'},
    'desert': {'db_cat': 'desert', 'title': 'Desert'},
    'preparate-de-pui': {'db_cat': 'pui', 'title': 'Preparate de Pui'},
    'preparate-de-curcan': {'db_cat': 'curcan', 'title': 'Preparate de Curcan'},
    'preparate-la-cuptor': {'db_cat': 'pui', 'title': 'Preparate la Cuptor'}, # Map to Pui as Sufle de pui is there, or generic
    'garnituri': {'db_cat': 'garnituri', 'title': 'Garnituri'},
    'bauturi': {'db_cat': 'bauturi', 'title': 'Bauturi'}
}

# Add catch-all for these categories
@app.route('/<category_name>')
def category(category_name):
    if category_name in CATEGORY_MAPPING:
        mapping = CATEGORY_MAPPING[category_name]
        db_cat = mapping['db_cat']
        title = mapping['title']

        # Special case for 'platouri' which might cover multiple DB categories?
        # Or catering.

        products = Product.query.filter_by(categorie=db_cat).all()

        # If 'platouri', maybe fetch 'platou-1-2' and 'platou-3-4'?
        if category_name == 'platouri' or category_name == 'catering-myway-craiova':
             products = Product.query.filter(Product.categorie.like('platou%')).all()

        return render_template('products.html', products=products, category_title=title)

    # Fallback if route not matched but looks like a category (or 404)
    return "Page not found", 404

# --- API ---

@app.route('/api/cart', methods=['POST'])
def api_cart():
    action = request.form.get('action')

    if 'cart' not in session:
        session['cart'] = {}

    cart = session['cart']

    if action == 'add':
        try:
            pid = str(request.form.get('id'))
            name = request.form.get('name')
            price = float(request.form.get('price'))
            image = request.form.get('image')
            quantity = int(request.form.get('quantity', 1))

            if pid in cart:
                cart[pid]['quantity'] += quantity
            else:
                cart[pid] = {
                    'id': pid,
                    'name': name,
                    'price': price,
                    'image': image,
                    'quantity': quantity
                }
            session.modified = True

            count = sum(item['quantity'] for item in cart.values())
            total = sum(item['price'] * item['quantity'] for item in cart.values())

            return jsonify({'status': 'success', 'cart_count': count, 'cart_total': total})
        except Exception as e:
            return jsonify({'status': 'error', 'message': str(e)})

    elif action == 'remove':
        pid = str(request.form.get('id'))
        if pid in cart:
            del cart[pid]
            session.modified = True
        return jsonify({'status': 'success'})

    elif action == 'update':
        pid = str(request.form.get('id'))
        quantity = int(request.form.get('quantity'))
        if pid in cart:
            if quantity > 0:
                cart[pid]['quantity'] = quantity
            else:
                del cart[pid]
            session.modified = True
        return jsonify({'status': 'success'})

    elif action == 'clear':
        session['cart'] = {}
        session.modified = True
        return jsonify({'status': 'success'})

    return jsonify({'status': 'error', 'message': 'Invalid action'})

if __name__ == '__main__':
    with app.app_context():
        # Ensure DB is created (should be done by migration script but good for safety)
        db.create_all()
    app.run(debug=True, port=5000)
