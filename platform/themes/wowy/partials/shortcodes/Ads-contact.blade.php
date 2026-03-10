   <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <!-- <div class="rs-breadcrumb-bg" data-background="assets/images/bg/breadcrumb-bg-01.png"></div> -->
            <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title">Contact Us</h1>
                            </div>
                            <div class="rs-breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                        <li><span>Contact Us</span></li>
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
        <section class="rs-contact-area rs-contact-eight section-space-top">
            <div class="container">
                <div class="row  g-5 justify-content-center section-title-space align-items-center">
                    <div class="col-xl-7 col-lg-7 col-md-8">
                        <div class="rs-section-title-wrapper text-center">
                            <span class="rs-section-subtitle has-theme-orange">
                               
                                Get in Touch
                            </span>
                            <h2 class="rs-section-title rs-split-text-enable split-in-fade mb-10">Get in Touch With Us</h2>
       
                        </div>
                    </div>
                </div>
             
            </div>
        </section>

         <section class="rs-contact-area section-space rs-contact-nine" style="padding-top: 0!important;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="rs-contact-wrapper">
                            <div class="rs-contact-item md-4">
                                <div class="rs-contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="22" viewBox="0 0 18 22"
                                        fill="none">
                                        <path
                                            d="M9 18.8995L13.9497 13.9497C16.6834 11.2161 16.6834 6.78392 13.9497 4.05025C11.2161 1.31658 6.78392 1.31658 4.05025 4.05025C1.31658 6.78392 1.31658 11.2161 4.05025 13.9497L9 18.8995ZM9 21.7279L2.63604 15.364C-0.87868 11.8492 -0.87868 6.15076 2.63604 2.63604C6.15076 -0.87868 11.8492 -0.87868 15.364 2.63604C18.8787 6.15076 18.8787 11.8492 15.364 15.364L9 21.7279ZM9 11C10.1046 11 11 10.1046 11 9C11 7.89543 10.1046 7 9 7C7.8954 7 7 7.89543 7 9C7 10.1046 7.8954 11 9 11ZM9 13C6.79086 13 5 11.2091 5 9C5 6.79086 6.79086 5 9 5C11.2091 5 13 6.79086 13 9C13 11.2091 11.2091 13 9 13Z"
                                            fill="#737373"></path>
                                    </svg>
                                </div>
                                <div class="rs-contact-content">
                                    <h5 class="rs-contact-title">Our Location </h5>
                  {{ theme_option('address') }}
                                </div>
                            </div>




                            <div class="rs-contact-item md-4">
                                <div class="rs-contact-icon">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8ZM4 18V10L12 15L20 10V18H4Z"
        fill="#616161"/>
