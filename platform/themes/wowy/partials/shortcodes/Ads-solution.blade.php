   <?php
   $posts = DB::table('careers')->where('status', 'published')->get();
   // dd($posts);
   ?>
   <!-- breadcrumb area start -->
   <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
       <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
       <div class="container">
           <div class="row">
               <div class="col-xxl-6 col-xl-8 col-lg-8">
                   <div class="rs-breadcrumb-content-wrapper">
                       <div class="rs-breadcrumb-title-wrapper">
                           <h1 class="rs-breadcrumb-title">Careers</h1>
                       </div>
                       <div class="rs-breadcrumb-menu">
                           <nav>
                               <ul>
                                   <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                   <li><span>Careers</span></li>
                               </ul>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- breadcrumb area end -->



   <style>
       /* body{
        font-family: Arial, Helvetica, sans-serif;
        background:#f5f7fb;
        margin:0;
            } */
       @media only screen and (max-width: 600px) {
           .job-card {
               background: #fff;
               margin: 0px !important;
               border-radius: 12px !important;
               padding: 30px !important;
               display: block !important;
               justify-content: space-between;
               align-items: center;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
           }
       }

       /* Header */
       .header {
           background: #fff;
           padding: 20px 60px;
           border-bottom: 1px solid #eee;
       }

       .logo {
           font-size: 28px;
           font-weight: bold;
           color: #1c88c7;
       }

       /* Search Section */

       .search-box {
           display: flex;
           gap: 20px;
           padding: 30px 60px;
       }

       .search-box input {
           flex: 1;
           padding: 12px;
           border: 1px solid #ddd;
           border-radius: 5px;
       }

       .search-box button {
           background: #0b2d5b;
           color: #fff;
           border: none;
           padding: 12px 30px;
           border-radius: 5px;
           cursor: pointer;
       }

       /* Job Card */

       .job-card {
           background: #fff;
           margin: 20px 60px;
           border-radius: 12px;
           padding: 30px;
           display: flex;
           justify-content: space-between;
           align-items: center;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
       }

       .job-left {
           display: flex;
           gap: 20px;
       }

       .job-icon {
           width: 80px;
           height: 80px;
           background: #e9f4fb;
           display: flex;
           align-items: center;
           justify-content: center;
           border-radius: 10px;
           font-size: 30px;
       }

       .job-info h2 {
           margin: 0;
       }

       .job-info p {
           margin: 6px 0;
           color: #444;
       }

       .browse-btn {
           background: #0b2d5b;
           color: white;
           border: none;
           padding: 12px 25px;
           border-radius: 6px;
           cursor: pointer;
       }
   </style>




   @foreach ($posts as $post)
       <div class="job-card">

           <div class="job-left">

               <div class="job-info">
                   <h2>{{ $post->name }}</h2>
                   <p><b>Company:</b> {{ $post->company }}</p>
                   <p><b>Education:</b> {{ $post->qualification }}</p>
                   <p><b>Experience:</b> {{ $post->experience }}</p>
                   <p><b>Location:</b> {{ $post->location }}</p>
               </div>

           </div>

           <a href="{{ route('public.career.details', $post->id) }}" class="browse-btn">
               Browse Job
           </a>
       </div>
   @endforeach
   <!-- contact form area start -->
   {{-- <section class="rs-contact-form-area rs-contact-ten section-space-bottom">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-xl-12">
                   <div class="rs-contact-form">
                       <h3 class="rs-contact-form-title">Build Your Career With Us</h3>
                       <p class="descrip">Where Creativity Meets Opportunity</p>
                       <form id="contact-form" action="assets/mailer.php" method="POST">
                           <div class="row g-4">

                               <!-- Row 1 -->
                               <div class="col-md-6">
                                   <div class="rs-contact-input">
                                       <input id="name" name="name" type="text" placeholder="Name">
                                   </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="rs-contact-input">
                                       <input id="email" name="email" type="email" placeholder="Email">
                                   </div>
                               </div>

                               <!-- Row 2 -->
                               <div class="col-md-6">
                                   <div class="rs-contact-input">
                                       <input id="phone" name="phone" type="text" placeholder="Phone">
                                   </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="rs-contact-input">
                                       <input id="location" name="location" type="text" placeholder="Location">
                                   </div>
                               </div>

                               <!-- Row 3 -->
                               <div class="col-md-12">
                                   <div class="rs-contact-input">
                                       <textarea id="message" name="message" placeholder="Write Your Message"></textarea>
                                   </div>
                               </div>

                               <!-- Row 4 -->
                               <div class="col-md-12 text-center">
                                   <div class="rs-contact-btn">
                                       <button type="submit" class="rs-btn has-theme-orange">Send Message</button>
                                   </div>
                               </div>

                           </div>
                       </form>
                       <div id="form-messages"></div>
                   </div>
               </div>
           </div>
       </div>
   </section> --}}
   <!-- contact form area end -->
