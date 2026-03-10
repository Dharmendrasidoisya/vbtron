@php
    $urlCurrent = URL::current();
    $children->loadMissing(['slugable', 'activeChildren:id,name,parent_id', 'activeChildren.slugable']);

@endphp

@if ($category->activeChildren->count())

   <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
            <!-- <div class="rs-breadcrumb-bg" data-background="assets/images/bg/breadcrumb-bg-01.png"></div> -->
            <div class="rs-breadcrumb-bg" style="background: #424242;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-8 col-lg-8">
                        <div class="rs-breadcrumb-content-wrapper">
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title"> {!! $category->name ?? 'Subcategories' !!}</h1>
                            </div>
                            <div class="rs-breadcrumb-menu">
                                <nav>
                                    <ul>
                                        <li><span><a href="{{ BaseHelper::getHomepageUrl() }}">Home</a></span></li>
                                        <li><span><a href="{{ url('products') }}">Products</a></span></li>
                                        <li><span>{!! $category->name ?? 'Subcategories' !!}</span></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->
   
    
    {{-- @if ($servicescategories->isNotEmpty()) --}}
    <!-- News -->
 <section class="rs-services-area rs-services-three section-space has-theme-orange">
    <div class="container">
        <div class="row g-5 process-counts">

            @if ($children->isNotEmpty())
                @foreach ($children as $post)

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="rs-services-wrapper">
                        <div class="rs-services-item lblflex">

                            <div class="rs-services-thumb">
                                <a href="{{ $post->url }}">
                                    <img src="{{ RvMedia::getImageUrl($post->image) }}" alt="{{ $post->name }}" class="lblwidth">
                                </a>
                            </div>

                            <div class="rs-services-content">

                                <h5 class="rs-services-title">
                                    <a href="{{ $post->url }}">
                                        {{ $post->name }}
                                    </a>
                                </h5>

                                <p class="descrip">
                                    {!! \Illuminate\Support\Str::limit(strip_tags(str_replace('&nbsp;', ' ', $post->description)), 80) !!}
                                </p>

                                <div class="rs-services-btn-wrapper">

                                    <div class="rs-services-text-btn underline">
                                        <a class="rs-text-btn" href="{{ $post->url }}">
                                            View Details
                                        </a>
                                    </div>

                                    <a class="rs-square-btn has-icon has-light-bg" href="{{ $post->url }}">
                                        <span class="icon-box">
                                            <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0 5C0 4.60551 0.319797 4.28571 0.714286 4.28571L8.98985 4.28571L5.92349 1.21936C5.64455 0.940417 5.64455 0.488155 5.92349 0.209209C6.20244 -0.0697365 6.6547 -0.0697365 6.93365 0.209209L11.2194 4.49492C11.4983 4.77387 11.4983 5.22613 11.2194 5.50508L6.93365 9.79079C6.6547 10.0697 6.20244 10.0697 5.92349 9.79079C5.64455 9.51184 5.64455 9.05958 5.92349 8.78064L8.98985 5.71429L0.714286 5.71429C0.319797 5.71429 0 5.39449 0 5Z"
                                                    fill="#616161">
                                                </path>
                                            </svg>

                                            <svg class="icon-second" xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M0 5C0 4.60551 0.319797 4.28571 0.714286 4.28571L8.98985 4.28571L5.92349 1.21936C5.64455 0.940417 5.64455 0.488155 5.92349 0.209209C6.20244 -0.0697365 6.6547 -0.0697365 6.93365 0.209209L11.2194 4.49492C11.4983 4.77387 11.4983 5.22613 11.2194 5.50508L6.93365 9.79079C6.6547 10.0697 6.20244 10.0697 5.92349 9.79079C5.64455 9.51184 5.64455 9.05958 5.92349 8.78064L8.98985 5.71429L0.714286 5.71429C0.319797 5.71429 0 5.39449 0 5Z"
                                                    fill="#616161">
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
            @else
                <div class="col-12 text-center">
                    <p class="text-muted font-weight-bold">No data available</p>
                </div>
            @endif

        </div>
    </div>
</section>
@else
    {{-- @include(Theme::getThemeNamespace() . '::views.templates.servicesposts', [
    'children' => $category->activeChildren->where('parent_id', $category->id)
]) --}}
    <?php
    
    $postIds = DB::table('post_categories')->where('category_id', $category->id)->pluck('post_id'); // Get only post IDs as an array
    
    // Fetch posts that match the retrieved post IDs
    $posts = DB::table('productsposts')->whereIn('id', $postIds)->get();
    // dd($posts);
    // $slug = DB::table('slugs')->whereIn('reference_id', $postIds)->where('reference_type', 'Botble\Services\Models\Post')->get();
    // dd($slugs);
    $servicescategories = DB::table('productscategories')->where('id', $category->id)->get();
    // dd($servicescategories);
    ?>
    @include(Theme::getThemeNamespace() . '::views.templates.servicesposts',
        compact('posts', 'servicescategories'))

@endif

{{-- @endif --}}
