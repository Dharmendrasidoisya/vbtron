<?php
$posts = DB::table('posts')->where('status', 'published')->get();
// dd($posts);
?>
<section class="section-padding-10" style="display: none;">
    <div class="container-fuild">
        <div class="col-12">
            {{-- @if ($title)
                <h3 class="section-title style-1 mb-30 wow fadeIn animated">{!! BaseHelper::clean($title) !!}</h3>
            @endif --}}


            <h2 class="text-resp-150 ws-nowrap font-weight-semi-bold text-overflow-center text-color-grey-100 n-ls-5 ">
                Blogs</h2>


            <div class="post-list mb-4 mb-lg-0">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class=" mb-4 mb-lg-0 ldesign">
                            <article class="post">
                                <div
                                    class="card rounded-3 border-0 bg-transparent box-shadow-10 box-shadow-1 box-shadow-1-hover anim-hover-translate-top-10px transition-3ms">
                                    <div class="p-relative rounded-3 overflow-hidden">
                                        <div class="post-date p-absolute top-20 left-20">
                                            <span class="day py-1 text-4 font-weight-bold text-secondary">
                                                {{ \Carbon\Carbon::parse($post->updated_at)->format('d') }}
                                            </span>
                                            <span class="month bg-secondary">
                                                {{ \Carbon\Carbon::parse($post->updated_at)->format('M') }}

                                            </span>
                                        </div>


                                        <a href="#" class="text-decoration-none">
                                            <img class="card-img-top" src="{{ RvMedia::getImageUrl($post->image) }}"
                                                alt="{{ $post->name }}" loading="lazy" alt="Common Tax Mistakes">
                                        </a>
                                        <div class="card-body bg-light p-4">

                                            <h4 class="my-2"><a href="#"
                                                    class="text-decoration-none text-dark text-color-hover-primary">{{ \Illuminate\Support\Str::limit($post->name, 38) }}
                                                </a>
                                            </h4>
                                            <p class="card-text text-3-5 mb-1">
                                            <p>{{ \Illuminate\Support\Str::limit($post->description, 100) }} </p>
                                            <a href="#"
                                                class="read-more text-color-secondary font-weight-semibold text-2">Read
                                                More <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>


                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        {{-- <article class="wow fadeIn animated col-lg-6">
                            <div class="d-md-flex d-block">
                                <div class="post-thumb d-flex mr-15 border-radius-10">
                                    <a class="color-white" href="#">
                                        <img class="border-radius-10" src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{ $post->name }}">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta mb-5 mt-10">
                                        <a class="entry-meta meta-2" href="{{ $post->firstCategory->url }}"><span class="post-in text-danger font-x-small text-uppercase">{{ $post->firstCategory->name }}</span></a>
                                    </div>
                                    <h4 class="post-title mb-25 text-limit-2-row">
                                        <a href="#">{{ $post->name }}</a>
                                    </h4>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on"> <i class="far fa-clock"></i> {{ $post->created_at->translatedFormat('d M Y') }}</span>
                                            <span class="hit-count has-dot">{{ number_format($post->views) }} {{ __('Views')}}</span>
                                        </div>
                                        <a href="#">{{ __('Read more') }} <i class="fa fa-arrow-right font-xxs ml-5"></i></a>
                                    </div>
                                </div>
                            </div>
                        </article> --}}
                    @endforeach




                </div>
            </div>
        </div>
    </div>
</section>



