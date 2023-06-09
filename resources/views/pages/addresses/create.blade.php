<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Add New Address') }} | {{ env('APP_NAME') }}
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
                {{ __('Add New Address') }}
            </h2>
        </div>
        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form action="{{ route('addresses.store') }}" method="POST">
                    @csrf
                    <div class="intro-y box p-5">
                        <div>
                            <label class="form-label" for="name">{{ __('Name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'border-danger' : '' }} w-full"
                                id="name" type="text" placeholder="{{ __('Name') }}" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="address">{{ __('Address') }}</label>
                            <input class="form-control {{ $errors->has('address') ? 'border-danger' : '' }} w-full"
                                id="address" type="text" placeholder="{{ __('Address') }}" name="address"
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="province">{{ __('Province') }}</label>
                            <input class="form-control {{ $errors->has('province') ? 'border-danger' : '' }} w-full"
                                id="province" type="text" placeholder="{{ __('Province') }}" name="province"
                                value="{{ old('province') }}">
                            @error('province')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="district">{{ __('District') }}</label>
                            <input class="form-control {{ $errors->has('district') ? 'border-danger' : '' }} w-full"
                                id="district" type="text" placeholder="{{ __('District') }}" name="district"
                                value="{{ old('district') }}">
                            @error('district')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="sub_district">{{ __('Sub District') }}</label>
                            <input
                                class="form-control {{ $errors->has('sub_district') ? 'border-danger' : '' }} w-full"
                                id="sub_district" type="text" placeholder="{{ __('Sub District') }}"
                                name="sub_district" value="{{ old('sub_district') }}">
                            @error('sub_district')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="postal_code">{{ __('Postal Code') }}</label>
                            <input class="form-control {{ $errors->has('postal_code') ? 'border-danger' : '' }} w-full"
                                id="postal_code" type="text" placeholder="{{ __('Postal Code') }}"
                                name="postal_code" value="{{ old('postal_code') }}">
                            @error('postal_code')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="longitude">{{ __('Longitude') }}</label>
                            <input class="form-control {{ $errors->has('longitude') ? 'border-danger' : '' }} w-full"
                                id="longitude" type="text" placeholder="{{ __('Longitude') }}" name="longitude"
                                value="{{ old('longitude') }}">
                            @error('longitude')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="latitude">{{ __('Latitude') }}</label>
                            <input class="form-control {{ $errors->has('latitude') ? 'border-danger' : '' }} w-full"
                                id="latitude" type="text" placeholder="{{ __('Latitude') }}" name="latitude"
                                value="{{ old('latitude') }}">
                            @error('latitude')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input {{ $errors->has('is_main') ? '!border-danger' : '' }}"
                                    id="is_main" type="checkbox" name="is_main" value="{{ old('is_main') }}"
                                    @checked(old('is_main') == '1')>
                                <label class="form-check-label" for="is_main">
                                    {{ __('Main Address') }}
                                </label>
                            </div>
                            @error('is_main')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a class="btn btn-outline-secondary mr-1 w-24" href="{{ route('addresses.index') }}">
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
