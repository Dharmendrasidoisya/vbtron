<div class="container-fluid  pb-5 " style="display: none;">
    <div class="row align-items-center py-5">
        <div class="col-lg-6 mb-5 mb-lg-0 pe-lg-5">
            <div class="appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="0">
                @if ($title)
                    <span
                        class="badge bg-gradient-light-primary-rgba-20 text-secondary rounded-pill text-uppercase font-weight-semibold text-2-5 px-3 py-2 px-4 mb-4"><span
                            class="d-inline-flex py-1 px-2">{!! BaseHelper::clean($title) !!}</span></span>
                @endif
            </div>
            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                @if ($description)
                    <h2 class="text-9 text-lg-12 font-weight-semibold line-height-1 mb-4"> {!! BaseHelper::clean($description) !!}</h2>
                @endif
            </div>
            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                @if ($description2)
                    <p>{!! BaseHelper::clean($description2) !!}</p>
                @endif
            </div>
            <div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                <div class="d-flex pt-3 align-items-center">

                    @php
                        $headerMessages = json_decode(theme_option('header_messages'), true);
                        $firstLink = null;

                        if (!empty($headerMessages) && is_array($headerMessages)) {
                            foreach ($headerMessages as $message) {
                                if (is_array($message)) {
                                    foreach ($message as $field) {
                                        if (
                                            isset($field['key']) &&
                                            $field['key'] === 'link' &&
                                            !empty($field['value'])
                                        ) {
                                            $firstLink = $field['value'];
                                            break 2; // Stop both loops once first link is found
                                        }
                                    }
                                }
                            }
                        }
                    @endphp

                    @if ($firstLink)
                        <a href="{{ $firstLink }}"
                            class="btn btn-rounded btn-dark box-shadow-7 font-weight-medium btn-swap-1"
                            data-clone-element="1">
                            <span> {{ __('Contact Us') }}<i
                                    class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                        </a>
                    @endif
                    {{-- <a href="" class="btn btn-rounded btn-dark box-shadow-7 font-weight-medium btn-swap-1"
                        data-clone-element="1">
                        <span> {{ __('Contact Us') }}<i
                                class="fa-solid fa-arrow-right ms-2 p-relative left-10"></i></span>
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-6 p-relative">
            <div class="accordion accordion-modern-status accordion-modern-status-arrow accordion-modern-status-arrow-dark"
                id="accordionWhyChooseUs">

                <div class="faqs-list">
                    @foreach ($categories as $categoryIndex => $category)
                        <div class="accordion" id="faq-accordion-{{ $categoryIndex }}">
                            @foreach ($category->faqs as $faqIndex => $faq)
                                <div class="card card-default box-shadow-8 border-radius-2 bg-light">
                                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center"
                                        id="heading-faq-{{ $categoryIndex }}-{{ $faqIndex }}">
                                        <h4 class="card-title m-0 w-100">
                                            <a class="accordion-toggle bg-transparent text-3-5 text-color-dark font-weight-semi-bold d-flex justify-content-between align-items-center @if (!($categoryIndex == 0 && $faqIndex == 0)) collapsed @endif"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}"
                                                aria-expanded="{{ $categoryIndex == 0 && $faqIndex == 0 ? 'true' : 'false' }}"
                                                aria-controls="collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}">
                                                <span>{!! BaseHelper::clean($faq->question) !!}</span>
                                                <i class="fa-solid fa-chevron-down transition"
                                                    style="transition: transform 0.3s ease;"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}"
                                        class="collapse @if ($categoryIndex == 0 && $faqIndex == 0) show @endif"
                                        aria-labelledby="heading-faq-{{ $categoryIndex }}-{{ $faqIndex }}"
                                        data-bs-parent="#faq-accordion-{{ $categoryIndex }}">
                                        <div class="card-body pt-0">
                                            {!! BaseHelper::clean($faq->answer) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <style>
                            .accordion-toggle:not(.collapsed) i {
                                transform: rotate(180deg);
                            }
                        </style>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>

<section class="rs-faq-area rs-faq-two section-space" style="display: none;">
    <div class="container">
        <div class="row align-items-xxl-center g-5">
            <div class="col-xxl-6 col-xl-5 col-lg-5">
                <div class="rs-faq-thumb rs-image scroll_reveal reveal_left reveal-active">
                    <img decoding="async" src="themes/wowy/ads/images/faq/faq-thumb-01.png" alt="image">
                </div>
            </div>
            <div class="col-xxl-6 col-xl-7 col-lg-7">
                <div class="rs-faq-content-wrapper">
                    <div class="rs-section-title-wrapper">
                        <span class="rs-section-subtitle has-theme-blue justify-content-start">
                            Question
                        </span>
                        <h2 class="rs-section-title has-theme-blue rs-split-text-enable split-in-fade">Do You Have
                            Questions For Us?</h2>
                        {{-- <p class="descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua.</p> --}}
                    </div>
                    <div class="rs-faq-content rs-accordion-one has-theme-blue">
                        <div class="accordion-wrapper">
                            <div class="accordion" id="accordionExampleOne">

                                @php $count = 1; @endphp

                                @foreach ($categories as $categoryIndex => $category)
                                    @foreach ($category->faqs as $faqIndex => $faq)
                                        @php
                                            $accordionId = 'collapse-' . $categoryIndex . '-' . $faqIndex;
                                            $headingId = 'heading-' . $categoryIndex . '-' . $faqIndex;
                                            $isFirst = $categoryIndex == 0 && $faqIndex == 0;
                                        @endphp

                                        <div class="rs-accordion-item">
                                            <h6 class="accordion-header" id="{{ $headingId }}">
                                                <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#{{ $accordionId }}"
                                                    aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                                    aria-controls="{{ $accordionId }}">

                                                    {{ sprintf('%02d', $count) }}.
                                                    {!! BaseHelper::clean($faq->question) !!}
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h6>

                                            <div id="{{ $accordionId }}"
                                                class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                                data-bs-parent="#accordionExampleOne">

                                                <div class="accordion-body">
                                                    {!! BaseHelper::clean($faq->answer) !!}
                                                </div>
                                            </div>
                                        </div>

                                        @php $count++; @endphp
                                    @endforeach
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>








     
        <!-- why choose area end -->
<!-- faq area end -->

{{-- <div class="faqs-list">
    @foreach ($categories as $categoryIndex => $category)
        @if (count($categories) > 1)
            <h4>{{ $category->name }}123</h4>
        @endif
        <div class="accordion" id="faq-accordion-{{ $categoryIndex }}">
            @foreach ($category->faqs as $faqIndex => $faq)
                <div class="card">
                    <div class="card-header" id="heading-faq-{{ $categoryIndex }}-{{ $faqIndex }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left @if (!($categoryIndex == 0 && $faqIndex == 0)) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}" aria-expanded="true" aria-controls="collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}">
                                {!! BaseHelper::clean($faq->question) !!}
                            </button>
                        </h2>
                    </div>

                    <div id="collapse-faq-{{ $categoryIndex }}-{{ $faqIndex }}" class="collapse @if ($categoryIndex == 0 && $faqIndex == 0) show @endif" aria-labelledby="heading-faq-{{ $categoryIndex }}-{{ $faqIndex }}" data-parent="#faq-accordion-{{ $categoryIndex }}">
                        <div class="card-body">
                            {!! BaseHelper::clean($faq->answer) !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div> --}}
