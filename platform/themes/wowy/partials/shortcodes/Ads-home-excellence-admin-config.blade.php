<div class="mb-3">
    <label class="form-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="Title">
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Description') }}</label>
    <textarea name="description" class="form-control " placeholder="description">{{ Arr::get($attributes, 'description') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Description2') }}</label>
    <textarea name="description2" class="form-control " placeholder="description Second ">{{ Arr::get($attributes, 'description2') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Icon') }}</label>
    {!! Form::mediaImage('icon', Arr::get($attributes, 'icon')) !!}
</div>
<div class="mb-3">
    <label class="form-label">{{ __('Icon2') }}</label>
    {!! Form::mediaImage('icon2', Arr::get($attributes, 'icon2')) !!}
</div>
{!! Theme::partial('shortcodes.includes.autoplay-settings', compact('attributes')) !!}
