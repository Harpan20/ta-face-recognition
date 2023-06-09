<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Add New Whatsapp') }} | {{ env('APP_NAME') }}
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
                {{ __('Add New Whatsapp') }}
            </h2>
        </div>
        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form action="{{ route('whatsapps.store') }}" method="POST">
                    @csrf
                    <div class="intro-y box p-5">
                        <div>
                            <label for="country_id">{{ __('Dial Code') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('country_id') ? 'border-danger' : '' }} w-full"
                                    id="country_id" data-placeholder="{{ __('Select dial code') }}" name="country_id">
                                    <option selected disabled>{{ __('Select dial code') }}</option>
                                    @forelse ($countries as $country)
                                        <option value="{{ $country->id }}" @selected(old('country_id') == $country->id)>
                                            {{ $country->name }} {{ $country->dial_code }}
                                        </option>
                                    @empty
                                        <option disabled></option>
                                    @endforelse
                                </select>
                                @error('country_id')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="number">{{ __('Whatsapps') }}</label>
                            <input class="form-control {{ $errors->has('number') ? 'border-danger' : '' }} w-full"
                                id="number" type="text" placeholder="{{ __('Example: 81234567890') }}"
                                name="number" value="{{ old('number') }}">
                            <div class="form-help">
                                {{ __('Fill without dial code!, example: +62-81234567890 to 81234567890') }}
                            </div>
                            @error('number')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input {{ $errors->has('is_main') ? '!border-danger' : '' }}"
                                    id="is_main" type="checkbox" name="is_main" value="{{ old('is_main') }}"
                                    @checked(old('is_main') == '1')>
                                <label class="form-check-label" for="is_main">
                                    {{ __('Main Whatsapp') }}
                                </label>
                            </div>
                            @error('is_main')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a class="btn btn-outline-secondary mr-1 w-24" href="{{ route('whatsapps.index') }}">
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
