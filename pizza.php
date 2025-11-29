<!DOCTYPE html>
<html>
    <head>
        <title>Pizza MyWay Craiova</title>
        <meta name="description" content="Cea mai buna pizza din Craiova te asteapta la MyWay. Intra pe website si descopera cele mai bune preparate! Comanda acum!">
        <meta name="keywords" content="pizza, craiova, pizza myway, craiova">
        <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.css">
        <?php
        include("inc/header.php");
        ?>
    </head>
    <body>
        <header class="about">
            <?php
            include("inc/menu2.php");
            ?>
        </header>
        <section class="pizza">
            <div class="container">
                <div class="row">
                    <h3 class="title">Pizzar</h3>
                    <div class="col-md-12">
                        <p>Preparata dupa retete traditionale, pizza MyWay iti pune la dispozitie o gama variata de sortimente din care poti alege ceva pe gustul tau. Ingredientele proaspete si diverse  iti  rasfata papilele gustative cu arome atent selectionate pentru a-ti oferi o masa bogata in nutrienti si savuroasa pe deasupra.
                            Pe langa produse de calitate, pizza MyWay vine in intampinarea clientilor cu o multime de oferte si promotii, menite sa le ofere acestora o experienta inedita.
                        </p>
                    </div>
                    <div class="clear"></div>
                    <div style="margin-top: 20px;" class="separator"></div>
                    <div class="clear"></div>
                    <div id="32cm">

                        <?php
                        $query = "SELECT * FROM produse WHERE categorie='pizza' ORDER BY id ASC";
                        $result = mysqli_query($link, $query);
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                            if ($i % 2 == 0) {
                                $animation = "fadeInRight";
                            } else {
                                $animation = "fadeInLeft";
                            }

                            if ($row['id'] == 119) {
                                $dimensiune = "40x60cm";
                                $greutate = '';
                            } else if ($row['id'] == 121) {
                                $dimensiune = "40cm";
                                $greutate = '<span class="pull-left">Greutate <b style="color: #B42C07;">' . $row['gr'] . 'gr</b> </span>';
                            } else if ($row['id'] == 164) {
                                $dimensiune = "40x60cm";
                                $greutate = '';
                            } else if ($row['id'] == 165) {
                                $dimensiune = "40cm";
                                $greutate = '<span class="pull-left">Greutate <b style="color: #B42C07;">' . $row['gr'] . 'gr</b> </span>';
                            } else {
                                $dimensiune = "32cm";
                                $greutate = '<span class="pull-left">Greutate <b style="color: #B42C07;">' . $row['gr'] . 'gr</b> </span>';
                            }
                            ?>
                            <div class="col-md-6 product animated <?php echo $animation; ?>" data-animate="<?php echo $animation; ?>">
                                <div>
                                    <div class="col-sm-3 pad4">
                                        <img class="img-responsive" src="<?php echo $adresa; ?>assets/images/produse/<?php echo $row['poza']; ?>" alt="<?php echo $row['titlu']; ?>"/>
                                    </div>
                                    <div class="col-sm-8 caption">
                                        <h5 class="title-product">
                                            <span class="title"><?php echo $row['titlu']; ?></span><span class="visible-xs"></span>
                                            <span class="price pull-right"><?php echo $row['pret']; ?> lei</span><div class="clear"></div>
                                            <span class="price">
    <?php echo $greutate; ?><span class="visible-xs"></span>
                                                <span class="pull-right">Dimensiune <b style="color: #B42C07;"><?php echo $dimensiune; ?></b></span>
                                            </span>
                                            <div class="clear"></div>
                                            <span class="ingrediente"><?php echo $row['descriere']; ?></span>
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
            </div>
        </section>

        <section class="diverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="diverse">
                            <h3 class="title">Diverse</h3>
                            <div class="separator"></div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item">Ketchup Picant <span class="pull-right">3 lei</span></li>
                                        <li class="list-group-item">Mozzarella <span class="pull-right">3 lei</span></li>
                                        <li class="list-group-item">Ulei picant 30ml<span class="pull-right">3 lei</span></li>
                                        <li class="list-group-item">Topping la alegere <span class="pull-right">5 lei</span></li>
                                        
                                        
                                          <li class="list-group-item">Topping sos usturoi <span class="pull-right">3 lei</span></li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item">Ketchup Dulce/Picant <span class="pull-right">3 lei</span></li>
                                        <li class="list-group-item">Sos usturoi <span class="pull-right">3 lei</span></li>
                                        
                                        
                                        
                                            <li class="list-group-item">Topping cascaval <span class="pull-right">4 lei</span></li>
                                            
                                        
                                        <li class="list-group-item">Ou <span class="pull-right">3 lei</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="diverse">
                            <h3 class="title">Bauturi</h3>
                            <div class="separator"></div>
                            <div class="col-md-12 col-xs-12">
                                <!--<div class="col-md-6 col-xs-12">-->
                                <!--    <ul class="list-group">-->

                                <!--        <li class="list-group-item">URSUS fara alcool 0.5L<span class="pull-right">7 lei</span></li>-->

                                <!--    </ul>-->
                                <!--</div>-->
                                <div class="col-md-12 col-xs-12">
                                    <ul class="list-group">

                                        <li class="list-group-item">URSUS 0.5L<span class="pull-right">8 lei</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories">
            <div class="container">
                <div class="row">
                    <h3 class="title">Preparate similare</h3>
                    <div class="separator"></div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="salate">SALATE</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="salate"><img src="assets/images/home/salate-pizza-myway.jpg" alt="Salate pizza MyWay"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="desert">DESERT</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="desert"><img src="assets/images/home/desert-myway.jpg" alt="Desert My Way"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="paste">Paste</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="paste"><img class="img-item2" src="assets/images/home/paste-sandwich-myway.jpg" alt="Paste Sandwich MyWay"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="catering-myway-craiova">Catering</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="catering-myway-craiova"><img class="img-item2" src="assets/images/home/catering-myway.jpg" alt="Catering My Way"/></a>
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

                $("body").on("click", "#show-28", function () {
                    $("#32cm").fadeOut();
                    $("#28cm").fadeIn();
                    $("#show-28").removeClass("btn-danger");
                    $("#show-28").addClass("btn-primary");
                    $("#show-32").removeClass("btn-primary");
                    $("#show-32").addClass("btn-danger");
                });
                $("body").on("click", "#show-32", function () {
                    $("#28cm").fadeOut();
                    $("#32cm").fadeIn();
                    $("#show-32").addClass("btn-primary");
                    $("#show-32").removeClass("btn-danger");
                    $("#show-28").addClass("btn-danger");
                    $("#show-28").removeClass("btn-primary");
                });
            });
        </script>
    </body>
</html>