 <!-- Delivering Excellence -->
 <div class="bg-quaternary border-radius-2 p-relative overflow-hidden" style="display:none;">
     <div class="bg-secondary rounded-bottom p-relative overflow-hidden">
         <div class="container-fluid">
             <div class="row">
                 <div class="col px-0 text-center text-color-light">
                     <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-center">

                         <div class="py-3 py-lg-0 p-relative bottom-1">
                             <span
                                 class="d-inline-block text-3 py-4 px-5 text-uppercase font-weight-medium custom-bg-gradient-1 w-100 rounded-pill">
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
                                         class="btn btn-arrow-effect-1 bg-transparent text-light border-0 text-lg-3-5 py-2 py-lg-0">{{ __('Learn About Our Process') }}<i
                                             class="fas fa-arrow-right ms-2"></i></a>
                             </span>
                             </a>
                             @endif

                             {{-- <a href="#"
                                class="btn btn-arrow-effect-1 bg-transparent text-light border-0 text-lg-3-5 py-2 py-lg-0">{{__('Learn About Our Process')}}<i class="fas fa-arrow-right ms-2"></i></a></span> --}}
                         </div>
                         <div class="py-3 py-lg-0 p-relative bottom-1">
                             <span
                                 class="d-inline-block text-3 py-4 px-5 text-uppercase font-weight-medium custom-bg-gradient-1 w-100 rounded-pill">
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
                                         class="btn btn-arrow-effect-1 bg-transparent text-light border-0 text-lg-3-5 py-2 py-lg-0">{{ __('Get Free Consultation') }}<i
                                             class="fas fa-arrow-right ms-2"></i></a>
                             </span>
                             </a>
                             @endif

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>




 <!-- why choose area start -->
 <section class="rs-why-choose-area section-space rs-why-choose-one primary-bg" style="padding-top: 0px;">
     <div class="container">
         <div class="row align-items-xl-center g-5">
             <div class="col-xl-7 col-lg-7 order-2 order-lg-1">
                 <div class="rs-why-choose-content-wrapper">
                     <div class="rs-section-title-wrapper section-title-space">
                         <span class="rs-section-subtitle has-theme-blue  justify-content-start">
                             Why Choose Us
                         </span>
                         @if ($title)
                             <h2 class="rs-section-title has-theme-blue rs-split-text-enable split-in-fade">
                                 {!! BaseHelper::clean($title) !!}</h2>
                         @endif
                     </div>
                 
                         <div class="rs-why-choose-item">

                             <div class="rs-why-choose-content">
                                 @if ($description)
                                    {{ BaseHelper::clean($description) }}
                                 @endif
                             </div>
                         </div>
                         <div class="rs-why-choose-item">

                             <div class="rs-why-choose-content">
                                 @if ($description2)
                                  {{ BaseHelper::clean($description2) }}
                                 @endif
                             </div>
                         </div>

                   

                 </div>
             </div>
             <div class="col-xl-5 col-lg-5 order-1 order-lg-2">
                 <div class="rs-why-choose-thumb-wrapper">
                     <div class="rs-why-choose-thumb">
                         <img src="{{ RvMedia::getImageUrl(BaseHelper::clean($icon)) }}" alt="image">
                     </div>
                     {{-- <div class="rs-why-choose-small-thumb">
                         <img src="{{ RvMedia::getImageUrl(BaseHelper::clean($icon2)) }}" alt="image">
                         <div class="rs-why-choose-btn">
                             <a href="#"
                                 class="rs-play-btn popup-video has-theme-blue"><i class="ri-play-fill"></i></a>
                         </div>
                     </div> --}}
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- why choose area end -->
