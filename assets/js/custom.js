	
	$(document).ready(function () {
			       if ($(window).width()>=768)
				   {
					   $('.text-head').css("top", ($(window).height() - 120) / 2.4);
				     }
				     if ($(window).width()>=1200)
				   {
					   $('.text-head').css("top", ($(window).height() - 120) / 2.4);
				   $('nav').css("top", ($(window).height() - 120) / 2.4);
				   }
    ///////////Menu center alignment/////////////
    function handleResize() {
        var h = $(window).height();
        $('.fill').css({'height': h + 'px'});
    }
    $(function () {
        handleResize();

        $(window).resize(function () {
            handleResize();
        });
    });


    $(window).load(function ()
    {
        centerContent();
    });

    $(window).resize(function ()
    {
        centerContent();
    });

    function centerContent()
    {
		var container = $('header');
        var content = 120;
        var content2 = $('.logo');
        var logo2 = $('.logo');
        var content3 = $('.phone-right');
        var content4 = $('.list-group');
        var textheader = $('.text-head');
        content.css("top", (container.height() - content.height()) / 2.3);
        content2.css("top", (container.height() - content.height()) / 2.3);
        logo2.css("top", (container.height() - content.height()) / 2.3);
        content3.css("top", (container.height() - content.height()) / 2.3);
        content4.css("top", (container.height() - content.height()) / 2.6);
       
  




        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= $(".head").height()) {
                content.css("top", "0px");
                content2.css("top", "0px");
                content3.css("top", "0px");
            } else {
                content.css("top", (container.height() - content.height()) / 2.3);
                content2.css("top", (container.height() - content.height()) / 2.3);
                content3.css("top", (container.height() - content.height()) / 2.3);
            }


        });

	
		
        $(window).width(function () {
            var width = $(window).width();

            if (width < 506) {
                content4.css("top", (container.height() - content.height()) / 3);
                textheader.css("top", (container.height() - content.height()) / 1.5);
                $('.start').hide();
            }else{
                $('.start').show();
            }

        });

    }

    $(window).width(function () {
        var width = $(window).width();

        if (width < 1000) {
            $(".btn3").addClass("hide");
        }
        if (width < 506) {
            $("body").on("click", "#expand-menu", function () {
                $(".nav-home").fadeIn("slow", "linear");
                $(".nav-home2").fadeIn("slow", "linear");
                $("#close-menu").show();
                $("#expand-menu").hide();
                $(".text-head").hide();
                $(".start").hide();
                $(".phone-right").fadeOut();
            });
            $("body").on("click", "#close-menu", function () {
                $(".nav-home").fadeOut("slow", "linear");
                $(".nav-home2").fadeIn("slow", "linear");
                $("#expand-menu").show();
                $("#close-menu").hide();
                $(".text-head").fadeIn("slow");
                $(".start").fadeIn();
                $(".phone-right").fadeIn();
            });
        } else {
            $(".phone-right").show();
        }
    });


 
    /************ hover boxes from home *********/

    $("#show-icon1").mouseenter(function () {
        $("#icon1").animate({
            left: "+0"
        });
    });

    $("#show-icon1").mouseleave(function () {
        $("#icon1").animate({
            left: "-390"
        });
    });



    $("#show-icon2").mouseenter(function () {
        $("#icon2").animate({
            right: "+0"
        });
    });

    $("#show-icon2").mouseleave(function () {
        $("#icon2").animate({
            right: "-390"
        });
    });

    $("#show-icon3").mouseenter(function () {
        $("#icon3").animate({
            left: "+0"
        });
    });

    $("#show-icon3").mouseleave(function () {
        $("#icon3").animate({
            left: "-390"
        });
    });

    /************ Go to first div ***********/

    $(".start").on("click", function (e) {

        e.preventDefault();

        $("body, html").animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 600);

    });


  

});