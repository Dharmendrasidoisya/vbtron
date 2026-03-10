<!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <!-- <div class="rs-breadcrumb-bg" data-background="assets/images/bg/breadcrumb-bg-01.png"></div> -->
            <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title">About Us</h1>
                            </div>
                            <div class="rs-breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                        <li><span>About Us</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->
        <section class="rs-about-area section-space rs-about-twelve">
            <div class="container">
                <div class="row  g-5 justify-content-center section-title-space align-items-center">
                    <div class="col-xxl-8 col-xl-9 col-lg-9">
                        <div class="rs-section-title-wrapper text-center">
                            <span class="rs-section-subtitle has-theme-orange">
                            
                                About Us
                            </span>
                            @if ($title)
                            <h3 class="rs-section-title rs-split-text-enable split-in-fade">{!! BaseHelper::clean($title) !!}</h3>
                          @endif
                        </div>
                    </div>
                </div>
 <div class="container">
    <div class="row align-items-center">

      
        <!-- <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
            <img src="assets/img/1.jpg" alt="image" class="img-fluid w-100">
        </div> -->


        <div class="col-lg-12 col-md-12">
              @if ($shorttitle)
          {!! BaseHelper::clean($shorttitle) !!}
               @endif
<br/> <br/>
       @if ($history)
             {!! BaseHelper::clean($history) !!}
       @endif
        </div>
        

    </div>
</div>

            
            </div>
        </section>


        <section class="rs-about-area section-space rs-about-twelve" style="padding-top: 0!important;">
             <div class="container">
                <div class="row g-5">
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-about-wrapper">
                         
                            <div class="rs-about-thumb">
                                <img src="assets/images/about/about-thumb-18.png" alt="image">
                            </div>
                            <div class="rs-about-content">
                                <h6 class="rs-about-title">Our Mission</h6>
                                  @if ($mission)
                                               {!! BaseHelper::clean($mission) !!}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="rs-about-wrapper">
                       
                            <div class="rs-about-thumb">
                                <img src="assets/images/about/about-thumb-19.png" alt="image">
                            </div>
                            <div class="rs-about-content">
                                <h6 class="rs-about-title">Our Vision</h6>
                               @if ($vision)
                                               {!! BaseHelper::clean($vision) !!}
                                   @endif
                            </div>
                        </div>
                    </div>
                </div>
               
        </section>