<!-- blog area start -->
<section class="rs-blog-area section-space rs-blog-one has-theme-blue" style="display: none">
    <div class="container">
        <div class="row  g-5 section-title-space align-items-center">
            <div class="col-xl-7 col-lg-7">
                <div class="rs-section-title-wrapper">
                    <span class="rs-section-subtitle justify-content-start has-theme-blue">
                        Blogs
                    </span>
                    <h2 class="rs-section-title has-theme-blue rs-split-text-enable split-in-fade">Articles &
                        blog posts with useful information</h2>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="rs-blog-btn">
                    <a class="rs-btn has-theme-blue has-icon has-bg" href="{{ url('blogs') }}">View All Post
                        <span class="icon-box">
                            <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path
                                    d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                </path>
                            </svg>
                            <svg class="icon-second" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path
                                    d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z">
                                </path>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        @foreach ($posts->chunk(3) as $chunk)
            @php
                $featuredPost = $chunk->get(0); // left big
                $sidePosts = $chunk->slice(1); // right small (max 2)
            @endphp

            <div class="row g-5 mb-5">

                {{-- LEFT BIG BLOG --}}
                @if ($featuredPost)
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-blog-item has-thumb-height wow fadeInLeft" data-wow-delay=".3s"
                            data-wow-duration="1s">

                            <div class="has-bg rs-blog-bg-thumb"
                                data-background="{{ RvMedia::getImageUrl($featuredPost->image) }}">
                            </div>

                            <div class="rs-blog-content has-position">
                                <h3 class="rs-blog-title has-white has-big underline">
                                    <a
                                        href="{{ url('blogs/' . Str::slug(str_replace('&', '', html_entity_decode($featuredPost->name)))) }}">
                                        {{ \Illuminate\Support\Str::limit($featuredPost->name, 60) }}
                                    </a>
                                </h3>


                                {{-- {!! \Illuminate\Support\Str::limit($featuredPost->content, 80) !!} --}}


                                {{-- <div class="rs-blog-tag has-white has-theme-blue">
                                    <a href="{{url('blogs/' . Str::slug(str_replace('&', '', html_entity_decode($featuredPost->name)))) }}">Read More</a>
                                </div> --}}
                                <div class="rs-services-text-btn underline has-theme-blue">

                                    <a class="rs-btn has-theme-blue has-bg has-icon"
                                        href="{{ url('blogs/' . Str::slug(str_replace('&', '', html_entity_decode($featuredPost->name)))) }}">Read
                                        More
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- RIGHT SMALL BLOGS --}}
                <div class="col-xl-6 col-lg-6">
                    <div class="row g-5 wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">

                        @foreach ($sidePosts as $post)
                            <div class="col-12">
                                <div class="rs-blog-item has-grid">

                                    <div class="rs-blog-content has-padding order-1 order-sm-0">
                                        <h5 class="rs-blog-title underline has-theme-blue">
                                            <a href="{{ url('blogs/' . Str::slug(str_replace('&', '', html_entity_decode($post->name)))) }}"
                                                style="color:#2B227B;">
                                                {{ \Illuminate\Support\Str::limit($post->name, 45) }}
                                            </a>
                                        </h5>

                                        <p class="rs-blog-description" style="color:#616161 !important;">
                                            {!! \Illuminate\Support\Str::limit($post->content, 80) !!}
                                        </p>

                                        <div class="rs-services-text-btn underline has-theme-blue">

                                            <a class="rs-btn has-theme-blue has-bg has-icon"
                                                href="{{ url('blogs/' . Str::slug(str_replace('&', '', html_entity_decode($post->name)))) }}">Read
                                                More
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
                                        </div>
                                    </div>

                                    <div class="rs-blog-thumb order-0 order-sm-1">
                                        <a
                                            href="{{ url('blogs/' . Str::slug(str_replace('&', '', html_entity_decode($post->name)))) }}">
                                            <img src="{{ RvMedia::getImageUrl($post->image) }}"
                                                alt="{{ $post->name }}">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        @endforeach
    </div>
