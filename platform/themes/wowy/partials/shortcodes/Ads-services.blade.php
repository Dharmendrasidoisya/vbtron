   <?php
$applicationposts = DB::table('applicationposts')->where('status', 'published')->get();
// dd($posts);
?>
   <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <!-- <div class="rs-breadcrumb-bg" data-background="assets/images/bg/breadcrumb-bg-01.png"></div> -->
            <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title">Application</h1>
                            </div>
                            <div class="rs-breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                        <li><span>Application</span></li>
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
       <section class="rs-services-area rs-services-three section-space has-theme-orange">
            <div class="container">
                <div class="row g-5 process-counts">
                                     @foreach ($applicationposts as $post)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="rs-services-wrapper">
                            <div class="rs-services-item">
                                <div class="rs-services-thumb">
                            <img
<<<<<<< HEAD
                                            src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{ $post->name }}">
=======
                                            src="assets/images/services/services-thumb-08.png" alt="image">
>>>>>>> vbtronnew/main
                                </div>
                                <div class="rs-services-content">
                                    <h5 class="rs-services-title"> {!! $post->name !!}
                                       </h5>
                                    {{-- <p class="descrip">{{ \Illuminate\Support\Str::limit($post->description, 50) }}</p> --}}
<<<<<<< HEAD
                      {{-- {{ Str::slug(str_replace('&', '', html_entity_decode($post->name))) }} --}}
                                            <a class="rs-text-btn"
                                                href="   {{ url('application/' . Str::slug(str_replace('&', '', html_entity_decode($post->name)))) }} ">
                                                Read More
                                            </a>
                                       
                                </div>
                                
=======
                        
                                </div>
>>>>>>> vbtronnew/main
                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
