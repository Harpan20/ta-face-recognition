<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Edit Promo') }} | {{ env('APP_NAME') }}
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
                {{ __('Edit Promo') }}
            </h2>
        </div>

        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form
                    action="{{ route('promos.update', $promo->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <div class="intro-y box p-5">
                        <div>
                            <label
                                class="form-label"
                                for="name"
                            >{{ __('Name') }}</label>
                            <input
                                class="form-control {{ $errors->has('name') ? 'border-danger' : '' }} w-full"
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name', $promo->name) }}"
                                placeholder="{{ __('Name') }}"
                            >
                            @error('name')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="image_desktop"
                            >
                                {{ __('Image Desktop') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_desktop') ? 'border-danger' : '' }} w-full text-sm text-gray-500 file:mr-5 file:rounded-full file:border-0 file:bg-primary/5 file:py-2 file:px-6 file:text-sm file:font-medium file:text-primary hover:file:cursor-pointer hover:file:bg-primary/20 hover:file:text-primary"
                                id="image_desktop"
                                name="image_desktop"
                                type="file"
                                value="{{ old('image_desktop') }}"
                            />
                            @error('image_desktop')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="image_mobile"
                            >
                                {{ __('Image Mobile') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_mobile') ? 'border-danger' : '' }} w-full text-sm text-gray-500 file:mr-5 file:rounded-full file:border-0 file:bg-primary/5 file:py-2 file:px-6 file:text-sm file:font-medium file:text-primary hover:file:cursor-pointer hover:file:bg-primary/20 hover:file:text-primary"
                                id="image_mobile"
                                name="image_mobile"
                                type="file"
                                value="{{ old('image_mobile') }}"
                            />
                            @error('image_mobile')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="started_at"
                            >{{ __('Started Date') }}</label>
                            <input
                                class="form-control {{ $errors->has('started_at') ? 'border-danger' : '' }} w-full"
                                id="started_at"
                                name="started_at"
                                type="datetime-local"
                                value="{{ old('started_at', $promo->started_at) }}"
                                placeholder="{{ __('Started Date') }}"
                            >
                            @error('started_at')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="ended_at"
                            >{{ __('Ended Date') }}</label>
                            <input
                                class="form-control {{ $errors->has('ended_at') ? 'border-danger' : '' }} w-full"
                                id="ended_at"
                                name="ended_at"
                                type="datetime-local"
                                value="{{ old('ended_at', $promo->ended_at) }}"
                                placeholder="{{ __('Started Date') }}"
                            >
                            @error('ended_at')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="form-check form-switch flex flex-col items-start">
                                <label
                                    class="form-check-label ml-0 mb-2"
                                    for="is_publish"
                                >
                                    {{ __('Publish') }}
                                </label>
                                <input
                                    name="is_publish"
                                    type="hidden"
                                    value="0"
                                >
                                <input
                                    class="form-check-input {{ $errors->has('is_publish') ? '!border-danger' : '' }}"
                                    id="is_publish"
                                    name="is_publish"
                                    type="checkbox"
                                    value="{{ old('is_publish', $promo->is_publish) }}"
                                    @checked(old('is_publish') || $promo->is_publish == '1')
                                >
                            </div>
                            @error('is_publish')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a
                                class="btn btn-outline-secondary mr-1 w-24"
                                href="{{ route('promos.index') }}"
                            >
                                {{ __('Cancel') }}
                            </a>
                            <button
                                class="btn btn-primary w-24"
                                type="submit"
                            >
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
    <x-slot name="script">
        @vite('resources/js/ckeditor-classic.js')
    </x-slot>
</x-layout>
