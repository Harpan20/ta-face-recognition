<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Edit Advantage') }} | {{ env('APP_NAME') }}
        </title>
    </x-slot>

    @if (session()->has('success'))
        <x-notification.success>
            {{ session()->get('success') }}
            <x-slot name="info">
                {{ __('Notification will be close in ') }}
            </x-slot>
        </x-notification.success>
    @endif

    @if ($errors->any())
        <x-notification.failed>
            {{ __('Failed to save data') }}
            <x-slot name="info">
                {{ __('Check again the filled form!') }}
            </x-slot>
        </x-notification.failed>
    @endif

    <!-- BEGIN: Content -->
    <div class="content">
        <div class="intro-y mt-8 flex items-center">
            <h2 class="mr-auto text-lg font-medium">
                {{ __('Edit Advantage') }}
            </h2>
        </div>
        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form action="{{ route('advantages.update', $advantage->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="intro-y box p-5">
                        <div>
                            <label class="form-label" for="name">{{ __('Name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'border-danger' : '' }} w-full"
                                id="name" type="text" placeholder="{{ __('Name') }}" name="name"
                                value="{{ old('name', $advantage->name) }}">
                            @error('name')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="description">{{ __('Description') }}</label>
                            <div class="mt-2">
                                <textarea class="text-area {{ $errors->has('description') ? '!border-danger' : '' }}" id="description" rows="5"
                                    name="description" placeholder="{{ __('Add description') }}">{{ old('description', $advantage->description) }}</textarea>
                            </div>
                            @error('description')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="icon">
                                {{ __('Icon') }}
                            </label>
                            <input class="input-file {{ $errors->has('icon') ? '!border-danger' : '' }}" id="icon"
                                type="file" name="icon" value="{{ old('icon') }}" />
                            @error('icon')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a class="btn btn-outline-secondary mr-1 w-24" href="{{ route('advantages.index') }}">
                                {{ __('Cancel') }}
                            </a>
                            <button class="btn btn-primary w-24" type="submit">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>
    </div>
    <!-- END: Content -->
</x-layout>
