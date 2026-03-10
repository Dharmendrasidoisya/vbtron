@php
    $layout = MetaBox::getMetaData($post, 'layout', true);
    $layout = $layout && in_array($layout, array_keys(get_blog_single_layouts())) ? $layout : 'blog-right-sidebar';
    Theme::layout($layout);

    $relatedPosts = get_related_posts($post->id, 5);

    $related = DB::table('productsposts')
        ->where('id', '!=', $post->id)
        ->where('status', 'published')
        ->get();

    $productcategory = DB::table('productscategories')
        ->where('status', 'published')
        ->get();

    // FIX IMAGE ARRAY / JSON
    $galleryImages = [];

    if (!empty($post->images)) {
        if (is_array($post->images)) {
            $galleryImages = $post->images;
        } else {
            $galleryImages = json_decode($post->images, true);
        }
    }
@endphp


<?php
$servicelink = DB::table('settings')->where('key', 'permalink-botble-services-models-post')->value('value');
$solutionlink = DB::table('settings')->where('key', 'permalink-botble-blog-models-post')->value('value');
?>

@if (request()->is($servicelink . '/*'))

<?php
$posts = DB::table('servicesposts')->where('id', $post->id)->get();

$relatedblogs = DB::table('servicesposts')
->where('id', '!=', $post->id)
->where('status', 'published')
->get();
?>

@include(Theme::getThemeNamespace() . '::views.templates.servicespostsdeatils')


@elseif(request()->is($solutionlink . '/*'))

<?php
$posts = DB::table('posts')->where('id', $post->id)->get();

$relatedblogs = DB::table('posts')
->where('id', '!=', $post->id)
->where('status', 'published')
->get();
?>

@include(Theme::getThemeNamespace() . '::views.templates.blogdetils')


@else

<style>
img{
max-width:none;
}

.bk{
list-style:disc;
margin-left:30px;
}


