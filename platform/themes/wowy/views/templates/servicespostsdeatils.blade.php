<?php
// dd('test');
?>
<div class="page-header py-0 bg-secondary px-3 px-xl-0 border-radius-2 p-relative mb-0 overflow-hidden" style="display:none;" >
    <div class="overflow-hidden p-absolute top-0 left-0 bottom-0 h-100 w-100">
        <div class="custom-el-5 custom-pos-4">
            <img class="img-fluid opacity-2 opacity-hover-2"
                src="{{ asset('themes/wowy/ads/img/demos/accounting-1/svg/waves.svg') }}" alt="waves">
        </div>
    </div>
    <div class="container-fluid p-relative z-index-1 py-2">
        <div class="row mh-200px mh-lg-300px align-items-center py-4">
            <div class="col" style="text-align:center;">
                <div class="appear-animation animated fadeInRightShorter appear-animation-visible"
                    data-appear-animation="fadeInRightShorter" data-appear-animation-delay="0"
                    style="animation-delay: 0ms;">
                    <span
                        class="badge bg-color-dark-rgba-30 text-light rounded-pill text-uppercase font-weight-semibold text-2-5 px-3 py-2 px-4 mb-3"><span
                            class="d-inline-flex py-1 px-2">Our Services</span></span>
                </div>
                <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn"
                    data-appear-animation-delay="200" style="animation-delay: 200ms;">
                    <h1 class="text-9 text-lg-12 text-color-light font-weight-semibold line-height-1 mb-2">
                        {!! $post->name !!}</h1>
                </div>
                <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn"
                    data-appear-animation-delay="200" style="animation-delay: 200ms;">
                    <ul class="breadcrumb d-flex text-3-5 font-weight-semi-bold pb-2 mb-3">
                        <li><a href="{{ BaseHelper::getHomepageUrl() }}"
                                class="text-light text-decoration-none">Home</a></li>

                        <li class="active text-color-light opacity-7">{!! $post->name !!}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid pb-5 pt-lg-5 mt-5 border-bottom border-bottom-color-grey-100" style="display:none;">
    <div class="row">
        <div class="col-lg-4 order-1 order-lg-0 pe-lg-5 mt-4 mt-lg-0">

            <div class="bg-grey-100 p-4 border-radius-2 mb-4">
                <div class="m-3">
                    <h4 class="text-5 font-weight-semibold line-height-1 mb-4">Related Services</h4>
                    <ul class="nav nav-list nav-list-arrows flex-column mb-0">
                        @foreach ($posts as $servicescategorys)
                            <li class="nav-item">
                                <a href="{{ Str::slug(str_replace('&', '', html_entity_decode($servicescategorys->name))) }}"
                                    class="nav-link ">{!! $servicescategorys->name !!}</a>
                            </li>
                        @endforeach
                        {{-- @foreach (get_featured_services_categories($servicescategory) as $relatedProduct)
                            <li class="nav-item">
                                <a href="{{ Str::slug(str_replace('&', '', html_entity_decode($servicescategorys->name))) }}" class="nav-link ">{{ $relatedProduct->name }}</a>
                            </li>
                        @endforeach --}}
                    </ul>

                </div>
            </div>

            <div class="bg-tertiary text-light p-4 border-radius-2 mb-4">
                <div class="m-3">
                    <h4 class="text-5 font-weight-semibold line-height-1 mb-4">{{ $post->name }}</h4>
                    <div>
                        {{-- <iframe width="100%" height="300" src="https://www.youtube.com/embed/ZSWUEObpSoA" title="Auto Welding Cleaning Production Line" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe> --}}

                    </div>
                    <div class="d-flex flex-column pt-4">
                        <div class="pe-4">
                            <div class="feature-box feature-box-secondary align-items-center">
                                <div class="feature-box-icon feature-box-icon-lg p-static box-shadow-7">
                                    <img src="{{ asset('themes/wowy/ads/img/icons/phone-2.svg') }}" width="30"
                                        height="30" alt="phone-2" data-icon=""
                                        data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light'}">
                                </div>
                                <div class="feature-box-info ps-2">
                                    <strong class="d-block text-uppercase text-color-secondary p-relative top-2">Call
                                        Us</strong>
                                    @if (theme_option('phone'))
                                        <a href="tel:{{ theme_option('phone') }}"
                                            class="text-decoration-none font-secondary textb font-weight-semibold text-color-light transition-2ms negative-ls-05 ws-nowrap p-relative bottom-2">{{ theme_option('phone') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="pe-4 pt-4">
                            <div class="feature-box feature-box-secondary align-items-center">
                                <div class="feature-box-icon feature-box-icon-lg p-static box-shadow-7">
                                    <img src="{{ asset('themes/wowy/ads/img/icons/email.svg') }}" width="30"
                                        height="30" alt="email" data-icon=""
                                        data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-light'}">
                                </div>
                                <div class="feature-box-info ps-2">
                                    <strong class="d-block text-uppercase text-color-secondary p-relative top-2">Send
                                        E-mail</strong>
                                    @if (theme_option('contact_email'))
                                        <a href="mailto:{{ theme_option('contact_email') }}"
                                            class="text-decoration-none font-secondary textb font-weight-semibold text-color-light transition-2ms negative-ls-05 ws-nowrap p-relative bottom-2"
                                            style="word-wrap: break-word !important; overflow-wrap: break-word !important; white-space: normal !important; display: block;">
                                            {{ theme_option('contact_email') }}</a>
                                    @endif

                                    @if (theme_option('contact_email2'))
                                        <a href="mailto:{{ theme_option('contact_email2') }}"
                                            class="text-decoration-none font-secondary textb font-weight-semibold text-color-light transition-2ms negative-ls-05 ws-nowrap p-relative bottom-2"
                                            style="word-wrap: break-word !important; overflow-wrap: break-word !important; white-space: normal !important; display: block;">{{ theme_option('contact_email2') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <img class="card-img-top" src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{ $post->name }}"
                loading="lazy" alt="Common Tax Mistakes" style="width: 500px;
            height: 500px;">
            <p>{!! $post->content !!}</p>
        </div>
    </div>
</div>

  <!-- breadcrumb area start -->
  <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
      <div class="rs-breadcrumb-bg"
          data-background="{{asset('themes/wowy/ads/images/bg/breadcrumb-bg-01.png')}}">
      </div>
      <div class="container">
          <div class="row">
              <div class="col-xxl-6 col-xl-8 col-lg-8">
                  <div class="rs-breadcrumb-content-wrapper">
                      <div class="rs-breadcrumb-title-wrapper rs-services-desc">
                          <h5 class="rs-breadcrumb-title " style="text-transform: capitalize;">{{ $post->name }}</h5>
                      </div>
                      <div class="rs-breadcrumb-menu">
                          <nav>
                              <ul>
                                  <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                              <li><span><a href="{{ url('services') }}">Services</a></span></li>
                                  <li><span class="rs-services-desc" style="text-transform: capitalize;">{{ $post->name }}</span></li>
                              </ul>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb area end -->

  <!-- team details area start -->
  <!-- services details area start -->
  <section class="rs-services-area section-space ">
      <div class="container">
          <div class="row g-5">
              <div class="col-xl-8 col-lg-8">
                  <div class="rs-services-details-wrapper">
                      <div class="rs-services-details-thumb">
                          <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                              alt="image">
                      </div>
                      {!! $post->content !!}
                  </div>
              </div>
              <div class="col-xl-4 col-lg-4">
                  <div class="rs-sidebar-wrapper rs-sidebar-sticky">


                      <div class="sidebar-widget widget-categories-two has-content-none mb-30">
                          <h5 class="mb-25 sidebar-widget-title">Realted Services</h5>

                          @if ($relatedblogs->isNotEmpty())
                              <ul>
                                  @foreach ($relatedblogs as $service)
                                      <li>
                                          <a style="text-transform: capitalize;" href="{{url('services/' . Str::slug(str_replace('&', '', html_entity_decode($service->name)))) }}">
                                              {!! $service->name !!}
                                              <i class="ri-arrow-right-line"></i>
                                          </a>
                                      </li>
                                  @endforeach
                              </ul>
                          @else
                              <p class="text-muted">No Blogs available</p>
                          @endif
                      </div>






                      {{-- <div class="sidebar-widget widget-download mb-30">
                          <h5 class="mb-25 sidebar-widget-title">Download Brochure</h5>

                          <ul>
                              <li>
                                  <a href="http://127.0.0.1:8000/storage/avinashi-infratech-logo-final.pdf"
                                      target="_blank" download>
                                      <div class="left">
                                          <span>
                                              <img src="http://127.0.0.1:8000/themes/wowy/ads/images/icon/pdf.svg"
                                                  alt="PDF">
                                          </span>
                                          avinashi-infratech-logo-final.pdf
                                      </div>

                                  </a>
                              </li>
                          </ul>
                      </div> --}}




                  </div>
              </div>

          </div>
      </div>
  </section>

  <style>
      .rs-breadcrumb-one .rs-breadcrumb-title {
          font-size: 24px;
          margin-bottom: 15px;
          color: var(--rs-white);
      }

      .rs-breadcrumb-one .rs-breadcrumb-menu ul {
          display: inline-flex;
          gap: 15px 35px;
          justify-content: flex-start;
          flex-wrap: wrap;
      }
  </style>
<style>
     .rs-services-desc {
         display: -webkit-box;
         -webkit-line-clamp: 3;
         /* 👈 only 3 lines */
         -webkit-box-orient: vertical;
         overflow: hidden;
         text-overflow: ellipsis;
         line-height: 1.6em;
         /* optional – spacing better lage */
         max-height: calc(1.6em * 1);
     }
 </style>
<!-- Body main wrapper start -->

<!-- Body main wrapper end -->
