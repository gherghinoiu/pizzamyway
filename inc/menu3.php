<div class="nav-home2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <ul class="list-group menu-set">
                    <li class="list-group-item menu-item"><a href="/">Acasa</a></li>
                    <li class="list-group-item menu-item"><a href="despre-pizzamyway">Despre noi</a></li>
					<li class="list-group-item menu-item"><a href="pizza-craiova">Pizza</a></li>
					<!--
                    <li class="list-group-item menu-item"><a id="preparate" href="#"><i class="fa fa-plus"></i> Preparate</a>
                        <ul class="dropdown">
                            <li class="list-group-item menu-item"><a href="pizza"><i class="fa fa-angle-right"></i> Pizza</a></li>
                            <li class="list-group-item menu-item"><a href="salate"><i class="fa fa-angle-right"></i> Salate</a></li>
                            <li class="list-group-item menu-item"><a href="desert"><i class="fa fa-angle-right"></i> Desert</a></li>
                            <li class="list-group-item menu-item"><a href="paste"><i class="fa fa-angle-right"></i> Paste</a></li>
                        </ul>
                    </li>-->
                    <li class="list-group-item menu-item"><a href="catering-myway-craiova">Catering</a></li>
                    <li class="list-group-item menu-item"><a href="contact">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"></div>
        </div>
    </div>
</div>
<div style="position:relative;z-index: 3;" class="btn1">
    <a id="expand-menu" class="btn-default btn-logo2" href="#">Meniu</a>
    <a id="close-menu" class="btn-default btn-logo2" href="#"><i class="fa fa-times"></i></a>
    <a class="logo2" href="/"><img src="assets/images/logo-pizza-myway.png" alt="Logo Pizza MyWay"/></a>
    <div class="phone-right2 pull-right">
        <h4 class="comenzi">Comenzi</h4>
        <a class="" href="tel:0351176968">0351.176.968</a>
        <a class="" href="tel:0741588985">0741.588.985</a><br/>
        <a class="" href="tel:0741588985">0760.282.820</a>
    </div>
</div>


<div class="btn2">
    <a id="expand-menu" class="btn-default btn-logo" href="#">Meniu</a>
    <a id="close-menu" class="btn-default btn-logo" href="#"><i class="fa fa-times"></i></a>
    <a class="logo" href="/"><img src="assets/images/logo-pizza-myway.png" alt="Logo Pizza MyWay"/></a>
    <div class="phone-right pull-right">
        <h4 class="comenzi">Comenzi</h4>
        <a class="" href="tel:0351176968">0351.176.968</a>
        <a class="" href="tel:0741588985">0741.588.985</a><br/>
        <a class="" href="tel:0741588985">0760.282.820</a>
    </div>
</div>

<!--<div class="btn3 navbar-fixed-top">
    <a id="expand-menu" class="btn-default btn-logo" href="#">Meniu</a>
    <a id="close-menu" class="btn-default btn-logo" href="#"><i class="fa fa-times"></i></a>
    <a class="logo" href=""><img src="assets/images/logo.png" alt=""/></a>
    <div style="padding-top: 0px;padding-bottom: 0px;" class="phone-right pull-right">
        <h4 class="comenzi">Comenzi</h4>
        <a class="" href="#">0351.176.968</a>
        <a class="" href="#">0741.588.985</a><br/>
        <a class="" href="#">0760.282.820</a><br/>
        <div style="padding-top: 6px;" class="col-md-5">
            <p style="font-size: 15px;font-weight: 300;">Descarca gratuit aplicatia noastra</p>
        </div>

        <div class="col-md-7">
            <a style="padding-right: 0px;" href=""><img src="assets/images/app/android.png" alt=""/></a>
            <a style="padding-right: 0px;" href=""><img src="assets/images/app/iphone.png" alt=""/></a>
        </div>
    </div>
</div>-->

<!--<div class="text-head">
    <p>Pizza MyWay <br/> Drumul tau in fiecare zi!</p>
</div>-->
<!--<div align="center">
    <a class="start" href="#start"><i class="fa fa-angle-down"></i></a>
</div>-->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(window).width(function () {
            var width = $(window).width();
            if (width < 530) {
                $(".btn1").hide();
                $(".btn2").removeClass("hide");
            } else {
                $(".btn2").addClass("hide");
                $(".btn1").show();
            }


            if (width < 1000) {
                $(".btn3").addClass("hide");
            }
            if (width < 506) {
                $("body").on("click", "#expand-menu", function () {
                    $(".nav-home").fadeToggle("slow", "linear");
                    $(".nav-home2").fadeToggle("slow", "linear");
                    $("#close-menu").show();
                    $("#expand-menu").hide();
                    $(".text-head").hide();
                    $(".start").hide();
                    $(".phone-right").fadeOut();
                    $("section.despre").css("display", "none");
                });

                $("body").on("click", "#close-menu", function () {
                    $(".nav-home").fadeOut("slow", "linear");
                    $(".nav-home2").fadeOut("slow", "linear");
                    $("#expand-menu").show();
                    $("#close-menu").hide();
                    $(".text-head").fadeIn("slow");
                    $(".start").fadeIn();
                    $(".phone-right").fadeIn();
                });

            } else {
                $(".phone-right").show();

                $("body").on("click", "#expand-menu", function () {
                    $(".nav-home").fadeIn("slow", "linear");
                    $(".nav-home2").fadeIn("slow", "linear");
                    $("#close-menu").show();
                    $("#expand-menu").hide();
                    $(".text-head").hide();
                    $(".start").hide();
                });

                $("body").on("click", "#close-menu", function () {
                    $(".nav-home").fadeOut("slow", "linear");
                    $(".nav-home2").fadeOut("slow", "linear");
                    $("#expand-menu").show();
                    $("#close-menu").hide();
                    $(".text-head").fadeIn("slow");
                    $(".start").fadeIn();
                });
            }
        });

        $("body").on("click", "#preparate", function (e) {
            e.preventDefault();
            $("ul.dropdown").slideToggle();
        });


        /*************** Expand Menu ***********/


    });
</script>