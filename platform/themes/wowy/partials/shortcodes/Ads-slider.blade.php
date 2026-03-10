<!-- Main Slider -->
<div style="display: none;" class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual nav-style-1 nav-arrows-thin nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg rounded-nav nav-borders show-nav-hover mb-0"
    data-plugin-options="{'autoplay': true, 'autoplayTimeout': 7000}"
    data-dynamic-height="['750px','750px','750px','750px','750px']" style="height: 650px; display:none">
    <div class="owl-stage-outer">
        <div class="owl-stage">
            <!-- Carousel Slide 1 -->
            <div class="owl-item p-relative overflow-hidden">
                <div class="p-relative z-index-1 overflow-hidden bannersmall"
                    style="background-image: url('themes/wowy/ads/images/home/banner1.jpg'); background-size: cover; background-position: center;">

                    <div class="container-fluid" style="max-width: 1550px !important;">
                        <div class="row justify-content-center align-items-center mh-750px py-5">
                            <div class="col-lg-5 text-center text-lg-start px-4 tabtextone">
                                @if ($title)
                                    <h4 class="text-5 text-lg-6 font-weight-medium mb-4 appear-animation wfont"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0"
                                        style="color: #11a9f3;">
                                        {!! BaseHelper::clean($title) !!}
                                    </h4>
                                @endif

                                @if ($description)
                                    <h2 class="text-9 text-lg-9 font-weight-semibold line-height-1.4 appear-animation mobfont"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                                        style="color: #000;">
                                        {!! BaseHelper::clean($description) !!}
                                    </h2>
                                @endif
                                <div class="appear-animation" data-appear-animation="fadeIn"
                                    data-appear-animation-delay="600">
                                    @php
                                        $headerMessages = json_decode(theme_option('header_messages'), true);
                                        $secondLink = null;
                                        $linkCount = 0;

                                        if (!empty($headerMessages) && is_array($headerMessages)) {
                                            foreach ($headerMessages as $message) {
                                                if (is_array($message)) {
                                                    foreach ($message as $field) {
                                                        if (
                                                            isset($field['key']) &&
                                                            $field['key'] === 'link' &&
                                                            !empty($field['value'])
                                                        ) {
                                                            $linkCount++;
                                                            if ($linkCount === 2) {
                                                                $secondLink = $field['value'];
                                                                break 2; // Stop both loops once the second link is found
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    @endphp

                                    @if ($secondLink)
                                        <a href="{{ $secondLink }}"
                                            class="btn btn-rounded btn-dark box-shadow-7 font-weight-medium btn-swap-1 mobbutton"
                                            data-clone-element="1">
                                            <span>{{ __('Read more') }}<i
                                                    class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                                        </a>
                                    @endif

                                    {{-- <a href="#"
                                    class="btn btn-rounded btn-dark box-shadow-7 font-weight-medium btn-swap-1 mobbutton"
                                    data-clone-element="1">
                                    <span>{{ __('Read more') }}<i class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                                </a> --}}
                                    <div class="p-absolute bg-dark custom-stamp-1 appear-animation mobinew"
                                        data-appear-animation="blurIn" data-appear-animation-delay="800"
                                        style="bottom:110px!important;">
                                        <div class="rotate-animation">
                                            <svg viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <path id="curvedText1" fill="none" stroke="none"
                                                    d="M 32.550491,148.48008 A -108.15144,-108.15144 0 0 1 140.70194,40.328644 -108.15144,-108.15144 0 0 1 248.85338,148.48008 -108.15144,-108.15144 0 0 1 140.70194,256.63153 -108.15144,-108.15144 0 0 1 32.550491,148.48008 Z" />
                                                <text font-size="20" fill="#FFF" letter-spacing="0"
                                                    font-family="Poppins, Arial, sans-serif" font-weight="semibold">
                                                    <textPath xlink:href="#curvedText1">THE ULTIMATE SOLUTION FOR
                                                        ALUMINIUM AND UPVC WINDOW FABRICATION.</textPath>
                                                </text>
                                            </svg>
                                        </div>
                                        {{-- <div class="p-absolute transform3dxy-n50 left-50pct top-50pct">
                                        <img width="58" height="58"
                                            src="themes/wowy/ads/img/demos/accounting-1/icons/icon-shape-1.svg"
                                            alt="icon-shape-1" data-icon
                                            data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary p-relative bottom-2 right-3'}" />
                                    </div> --}}
                                    </div>



                                </div>
                            </div>
                            <div class="col-8 col-lg-7 mt-3 px-md-5 ps-xl-5 pe-xxl-0 mt-lg-0">
                                <div class="p-relative">



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Carousel Slide 2 -->
            <div class="owl-item p-relative overflow-hidden">
                <div class="p-relative z-index-1 overflow-hidden bannersmall"
                    style="background-image: url('themes/wowy/ads/images/home/banner2.jpg'); background-size: cover; background-position: center;">
                    <div class="container-fluid" style="max-width: 1550px !important">
                        <div class="row justify-content-center align-items-center mh-750px py-5">
                            <div class="col-lg-6 text-right text-lg-startnew text-lg-start px-4">
                                @if ($title)
                                    <h4 class="text-5 text-lg-6 font-weight-medium mb-4 appear-animation wfont"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0"
                                        style="color: #11a9f3;">
                                        {!! BaseHelper::clean($title) !!}
                                    </h4>
                                @endif
                                @if ($description2)
                                    <h2 class="text-9 text-lg-9 font-weight-semibold line-height-1.4 appear-animation mobfontsecond"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                                        style="color: #000;">
                                        {!! BaseHelper::clean($description2) !!}
                                    </h2>
                                @endif

                                <div class="appear-animation" data-appear-animation="fadeIn"
                                    data-appear-animation-delay="600">



                                    @if ($secondLink)
                                        <a href="{{ $secondLink }}"
                                            class="btn btn-rounded btn-dark box-shadow-7 font-weight-medium btn-swap-1 mobbutton"
                                            data-clone-element="1">
                                            <span>{{ __('Read more') }}<i
                                                    class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                                        </a>
                                    @endif


                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Slide 3 -->
            <div class="owl-item p-relative overflow-hidden">
                <div class="p-relative z-index-1 overflow-hidden bannersmall"
                    style="background-image: url('themes/wowy/ads/images/home/banner3.jpg'); background-size: cover; background-position: center;">
                    <div class="container-fluid" style="max-width: 1550px !important">
                        <div class="row justify-content-center align-items-center mh-750px py-5">
                            <div class="col-lg-6 text-right text-lg-startnew text-lg-start px-4">
                                @if ($title)
                                    <h4 class="text-5 text-lg-6 font-weight-medium mb-4 appear-animation wfont"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0"
                                        style="color: #11a9f3;">
                                        {!! BaseHelper::clean($title) !!}
                                    </h4>
                                @endif

                                @if ($description3)
                                    <h2 class="text-9 text-lg-9 font-weight-semibold line-height-1.4 appear-animation mobfontthird"
                                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                                        style="color: #000;">
                                        {!! BaseHelper::clean($description3) !!}
                                    </h2>
                                @endif


                                <div class="appear-animation" data-appear-animation="fadeIn"
                                    data-appear-animation-delay="600">

                                    @php
                                        $headerMessages = json_decode(theme_option('header_messages'), true);
                                        $secondLink = null;
                                        $linkCount = 0;

                                        if (!empty($headerMessages) && is_array($headerMessages)) {
                                            foreach ($headerMessages as $message) {
                                                if (is_array($message)) {
                                                    foreach ($message as $field) {
                                                        if (
                                                            isset($field['key']) &&
                                                            $field['key'] === 'link' &&
                                                            !empty($field['value'])
                                                        ) {
                                                            $linkCount++;
                                                            if ($linkCount === 2) {
                                                                $secondLink = $field['value'];
                                                                break 2; // Stop both loops once the second link is found
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    @endphp

                                    @if ($secondLink)
                                        <a href="{{ $secondLink }}"
                                            class="btn btn-rounded btn-dark box-shadow-7 font-weight-medium btn-swap-1 mobbutton"
                                            data-clone-element="1">
                                            <span>{{ __('Read more') }}<i
                                                    class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                                        </a>
                                    @endif

                                    </a>
                                </div>
                            </div>
                            {{-- <div class="col-8 col-lg-7 mt-3 px-md-5 ps-xl-5 pe-xxl-0 mt-lg-0">
                                    <div class="p-relative">
        
                                        <div class="p-absolute bg-dark custom-stamp-1 appear-animation mobinew"
                                            data-appear-animation="blurIn" data-appear-animation-delay="800"
                                            style="left:-300px!important; bottom:350px!important;">
                                            <div class="rotate-animation">
                                                <svg viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <path id="curvedText2" fill="none" stroke="none"
                                                        d="M 32.550491,148.48008 A -108.15144,-108.15144 0 0 1 140.70194,40.328644 -108.15144,-108.15144 0 0 1 248.85338,148.48008 -108.15144,-108.15144 0 0 1 140.70194,256.63153 -108.15144,-108.15144 0 0 1 32.550491,148.48008 Z" />
                                                    <text font-size="20" fill="#FFF" letter-spacing="0"
                                                        font-family="Poppins, Arial, sans-serif" font-weight="semibold">
                                                        <textPath xlink:href="#curvedText2">YOUR TRUSTED PARTNER FOR
                                                            GLASS PROCESSING MACHINES.</textPath>
                                                    </text>
                                                </svg>
                                            </div>
                                            <div class="p-absolute transform3dxy-n50 left-50pct top-50pct">
                                                <img width="58" height="58"
                                                    src="themes/wowy/ads/img/demos/accounting-1/icons/icon-shape-1.svg"
                                                    alt="icon-shape-1" data-icon
                                                    data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary p-relative bottom-2 right-3'}" />
                                            </div>
                                        </div>
        
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="owl-nav">
        <button type="button" role="presentation" class="owl-prev" aria-label="Previous"></button>
        <button type="button" role="presentation" class="owl-next" aria-label="Next"></button>
    </div>
</div>

<style>
    .ck-content ul {
        list-style-type:none!important;
    }
</style>
    <!-- banner area start -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

        <style>
            .lp {
                font-size: 126px !important;
            }

            .lop {
                color: #171515 !important;
                margin-bottom: 10px !important;
            }

            .rs-banner-twelve .rs-banner-btn .rs-btn.has-theme-light-green {
                background: transparent;
                color: #111010;
                border: 1px solid #00a0e3;
            }

            .rs-btn.has-icon .icon-box svg.lbl1 {
                width: 17px;
                fill: #111010;
            }

            .rs-banner-twelve .rs-banner-bg-thumb {
                height: 700px;
            }

            /* Banner Layout */
            .rs-banner-area {
                width: 100%;
                overflow: hidden;
            }

            .rs-banner-item-wrapper {
                position: relative;
            }

            .rs-banner-bg-thumb {
                width: 100%;
                /* height:420px; */
                background-size: cover;
                background-position: center;
            }

            .rs-banner-content {
                position: absolute;
                left: 0;
                bottom: 30px;
                width: 100%;
                padding: 0 20px;
                z-index: 2;
                color: #000;
            }

            .rs-banner-twelve .rs-banner-navigation {
                left: 93%;
            }

            .rs-banner-stroke-text {
                font-size: 40px;
                font-weight: bold;
            }

            .rs-section-title {
                font-size: 28px;
                margin: 10px 0;
            }

            .rs-banner-descrip p {
                font-size: 15px;
                max-width: 600px;
            }

            .rs-btn {
                display: inline-block;
                margin-top: 12px;
                padding: 10px 22px;
                border: 1px solid #00a0e3;
                text-decoration: none;
                color: #111;
            }

            .rs-banner-twelve .rs-banner-descrip {
                max-width: 610px;
                margin: 0px 0 0px;
            }

            @media (max-width:767px) {

                .rs-banner-twelve .rs-banner-bg-thumb {
                    height: 300px !important;
                }

                .rs-banner-item-wrapper {
                    display: flex !important;
                    flex-direction: column !important;
                    align-items: center;
                }

                .rs-banner-twelve .rs-banner-navigation {
                    left: 0%;
                }

                .rs-banner-bg-thumb {
                    width: 100% !important;
                    height: auto !important;
                    min-height: 335px;
                    background-size: cover !important;
                    background-position: right !important;
                    position: relative !important;
                    order: 1 !important;
                }

                .rs-banner-item-wrapper .container {
                    position: relative !important;
                    top: auto !important;
                    left: auto !important;
                    margin-top: 15px;
                    order: 2 !important;
                    width: 100%;
                }

                .rs-banner-content {
                    position: relative !important;
                    top: auto !important;
                    left: auto !important;
                    transform: none !important;
                    text-align: left !important;
                    width: 100%;
                    display: none;
                }

                .swiper-slide-active .rs-banner-content {
                    display: block !important;
                }

                .rs-section-title.rs-split-text-enable {
                    transform: none !important;
                    opacity: 1 !important;
                }

                .rs-banner-stroke-text {
                    font-size: 32px !important;
                }

                .rs-section-title {
                    font-size: 22px !important;
                    line-height: 1.3 !important;
                }

                .rs-banner-descrip p {
                    font-size: 14px !important;
                    line-height: 1.4 !important;
                }

                .rs-banner-btn .rs-btn.has-theme-light-green {
                    font-size: 14px !important;
                    padding: 8px 20px !important;
                }

                .rs-split-text-enable,
                .split-in-fade,
                .rs-banner-content * {
                    animation: none !important;
                    transition: none !important;
                    transform: none !important;
                    opacity: 1 !important;
                }


                @media (min-width: 1366px) {

                    .container,
                    .container-lg,
                    .container-md,
                    .container-sm,
                    .container-xl,
                    .container-xxl {
                        max-width: 1390px;
                    }
                }

            }
        </style>


        <!-- Banner Area Start -->
        <section class="rs-banner-area rs-banner-twelve rs-swiper">
            <div class="rs-banner-slider-wrapper">
                <div class="swiper" data-clone-slides="false" data-loop="true" data-speed="2000" data-autoplay="true"
                    data-dots-dynamic="false" data-hover-pause="true" data-effect="fade" data-delay="3000" data-item="1"
                    data-margin="30">

                    <div class="swiper-wrapper process-counts">

                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="rs-banner-item-wrapper">
                                <div class="rs-banner-bg-thumb" data-background="assets/img/1-banner.jpg"></div>
                                <div class="container">
                                    <div class="row g-5">
                                        <div class="col-xl-9 col-lg-10" style="margin-top: 12%;">
                                            <div class="rs-banner-item">
                                                <div class="rs-banner-content">
                                                    <!-- <span class="rs-banner-stroke-text" style="color:#000">2026</span> -->
                                                    <h2
                                                        class="rs-section-title has-theme-green rs-split-text-enable split-in-fade">
                                                        35 S6
                                                    </h2>
                                                    <div class="rs-banner-descrip ">
                                                        <p class="lop descrip">Time Range : 0-60 Sec., On Delay</p>
                                                    </div>
                                                    <h2
                                                        class="rs-section-title has-theme-green rs-split-text-enable split-in-fade">
                                                        35 SD (STAR DELTA TIMER)
                                                    </h2>
                                                    <div class="rs-banner-descrip ">
                                                        <p class="lop descrip">Runup Time : 0-60 Sec</p>
                                                        <p class="lop descrip">Pause Time : 100 M Sec Fix</p>
                                                    </div>
                                                    <h2
                                                        class="rs-section-title has-theme-green rs-split-text-enable split-in-fade">
                                                        35 XMR (FORWARD - REVERSE TIMER)
                                                    </h2>
                                                    <div class="rs-banner-descrip ">
                                                        <p class="lop descrip">Forward & Reverse Time : 1 Sec to 10
                                                            Hours</p>
                                                        <p class="lop descrip">Pause Time : 1 Sec to 100 Sec</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="rs-banner-item-wrapper">
                                <div class="rs-banner-bg-thumb" data-background="assets/img/2-banner.jpg"></div>
                                <div class="container">
                                    <div class="row g-5">
                                        <div class="col-xl-9 col-lg-10" style="margin-top: 12%;">
                                            <div class="rs-banner-item">
                                                <div class="rs-banner-content">
                                                    <!-- <span class="rs-banner-stroke-text" style="color:#000">2006</span> -->
                                                    <h2
                                                        class="rs-section-title has-theme-green rs-split-text-enable split-in-fade">
                                                        Jumbo Displays
                                                    </h2>
                                                    <div class="rs-banner-descrip">
                                                        <p class="lop descrip"> Large jumbo Displays of 4 inch & 2.5
                                                            inch are critically required for process
                                                            factories where process parameters need to be monitored from
                                                            Large
                                                            distances inputs availabe like Thermocouples HTD. mA. V to
                                                            monitor process
                                                            Variables such as temperature, pressure, level, humidity,
                                                            and flow. All Displays
                                                            have RS-485 Modbus Communication.
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Navigation -->
                    <div class="rs-banner-navigation">
                        <button class="swiper-button-prev rs-swiper-btn has-theme-light-green" style="color: #fff;"><i
                                class="fa-regular fa-arrow-left"></i></button>
                        <button class="swiper-button-next rs-swiper-btn has-theme-light-green" style="color: #fff;"><i
                                class="fa-regular fa-arrow-right"></i></button>
                    </div>

                    <!-- Pagination -->
                    <div class="rs-banner-pagination d-block d-md-none">
                        <div class="swiper-pagination rs-pagination has-theme-green"></div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Banner Area End -->

        <!-- banner area end -->

       
     

      
 

       


       
{{-- <style>
    @media only screen and (max-width: 600px) {
        .mobfont {
            font-size: 14px !important;
            line-height: 25px !important;
            margin-top: 190px;
            width: 50%;
            /* display: none !important; */
        }

        .mobfontsecond {
            margin-top: 60px;
        }

        .mobfontthird {
            font-size: 14px !important;
            margin-top: 60px;
            line-height: 25px !important;
            width: 50%;
        }
    }
</style> --}}



<!-- banner area start -->
{{-- <section class="rs-banner-area rs-banner-three p-relative">
    <div class="rs-banner-bg-thumb" data-background="{{ RvMedia::getImageUrl(BaseHelper::clean($icon)) }}">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-10">
                <div class="rs-banner-wrapper">
                    <div class="rs-banner-content">
                        
                        <h1 class="rs-banner-title wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".7s">

                            @if ($title)
                                {{ BaseHelper::clean($title) }}
                            @endif

                            @if ($description)
                                <br>{{ BaseHelper::clean($description) }}
                            @endif

                            @if ($description2)
                                <br>{{ BaseHelper::clean($description2) }}
                            @endif

                        </h1>

                        <div class="rs-banner-btn wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">
                            @php
                                $headerMessages = json_decode(theme_option('header_messages'), true);
                                $secondLink = null;
                                $linkCount = 0;

                                if (!empty($headerMessages) && is_array($headerMessages)) {
                                    foreach ($headerMessages as $message) {
                                        if (is_array($message)) {
                                            foreach ($message as $field) {
                                                if (
                                                    isset($field['key']) &&
                                                    $field['key'] === 'link' &&
                                                    !empty($field['value'])
                                                ) {
                                                    $linkCount++;
                                                    if ($linkCount === 2) {
                                                        $secondLink = $field['value'];
                                                        break 2; // Stop both loops once the second link is found
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            @endphp
                            @if ($secondLink)
                                <a class="rs-btn has-theme-blue has-bg has-icon" href="{{ $secondLink }}">Read More
                                    <span class="icon-box">
                                        <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32">
                                            <path
                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                            </path>
                                        </svg>
                                        <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32">
                                            <path
                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- banner area end -->
