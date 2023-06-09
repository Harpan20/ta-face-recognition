@props(['name' => ''])

<input class="form-control @error($name) is-invalid @enderror {{ !$errors->has($name) && old($name) ? 'is-valid' : '' }}"
    {{ $attributes }}
    name="{{ $name }}"
    required>
