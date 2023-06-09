<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Edit Contact Form') }} | {{ env('APP_NAME') }}
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
                {{ __('Edit Contact Form') }}
            </h2>
        </div>
        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form action="{{ route('contact-forms.update', $contact_form->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="intro-y box p-5">
                        <div>
                            <label class="form-label" for="name">{{ __('Name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'border-danger' : '' }} w-full"
                                id="name" type="text" placeholder="{{ __('Name') }}" name="name"
                                value="{{ old('name', $contact_form->name) }}" readonly>
                            @error('name')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="company_name">{{ __('Company Name') }}</label>
                            <input
                                class="form-control {{ $errors->has('company_name') ? 'border-danger' : '' }} w-full"
                                id="company_name" type="text" placeholder="{{ __('Company Name') }}"
                                name="company_name" value="{{ old('company_name', $contact_form->company_name) }}"
                                readonly>
                            @error('company_name')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="email">{{ __('Email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'border-danger' : '' }} w-full"
                                id="email" type="text" placeholder="{{ __('Email') }}" name="email"
                                value="{{ old('email', $contact_form->email) }}" readonly>
                            @error('email')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="country_id">{{ __('Dial Code') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('country_id') ? 'border-danger' : '' }} w-full"
                                    id="country_id" data-placeholder="{{ __('Select dial code') }}" name="country_id"
                                    readonly>
                                    <option selected disabled>{{ __('Select dial code') }}</option>
                                    @forelse ($countries as $country)
                                        <option value="{{ $country->id }}" @selected(old('country_id', $contact_form->country_id) == $country->id)>
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
                            <label class="form-label" for="phone_number">{{ __('Phone Numbers') }}</label>
                            <input
                                class="form-control {{ $errors->has('phone_number') ? 'border-danger' : '' }} w-full"
                                id="phone_number" type="text" placeholder="{{ __('Example: 81234567890') }}"
                                name="phone_number" value="{{ old('phone_number', $contact_form->phone_number) }}"
                                readonly>
                            <div class="form-help">
                                {{ __('Fill without dial code!, example: +62-81234567890 to 81234567890') }}
                            </div>
                            @error('phone_number')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="question">{{ __('Question') }}</label>
                            <input class="form-control {{ $errors->has('question') ? 'border-danger' : '' }} w-full"
                                id="question" type="text" placeholder="{{ __('Question') }}" name="question"
                                value="{{ old('question', $contact_form->question) }}" readonly>
                            @error('question')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="answer">{{ __('Answer') }}</label>
                            <input class="form-control {{ $errors->has('answer') ? 'border-danger' : '' }} w-full"
                                id="answer" type="text" placeholder="{{ __('Answer') }}" name="answer"
                                value="{{ old('answer', $contact_form->answer) }}">
                            @error('answer')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a class="btn btn-outline-secondary mr-1 w-24" href="{{ route('contact-forms.index') }}">
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