</section>



 <!-- blog area start -->
        <section class="rs-blog-area section-space-top section-space-bottom rs-blog-two has-theme-green">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-8 col-lg-9">
                        <div class="rs-section-title-wrapper text-center section-title-space">
                            <span class="rs-section-subtitle has-theme-light-green">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15"
                                    fill="none">
                                    <path d="M3.14286 10L0 15L8.78104e-07 0L3.14286 5V10Z" fill="#EA5501"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.28571 10L3.14286 15L3.14286 10L4.71428 7.5L3.14286 5L3.14286 0L6.28571 5L6.28571 10ZM6.28571 10L7.85714 7.5L6.28571 5V0L11 7.5L6.28571 15V10Z"
                                        fill="#EA5501"></path>
                                </svg>
                                Blog
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade has-theme-green">
                                Automation News & Insights
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="rs-blog-item wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                            <div class="rs-blog-thumb">
                                <a href="#"> <img src="assets/img/news/news1.jpg" loading="lazy" alt="image"></a>
                            </div>
                            <div class="rs-blog-content">

                                <h5 class="rs-blog-title"> <a href="#"> Global Trade Fairs | Shaping Smart Metering
                                        Trends</a></h5>
                                <div class="rs-blog-meta" style="display: none;">
                                    <div class="rs-blog-meta-item">
                                        <span>
                                            By
                                            <a class="rs-blog-meta-author" href="#"> Nayeem</a>
                                        </span>
                                    </div>
                                    <div class="rs-blog-meta-item">
                                        <span>
                                            Feb 8, 2024
                                        </span>
                                    </div>
                                </div>
                                <div class="rs-blog-btn-wrapper">
                                    <span class="rs-blog-meta-text">Read More</span>
                                    <a class="rs-square-btn has-icon has-light-grey" href="#">
                                        <span class="icon-box">
                                            <i class="ri-arrow-right-line icon-first"></i>
                                            <i class="ri-arrow-right-line icon-second"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="rs-blog-item wow fadeInUp" data-wow-delay=".5s" data-wow-duration="1s">
                            <div class="rs-blog-thumb">
                                <a href="#"> <img src="assets/img/news/news2.jpg" loading="lazy" alt="image"></a>
                            </div>
                            <div class="rs-blog-content">

                                <h5 class="rs-blog-title"> <a href="#">VAPL’s Global Journey in Automation
                                        Innovation</a></h5>
                                <div class="rs-blog-meta" style="display: none;">
                                    <div class="rs-blog-meta-item">
                                        <span>
                                            By
                                            <a class="rs-blog-meta-author" href="#"> Nayeem</a>
                                        </span>
                                    </div>
                                    <div class="rs-blog-meta-item">
                                        <span>
                                            Feb 8, 2024
                                        </span>
                                    </div>
                                </div>
                                <div class="rs-blog-btn-wrapper">
                                    <span class="rs-blog-meta-text">Read More</span>
                                    <a class="rs-square-btn has-icon has-light-grey" href="#">
                                        <span class="icon-box">
                                            <i class="ri-arrow-right-line icon-first"></i>
                                            <i class="ri-arrow-right-line icon-second"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="rs-blog-item wow fadeInUp" data-wow-delay=".7s" data-wow-duration="1s">
                            <div class="rs-blog-thumb">
                                <a href="#"> <img src="assets/img/news/news3.jpg" loading="lazy" alt="image"></a>
                            </div>
                            <div class="rs-blog-content">

                                <h5 class="rs-blog-title"> <a href="#"> Future-Ready Automation | Adapting to Tech
                                        Changes</a></h5>
                                <div class="rs-blog-meta" style="display: none;">
                                    <div class="rs-blog-meta-item">
                                        <span>
                                            By
                                            <a class="rs-blog-meta-author" href="#"> Nayeem</a>
                                        </span>
                                    </div>
                                    <div class="rs-blog-meta-item">
                                        <span>
                                            Feb 8, 2024
                                        </span>
                                    </div>
                                </div>
                                <div class="rs-blog-btn-wrapper">
                                    <span class="rs-blog-meta-text">Read More</span>
                                    <a class="rs-square-btn has-icon has-light-grey" href="#">
                                        <span class="icon-box">
                                            <i class="ri-arrow-right-line icon-first"></i>
                                            <i class="ri-arrow-right-line icon-second"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end -->

        <div class="rs-brand-thumb-wrapper">

            <!-- brand area start -->
            <div class="rs-brand-area rs-brand-one section-space rs-swiper has-space" style="display: none;">

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="rs-brand-wrapper">
                                <div class="swiper" data-clone-slides="false" data-loop="true" data-speed="1500"
                                    data-autoplay="false" data-dots-dynamic="false" data-center-mode="false"
                                    data-hover-pause="true" data-effect="false" data-delay="1500" data-item="6"
                                    data-item-xl="4" data-item-lg="4" data-item-md="3" data-item-sm="2" data-item-xs="2"
                                    data-item-mobile="1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/avon-logo.jpg" loading="lazy" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/axiva-logo.jpg" loading="lazy"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/bestoplast-logo.jpg" loading="lazy"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/fiem.jpg" loading="lazy" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/hitachi-logo.jpg" loading="lazy"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/ju-shin-logo.jpg" loading="lazy"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/logo-samsung.jpg" loading="lazy"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="rs-brand-item">
                                                <span class="rs-brand-shape"></span>
                                                <div class="rs-brand-thumb">
                                                    <img src="assets/img/icon/Lumax-logo.jpg" loading="lazy"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand area end -->

            <!-- cta area start -->
            <section class="rs-cta-area rs-cta-two has-theme-green-two">
                <div class="container">
                    <div class="rs-cta-wrapper">
                        <div class="rs-cta-bg-thumb" data-background="assets/img/cta-bg-05.png"></div>
                        <div class="row align-items-center">
                            <div class="col-xl-5 col-lg-5">
                                <div class="rs-cta-thumb">
                                    <img src="assets/images/cta/cta-thumb-01.png" loading="lazy" alt="image">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7">
                                <div class="rs-cta-content-wrapper">
                                    <h3 class="rs-cta-title"> Sign up to get the latest updates! </h3>
                                    <div class="rs-cta-form">
                                        <form action="#">
                                            <div class="rs-cta-input">
                                                <input name="email" type="text" placeholder="Enter Your Email"
                                                    style="display: none;">
                                                <button type="submit"
                                                    class="rs-btn has-theme-light-green has-icon has-bg">
                                                    Contact Us
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
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta area end -->
        </div>

