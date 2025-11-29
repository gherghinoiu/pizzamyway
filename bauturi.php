<!DOCTYPE html>
<html>
    <head>
        <title>Bauturi MyWay Craiova</title>
        <meta name="description" content="La MyWay poti cumpara cele mai bune bauturi. Comanda acum!">
        <meta name="keywords" content="bauturi, apa, suc, myway, craiova">
        <?php
        include("inc/header.php");
        ?>
    </head>
    <body>
        <header class="bauturi">
            <?php
            include("inc/menu2.php");
            ?>
        </header>
        <section class="pizza">
            <div class="container">
                <div class="row">
                    <h3 class="title">Bauturi</h3>
                    <div style="margin-bottom: 40px;" class="separator"></div>
                    <div class="col-md-12">
                        <p>Mancarea merge mana in mana cu ceva de baut. Noi stim asta, si pentru ca vrem sa venim in intampinarea nevoilor tale, iti punem la dispozitie un sortiment variat de bauturi. </p>
                    </div>
                    <div class="clear"></div>
                    <?php
                    $query = "SELECT * FROM produse WHERE categorie='bauturi'";
                    $result = mysqli_query($link, $query);
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) { 
                        $i++;
                        ?>
                        <div class="col-md-6 product">
                            <div class="pad4">
                                <div class="col-sm-3">
                                    <img class="img-responsive" src="<?php echo $adresa; ?>assets/images/produse/<?php echo $row['poza']; ?>" alt="<?php echo $row['titlu']; ?>"/>
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="title-product ">
                                        <span class="title"><?php echo $row['titlu']; ?> - <?php echo $row['gr']; ?>gr</span><span class="visible-xs"></span>
                                        <span class="price pull-right"><?php echo $row['pret']; ?> lei</span><div class="clear"></div>
                                        <span class="ingrediente "><?php echo $row['descriere']; ?></span>
                                    </h5>
                                    <button class="btn btn-sm btn-danger add-to-cart pull-right" 
                                        data-id="<?php echo $row['id']; ?>" 
                                        data-name="<?php echo $row['titlu']; ?>" 
                                        data-price="<?php echo $row['pret']; ?>" 
                                        data-image="<?php echo $row['poza']; ?>">
                                        <i class="fa fa-shopping-cart"></i> Adauga in cos
                                    </button>
                                </div>
                            </div>
                        </div>

    <?php
    if ($i % 2 == 0) {
        echo '<div class="clear"></div>';
    }
}
?>


                </div>
            </div>
        </section>

        <section class="categories">
            <div class="container">
                <div class="row">
                    <h3 class="title">Preparate Similare</h3>
                    <div class="separator"></div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="salate">SALATE</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="salate"><img src="assets/images/home/salate-pizza-myway.jpg" alt="Salate MyWay"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="desert">DESERT</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="desert"><img src="assets/images/home/desert-myway.jpg" alt="Desert MyWay"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="preparate-de-pui">Preparate de Pui &amp; porc</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="preparate-de-pui"><img class="img-item2" src="assets/images/categories/preparate-de-pui.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="preparate-la-cuptor">Preparate la Cuptor</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="preparate-la-cuptor"><img class="img-item2" src="assets/images/categories/preparate-cuptor.jpg" alt=""/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
include("inc/footer.php");
?>
        <script type="text/javascript" src="assets/plugins/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="assets/plugins/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.add-to-cart').click(function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var price = $(this).data('price');
                    var image = $(this).data('image');
                    
                    $.post('api/cart.php', {
                        action: 'add',
                        id: id,
                        name: name,
                        price: price,
                        image: image,
                        quantity: 1
                    }, function(response) {
                        if(response.status === 'success') {
                            alert('Produsul a fost adaugat in cos!');
                        } else {
                            alert('Eroare: ' + response.message);
                        }
                    }, 'json');
                });

                $(".fancybox-thumb").fancybox({
                    prevEffect: 'none',
                    nextEffect: 'none',
                    helpers: {
                        title: {
                            type: 'outside'
                        },
                        thumbs: {
                            width: 50,
                            height: 50
                        }
                    }
                });
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            });
        </script>
    </body>
</html>