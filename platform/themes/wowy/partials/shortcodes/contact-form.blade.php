<section class="mt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-10 m-auto">
                <div class="contact-from-area  padding-20-row-col wow tmFadeInUp animated" style="visibility: visible;">
                    <h3 class="mb-10 text-center">{{ __('Drop Us a Line') }}</h3>
                    <p class="text-muted mb-30 text-center font-sm">{{ __('Contact Us For Any Questions') }}</p>
                    {{-- {!! Form::open(['route' => 'public.send.contact', 'class' => 'contact-form-style text-center contact-form', 'method' => 'POST']) !!}
                        {!! apply_filters('pre_contact_form', null) !!} --}}
                        <form id="contactForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone') }}" type="tel" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="address" value="{{ old('address') }}" placeholder="{{ __('Location') }}" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="textarea-style">
                                        <textarea name="content" placeholder="{{ __('Message') }}" required>{{ old('content') }}</textarea>
                                    </div>
                                </div>
                        
                                <!-- Google reCAPTCHA Widget -->
                                <div class="col-lg-12 col-md-12 text-center">
                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                </div>
                        
                                <div class="col-lg-12 col-md-12">
                                    <button class="submit submit-auto-width mt-30" type="submit" id="contactSubmitBtn">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- <div class="form-group text-left">
                            <div class="contact-message contact-success-message mt-30" style="display: none"></div>
                            <div class="contact-message contact-error-message mt-30" style="display: none"></div>
                        </div>
                    {!! Form::close() !!} --}}
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $(document).ready(function(){
        $("#contactForm").submit(function(e){
            e.preventDefault(); // Prevent page reload
            
            // Validate reCAPTCHA
            if (grecaptcha.getResponse() === "") {
                alert("Please verify that you're not a robot.");
                return false;
            }

            $.ajax({
                url: "{{ route('public.send.contact') }}",
                type: "POST",
                data: $(this).serialize(),
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') },
                beforeSend: function() {
                    $("#contactSubmitBtn").prop("disabled", true).text("Sending...");
                },
                success: function(response){
                    $("#contactForm")[0].reset();
                    grecaptcha.reset(); // Reset reCAPTCHA after submission
                    window.location.href = "/thankyou.html";
                },
                complete: function() {
                    $("#contactSubmitBtn").prop("disabled", false).text("Send Message");
                }
            });
        });
    });
</script>



