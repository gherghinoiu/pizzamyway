<!DOCTYPE html>
<html>
    <head>
        <title>Contact MyWay</title>
        <meta name="description" content="Foloseste datele de contact pentru a intra in legatura cu noi!">
        <meta name="keywords" content="contact, craiova, myway">
        <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.css">
        <?php
        include("inc/header.php");

        $errors = '';
        $success = '';
        if (isset($_POST['submitttttttt'])) {
//  $to = "sistem_mg@yahoo.com";
            $to = "sssaistem_mg@yahoo.com";
            $subject = "Contact Pizza MyWay";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $message = $_POST['message'];
            $header = "From: $email\r\n";
            $header.= "MIME-Version: 1.0\r\n";
            $header.= "Content-Type: text/plain; charset=utf-8\r\n";
            $header.= "X-Priority: 1\r\n";
            $content = "\n\n Nume: $name \n\n Email: $email \n\n Telefon: $telefon \n\n Mesaj: \n\n $message";
            
        if (empty($name) || empty($email) || empty($telefon)) {
                $errors = "Va rugam sa completati campurile obligatorii.";
            } else {
                mail($to, $subject, $content, $header);
                $success = "Mesajul a fost trimis!";
            }
        }
        ?>
    </head>
    <body>
        <header class="contact">
            <?php
            include("inc/menu2.php");
            ?>
            
            <div id="map"></div>
        </header>
        <iframe class="map-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2854.6414127149746!2d23.80237431573887!3d44.317321817249365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4752d7a0b93b984f%3A0xdd4dda02b47a4df8!2sStrada+Rom%C3%A2nia+Muncitoare+55%2C+Craiova!5e0!3m2!1sro!2sro!4v1455014973238" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="clear"></div>
        <section class="contact">
            <div class="container">
                <div class="row">
                    <h3 class="title">Contact</h3>
                    <div class="separator"></div>
                    <div  class="col-md-6">
                        <?php
                        if ($errors == '') {
                            ?>
                            <div style="display: none;" class="alert alert-danger" role="alert"><?php echo $errors; ?></div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert"><?php echo $errors; ?></div>
                            <?php
                        }
                        if ($success == '') {
                            ?>
                            <div style="display: none;" class="alert alert-success" role="alert"><?php echo $success; ?></div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
                            <?php
                        }
                        ?>

                        <form method="post" action="">
                            <div class="input-group">
                                <span id="input-group" class="input-group-addon">Nume</span>
                                <input name="name" class="form-control" aria-describedby="basic-addon1" type="text">
                            </div>
                            <div class="input-group">
                                <span id="input-group" class="input-group-addon">Email</span>
                                <input name="email" class="form-control" aria-describedby="basic-addon1" type="text">
                            </div>
                            <div class="input-group">
                                <span id="input-group" class="input-group-addon">Telefon</span>
                                <input name="telefon" class="form-control" aria-describedby="basic-addon1" type="text">
                            </div>
                            <div class="input-group">
                                <span id="input-group" class="input-group-addon">Mesaj</span>
                                <textarea name="message" class="form-control" aria-describedby="basic-addon1" type="text"></textarea>
                            </div>
                            <div class="button-send">
                                <input name="submit" type="submit" value="Trimite" class="btn btn-danger  send-btn">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h4 class="title-contact">Detalii Contact</h4><br/>
                        <p>Iti stam la dispozitie pentru orice sugestie, parere sau cerinta!</p><br/>
                        <p>Adresa: Strada Romania Muncitoare, nr. 55, Craiova</p>
                        <p>Tel: <a href="tel:0351176968">0351.176.968</a> / <a href="tel:0741.588.985">0741.588.985</a> / <a href="tel:0760.282.820">0760.282.820</a></p>
                        <!--<p>Email: <a href="mailto:sistem_mg@yahoo.com">sistem_mg@yahoo.com</a></p>-->
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


            function initMap() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 18,
                    scrollwheel: false,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(44.3173218, 23.8023743)
                            // How you would like to style the map. 
                            // This is where you would paste any style found on Snazzy Maps.
//                    styles: [{"featureType": "administrative", "elementType": "all", "stylers": [{"saturation": "16"}, {"visibility": "on"}]}, {"featureType": "landscape", "elementType": "all", "stylers": [{"hue": "#FFBB00"}, {"saturation": 43.400000000000006}, {"lightness": 37.599999999999994}, {"gamma": 1}]}, {"featureType": "landscape.natural", "elementType": "all", "stylers": [{"saturation": "30"}, {"lightness": "0"}]}, {"featureType": "poi", "elementType": "all", "stylers": [{"hue": "#00ff6a"}, {"saturation": "3"}, {"lightness": "12"}, {"gamma": "1"}, {"weight": "1"}]}, {"featureType": "road.highway", "elementType": "all", "stylers": [{"hue": "#FFC200"}, {"saturation": -61.8}, {"lightness": 45.599999999999994}, {"gamma": 1}]}, {"featureType": "road.arterial", "elementType": "all", "stylers": [{"hue": "#FF0300"}, {"saturation": -100}, {"lightness": 51.19999999999999}, {"gamma": 1}]}, {"featureType": "road.local", "elementType": "all", "stylers": [{"hue": "#FF0300"}, {"saturation": -100}, {"lightness": 52}, {"gamma": 1}]}, {"featureType": "water", "elementType": "all", "stylers": [{"hue": "#0078FF"}, {"saturation": -13.200000000000003}, {"lightness": 2.4000000000000057}, {"gamma": 1}]}]

                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(44.3173218, 23.8023743),
                    map: map,
                    title: 'Pizza MyWay'
                });

                (function (marker) {
                    infowindow = new google.maps.InfoWindow({
                        content: "Pizza MyWay"
                    });
                    infowindow.open(map, marker);
                })(marker);

                // disable dragging on mobile resolution
                (function ($) {
                    var currentWidth = $(window).width();
                    if (currentWidth <= 900) {
                        map.setOptions({draggable: false});
                    }
                })(jQuery);

                $(window).resize(function () {
                    var currentWidth = $(window).width();
                    if (currentWidth <= 900) {
                        map.setOptions({draggable: false});
                    } else {
                        map.setOptions({draggable: true});
                    }
                });
            }

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
            }
            );


        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $GOOGLE_MAPS_KEY; ?>&callback=initMap"
        async defer></script>

    </body>
</html>