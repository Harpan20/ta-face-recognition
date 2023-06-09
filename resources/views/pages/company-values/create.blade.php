<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Add New Company Value') }} | {{ env('APP_NAME') }}
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
                {{ __('Add Company Value') }}
            </h2>
        </div>
        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form action="{{ route('company-values.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label" for="image">
                                {{ __('Image') }}
                            </label>
                            <input
                                class="{{ $errors->has('image') ? 'border-danger' : '' }} w-full text-sm text-gray-500 file:mr-5 file:rounded-full file:border-0 file:bg-primary/5 file:py-2 file:px-6 file:text-sm file:font-medium file:text-primary hover:file:cursor-pointer hover:file:bg-primary/20 hover:file:text-primary"
                                id="image" type="file" name="image" value="{{ old('image') }}" />
                            @error('image')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a class="btn btn-outline-secondary mr-1 w-24" href="{{ route('company-values.index') }}">
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
