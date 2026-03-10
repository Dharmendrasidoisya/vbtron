<!-- Our products -->

{{-- 
<div class="px-3 px-xl-0 border-radius-2 text-light mt-5 mt-lg-0 p-relative overflow-hidden"
    style="background-color: #f4f4f4 !important;">
    <div class="container-fluid p-relative z-index-1">
        <div class="row align-items-center">

            <div class="container-fluid p-relative z-index-1">
                <div class="row align-items-center">
                    <div class="col py-4 topbottom">
                        <div class="appear-animation animated fadeInRightShorter appear-animation-visible"
                            data-appear-animation="fadeInRightShorter" data-appear-animation-delay="0"
                            style="animation-delay: 0ms;">
                            <span
                                class="badge bg-gradient-tertiary-dark rounded-pill text-uppercase font-weight-semibold text-2-5 px-3 py-2 px-4 mb-4"><span
                                    class="d-inline-flex py-1 px-2">Products</span></span>
                        </div>
                        <div class="appear-animation animated fadeInUpShorter appear-animation-visible"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
                            style="animation-delay: 200ms;">
                            <h2 class="text-9 text-lg-12 font-weight-semibold line-height-1 mb-4 text-dark"> Our
                                Products</h2>
                        </div>
                        <div>
                            <div class="carousel-half-full-width-wrapper carousel-half-full-width-right">
                                <div class="owl-carousel owl-theme carousel-half-full-width-right nav-bottom nav-bottom-align-left nav-lg nav-transparent nav-borders-light nav-arrow-light rounded-nav mb-2 owl-loaded owl-drag owl-carousel-init"
                                    data-plugin-options="{'responsive': {'0': {'items': 1}, '768': {'items': 3}, '992': {'items': 4}, '1200': {'items': 5}}, 'loop': true, 'nav': true, 'dots': false, 'autoplay': true, 'margin': 20}"
                                    style="width: auto; height: auto;">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-1803px, 0px, 0px); transition: 0.25s; width: 5400px;">

                                            @foreach ($products as $product)
                                                <div class="owl-item" style="margin-right: 20px;">
                                                    <div class="box-shadow-7 border-radius-2 overflow-hidden">
                                                        <span
                                                            class="thumb-info thumb-info-no-overlay thumb-info-show-hidden-content-hover">
                                                            <span
                                                                class="thumb-info-wrapper overlay-gradient-bottom-content border-radius-0 rounded-top">
                                                                <a href="{{ $product->url }}">
                                                                    <img class="default-img img-fluid productsheight"
                                                                        src="{{ RvMedia::getImageUrl($product->image) }}"
                                                                        alt="{{ $product->name }}">
                                                                </a>
                                                            </span>
                                                            <span class="thumb-info-content">
                                                                <span class="thumb-info-content-inner bg-light p-4"
                                                                    style="height: 182px!important;">
                                                                    <h4 class="text-5 mb-2 ">{{ $product->name }}</h4>
                                                                    @if (!function_exists('html_limit'))
                                                                        @php
                                                                            function html_limit($html, $maxLength = 50)
                                                                            {
                                                                                $content = strip_tags($html);
                                                                                $limited = \Illuminate\Support\Str::limit(
                                                                                    $content,
                                                                                    $maxLength,
                                                                                );
                                                                                return $limited;
                                                                            }
                                                                        @endphp
                                                                    @endif
                                                                    <p class="lblp">
                                                                        {!! html_limit($product->content, 50) !!}
                                                                    </p>
                                                                    <span
                                                                        class="thumb-info-content-inner-hidden p-absolute d-block w-100 py-3">
                                                                        <a href="{{ $product->url }}"
                                                                            class="text-color-secondary text-color-hover-primary font-weight-semibold text-decoration-underline">Read
                                                                            More</a>
                                                                        <a href="{{ $product->url }}"
                                                                            class="btn btn-light btn-rounded box-shadow-7 btn-xl border-0 text-3 p-0 btn-with-arrow-solid p-absolute right-0 transform3dx-n100 bottom-7">
                                                                            <span
                                                                                class="p-static bg-transparent transform-none"><i
                                                                                    class="fa-solid fa-arrow-right text-dark"></i></span>
                                                                        </a>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach



                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation"
                                            class="owl-prev"></button><button type="button" role="presentation"
                                            class="owl-next"></button></div>
                                    <div class="owl-dots disabled"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div> --}}


