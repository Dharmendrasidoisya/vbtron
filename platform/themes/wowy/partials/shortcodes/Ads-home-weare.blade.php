  <!-- Who We Are -->
 <!-- about area start -->
        <section class="rs-about-area section-space-top rs-about-eight has-theme-green" style="padding-top: 50px;">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-6 col-lg-5">
                        <div class="rs-about-thumb-wrapper">

                            <div class="rs-about-thumb img-two">
                                <img src="assets/img/about-2.jpg" loading="lazy" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="rs-about-wrapper">
                            <div class="rs-about-content-wrapper">
                                <div class="rs-section-title-wrapper">
                                    <span class="rs-section-subtitle has-theme-light-green justify-content-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15"
                                            viewBox="0 0 11 15" fill="none">
                                            <path d="M3.14286 10L0 15L8.78104e-07 0L3.14286 5V10Z" fill="#EA5501">
                                            </path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.28571 10L3.14286 15L3.14286 10L4.71428 7.5L3.14286 5L3.14286 0L6.28571 5L6.28571 10ZM6.28571 10L7.85714 7.5L6.28571 5V0L11 7.5L6.28571 15V10Z"
                                                fill="#EA5501"></path>
                                        </svg>
                                        About Us
                                    </span>
                                    <h2 class="rs-section-title has-theme-green rs-split-text-enable split-in-fade">
                                        Welcome to Vbtron Automation
                                    </h2>
                                    <p class="descrip">
                                        VBTRON Automation Pvt. Ltd. (VAPL) was established in 2006 with a strong focus
                                        on <b> research, development, manufacturing, and sales of smart metering and
                                            industrial automation products. </b>Over the years, we have built a
                                        reputation for technical excellence, innovation, and dependable performance
                                        across a wide range of industrial applications.
                                    </p>
                                    <!-- <p>
                                        Equipped with advanced testing laboratories, automated calibration systems, and high & low-temperature aging production lines, VAPL ensures <b> high product quality, accuracy, and on-time delivery. </b>Our commitment to innovation and customer satisfaction enables us to provide <b> customized turnkey automation solutions </b> that meet evolving market demands with maximum efficiency and reliability.
                                    </p> -->
                                </div>
                                <!-- <div class="rs-about-feature-list">
                                    <div class="rs-list-item has-theme-green">
                                        <ul>
                                            <li>
                                                <i class="fa-regular fa-check"></i>
                                                Quality Control System
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-check"></i>
                                                Building Quality Industrial
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-check"></i>
                                                Quality Control System
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="rs-about-progress" style="display: none;">
                                    <div class="single-progress">
                                        <div class="progress-top">
                                            <h6 class="progress-title">Providing Quality</h6>
                                            <span class="progress-number">95%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
                                                data-wow-delay=".3s" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rs-about-author-info">
                                    <div class="rs-about-btn">
                                        <a class="rs-btn has-theme-light-green has-icon has-bg" href="#">Read More
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
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->




  <div class="container-fluid" id="intro" style="display: none;">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mt-5 mt-lg-0 py-lg-5">
            <div class="appear-animation" data-appear-animation="fadeInRightShorter"
                data-appear-animation-delay="0">
                @if ($title)
                <span
                    class="badge bg-gradient-light-primary-rgba-20 text-secondary rounded-pill text-uppercase font-weight-semibold text-2-5 px-3 py-2 px-4 mb-4"><span
                        class="d-inline-flex py-1 px-2"> {!! BaseHelper::clean($title) !!}</span></span>
                 @endif
            </div>
            @if ($description)
            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="200">
                <h1 class="text-9 text-lg-12 font-weight-semibold line-height-1 mb-4">{!! BaseHelper::clean($description) !!}</h1>
            </div>
            @endif
            @if ($description2)
            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="400">
                <p class="pe-lg-5">{!! BaseHelper::clean($description2) !!}
                </p>
            </div>
            @endif

            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="600">
                <div class="d-flex align-items-center pt-2 pb-4">
                    @if ($description5)
                    <p class="d-inline-block mb-0 font-weight-bold line-height-1"><mark
                            class="text-dark mark mark-pos-2 mark-height-50 mark-color bg-color-before-primary-rgba-30 font-secondary text-15 mark-height-30 n-ls-5 p-0">{!! BaseHelper::clean($description5) !!}</mark>
                    </p>
                    @endif
                    @if ($description6)
                    <span class="custom-font-tertiary text-6 text-dark n-ls-1 fst-italic ps-2">{!! BaseHelper::clean($description6) !!}</span>
                    @endif
                </div>
            </div>

            <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="800">
                <div class="d-flex flex-column flex-lg-row pt-3 align-items-lg-center">
                    <div>
                        @php
                        $headerMessages = json_decode(theme_option('header_messages'), true);
                        $secondLink = null;
                        $linkCount = 0;
                    
                        if (!empty($headerMessages) && is_array($headerMessages)) {
                            foreach ($headerMessages as $message) {
                                if (is_array($message)) {
                                    foreach ($message as $field) {
                                        if (isset($field['key']) && $field['key'] === 'link' && !empty($field['value'])) {
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
                        <span>{{ __('Read more') }}<i class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                        </a>
                    @endif
                        {{-- <a href="#"
                            class="btn btn-rounded btn-dark box-shadow-7 font-weight-medium btn-swap-1"
                            data-clone-element="1">
                            <span>{{ __('Read more') }} <i class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                        </a> --}}
                    </div>
                    <div class="text-4 px-3 d-none d-lg-block">-</div>
                    <div class="pt-4 pt-lg-0">
                        <div class="feature-box feature-box-secondary align-items-center">
                            <div class="feature-box-icon feature-box-icon-lg p-static box-shadow-7">
                                <img src="themes/wowy/ads/img/icons/phone-2.svg" width="30" height="30" alt="phone-2" data-icon
                                    data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light'}" />
                            </div>
                            <div class="feature-box-info ps-2">
                                <strong class="d-block text-uppercase text-color-secondary p-relative top-2">{{__('Call Us')}}</strong>
                                @if (theme_option('phone'))
                                    <a href="tel:{{ theme_option('phone') }}"
                                        class="text-decoration-none font-secondary text-5 font-weight-semibold text-color-dark text-color-hover-primary transition-2ms negative-ls-05 ws-nowrap p-relative bottom-2">{{ theme_option('phone') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6 text-center p-relative py-5">
            <div class="opacity-2 p-absolute w-100">
                <img alt="img" data-icon
                    data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary w-100'}" />
            </div>
            <div class="cascading-images-wrapper custom-cascading-images-wrapper-1" style="padding: 25% 0% 0 30%;">
                <div class="cascading-images p-relative">
                    <div>


                        @if (!empty($icon2))
                        <img src="{{ RvMedia::getImageUrl(BaseHelper::clean($icon2)) }}" loading="lazy" class="img-fluid" alt="icon2">
                    @else
                        <p>No image available.</p>
                    @endif

                       
                    </div>
                    <div class="p-absolute w-100" style="top: -40%; left: -40%;">
                        @if (!empty($icon1))
                        <img src="{{ RvMedia::getImageUrl(BaseHelper::clean($icon1)) }}" loading="lazy" class="img-fluid" alt="icon1">
                    @else
                        <p>No image available.</p>
                        @endif
                    </div>

                    @php
                    $headerMessages = json_decode(theme_option('header_messages'), true);
                    $firstLink = null;
                
                    if (!empty($headerMessages) && is_array($headerMessages)) {
                        foreach ($headerMessages as $message) {
                            if (is_array($message)) {
                                foreach ($message as $field) {
                                    if (isset($field['key']) && $field['key'] === 'link' && !empty($field['value'])) {
                                        $firstLink = $field['value'];
                                        break 2; // Stop both loops once first link is found
                                    }
                                }
                            }
                        }
                    }
                @endphp
                    <div class="p-absolute bg-color-light border-radius-2 p-3 text-3-5 n-ls-05 text-dark box-shadow-7 d-flex align-items-center"
                        style="bottom: 0%; left: -45%;">
                        <img src="themes/wowy/ads/img/demos/accounting-1/icons/icon-4.svg" width="26"
                            alt="icon-4" data-icon
                            data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-secondary me-1'}" />
                            @if ($description3)
                            @if ($firstLink)
                        <a href="{{ $firstLink }}" class="custom-font-secondary pe-2">{!! BaseHelper::clean($description3) !!}</a>
                        @endif
                        @endif
                        @if ($description4)
                        {!! BaseHelper::clean($description4) !!}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Route::get('/dholeranewsandupdates',[FrontendController::class,'dholeranewsandupdates'])->name('news'); --}}
{{-- Route::get('/dholeranewsandupdates/{id}/{title}/',[FrontendController::class,'dholeranewsandupdatesdetails'])->name('newsdetails'); --}}