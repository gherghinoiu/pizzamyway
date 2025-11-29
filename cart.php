<!DOCTYPE html>
<html>
<head>
    <title>Cos Cumparaturi - MyWay Craiova</title>
    <meta name="description" content="Cosul tau de cumparaturi la MyWay.">
    <?php include("inc/header.php"); ?>
    <?php include("inc/cart_functions.php"); ?>
    <style>
        .cart-table th { background: #f8f8f8; }
        .cart-table td { vertical-align: middle !important; }
        .cart-total { font-size: 1.2em; font-weight: bold; }
        .btn-checkout { background-color: #B42C07; color: white; border: none; padding: 10px 20px; font-size: 1.1em; }
        .btn-checkout:hover { background-color: #922406; color: white; }
    </style>
</head>
<body>
    <header class="about">
        <?php include("inc/menu2.php"); ?>
    </header>

    <section class="cart-section" style="padding: 50px 0;">
        <div class="container">
            <h3 class="title">Cosul de cumparaturi</h3>
            <div class="separator" style="margin-bottom: 30px;"></div>

            <?php $cart = get_cart(); ?>
            
            <?php if (empty($cart)): ?>
                <div class="alert alert-info text-center">
                    <h4>Cosul tau este gol.</h4>
                    <p>Mergi la <a href="pizza.php">meniu</a> pentru a adauga produse.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered cart-table">
                        <thead>
                            <tr>
                                <th>Produs</th>
                                <th>Pret</th>
                                <th>Cantitate</th>
                                <th>Total</th>
                                <th>Actiuni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $id => $item): ?>
                            <tr id="row-<?php echo $id; ?>">
                                <td>
                                    <?php if($item['image']): ?>
                                        <img src="assets/images/produse/<?php echo $item['image']; ?>" style="width: 50px; margin-right: 10px;">
                                    <?php endif; ?>
                                    <?php echo $item['name']; ?>
                                </td>
                                <td><?php echo $item['price']; ?> lei</td>
                                <td>
                                    <input type="number" min="1" value="<?php echo $item['quantity']; ?>" class="form-control" style="width: 70px;" onchange="updateCart(<?php echo $id; ?>, this.value)">
                                </td>
                                <td><span id="total-<?php echo $id; ?>"><?php echo $item['price'] * $item['quantity']; ?></span> lei</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" onclick="removeFromCart(<?php echo $id; ?>)"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right cart-total">Total General:</td>
                                <td colspan="2" class="cart-total"><span id="cart-grand-total"><?php echo get_cart_total(); ?></span> lei</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <a href="pizza.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Continua cumparaturile</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="checkout.php" class="btn btn-checkout">Finalizeaza Comanda <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php include("inc/footer.php"); ?>

    <script>
    function updateCart(id, quantity) {
        $.post('api/cart.php', {
            action: 'update',
            id: id,
            quantity: quantity
        }, function(response) {
            if(response.status === 'success') {
                location.reload(); 
            } else {
                alert(response.message);
            }
        }, 'json');
    }

    function removeFromCart(id) {
        if(confirm('Esti sigur ca vrei sa stergi acest produs?')) {
            $.post('api/cart.php', {
                action: 'remove',
                id: id
            }, function(response) {
                if(response.status === 'success') {
                    location.reload();
                }
            }, 'json');
        }
    }
    </script>
</body>
</html>
