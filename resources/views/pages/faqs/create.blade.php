<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Add New FAQ') }} | {{ env('APP_NAME') }}
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
                {{ __('Add New FAQ') }}
            </h2>
        </div>

        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form
                    action="{{ route('faqs.store') }}"
                    method="POST"
                >
                    @csrf
                    <div class="intro-y box p-5">
                        <div>
                            <label for="question">{{ __('Question') }}</label>
                            <div class="mt-2">
                                <textarea
                                    class="text-area {{ $errors->has('question') ? '!border-danger' : '' }}"
                                    id="question"
                                    name="question"
                                    rows="5"
                                    placeholder="{{ __('Add question') }}"
                                >{{ old('question') }}</textarea>
                            </div>
                            @error('question')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="answer">{{ __('Answer') }}</label>
                            <div class="mt-2">
                                <textarea
                                    class="text-area {{ $errors->has('answer') ? '!border-danger' : '' }}"
                                    id="answer"
                                    name="answer"
                                    rows="5"
                                    placeholder="{{ __('Add answer') }}"
                                >{{ old('answer') }}</textarea>
                            </div>
                            @error('answer')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a
                                class="btn btn-outline-secondary mr-1 w-24"
                                href="{{ route('faqs.index') }}"
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
</x-layout>
