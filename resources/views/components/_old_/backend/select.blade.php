@props(['name' => ''])

<select
    class="form-control @error($name) is-invalid @enderror {{ !$errors->has($name) && old($name) ? 'is-valid' : '' }}"
    name="{{ $name }}"
    {{ $attributes }}
    required>
    {{ $slot }}
</select>
