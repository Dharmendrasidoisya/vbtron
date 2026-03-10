<div>
    <h3>{{ $post->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>
<header>
    <h3>{{ $post->name }}</h3>
    <div>
        @if ($post->servicescategories->isNotEmpty())
            <span>
                <a href="{{ $post->servicescategories->first()->url }}">{{ $post->servicescategories->first()->name }}</a>
            </span>
        @endif
        <span>{{ $post->created_at->format('M d, Y') }}</span>

        @if ($post->servicestags->isNotEmpty())
            <span>
                @foreach ($post->servicestags as $stag)
                    <a href="{{ $stag->url }}">{{ $stag->name }}</a>
                @endforeach
            </span>
        @endif
    </div>
</header>
<div class='ck-content'>
    {!! BaseHelper::clean($post->content) !!}
</div>
<br />
{!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, null, $post) !!}

@php $relatedservicesposts = get_related_servicesposts($post->getKey(), 2); @endphp

@if ($relatedservicesposts->isNotEmpty())
    <footer>
        @foreach ($relatedservicesposts as $relatedItem)
            <div>
                <article>
                    <div><a href="{{ $relatedItem->url }}"></a>
                        <img
                            src="{{ RvMedia::getImageUrl($relatedItem->image, null, false, RvMedia::getDefaultImage()) }}"
                            alt="{{ $relatedItem->name }}"
                        >
                    </div>
                    <header><a href="{{ $relatedItem->url }}"> {{ $relatedItem->name }}</a></header>
                </article>
            </div>
        @endforeach
    </footer>
@endif