.product-action-buttons{
margin-top:15px;
overflow:hidden;
box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.product-action-buttons .action-btn{
display:block;
text-align:center;
background:#4a4a4a;
color:#fff;
padding:16px 10px;
font-size:18px;
font-weight:500;
text-decoration:none;
}

.product-action-buttons .enquiry-btn{
border-right:1px solid #6a6a6a;
}

.product-action-buttons .action-btn:hover{
background:#000;
color:#fff;
}

/* MOBILE */

@media(max-width:767px){

.product-action-buttons .action-btn{
font-size:16px;
padding:14px;
}

.product-details-thumb img{
width:100%;
height:auto;
}

}


.form-icon-box{
display:flex;
align-items:center;
border:1px solid #00A0E3;
border-radius:4px;
overflow:hidden;
background:#f2f2f2;
}

.form-icon-box .icon{
background:#00A0E3;
color:#fff;
padding:12px 14px;
display:flex;
align-items:center;
justify-content:center;
}

.form-icon-box input{
border:none;
padding:12px;
width:100%;
background:transparent;
outline:none;
}

.form-icon-box textarea{
border:none;
padding:12px;
width:100%;
height:120px;
background:transparent;
outline:none;
}

.textarea-box{
align-items:flex-start;
}

.textarea-box .icon{
padding-top:16px;
}

@media(max-width:768px){

.modal-dialog{
margin:10px;
}

.form-icon-box input,
.form-icon-box textarea{
font-size:14px;
}

}


.wishlist-popup{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
display:none;
align-items:center;
justify-content:center;
z-index:9999;
}

.popup-box{
background:#fff;
padding:30px;
text-align:center;
border-radius:6px;
}

.popup-box button{
background:#333;
color:#fff;
border:none;
padding:10px 25px;
margin-top:10px;
}

@media(max-width:768px){

.popup-box{
width:90%;
}

}



</style>




       <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <!-- <div class="rs-breadcrumb-bg" data-background="assets/images/bg/breadcrumb-bg-01.png"></div> -->
            <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title">{{ $post->name }}</h1>
                            </div>
                            <div class="rs-breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                        <li><span><a href="{{ url('products') }}">Products</a></span></li>
                                        
                                        <li><span>{{ $post->name }}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

<section class="rs-shop-area section-space">

<div class="container">

<div class="row align-items-lg-center g-5">


<div class="col-md-5">

<div class="product-details-thumb-wrap">


<div class="product-details-thumb-top mb-10">

<div class="swiper product-details-active p-relative">

<div class="swiper-wrapper">

{{-- MAIN IMAGE --}}

<div class="swiper-slide">
<div class="product-details-thumb">
<img src="{{ RvMedia::getImageUrl($post->image,'large',false,RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
</div>
</div>


{{-- GALLERY IMAGES --}}

@if(!empty($galleryImages))

@foreach($galleryImages as $img)

<div class="swiper-slide">
<div class="product-details-thumb">
<img src="{{ RvMedia::getImageUrl($img,'large',false,RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
</div>
</div>

@endforeach

@endif


</div>
</div>
</div>



<div class="product-details-thumb-bottom">

<div class="product-details-slider-dot">

<div class="swiper product-details-nav">

<div class="swiper-wrapper">


<div class="swiper-slide">
<button class="custom-button">
<img src="{{ RvMedia::getImageUrl($post->image,'thumb',false,RvMedia::getDefaultImage()) }}">
</button>
</div>


@if(!empty($galleryImages))

@foreach($galleryImages as $img)

<div class="swiper-slide">
<button class="custom-button">
<img src="{{ RvMedia::getImageUrl($img,'thumb',false,RvMedia::getDefaultImage()) }}">
</button>
</div>

@endforeach

@endif



</div>
</div>
</div>
<div class="product-action-buttons">

<div class="row g-0">

<div class="col-6">

<a href="#" class="action-btn enquiry-btn"
data-bs-toggle="modal"
data-bs-target="#enquiryModal">
Enquiry
</a>

</div>

<div class="col-6">

<a href="javascript:void(0)"
class="action-btn wishlist-btn"
data-id="{{ $post->id }}"
data-name="{{ $post->name }}"
data-image="{{ RvMedia::getImageUrl($post->image,'thumb') }}"
data-url="{{ url('products/'.Str::slug($post->name)) }}">
Add to Wishlist
</a>

</div>

<div id="wishlistPopup" class="wishlist-popup">

<div class="popup-box">

<h4>Thank you!</h4>

<p>Successfully Added to Wishlist</p>

<button id="popupOk">OK</button>

</div>

</div>


<!-- ENQUIRY MODAL -->
<div class="modal fade" id="enquiryModal" tabindex="-1">

<div class="modal-dialog modal-lg modal-dialog-centered">

<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Product Enquiry</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<form action="assets/mailer.php" method="POST">

<div class="row g-3">

<!-- Name -->
<div class="col-md-6">
<div class="form-icon-box">
<span class="icon"><i class="fas fa-user"></i></span>
<input type="text" name="name" placeholder="Your Name">
</div>
</div>

<!-- Email -->
<div class="col-md-6">
<div class="form-icon-box">
<span class="icon"><i class="fas fa-envelope"></i></span>
<input type="email" name="email" placeholder="Email Address">
</div>
</div>

<!-- Phone -->
<div class="col-md-6">
<div class="form-icon-box">
<span class="icon"><i class="fas fa-phone"></i></span>
<input type="text" name="phone" placeholder="Phone">
</div>
</div>

<!-- Location -->
<div class="col-md-6">
<div class="form-icon-box">
<span class="icon"><i class="fas fa-map-marker-alt"></i></span>
<input type="text" name="location" placeholder="Location">
</div>
</div>

<!-- Message -->
<div class="col-12">
<div class="form-icon-box textarea-box">
<span class="icon"><i class="fas fa-comment"></i></span>
<textarea name="message" placeholder="Write Your Message"></textarea>
</div>
</div>

<!-- Submit -->
<div class="col-12 text-center">
<button type="submit" class="action-btn enquiry-btn">
Submit
</button>
</div>

</div>

</form>

</div>
</div>
</div>
</div>

</div>

</div>
</div>



</div>
</div>



<div class="col-md-7">

<div class="product-details-wrapper shop-details">


<h3 class="product-details-title mb-10">
{{ $post->name }}
</h3>


<p class="mb-15">
{!! Str::limit(strip_tags($post->description),150) !!}
</p>


<div class="product-details-count-wrap d-flex flex-wrap gap-20 align-items-center mb-25">


@if(!empty($post->pdf))

<div class="product-details-action d-flex flex-wrap align-items-center">

<a href="{{ RvMedia::getImageUrl($post->pdf) }}" target="_blank" download>

<button class="rs-btn" type="button">
Brochure
</button>

</a>

</div>

@endif



@if(!empty($post->manual))

<div class="product-details-action d-flex flex-wrap align-items-center">

<a href="{{ RvMedia::getImageUrl($post->manual) }}" target="_blank" download>

<button class="rs-btn" type="button">
Manual
</button>

</a>

</div>

@endif

</div>



<div class="product-details-categories product-details-more mb-5">

<p>Categories:</p>

@foreach($productcategory as $cat)

<span>
<a href="{{ url('products/'.Str::slug($cat->name)) }}">
{{ $cat->name }}
</a>
</span>

@endforeach

</div>


</div>
</div>

</div>




<div class="product-information mt-50">

<div class="row g-5 justify-content-center">

<div class="col-xxl-12 col-xl-12 col-lg-12">

<div class="product-information-tab">


<ul class="nav nav-pills mb-35 flex-wrap gap-10 has-border">

<li class="nav-item">

<button class="nav-link active"
data-bs-toggle="pill"
data-bs-target="#pills-information">

Technical specifications

</button>

</li>


<li class="nav-item">

<button class="nav-link"
data-bs-toggle="pill"
data-bs-target="#pills-review">

Application

</button>

</li>

</ul>



<div class="tab-content">


<div class="tab-pane fade show active" id="pills-information">

<div class="information-wrapper bk">

{!! $post->content !!}

</div>

</div>



<div class="tab-pane fade" id="pills-review">

<div class="lblmo">

{!! $post->specification !!}

</div>

</div>


</div>
</div>
</div>
</div>
</div>



<section class="rs-blog-area section-space rs-blog-two rs-swiper" style="padding-bottom:0px;">


<div class="container">


<div class="row justify-content-center align-items-center">

<div class="col-xl-12">

<div class="rs-section-title-wrapper text-left mb-20">

<h4 class="rs-section-title">
Related Products
</h4>

</div>
</div>
</div>



<div class="row">

<div class="col-12">

<div class="rs-blog-slider">


<div class="swiper"

data-clone-slides="false"
data-loop="true"
data-speed="1500"
data-autoplay="true"
data-delay="2500"
data-item="4"
data-item-md="2"
data-item-sm="1">


<div class="swiper-wrapper">


@foreach ($related as $item)

<div class="swiper-slide">

<div class="rs-blog-item">


<div class="rs-blog-thumb">

<a href="{{ url('products/'.Str::slug($item->name)) }}">

<img src="{{ RvMedia::getImageUrl($item->image,'medium',false,RvMedia::getDefaultImage()) }}">

</a>

</div>



<div class="rs-blog-content">

<h5 class="rs-blog-title underline has-black">

<a href="{{ url('products/'.Str::slug($item->name)) }}">
{{ $item->name }}
</a>

</h5>


<div class="rs-blog-btn-wrapper">


<a href="{{ url('products/'.Str::slug($item->name)) }}" class="rs-blog-meta-text">

Read More

</a>


<a class="rs-square-btn has-icon has-light-grey"

href="{{ url('products/'.Str::slug($item->name)) }}">

<span class="icon-box">

<i class="ri-arrow-right-line icon-first"></i>
<i class="ri-arrow-right-line icon-second"></i>

</span>

</a>

</div>
</div>
</div>
</div>

@endforeach


</div>
</div>
</div>
</div>
</div>

</section>


</div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(){

let wishlistBtns = document.querySelectorAll(".wishlist-btn");

wishlistBtns.forEach(function(btn){

btn.addEventListener("click", function(e){

e.preventDefault();

let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

let product = {
id: this.dataset.id,
name: this.dataset.name,
image: this.dataset.image,
url: this.dataset.url
};

let exists = wishlist.find(item => item.id == product.id);

if(!exists){
wishlist.push(product);
localStorage.setItem("wishlist", JSON.stringify(wishlist));
}

/* SHOW POPUP */

document.getElementById("wishlistPopup").style.display="flex";

});

});


/* OK BUTTON REDIRECT */

document.getElementById("popupOk").addEventListener("click", function(){

window.location.href="/wishlist";

});

});
</script>
@endif