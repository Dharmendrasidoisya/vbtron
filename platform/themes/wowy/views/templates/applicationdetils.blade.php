  <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <!-- <div class="rs-breadcrumb-bg" data-background="assets/images/bg/breadcrumb-bg-01.png"></div> -->
            <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title"> {{ $post->name }}</h1>
                            </div>
                            <div class="rs-breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                        <li><span> {{ $post->name }}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- services area start -->
     <section class="rs-postbox-area section-space">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-8 col-lg-8">
                        <div class="rs-postbox-details-wrapper">
                            <div class="rs-postbox-details-thumb">
                                <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="image">
                            </div>
                            <div class="rs-postbox-content">
                          
                                <h3 class="rs-postbox-details-title">
                                    {{ $post->name }}
                                </h3>
                            </div>
                            <div class="rs-postbox-details-content">
                             {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="rs-sidebar-wrapper rs-sidebar-sticky">
                       
                            <div class="sidebar-widget mb-30">
                                <h5 class="sidebar-widget-title">Recent Posts</h5>
                                <div class="sidebar-widget-content">
                                    <div class="sidebar-blog-item-wrapper">
                                         @if ($relatedblogs->isNotEmpty())
                                                   @foreach ($relatedblogs as $service)
                                        <div class="sidebar-blog-item">
                                            <div class="sidebar-blog-thumb">
                                                <a href="{{ url('application/' . Str::slug(str_replace('&', '', html_entity_decode($service->name)))) }}">
                                                    <img src="{{ RvMedia::getImageUrl($service->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="image">
                                                </a>
                                            </div>
                                            <div class="sidebar-blog-content">
                                                <h6 class="sidebar-blog-title">
                                                    <a href="{{ url('application/' . Str::slug(str_replace('&', '', html_entity_decode($service->name)))) }}">{!! $service->name !!}</a>
                                                </h6>
                                                
                                            </div>
                                        </div>
                                        @endforeach
                                      @endif
                                    </div>
                                </div>
                            </div>
                     
                        </div>
                    </div>
                </div>
            </div>
        </section>
  
