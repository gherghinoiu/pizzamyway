<!DOCTYPE html>
<html>
    <head>
        <title>Catering MyWay Craiova</title>
        <meta name="description" content="La MyWay poti cumpara cele mai delicioase produse prin intermediul serviciului nostru de catering. Comanda acum!">
        <meta name="keywords" content="catering, catering craiova, catering myway, craiova">
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
                    <h3 class="title">Catering</h3>
                    <div style="margin-bottom: 40px;" class="separator"></div>
                    <div style="margin-bottom: 20px;" class="col-md-12">
                        <p>Dupa cinci ani de incercari in cautarea celor mai bune si mai potrivite retete pentru orice gust, am hotarat sa va oferim posibilitatea de a servi preparatele noastre si la domiciliu.</p>
                        <p>In fiecare zi cautam cele mai proaspete ingrediente, ne luptam in trafic pentru fiecare minut si punem la rece berea si sucul, pentru ca pachetul final pe care vi-l oferim sa fie unul cat mai complet si mai corect din punct de vedere al raportului pret/calitate.</p>
                    </div>
                </div>
            </div>
        </section>
        <section style="padding-bottom: 10px;padding-top: 40px;" class="categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="salate">SALATE</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="salate"><img src="assets/images/home/salate-pizza-myway.jpg" alt="Salate Pizza MyWay"/></a>
                            </div>
                        </div>
                    </div>
                 <!--   <div class="col-md-3">
                        <div class="item">
                            <h3><a href="bauturi">Bauturi</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="bauturi"><img src="assets/images/categories/bauturi.jpg" alt="Bauturi MyWay"/></a>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="paste">PASTE &amp; SANDWICH-URI</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                 <a href="paste"><img class="img-item2" src="assets/images/home/paste-sandwich-myway.jpg" alt="Paste &amp; Sandwich-uri MyWay"/></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="platouri">Platouri 3-4 persoane</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="platouri"><img class="img-item2" src="assets/images/categories/platouri.jpg" alt="Platouri 3-4 persoane"/></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="preparate-de-pui">Preparate Pui &amp; Porc</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="preparate-de-pui"><img class="img-item2" src="assets/images/categories/preparate-de-pui.jpg" alt="Preparte de Pui &amp; Porc"/></a>
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="preparate-la-cuptor">Platouri 1-2 persoane</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="preparate-la-cuptor"><img class="img-item2" src="assets/images/categories/preparate-cuptor.jpg" alt="Platouri 1-2 persoane MyWay"/></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="item">
                            <h3><a href="garnituri">Garnituri</a></h3>
                            <div class="separator"></div>
                            <div class="thumbnail">
                                <a href="garnituri"><img class="img-item2" src="assets/images/categories/garnituri.jpg" alt="Garnituri MyWay"/></a>
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