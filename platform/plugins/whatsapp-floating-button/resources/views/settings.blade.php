@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <form action="{{ route('whatsapp-floating-button.settings') }}" method="post">
        <div id="qlwapp" class="qlwapp qlwapp-free qlwapp-bubble qlwapp-bottom-left qlwapp-all qlwapp-rounded">
            <div class="qlwapp-container">
                <div class="qlwapp-box">
                    <div class="qlwapp-header">
                        <i class="qlwapp-close" data-action="close">&times;</i>
                        <div class="qlwapp-description">
                            <div class="qlwapp-description-container">
                                <h3>Hello!</h3>
                                <p>Click one of our representatives below to chat on WhatsApp or send us an email to <a
                                        href="mailto:apnanavaty2012prasanna@gmail.com">apnanavaty2012prasanna@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="qlwapp-body">
                        <a class="qlwapp-account" data-action="open" data-phone="919825037971"
                            data-message="Hello! I want Enquiry about your Product, Please tell me." role="button"
                            tabindex="0" target="_blank">
                            <div class="qlwapp-avatar">
                                <div class="qlwapp-avatar-container">
                                    <img alt="brothersindia" data-src="{{ asset('storage/favicon-1.png') }}"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                        class="lazyload"
                                        style="--smush-placeholder-width: 300px; --smush-placeholder-aspect-ratio: 300/140;">
                                </div>
                            </div>
                            <div class="qlwapp-info">
                                <span class="qlwapp-label">Support</span>
                                <span class="qlwapp-name">Nanavaty & Associates</span>
                            </div>
                        </a>
                    </div>
                    <div class="qlwapp-footer">
                        <p>Powered by Nanavaty & Associates</p>
                    </div>
                </div>
        
                <a class="qlwapp-toggle" data-action="box" data-phone="919825037971"
                    data-message="Hello! I just visited your website and am interested in Know more about your products. I have one query"
                    role="button" tabindex="0" target="_blank">
                    <!-- <i class="qlwapp-icon qlwapp-whatsapp-icon"></i>
            <i class="qlwapp-close" data-action="close">&times;</i> -->
                    <img loading="lazy" src="{{ asset('themes/wowy/ads/img/wt.png') }}" alt="whatsapp" style="width: 65px;">
                    <i class="qlwapp-close" style=" background: #000;" data-action="close">&times;</i>
                </a>
            </div>
        </div>
    </form>
@stop

@push('footer')
    {!! $jsValidation !!}
@endpush
