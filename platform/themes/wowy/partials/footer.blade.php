    {!! dynamic_sidebar('top_footer_sidebar') !!}



    <div class="rs-footer-bg-thumb-wrapper" style="background: #0a0531;">

        <!-- Body main wrapper end -->

        <!-- footer area start -->

        <footer>
            <div class="rs-footer-area rs-footer-two has-space has-theme-green has-bg-thumb">
                <div class="rs-footer-bg-thumb" style="background: #424242;"></div>

                <div class="rs-footer-top">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="rs-footer-widget footer-2-col-1">
                                    <div class="rs-footer-widget-logo mb-25">
                                        @if ($logo = theme_option('logo_light') ?: theme_option('logo'))
                                            <a href="{{ BaseHelper::getHomepageUrl() }}"><img
                                                    src="{{ RvMedia::getImageUrl($logo) }}" loading="lazy"
                                                    alt="{{ theme_option('site_title') }}"></a>
                                        @endif
                                    </div>
                                    <div class="rs-footer-widget-content">
                                        <p class="rs-footer-widget-description">
                                            Vbtron Automation Pvt Ltd is a manufacturer of Process Control & Automation
                                            Instruments for applications in a wide range of Industries.
                                        </p>
                                        <div class="rs-footer-widget-stroke-text">
                                            <h3 class="rs-footer-stroke-text has-theme-green">Since 2007</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="rs-footer-widget footer-2-col-2">
                                    <h5 class="rs-footer-widget-title">Useful Links</h5>
                                    <div class="rs-footer-widget-content">
                                        <div class="rs-footer-widget-links has-theme-green">
                                            <ul>
                                                <li> <a href="#">Home</a> </li>
                                                <li><a href="#">About Us</a></li>
                                                <li><a href="">Our Products</a></li>
                                                <li><a href="#">Application</a></li>
                                                <li><a href="#">Download</a></li>
                                                <li><a href="#">Blog </a></li>
                                                <li><a href="#">Careers </a></li>
                                                <li><a href="#">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="rs-footer-widget footer-2-col-3">

                                    <h5 class="rs-footer-widget-title">Compnay Name</h5>

                                    <div class="rs-footer-widget-content">
                                        <div class="rs-footer-widget-meta">
                                            <div class="rs-footer-widget-address">

                                                <a>{{ theme_option('site_title') }}</a>
                                            </div>

                                        </div>
                                    </div>


                                    <h5 class="rs-footer-widget-title">Office Address</h5>
                                    <div class="rs-footer-widget-content">
                                        <div class="rs-footer-widget-meta">
                                            <div class="rs-footer-widget-address">

                                                <a>{{ theme_option('address') }}</a>
                                            </div>
                                            <h5 class="rs-footer-widget-title">Email Address</h5>
                                            <p> Interested in working with us?</p>
                                            <div class="rs-footer-widget-email">
                                                <a
                                                    href="mailto:{{ theme_option('contact_email') }}">{{ theme_option('contact_email') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="rs-footer-widget footer-2-col-4">
                                    <h5 class="rs-footer-widget-title">Phone Number</h5>
                                    <div class="rs-footer-widget-content">
                                        <div class="rs-footer-widget-contact-info">
                                            <div class="rs-footer-widget-number">
                                                <span>
                                                    <a
                                                        href="tel:{{ theme_option('hotline') }}">{{ theme_option('hotline') }}</a>
                                                </span>
                                                <span>
                                                    <a
                                                        href="tel:{{ theme_option('phone') }}">{{ theme_option('phone') }}</a>
                                                </span>
                                            </div>
                                        </div>
                                        <h5 class="rs-footer-widget-title">Follow Us</h5>
                                        <div class="rs-footer-widget-social">
                                            @if (($socialLinks = theme_option('social_links')) && ($socialLinks = json_decode($socialLinks, true)))
                                                <div class="rs-theme-social has-theme-green">
                                                    @foreach ($socialLinks as $socialLink)
                                                        @if (count($socialLink) >= 3 &&
                                                                isset($socialLink[0]['value']) &&
                                                                isset($socialLink[1]['value']) &&
                                                                isset($socialLink[2]['value']))
                                                            @php
                                                                $platform = strtolower($socialLink[0]['value']);
                                                                $iconClass = $socialLink[1]['value'];
                                                                $url = $socialLink[2]['value'];
                                                            @endphp

                                                            <a href="{{ $url }}" target="_blank"
                                                                rel="noopener">
                                                                <i class="{{ $iconClass }}"></i>
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rs-footer-copyright-area rs-copyright-one has-theme-green">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="rs-footer-copyright has-theme-green text-center">
                                    <p class="underline">© <span id="year">2025</span> Vbtron Automation Pvt Ltd.
                                        Designed by <a href="https://www.goadsindia.com/" target="_blank">Ads India</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer area end -->

    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasMain"
        aria-labelledby="offcanvasMain">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mb-4" id="offCanvasLogo"></div>
            <nav class="offcanvas-nav w-100" id="offCanvasNav"></nav>
        </div>
    </div>

    {{-- <a href="https://web.whatsapp.com/send?l=en&amp;&phone= +919426059817 &text= Hello! I just visited your website and am interested in Know more about your services. I have one query"
        class="float lbldes" target="_blank">
        <img loading="lazy" src="{{ asset('themes/wowy/ads/img/wt.png') }}" alt="whatsapp" style="width: 50px;">
    </a>

    <a class="float iconwhatsup" target="_blank"
        href="https://api.whatsapp.com/send?l=en&amp;phone= +919426059817 &amp;text= Hello! I just visited your website and am interested in Know more about your services. I have one query">
        <img loading="lazy" src="themes/wowy/ads/img/wt.png" alt="whatsapp" style="width: 50px;">
    </a> --}}
    <!-- newwhatsup -->


    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quick-view-modal" tabindex="-1" aria-labelledby="quick-view-modal-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="half-circle-spinner loading-spinner">
                        <div class="circle circle-1"></div>
                        <div class="circle circle-2"></div>
                    </div>
                    <div class="quick-view-content"></div>
                </div>
            </div>
        </div>
    </div>

    @if (is_plugin_active('ecommerce'))
        <script>
            window.currencies = {!! json_encode(get_currencies_json()) !!};
        </script>
    @endif

    {!! Theme::footer() !!}

    <script>
        window.trans = {
            "Views": "{{ __('Views') }}",
            "Read more": "{{ __('Read more') }}",
            "days": "{{ __('days') }}",
            "hours": "{{ __('hours') }}",
            "mins": "{{ __('mins') }}",
            "sec": "{{ __('sec') }}",
            "No reviews!": "{{ __('No reviews!') }}"
        };
    </script>

    {!! Theme::place('footer') !!}

    @if (session()->has('success_msg') ||
            session()->has('error_msg') ||
            (isset($errors) && $errors->count() > 0) ||
            isset($error_msg))
        <script type="text/javascript">
            window.onload = function() {
                @if (session()->has('success_msg'))
                    window.showAlert('alert-success', '{{ session('success_msg') }}');
                @endif

                @if (session()->has('error_msg'))
                    window.showAlert('alert-danger', '{{ session('error_msg') }}');
                @endif

                @if (isset($error_msg))
                    window.showAlert('alert-danger', '{{ $error_msg }}');
                @endif

                @if (isset($errors))
                    @foreach ($errors->all() as $error)
                        window.showAlert('alert-danger', '{!! BaseHelper::clean($error) !!}');
                    @endforeach
                @endif
            };
        </script>
    @endif
    {{-- 
    <div id="scrollUp"><i class="fal fa-long-arrow-up"></i></div> --}}
    <!-- back to top -->
    <!-- Backtotop start -->
    <div class="backtotop-wrap cursor-pointer has-theme-blue">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->
    <style>
        @media only screen and (max-width: 600px) {
            .rs-team-one .rs-team-content-wrapper {
                width: 100%;
                padding: 0 15px;
                margin-top: -35px;
            }

            .fa-regular {
                line-height: 2;
            }

            .mobilenone {
                display: none;
            }

            .rs-subscribe-one .rs-subscribe-wrapper {
                border-bottom: 1px solid rgba(255, 255, 255, 0.09);
                padding-bottom: 20px !important;
                padding-top: 20px;
            }
        }

        .scroll-to-top {
            display: none !important;

        }

        .rs-breadcrumb-one .rs-breadcrumb-menu ul li span a:hover {
            color: #fff !important;
        }
    </style>

    <div id="wishlistSidebar" class="wishlist-sidebar">

        <div class="wishlist-header">
            <h4>Your Cart (<span id="wishlistTotal">0</span>)</h4>
            <button id="wishlistClose">×</button>
        </div>

        <div id="wishlistItems"></div>

        <div class="wishlist-footer">
            <a href="/wishlist" class="wishlist-enquiry-btn">Proceed To Enquiry</a>
        </div>

    </div>

    <div id="wishlistOverlay"></div>
    </body>

    </html>
