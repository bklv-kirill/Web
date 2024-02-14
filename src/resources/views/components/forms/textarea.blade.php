@if ($errors->has($attributes['name']))
    <div class="form-text text-danger mb-1">{{ $errors->first($attributes['name']) }}</div>
@endif
<div class="form-floating">
    <textarea name="{{ $attributes['name'] }}" class="form-control" placeholder="{{ $slot }}" id="floatingTextarea2"
        style="height: 100px">{{ $attributes['value'] }}</textarea>
    <label for="floatingTextarea2">{{ $slot }}</label>
</div>
