<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Shortcode\View\View;
use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these events can be overridden by package config.
    |
    */

    'events' => [

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme) {
            $version = get_cms_version();
            // $theme->asset()->usePath()->add('ads-main', 'css/adsindia/css/main.css', [], [], $version);
            /*Ads India Start*/


            $theme->asset()->usePath()->add('ads-bootstrap-min-css', 'css/adsindia/css/vendor/bootstrap.min.css');
            $theme->asset()->usePath()->add('animate', 'css/adsindia/css/vendor/animate.min.css');
            $theme->asset()->usePath()->add('swiper', 'css/adsindia/css/plugins/swiper.min.css');
            $theme->asset()->usePath()->add('nice', 'css/adsindia/css/plugins/nice-select.css');
            $theme->asset()->usePath()->add('nouislider', 'css/adsindia/css/plugins/nouislider.min.css');
            $theme->asset()->usePath()->add('magnific', 'css/adsindia/css/vendor/magnific-popup.css');
            $theme->asset()->usePath()->add('ads-odometer', 'css/adsindia/css/vendor/odometer.min.css');
            $theme->asset()->usePath()->add('ads-fontawesome', 'css/adsindia/css/vendor/fontawesome-pro.css');
            $theme->asset()->usePath()->add('ads-spacing', 'css/adsindia/css/vendor/spacing.css');
            $theme->asset()->usePath()->add('ads-remixicon', 'css/adsindia/css/vendor/remixicon.css');
            $theme->asset()->usePath()->add('ads-main-css', 'css/adsindia/css/main/main.css');
            $theme->asset()->usePath()->add('ads-whatsup', 'css/adsindia/adstheme/whatsup.css');



            $theme->asset()->container('footer')->usePath()->add('jquery-3.7.1.min', 'css/adsindia/js/vendor/jquery-3.7.1.min.js');
            $theme->asset()->container('footer')->usePath()->add('waypoints', 'css/adsindia/js/plugins/waypoints.min.js');
            $theme->asset()->container('footer')->usePath()->add('bootstrap.bundle', 'css/adsindia/js/vendor/bootstrap.bundle.min.js');
            $theme->asset()->container('footer')->usePath()->add('meanmenu', 'css/adsindia/js/plugins/meanmenu.min.js');

            $theme->asset()->container('footer')->usePath()->add('swiper', 'css/adsindia/js/plugins/swiper.min.js');
            $theme->asset()->container('footer')->usePath()->add('wow', 'css/adsindia/js/plugins/wow.min.js');
            $theme->asset()->container('footer')->usePath()->add('magnific-popup', 'css/adsindia/js/vendor/magnific-popup.min.js');
            $theme->asset()->container('footer')->usePath()->add('isotope', 'css/adsindia/js/vendor/isotope.pkgd.min.js');
            $theme->asset()->container('footer')->usePath()->add('imagesloaded', 'css/adsindia/js/vendor/imagesloaded.pkgd.min.js');
            $theme->asset()->container('footer')->usePath()->add('nice-select', 'css/adsindia/js/plugins/nice-select.min.js');
            $theme->asset()->container('footer')->usePath()->add('jarallax', 'css/adsindia/js/plugins/jarallax.min.js');


            $theme->asset()->container('footer')->usePath()->add('ajax-form', 'css/adsindia/js/vendor/ajax-form.js');
            $theme->asset()->container('footer')->usePath()->add('easypie', 'css/adsindia/js/plugins/easypie.js');
            $theme->asset()->container('footer')->usePath()->add('rs-anim', 'css/adsindia/js/plugins/rs-anim-int.js');
            $theme->asset()->container('footer')->usePath()->add('rs-scroll', 'css/adsindia/js/plugins/rs-scroll-trigger.min.js');
            $theme->asset()->container('footer')->usePath()->add('rs-splitText', 'css/adsindia/js/plugins/rs-splitText.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery.lettering', 'css/adsindia/js/plugins/jquery.lettering.js');


            $theme->asset()->container('footer')->usePath()->add('parallax', 'css/adsindia/js/plugins/parallax-effect.min.js');
            $theme->asset()->container('footer')->usePath()->add('jquery.appear', 'css/adsindia/js/plugins/jquery.appear.min.js');

            $theme->asset()->container('footer')->usePath()->add('marquee', 'css/adsindia/js/plugins/marquee.min.js');

            $theme->asset()->container('footer')->usePath()->add('chart.umd', 'css/adsindia/js/plugins/chart.umd.min.js');

            $theme->asset()->container('footer')->usePath()->add('nouislider', 'css/adsindia/js/plugins/nouislider.min.js');
            $theme->asset()->container('footer')->usePath()->add('purecounter', 'css/adsindia/js/vendor/purecounter.js');

            $theme->asset()->container('footer')->usePath()->add('odometer', 'css/adsindia/js/vendor/odometer.min.js');

             $theme->asset()->container('footer')->usePath()->add('main2-js111', 'css/adsindia/js/plugins/lenis.min.js');
              $theme->asset()->container('footer')->usePath()->add('main3-js333', 'css/adsindia/js/plugins/gsap.min.js');
               $theme->asset()->container('footer')->usePath()->add('main4-js444', 'css/adsindia/js/plugins/headding-title.js');
            $theme->asset()->container('footer')->usePath()->add('main1-js', 'css/adsindia/js/main.js');
            $theme->asset()->container('footer')->usePath()->add('whatsup', 'css/adsindia/js/whatsup.js');


            // <script src="assets/js/main.js"></script>

            /*Ads India JS End*/


            /*Ads India End*/

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post', 'ecommerce.product'], function (View $view) {
                    $view->withShortcodes();
                });
            }
        },
    ],
];
