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

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                // wp_enqueue_script('sage/google-maps', "", ['jquery','sage/js'], null, true);
                var $search = $('.search-form');
                var $cross = $search.find('.cross');
                var canOpen = true;
                var changeFormState = function changeFormState() {
                    if (!$search.hasClass('open') && canOpen) {
                        var input = $('input');
                        $search.toggleClass('open');
                        input.focus();
                    }
                };
                $search.on('mouseover', changeFormState);
                $cross.on('click', function () {
                    $search.toggleClass('open');
                    canOpen = false;
                    setTimeout(function () {
                        canOpen = true;
                    }, 750)
                });

                var $photoCarousel = $('#photoCarousel');
                if ($photoCarousel.length) {
                    $photoCarousel.carousel({
                        interval: 4000
                    });
                    $photoCarousel.find('.carousel-control-prev').click(function () {
                        $photoCarousel.carousel('prev');
                    });
                    $photoCarousel.find('.carousel-control-next').click(function () {
                        $photoCarousel.carousel('next');
                    });
                }

                var $projectCarousel = $('#projectCarousel');
                if ($projectCarousel.length) {
                    $projectCarousel.carousel({
                        interval: 10000
                    });

                    var $inners = $projectCarousel.find('.carousel-inner');

                    $( window ).resize (function() {
                        var w = $( window ).width();
                        $inners.each(function () {
                            this.remove();
                        });
                        if(w>=1200) {
                            $projectCarousel.append($inners[0])
                        }else if(w>=768) {
                            $projectCarousel.append($inners[1])
                        } else {
                            $projectCarousel.append($inners[2])
                        }
                    }).resize();

                }
                $('#navbar_top').on('shown.bs.modal', function (e) {
                    $('.modal-backdrop').remove();
                });

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