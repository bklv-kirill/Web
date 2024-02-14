<div class="form-check">
    <input class="form-check-input" name="{{ $attributes["name"] }}" type="checkbox" value="{{ $attributes["value"] }}"
           id="{{ $attributes["for"] }}" @checked($attributes["checked"])>
    <label class="form-check-label" for="{{ $attributes["for"] }}">
        {{ $slot }}
    </label>
</div>
