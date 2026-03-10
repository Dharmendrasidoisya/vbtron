

<!-- breadcrumb area start -->
<section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
    <div class="rs-breadcrumb-bg" data-background="themes/wowy/ads/images/bg/breadcrumb-bg-01.png"></div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-8 col-lg-8">
                <div class="rs-breadcrumb-content-wrapper">
                    <div class="rs-breadcrumb-title-wrapper">
                        <h1 class="rs-breadcrumb-title">Services</h1>
                    </div>
                    <div class="rs-breadcrumb-menu">
                        <nav>
                            <ul>
                                <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                <li><span>Services</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rs-team-area section-space rs-team-one">
    <div class="container">
       <div class="row g-5">
    @foreach ($productcategory as $servicescategorys)
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="rs-team-item">
                
                {{-- Image --}}
                <div class="rs-team-thumb has-clip">
                    <a href="{{ $servicescategorys->url }}">
                        <img src="{{ RvMedia::getImageUrl($servicescategorys->image) }}"
                             alt="{{ $servicescategorys->name }}">
                    </a>

                    
                </div>

                {{-- Content --}}
                <div class="rs-team-content-wrapper">
                    <div class="rs-team-content-box">
                        <h5 class="rs-team-title rs-services-desc" >
                            <a href="{{ $servicescategorys->url }}">
                                {{ $servicescategorys->name }}
                            </a>
                        </h5>

                        <span class="rs-team-designation">
                            {!! \Illuminate\Support\Str::limit($servicescategorys->description, 90) !!}
                        </span>
                        <div class="rs-blog-tag has-theme-blue">
                                             <a class="rs-btn has-theme-blue has-bg has-icon"
                                                 href="{{ $servicescategorys->url }}">Read
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
        </div>
    @endforeach
</div>
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
<!-- breadcrumb area end -->
