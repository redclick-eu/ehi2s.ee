/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {
    function search() {
        var $search = $('.search-form');
        var $searchInput = $('input', $search);
        $searchInput.on('focusin', function () {
            $search.addClass('open');
        });
        $searchInput.on('focusout', function () {
            $search.removeClass('open');
            $searchInput.blur();
            $('body').click(); // Close live search plugin
        });
    }

    function sliders() {
        var $photoCarousel = $('#photoCarousel');
        var play = false;

        $(window).on('resize', function () {
            play = parseInt(window.innerWidth) < 769;
            if(!play) {
                $photoCarousel.carousel(0);
            }
        });
        if ($photoCarousel.length) {
            $photoCarousel.carousel({
                interval: 4000
            });
            $('.carousel-control-prev', $photoCarousel).click(function () {
                if (play) {
                    $photoCarousel.carousel('prev');
                }
            });
            $('.carousel-control-next', $photoCarousel).click(function () {
                if (play) {
                    $photoCarousel.carousel('next');
                }
            });

            $photoCarousel.on('slide.bs.carousel', function (e) {
                if (play) {
                    e.preventDefault();
                }
            });
        }

        var $projectCarousel = $('#projectCarousel');
        if ($projectCarousel.length) {
            $projectCarousel.carousel({
                interval: 10000
            });

            var $inners = $projectCarousel.find('.carousel-inner');

            $(window).resize(function () {
                var w = $(window).width();
                $inners.each(function () {
                    this.remove();
                });
                if (w >= 1200) {
                    $projectCarousel.append($inners[0]);
                } else if (w >= 768) {
                    $projectCarousel.append($inners[1]);
                } else {
                    $projectCarousel.append($inners[2]);
                }
            }).resize();

        }
    }

    function navbar() {
        $('#navbar_top').on('shown.bs.modal', function (e) {
            $('.modal-backdrop').remove();
        });
    }

    function up() {
        var $up = $('#up');
        if ($up.length) {
            $up.on('click', function () {
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
                return false;
            });
            $(window).scroll(function () {
                if ($("html").scrollTop() > 10) {
                    $up.removeClass('hidden');
                } else {
                    $up.addClass('hidden');
                }
            });
        }
    }

    function urlToGoogleMaps() {
        var isMobileDevice = device.mobile() || device.tablet();
        var googleMaps = 'https://www.google.com/maps/search/?api=1&query=59.450178,24.710124';
        if (isMobileDevice) {
            $('.js-contacts').attr('href', googleMaps);
        }
    }

    function formValidation() {
        var $form = $('#form');
        if ($form.length) {
            var reg = {
                "phone": /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/i,
                "mail": /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/i,
                "name": /\S+/
            };

            $form.find('input').on('input', function () {//Валидация инпутов по отдельности в реальном времени
                var name = $(this).attr('name');
                $(this).removeClass('invalid');
                if (!$(this).val().match(reg[name]) || name === "info" && !$(this).prop("checked")) {
                    $(this).addClass('invalid');
                }
            });


            $form.find(' .form-submit').on('click', function (event) {

                var data = {
                    'name': $form.find(" [name='name']").val(),
                    'mail': $form.find(" [name='mail']").val(),
                    'phone': $form.find(" [name='phone']").val(),
                    'text': $form.find(" [name='text']").val(),
                    'pageName': $form.find(" [name='pageName']").val(),
                    'pageUrl': $form.find(" [name='pageUrl']").val(),
                    'id': $form.find(" [name='id']").val()
                };

                var passed = { //Final validation
                    'name': data.name.length,
                    'phone': data.phone.match(reg.phone),
                    'mail': data.mail.match(reg.mail)
                };

                if (passed.phone && passed.mail && passed.name) {
                    $.ajax({
                        type: 'POST',
                        url: "/wp-admin/admin-ajax.php?action=sendMail",
                        data: data,
                        success: function () {
                            var $answerForm = $('#form-answer');
                            $answerForm.click();
                            $(document).on('click', function close() {
                                $(document).off('click', close);
                                $answerForm.modal('hide');
                            });
                            $form.find('input:not([type="submit"])', 'textarea').removeClass('invalid').val("");
                        }
                    });
                } else {
                    for (var key in passed) {
                        if (!passed[key]) {
                            $form.find(" [name='" + key + "']").addClass('invalid');
                        }
                    }
                }

                event.preventDefault();
            });
        }
    }

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                search();
                sliders();
                navbar();
                up();
                urlToGoogleMaps();
                formValidation();
            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function () {
                // JavaScript to be fired on the home page
            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'page_template_template_contacts': {
            init: function () {
                //Loading google maps
                $.getScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyBApFAmdEgjvZ80-X3yJElbWm90T0ARlVE&callback=initMap');
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
function initMap() {
    var point = {lat: 59.450178, lng: 24.710124};
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 17, center: point});
    var marker = new google.maps.Marker({position: point, map: map});
}