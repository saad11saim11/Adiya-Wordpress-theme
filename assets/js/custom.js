(function ($) {
    "use strict";
    $(window).on('load', function () {
        $('.preloader').fadeOut(1000);
    })

    $(document).ready(function () {
		/*==== Menu Section Start here =====*/
		
		
		$('ul.menu li:has(ul.submenu)').addClass('menu-item-has-children');
		$("ul.menu li a").addClass("menu__link");
		$("ul.sub-menu").addClass("submenu");
		$("ul.submenu li a").removeClass("menu__link");
		
		//Pagination
		$("ul.pagination li:has(a.page-numbers)").addClass("page-item");
		$("ul.pagination li:has(span.current)").addClass("page-item");
		$("ul.pagination li.page-item a.page-numbers").addClass("page-link");
		$("ul.pagination li.page-item span.current").addClass("page-link");
		
		//breadcrumb adiya-breadcrumb
		$("ul.adiya-breadcrumb li").addClass("breadcrumb-item");
		
		
        /*==== header Section Start here =====*/
		$("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
        // drop down menu width overflow problem fix
        $('ul').parent('li').on('hover', function () {
            var menu = $(this).find("ul");
            var menupos = $(menu).offset();
            if (menupos.left + menu.width() > $(window).width()) {
                var newpos = -$(menu).width();
                menu.css({
                    left: newpos
                });
            }
        });
        $('.menu li a').on('click', function (e) {
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp(300, "swing");
            } else {
                element.addClass('open');
                element.children('ul').slideDown(300, "swing");
                element.siblings('li').children('ul').slideUp(300, "swing");
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp(300, "swing");
            }
        });





        $('.ellepsis-bar').on('click', function (e) {
            var element = $('.header-top');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.slideUp(300, "swing");
                $('.overlayTwo').removeClass('active');
            } else {
                element.addClass('open');
                element.slideDown(300, "swing");
                $('.overlayTwo').addClass('active');
            }
        });
        $('.header-bar').on('click', function () {
            $(this).toggleClass('active');
            $('.menu').toggleClass('active');
        })
        // $(".menu__link").click(function () {
        //     $(".header-bar").removeClass("active");
        // });

        //Header
        var fixed_top = $("header");
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                fixed_top.addClass("header-fixed fadeInUp");
            } else {
                fixed_top.removeClass("header-fixed fadeInUp");
            }
        });

        $(".header-right .search, .search-close").on("click", function () {
            $(".search-area").toggleClass("open");
        });



        /*==== header Section End here =====*/


        //data asos initializing
        AOS.init();

        // lightcase initializing
        $('a[data-rel^=lightcase]').lightcase();

    });


    // scroll up start here
    $(function () {
        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('.scrollToTop').css({
                    'bottom': '4%',
                    'opacity': '1',
                    'transition': 'all .5s ease'
                });
            } else {
                $('.scrollToTop').css({
                    'bottom': '-30%',
                    'opacity': '0',
                    'transition': 'all .5s ease'
                })
            }
        });
        //Click event to scroll to top
        $('.scrollToTop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });




    //Banner slider
    var swiper = new Swiper(".banner__slider", {
        loop: true,
        centeredSlides: true,
        navigation: {
            nextEl: ".banner__slider-next",
            prevEl: ".banner__slider-prev",
        },
    });
    //client slider
    var swiper = new Swiper(".client__slider", {
        loop: true,
        navigation: {
            nextEl: ".client__slider-next",
            prevEl: ".client__slider-prev",
        },
    });
    //service single slider
    var swiper = new Swiper(".service__single-slider", {
        loop: true,
        navigation: {
            nextEl: ".service__slide-next",
            prevEl: ".service__slide-prev",
        },
    });
}(jQuery));