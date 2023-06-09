@props(['error' => ''])

@error($error)
    <div class="invalid-feedback @error($error) d-block @enderror">
        {{ $message }}
    </div>
@enderror
