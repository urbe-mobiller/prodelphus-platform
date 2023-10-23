/* ===================================================================
 * Glint - Main JS
 *
 * ------------------------------------------------------------------- */

(function ($) {
    "use strict";

    var cfg = {
            scrollDuration: 800, // smoothscroll duration
            mailChimpURL:
                "https://facebook.us8.list-manage.com/subscribe/post?u=cdb7b577e41181934ed6a6a44&amp;id=e6957d85dc", // mailchimp url
        },
        $WIN = $(window);

    // Add the User Agent to the <html>
    // will be used for IE10 detection (Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0))
    var doc = document.documentElement;
    doc.setAttribute("data-useragent", navigator.userAgent);

    /* Preloader
     * -------------------------------------------------- */
    var clPreloader = function () {
        $("html").addClass("cl-preload");

        $WIN.on("load", function () {
            //force page scroll position to top at page refresh
            // $('html, body').animate({ scrollTop: 0 }, 'normal');

            // will first fade out the loading animation
            $("#loader").fadeOut("slow", function () {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(300).fadeOut("slow");
            });

            // for hero content animations
            $("html").removeClass("cl-preload");
            $("html").addClass("cl-loaded");
        });
    };

    /* Menu on Scrolldown
     * ------------------------------------------------------ */
    var clMenuOnScrolldown = function () {
        var menuTrigger = $(".header-menu-toggle");

        $WIN.on("scroll", function () {
            if ($WIN.scrollTop() > 150) {
                menuTrigger.addClass("opaque");
            } else {
                menuTrigger.removeClass("opaque");
            }
        });
    };

    /* OffCanvas Menu
     * ------------------------------------------------------ */
    var clOffCanvas = function () {
        var menuTrigger = $(".header-menu-toggle"),
            nav = $(".header-nav"),
            closeButton = nav.find(".header-nav__close"),
            siteBody = $("body"),
            mainContents = $("section, footer");

        // open-close menu by clicking on the menu icon
        menuTrigger.on("click", function (e) {
            e.preventDefault();
            // menuTrigger.toggleClass('is-clicked');
            siteBody.toggleClass("menu-is-open");
        });

        // close menu by clicking the close button
        closeButton.on("click", function (e) {
            e.preventDefault();
            menuTrigger.trigger("click");
        });

        // close menu clicking outside the menu itself
        siteBody.on("click", function (e) {
            if (
                !$(e.target).is(
                    ".header-nav, .header-nav__content, .header-menu-toggle, .header-menu-toggle span"
                )
            ) {
                // menuTrigger.removeClass('is-clicked');
                siteBody.removeClass("menu-is-open");
            }
        });
    };

    /* photoswipe
     * ----------------------------------------------------- */
    var clPhotoswipe = function () {
        var items = [],
            $pswp = $(".pswp")[0],
            $folioItems = $(".item-folio");

        // get items
        $folioItems.each(function (i) {
            var $folio = $(this),
                $thumbLink = $folio.find(".thumb-link"),
                $title = $folio.find(".item-folio__title"),
                $caption = $folio.find(".item-folio__caption"),
                $titleText = "<h4>" + $.trim($title.html()) + "</h4>",
                $captionText = $.trim($caption.html()),
                $href = $thumbLink.attr("href"),
                $size = $thumbLink.data("size").split("x"),
                $width = $size[0],
                $height = $size[1];

            var item = {
                src: $href,
                w: $width,
                h: $height,
            };

            if ($caption.length > 0) {
                item.title = $.trim($titleText + $captionText);
            }

            items.push(item);
        });

        // bind click event
        $folioItems.each(function (i) {
            $(this).on("click", function (e) {
                e.preventDefault();
                var options = {
                    index: i,
                    showHideOpacity: true,
                };

                // initialize PhotoSwipe
                var lightBox = new PhotoSwipe(
                    $pswp,
                    PhotoSwipeUI_Default,
                    items,
                    options
                );
                lightBox.init();
            });
        });
    };

    /* Stat Counter
     * ------------------------------------------------------ */
    var clStatCount = function () {
        var statSection = $(".about-stats"),
            stats = $(".stats__count");

        statSection.waypoint({
            handler: function (direction) {
                if (direction === "down") {
                    stats.each(function () {
                        var $this = $(this);

                        $({ Counter: 0 }).animate(
                            { Counter: $this.text() },
                            {
                                duration: 4000,
                                easing: "swing",
                                step: function (curValue) {
                                    $this.text(Math.ceil(curValue));
                                },
                            }
                        );
                    });
                }

                // trigger once only
                this.destroy();
            },

            offset: "90%",
        });
    };

    /* Masonry
     * ---------------------------------------------------- */
    var clMasonryFolio = function () {
        var containerBricks = $(".masonry");

        containerBricks.imagesLoaded(function () {
            containerBricks.masonry({
                itemSelector: ".masonry__brick",
                resize: true,
            });
        });
    };

    /* slick slider
     * ------------------------------------------------------ */
    var clSlickSlider = function () {
        $(".clients").slick({
            arrows: false,
            dots: true,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 2,
            //autoplay: true,
            pauseOnFocus: false,
            autoplaySpeed: 1000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 5,
                    },
                },
                {
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
            ],
        });

        $(".testimonials").slick({
            arrows: true,
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            pauseOnFocus: false,
            autoplaySpeed: 1500,
            responsive: [
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        arrows: false,
                        dots: true,
                    },
                },
            ],
        });
    };

    /* Smooth Scrolling
     * ------------------------------------------------------ */
    var clSmoothScroll = function () {
        $(".smoothscroll").on("click", function (e) {
            var target = this.hash,
                $target = $(target);

            e.preventDefault();
            e.stopPropagation();

            $("html, body")
                .stop()
                .animate(
                    {
                        scrollTop: $target.offset().top,
                    },
                    cfg.scrollDuration,
                    "swing"
                )
                .promise()
                .done(function () {
                    // check if menu is open
                    if ($("body").hasClass("menu-is-open")) {
                        $(".header-menu-toggle").trigger("click");
                    }

                    window.location.hash = target;
                });
        });
    };

    /* Placeholder Plugin Settings
     * ------------------------------------------------------ */
    var clPlaceholder = function () {
        $("input, textarea, select").placeholder();
    };

    /* Alert Boxes
     * ------------------------------------------------------ */
    var clAlertBoxes = function () {
        $(".alert-box").on("click", ".alert-box__close", function () {
            $(this).parent().fadeOut(500);
        });
    };

    /* Animate On Scroll
     * ------------------------------------------------------ */
    var clAOS = function () {
        AOS.init({
            offset: 200,
            duration: 600,
            easing: "ease-in-sine",
            delay: 300,
            once: true,
            disable: "mobile",
        });
    };

    /* newslatter submit
     * ------------------------------------------------------ */

    var clAjaxChimp = function () {
        /* local validation */
        $("#mc-form").validate({
            /* submit via ajax */
            submitHandler: function () {
                // Coleta dos valores dos formuários
                const name = $("#mc-email").val();
                const email = $("#mc-email").val();
                const subject = "Novo Contato Newsletter";
                const message = "Novo Contato Newsletter";

                // Dados para envio na API
                const data = {
                    name,
                    email,
                    subject,
                    message,
                };

                const siteKey = window.RECAPTCHA_SITE_KEY;

                grecaptcha.ready(function () {
                    grecaptcha
                        .execute(siteKey, { action: "submit" })
                        .then(function (token) {
                            // Define o valor do token reCAPTCHA no campo oculto
                            $("#recaptchaResponse").val(token);

                            // Dados para envio na API
                            const data = {
                                name,
                                email,
                                subject,
                                message,
                                recaptcha_response: token,
                            };

                            $.ajax({
                                type: "POST",
                                url: apiUrl,
                                data: JSON.stringify(data),
                                contentType: "application/json",
                                beforeSend: function () {},
                                success: function (response) {
                                    // Message was sent
                                    if (response.success) {
                                        $("#mc-form")
                                            .append(
                                                '<i class="fa fa-check"></i> Inscrição realizada com sucesso.'
                                            )
                                            .show();
                                    }
                                    // There was an error
                                    else {
                                        $("#mc-form")
                                            .append(
                                                '<i class="fa fa-warning"></i> Ocorreu um erro, tente novamente mais tarde!'
                                            )
                                            .show();
                                    }
                                },
                                error: function (error) {
                                    console.error(
                                        error?.message
                                            ? error.message
                                            : "Erro ao chamar a api"
                                    );
                                    $("#mc-form")
                                        .append(
                                            '<i class="fa fa-warning"></i> Algo deu errado. Por favor, tente novamente.'
                                        )
                                        .show();
                                },
                            });
                        });
                });
            },
        });
    };

    /* Back to Top
     * ------------------------------------------------------ */
    var clBackToTop = function () {
        var pxShow = 500, // height on which the button will show
            fadeInTime = 400, // how slow/fast you want the button to show
            fadeOutTime = 400, // how slow/fast you want the button to hide
            scrollSpeed = 300, // how slow/fast you want the button to scroll to top. can be a value, 'slow', 'normal' or 'fast'
            goTopButton = $(".go-top");

        // Show or hide the sticky footer button
        $(window).on("scroll", function () {
            if ($(window).scrollTop() >= pxShow) {
                goTopButton.fadeIn(fadeInTime);
            } else {
                goTopButton.fadeOut(fadeOutTime);
            }
        });
    };

    /* Initialize
     * ------------------------------------------------------ */
    (function ssInit() {
        clPreloader();
        clMenuOnScrolldown();
        clOffCanvas();
        clPhotoswipe();
        clStatCount();
        clMasonryFolio();
        clSlickSlider();
        clSmoothScroll();
        clPlaceholder();
        clAlertBoxes();
        clAOS();
        clAjaxChimp();
        clBackToTop();
    })();
})(jQuery);