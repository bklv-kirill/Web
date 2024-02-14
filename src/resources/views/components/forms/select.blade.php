<div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">{{ $attributes['span'] }}</span>
    <select name="{{ $attributes['name'] }}" class="form-select" aria-label="Default select example">
        {{ $slot }}
    </select>
</div>
