<?php
include("inc/header.php");
include("inc/cart_functions.php");
include("config/delivery_rules.php");

$cart_items = get_cart();
$cart_total = get_cart_total();
$cart_count = get_cart_count();

if ($cart_count == 0) {
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Finalizare Comanda - MyWay Craiova</title>
    <meta name="description" content="Finalizeaza comanda la MyWay Craiova.">
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .checkout-form label { font-weight: bold; margin-top: 10px; }
        .checkout-summary { background: #f8f8f8; padding: 20px; border-radius: 5px; }
        .error-message { color: red; display: none; margin-bottom: 10px; }
        .StripeElement {
          box-sizing: border-box;
          height: 40px;
          padding: 10px 12px;
          border: 1px solid transparent;
          border-radius: 4px;
          background-color: white;
          box-shadow: 0 1px 3px 0 #e6ebf1;
          -webkit-transition: box-shadow 150ms ease;
          transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
          box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
          border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
          background-color: #fefde5 !important;
        }
        #card-element { margin-bottom: 20px; }
    </style>
</head>
<body>
    <header class="about">
        <?php include("inc/menu2.php"); ?>
    </header>

    <section class="checkout-section" style="padding: 50px 0;">
        <div class="container">
            <h3 class="title">Finalizare Comanda</h3>
            <div class="separator" style="margin-bottom: 30px;"></div>

            <div class="row">
                <div class="col-md-8">
                    <form id="checkout-form" class="checkout-form">
                        <div class="alert alert-danger error-message" id="global-error"></div>

                        <h4>Date de livrare</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nume si Prenume</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Numar de telefon</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Adresa de email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Adresa completa (Strada, Numar, Bloc, Scara, Apartament)</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Localitate</label>
                                <select name="city" class="form-control" required>
                                    <option value="">Alege localitatea</option>
                                    <?php foreach ($delivery_config['allowed_locations'] as $loc): ?>
                                        <option value="<?php echo $loc; ?>"><?php echo ucfirst($loc); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <h4 style="margin-top: 30px;">Metoda de plata</h4>
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="payment_method" value="cash" checked>
                                    Numerar la livrare
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="payment_method" value="card">
                                    Card Online (Stripe)
                                </label>
                            </div>
                        </div>

                        <div id="stripe-section" style="display: none; margin-top: 20px;">
                             <label for="card-element">
                                Credit or debit card
                              </label>
                              <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                              </div>
                              <!-- Used to display form errors. -->
                              <div id="card-errors" role="alert" style="color: red; margin-top: 10px;"></div>
                        </div>

                        <div style="margin-top: 30px;">
                             <button type="submit" class="btn btn-primary btn-lg btn-block" id="submit-button">Trimite Comanda</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <div class="checkout-summary">
                        <h4>Rezumat Comanda</h4>
                        <table class="table">
                            <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td><?php echo $item['name']; ?> x <?php echo $item['quantity']; ?></td>
                                <td class="text-right"><?php echo $item['price'] * $item['quantity']; ?> lei</td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2"><hr></td>
                            </tr>
                            <tr>
                                <td>Subtotal</td>
                                <td class="text-right" id="summary-subtotal"><?php echo $cart_total; ?> lei</td>
                            </tr>
                            <tr id="discount-row" style="display: none; color: green;">
                                <td>Reducere</td>
                                <td class="text-right" id="summary-discount">-0 lei</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong><span id="summary-total"><?php echo $cart_total; ?></span> lei</strong></td>
                            </tr>
                        </table>
                        
                        <div class="coupon-section">
                            <div class="input-group">
                                <input type="text" id="coupon-code" class="form-control" placeholder="Cod de reducere">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" id="apply-coupon">Aplica</button>
                                </span>
                            </div>
                            <div id="coupon-message" style="margin-top: 5px;"></div>
                        </div>

                         <div style="margin-top: 20px; font-size: 0.9em; color: #777;">
                            <p>Comanda minima: <?php echo $delivery_config['min_order_value']; ?> lei</p>
                            <p>Zone de livrare: <?php echo implode(', ', array_map('ucfirst', $delivery_config['allowed_locations'])); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("inc/footer.php"); ?>

    <script>
        var stripe = Stripe('<?php echo $delivery_config['stripe']['publishable_key']; ?>');
        var elements = stripe.elements();
        var card = elements.create('card');
        
        $('input[name="payment_method"]').change(function() {
            if ($(this).val() === 'card') {
                $('#stripe-section').slideDown();
                card.mount('#card-element');
            } else {
                $('#stripe-section').slideUp();
                card.unmount();
            }
        });

        // Coupon Logic
        $('#apply-coupon').click(function() {
            var code = $('#coupon-code').val();
            if(!code) return;
            
            $.post('api/validate_coupon.php', {code: code, total: <?php echo $cart_total; ?>}, function(resp) {
                if(resp.valid) {
                    $('#coupon-message').html('<span style="color:green">Cupon aplicat: -' + resp.discount_amount + ' lei</span>');
                    $('#summary-discount').text('-' + resp.discount_amount + ' lei');
                    $('#summary-total').text(resp.new_total + ' lei');
                    $('#discount-row').show();
                    // Store coupon in hidden field or global var if needed for submission
                    window.appliedCoupon = code;
                } else {
                    $('#coupon-message').html('<span style="color:red">' + resp.message + '</span>');
                    $('#discount-row').hide();
                    $('#summary-total').text('<?php echo $cart_total; ?> lei');
                    window.appliedCoupon = null;
                }
            }, 'json');
        });

        // Form Submission
        $('#checkout-form').submit(function(e) {
            e.preventDefault();
            $('#global-error').hide();
            $('#submit-button').prop('disabled', true);

            var formData = {
                name: $('input[name="name"]').val(),
                phone: $('input[name="phone"]').val(),
                email: $('input[name="email"]').val(),
                address: $('input[name="address"]').val(),
                city: $('select[name="city"]').val(),
                payment_method: $('input[name="payment_method"]:checked').val(),
                coupon: window.appliedCoupon || ''
            };

            if (formData.payment_method === 'card') {
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        $('#card-errors').textContent = result.error.message;
                        $('#submit-button').prop('disabled', false);
                    } else {
                        // Send the token to your server.
                        formData.stripeToken = result.token.id;
                        submitOrder(formData);
                    }
                });
            } else {
                submitOrder(formData);
            }
        });

        function submitOrder(data) {
            $.post('process_order.php', data, function(response) {
                if (response.status === 'success') {
                    window.location.href = 'thank_you.php?order_id=' + response.order_id;
                } else {
                    $('#global-error').text(response.message).show();
                    $('#submit-button').prop('disabled', false);
                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                }
            }, 'json').fail(function() {
                $('#global-error').text('A aparut o eroare de comunicare. Va rugam incercati din nou.').show();
                $('#submit-button').prop('disabled', false);
            });
        }
    </script>
</body>
</html>