</svg>
                                </div>
                                <div class="rs-contact-content">
                                    <h5 class="rs-contact-title">Our Email</h5>
                                    <a href="mailto:{{ theme_option('contact_email') }}">{{ theme_option('contact_email') }}</a>
                                </div>
                            </div>


                            <div class="rs-contact-item md-4">
                                <div class="rs-contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                        fill="none">
                                        <path
                                            d="M23.7225 18.5848C23.1074 17.9453 22.3655 17.6034 21.5792 17.6034C20.7993 17.6034 20.051 17.9389 19.4106 18.5784L17.4068 20.573C17.242 20.4843 17.0771 20.402 16.9186 20.3197C16.6903 20.2057 16.4747 20.0981 16.2908 19.9841C14.4139 18.7937 12.7081 17.2424 11.0722 15.2353C10.2795 14.2348 9.74688 13.3927 9.36008 12.5379C9.88004 12.063 10.362 11.5691 10.8312 11.0943C11.0087 10.917 11.1863 10.7333 11.3638 10.556C12.6955 9.22637 12.6955 7.50412 11.3638 6.17444L9.63274 4.44585C9.43617 4.24957 9.23326 4.04695 9.04303 3.84433C8.66256 3.45176 8.26308 3.04652 7.85091 2.66662C7.23583 2.05876 6.50028 1.73584 5.72667 1.73584C4.95307 1.73584 4.20483 2.05876 3.57072 2.66662C3.56438 2.67295 3.56438 2.67295 3.55804 2.67928L1.40209 4.85109C0.590443 5.66156 0.127549 6.64932 0.0260924 7.79538C-0.126092 9.64427 0.419236 11.3665 0.837743 12.4936C1.86499 15.2606 3.39952 17.825 5.68862 20.573C8.46599 23.8845 11.8077 26.4995 15.625 28.3421C17.0834 29.0323 19.0301 29.8491 21.2051 29.9884C21.3383 29.9947 21.4778 30.001 21.6046 30.001C23.0694 30.001 24.2995 29.4755 25.2634 28.4307C25.2697 28.4181 25.2824 28.4117 25.2887 28.3991C25.6185 28.0002 25.9989 27.6393 26.3984 27.253C26.6711 26.9934 26.9501 26.7212 27.2227 26.4362C27.8505 25.784 28.1802 25.0242 28.1802 24.2454C28.1802 23.4603 27.8442 22.7068 27.2037 22.0736L23.7225 18.5848ZM25.9926 25.2522C25.9862 25.2522 25.9862 25.2585 25.9926 25.2522C25.7453 25.5181 25.4916 25.7587 25.219 26.0247C24.8068 26.4172 24.3883 26.8288 23.9952 27.291C23.3547 27.9749 22.6001 28.2978 21.6109 28.2978C21.5158 28.2978 21.4144 28.2978 21.3192 28.2914C19.436 28.1711 17.6858 27.4366 16.3732 26.8098C12.7842 25.0749 9.63274 22.6118 7.0139 19.4902C4.85161 16.8879 3.40586 14.4818 2.44836 11.8984C1.85865 10.3218 1.64305 9.0934 1.73817 7.93468C1.80158 7.19386 2.08692 6.57967 2.61323 6.05413L4.77552 3.89499C5.08623 3.60372 5.41596 3.44543 5.73935 3.44543C6.13884 3.44543 6.46223 3.68604 6.66514 3.88865C6.67148 3.89499 6.67782 3.90132 6.68417 3.90765C7.07097 4.26856 7.43875 4.64214 7.82555 5.04104C8.02212 5.24366 8.22503 5.44628 8.42795 5.65523L10.159 7.38381C10.8312 8.05498 10.8312 8.6755 10.159 9.34667C9.97515 9.5303 9.79761 9.71392 9.61372 9.89121C9.08107 10.4357 8.57379 10.9423 8.02212 11.4362C8.00944 11.4488 7.99676 11.4552 7.99042 11.4678C7.44509 12.0124 7.54654 12.5442 7.66068 12.9051C7.66702 12.9241 7.67336 12.9431 7.67971 12.9621C8.12992 14.0512 8.76402 15.077 9.72785 16.299L9.7342 16.3053C11.4843 18.4581 13.3296 20.1361 15.365 21.4214C15.625 21.5861 15.8913 21.719 16.145 21.8457C16.3732 21.9596 16.5888 22.0673 16.7727 22.1812C16.7981 22.1939 16.8235 22.2129 16.8488 22.2256C17.0644 22.3332 17.2673 22.3839 17.4766 22.3839C18.0029 22.3839 18.3326 22.0546 18.4404 21.947L20.609 19.7815C20.8246 19.5662 21.1671 19.3066 21.5665 19.3066C21.9597 19.3066 22.2831 19.5535 22.4796 19.7688C22.486 19.7752 22.486 19.7752 22.4923 19.7815L25.9862 23.2703C26.6394 23.9162 26.6394 24.581 25.9926 25.2522Z"
                                            fill="white"></path>
                                        <path
                                            d="M16.2163 7.13613C17.8777 7.41473 19.3869 8.19988 20.5917 9.40292C21.7964 10.606 22.5764 12.1129 22.8617 13.7719C22.9315 14.1898 23.2929 14.481 23.7051 14.481C23.7558 14.481 23.8002 14.4747 23.8509 14.4684C24.3202 14.3924 24.6309 13.9492 24.5548 13.4806C24.2124 11.4734 23.2612 9.64353 21.8091 8.19355C20.357 6.74356 18.5245 5.79379 16.5144 5.45187C16.0451 5.37589 15.6076 5.68615 15.5252 6.14837C15.4427 6.61059 15.7471 7.06015 16.2163 7.13613Z"
                                            fill="white"></path>
                                        <path
                                            d="M29.9883 13.2338C29.4239 9.92864 27.864 6.92103 25.4671 4.52761C23.0702 2.13419 20.0582 0.576563 16.7482 0.0130318C16.2853 -0.0692817 15.8478 0.247309 15.7654 0.709531C15.6893 1.17808 16 1.61498 16.4692 1.69729C19.4241 2.19751 22.1191 3.59683 24.2623 5.73065C26.4056 7.8708 27.8006 10.5618 28.3016 13.5124C28.3713 13.9303 28.7328 14.2216 29.1449 14.2216C29.1956 14.2216 29.24 14.2153 29.2908 14.2089C29.7537 14.1393 30.0707 13.6961 29.9883 13.2338Z"
                                            fill="white"></path>
                                    </svg>
                                </div>
                                <div class="rs-contact-content">
                                    <h5 class="rs-contact-title">Call Us </h5>
                                      <a href="tel:{{ theme_option('hotline') }}"> {{ theme_option('hotline') }}</a>
                                    <a href="tel:{{ theme_option('phone') }}"> {{ theme_option('phone') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


                <!-- contact form area start -->
        <section class="rs-contact-form-area rs-contact-ten section-space-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="rs-contact-form">
                            <h3 class="rs-contact-form-title">Let’s Get in Touch</h3>
                            <p class="descrip">We are always ready to help you and answer your questions</p>
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
        </section>
        <!-- contact form area end -->