<i class="fa fa-angle-up" id="back-to-top"></i>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <p>Toate drepturile rezervate &copy; 2022 Pizza MyWay</p>
            	 <p><a target="_blank" href="http://www.pizzamyway.ro/assets/images/MyWay-Declaratii-Nutritionale.pdf">Declaratii Nutritionale</a></p>
                 <p><a href="gdpr.php">GDPR & Termeni Livrare</a></p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <a href="/"><img class="img-responsive" src="assets/images/logo-pizza-myway.png" alt="Logo Pizza MyWay Craiova"/></a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <p class="adress-footer">
                    Strada Romania Muncitoare, nr. 55, Craiova
                </p>
                <p class="adress-footer"><a target="_blank" href="https://anpc.ro/">www.anpc.ro</a></p>
                <p class="adress-footer"><a target="_blank" href="https://www.facebook.com/myway.pizzamyway?fref=ts"><i class="fa fa-facebook-square"></i></a></p>
            </div>
        </div>
    </div>
</footer>

        <!--<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>-->

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="assets/js/custom.js"></script>
/-->
<script>
/***********  Back to top **************/
if ($('#back-to-top').length) {
    var scrollTrigger = 400, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').show();
            } else {
                $('#back-to-top').hide();
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}
   /*************** Expand Menu ***********/
    $("body").on("click", "#expand-menu", function () {
        $(".nav-home").fadeIn("slow", "linear");
        $("#close-menu").show();
		$('body').css({"height":"100%","overflow":"hidden"});
        $("#expand-menu").hide();
        $(".text-head").hide();
        $(".start").hide();
    });

	    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= $("header").height()) {
            $(".btn2").hide();
        } else {
            $(".btn2").fadeIn();
        };

		
		
        if (scroll >= $("header").height()) {
            $(".btn3").slideDown();
            $(".logo").addClass("logo-full");
        } else {
            $(".btn3").slideUp();
            $(".logo").removeClass("logo-full");
        }
    });

    $("body").on("click", "#preparate", function (e) {
        e.preventDefault();
        $("ul.dropdown").slideToggle();
    });

	
    $("body").on("click", "#close-menu", function () {
        $(".nav-home").fadeOut("slow", "linear");
        $(".nav-home2").fadeIn("slow", "linear");
		$('body').css({"height":"auto","overflow":"visible"});
        $("#expand-menu").show();
        $("#close-menu").hide();
        $(".text-head").fadeIn("slow");
        $(".start").fadeIn();
    });


	  /************ Scroll top *********/
	
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

	  $(window).scroll(function () {
		  if  ($(window).width()>1199) {
        if ($(this).scrollTop() > 400) {
            $('nav').css({"position": "fixed", "top": "0", "background":"white", "box-shadow":"0px 0px 6px 0px rgba(0, 0, 0, 0.2)","-webkit-transition":"none","transition":"none"});
        } else {
            $('nav').css({"position": "absolute", "top": "60px", "background":"transparent","box-shadow":"none","-webkit-transition":"top 1s","transition":"top 1s"});
        }
    }
	  });
	
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

	if($('.nav-home').css('display') == 'block')
{
$('nav').css('top','0 !important');
};
	
	
</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11508154-1");
pageTracker._trackPageview();
} catch(err) {}</script>  