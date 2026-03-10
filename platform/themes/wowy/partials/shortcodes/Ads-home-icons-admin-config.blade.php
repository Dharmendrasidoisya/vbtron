<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control"
        placeholder="Title">
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Short Title') }}</label>
    <input type="text" name="shorttitle" value="{{ Arr::get($attributes, 'shorttitle') }}" class="form-control"
        placeholder="Title">
</div>
<div class="mb-3">
    <label class="form-label">{{ __('History') }}</label>
    <textarea
        name="history"
        class="form-control"
        rows="5"
        placeholder="History">{{ Arr::get($attributes, 'history') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Mission') }}</label>
    <textarea
        name="mission"
        class="form-control"
        rows="5"
        placeholder="Mission">{{ Arr::get($attributes, 'mission') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Vision') }}</label>
    <textarea
        name="vision"
        class="form-control"
        rows="5"
        placeholder="Vision">{{ Arr::get($attributes, 'vision') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Icon') }}</label>
    {!! Form::mediaImage('icon', Arr::get($attributes, 'icon')) !!}
</div>
{!! Theme::partial('shortcodes.includes.autoplay-settings', compact('attributes')) !!}