<!-- portfolio area start -->
<!-- portfolio area start -->
<section id="homeportfolio" style="display: none;"
    class="rs-portfolio-area section-space-top rs-portfolio-one rs-swiper primary-bg">

    <div class="container">
        <div class="row g-5 section-title-space align-items-end">
            <div class="col-xxl-7 col-xl-8 col-lg-8">
                <div class="rs-section-title-wrapper">
                    <span class="rs-section-subtitle has-theme-blue justify-content-start">
                        Products
                    </span>
                    <h2 class="rs-section-title has-theme-orange">
                        Explore Large-Scale Products
                    </h2>
                </div>
            </div>

            <div class="col-xxl-5 col-xl-4 col-lg-4" style="    margin-top: 0rem;">
                <div class="rs-portfolio-navigation">
                    <button class="swiper-button-next rs-swiper-btn has-bg-light">
                        <i class="fa-regular fa-arrow-left"></i>
                    </button>
                    <button class="  swiper-button-prev rs-swiper-btn has-bg-light">
                        <i class="fa-regular fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="rs-portfolio-slider-wrapper">
                    <div class="swiper has-space portfolio-swiper"
                        data-loop="true"
                        data-speed="1500"
                        data-autoplay="true"
                        data-hover-pause="true"
                        data-delay="2500"
                        data-item="4"
                        data-item-xl="3"
                        data-item-lg="3"
                        data-item-md="2"
                        data-item-sm="1"
                        data-item-xs="1"
                        data-margin="30">

                        <div class="swiper-wrapper">
                            @foreach ($products as $product)
                                <div class="swiper-slide">
                                    <div class="rs-portfolio-item">
                                        <div class="rs-portfolio-thumb">
                                            <img src="{{ RvMedia::getImageUrl($product->image) }}" alt="image">
                                        </div>

                                        <div class="rs-portfolio-content">
                                            <h4 class="rs-portfolio-title underline has-white">
                                                <a href="{{ $product->url }}" style="text-transform: capitalize;">
                                                    {{ $product->name }}
                                                </a>
                                            </h4>

                                            <div class="rs-portfolio-btn">
                                                <a href="{{ $product->url }}"
                                                    class="rs-btn has-theme-orange has-circle has-icon">
                                                    <span class="icon-box">
                                                        <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10Z" />
                                                        </svg>
                                                        <svg class="icon-second" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10Z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio area end -->



  <!-- portfolio area start -->
        <section class="rs-portfolio-area rs-portfolio-eight rs-swiper" style="padding-bottom: 0px;">
            <div class="container-fluid">
                <div class="row g-5 justify-content-center">
                    <div class="col-xxl-6 col-xl-8 col-lg-7 col-md-8">
                        <div class="rs-section-title-wrapper text-center section-title-space">
                            <span class="rs-section-subtitle has-theme-light-green">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15"
                                    fill="none">
                                    <path d="M3.14286 10L0 15L8.78104e-07 0L3.14286 5V10Z" fill="#EA5501"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.28571 10L3.14286 15L3.14286 10L4.71428 7.5L3.14286 5L3.14286 0L6.28571 5L6.28571 10ZM6.28571 10L7.85714 7.5L6.28571 5V0L11 7.5L6.28571 15V10Z"
                                        fill="#EA5501"></path>
                                </svg>
                                Our Products
                            </span>
                            <h2 class="rs-section-title has-theme-green rs-split-text-enable split-in-fade">Our Full
                                Range of Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="rs-portfolio-slider-wrapper">
                            <div class="swiper has-space" data-clone-slides="false" data-loop="true" data-speed="15000"
                                data-autoplay="true" data-dots-dynamic="false" data-hover-pause="true"
                                data-effect="false" data-delay="25000" data-item="4" data-item-xl="3" data-item-lg="3"
                                data-item-md="2" data-item-sm="2" data-item-xs="1" data-item-mobile="1"
                                data-margin="30">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="rs-portfolio-item">
                                            <div class="rs-portfolio-thumb">
                                                <img src="assets/images/portfolio/portfolio-thumb-36.png" loading="lazy"
                                                    alt="image">
                                            </div>
                                            <div class="rs-portfolio-content">
                                                <h5 class="rs-portfolio-title underline has-white">
                                                    <a href="#">Single Display Universal Input Temperature
                                                        Controller</a>
                                                </h5>

                                            </div>
                                            <div class="rs-portfolio-btn">
                                                <a class="rs-btn has-theme-light-green has-circle has-icon " href="#">
                                                    <span class="icon-box">
                                                        <svg class="icon-first " xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                        <svg class="icon-second lbl2" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-portfolio-item">
                                            <div class="rs-portfolio-thumb">
                                                <img src="assets/images/portfolio/portfolio-thumb-37.png" loading="lazy"
                                                    alt="image">
                                            </div>
                                            <div class="rs-portfolio-content">
                                                <h5 class="rs-portfolio-title underline has-white">
                                                    <a href="#">Double Display Pid Temperature Controller</a>
                                                </h5>

                                            </div>
                                            <div class="rs-portfolio-btn">
                                                <a class="rs-btn has-theme-light-green has-circle has-icon" href="#">
                                                    <span class="icon-box">
                                                        <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                        <svg class="icon-second lbl2" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-portfolio-item">
                                            <div class="rs-portfolio-thumb">
                                                <img src="assets/images/portfolio/portfolio-thumb-38.png" loading="lazy"
                                                    alt="image">
                                            </div>
                                            <div class="rs-portfolio-content">
                                                <h5 class="rs-portfolio-title underline has-white">
                                                    <a href="#">Single Display Temperature Controller</a>
                                                </h5>

                                            </div>
                                            <div class="rs-portfolio-btn">
                                                <a class="rs-btn has-theme-light-green has-circle has-icon" href="#">
                                                    <span class="icon-box">
                                                        <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                        <svg class="icon-second lbl2" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-portfolio-item">
                                            <div class="rs-portfolio-thumb">
                                                <img src="assets/images/portfolio/portfolio-thumb-39.png" loading="lazy"
                                                    alt="image">
                                            </div>
                                            <div class="rs-portfolio-content">
                                                <h5 class="rs-portfolio-title underline has-white">
                                                    <a href="#">Tempreture + Ampere Controller</a>
                                                </h5>

                                            </div>
                                            <div class="rs-portfolio-btn">
                                                <a class="rs-btn has-theme-light-green has-circle has-icon" href="#">
                                                    <span class="icon-box">
                                                        <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                        <svg class="icon-second lbl2" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="rs-portfolio-item">
                                            <div class="rs-portfolio-thumb">
                                                <img src="assets/images/portfolio/portfolio-thumb-40.png" loading="lazy"
                                                    alt="image">
                                            </div>
                                            <div class="rs-portfolio-content">
                                                <h5 class="rs-portfolio-title underline has-white">
                                                    <a href="#">Cyclic Timer</a>
                                                </h5>

                                            </div>
                                            <div class="rs-portfolio-btn">
                                                <a class="rs-btn has-theme-light-green has-circle has-icon" href="#">
                                                    <span class="icon-box">
                                                        <svg class="icon-first" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                        <svg class="icon-second lbl2" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 32 32">
                                                            <path
                                                                d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- if we need pagination -->
                                <div class="rs-portfolio-pagination">
                                    <div class="swiper-pagination rs-pagination has-theme-green"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio area end -->
{{-- <style>
    /* Prevent section shifting */
/* Navigation buttons order fix */
.rs-portfolio-navigation {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}

/* IMPORTANT: swiper should stay LTR */
.portfolio-swiper {
    direction: ltr !important;
}

/* Reverse ONLY buttons icon if theme causes issue */
.rs-portfolio-navigation .swiper-button-prev i {
    transform: rotate(0deg);
}

.rs-portfolio-navigation .swiper-button-next i {
    transform: rotate(0deg);
}


</style> --}}
<!-- portfolio area end -->
