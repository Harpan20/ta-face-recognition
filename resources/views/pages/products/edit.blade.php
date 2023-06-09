<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Edit Product') }} | {{ env('APP_NAME') }}
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
                {{ __('Edit Product') }}
            </h2>
        </div>

        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form
                    action="{{ route('products.update', $product->id) }}"
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
                                value="{{ old('name', $product->name) }}"
                                placeholder="{{ __('Name') }}"
                            >
                            @error('name')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mt-3">
                            <label for="tags">{{ __('Tags') }}</label>
                            <div class="mt-2">
                                <select class="tom-select {{ $errors->has('tags') ? 'border-danger' : '' }} w-full"
                                    id="tags" data-placeholder="{{ __('Select tags') }}" name="tags[]" multiple>
                                    <option disable>{{ __('Select tags') }}</option>
                                    @forelse ($tags as $tag)
                                        <option value="{{ $tag->id }}" @selected(old('tags') == $tag->id)>
                                            {{ $tag->name }}
                                        </option>
                                    @empty
                                        <option disabled></option>
                                    @endforelse
                                </select>
                                @error('tags')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="mt-3">
                            <label for="description">{{ __('Description') }}</label>
                            <div class="mt-2">
                                <textarea
                                    class="text-area {{ $errors->has('description') ? '!border-danger' : '' }}"
                                    id="description"
                                    name="description"
                                    rows="5"
                                    placeholder="{{ __('Add description') }}"
                                >{{ old('description', $product->description) }}</textarea>
                            </div>
                            @error('description')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="features">{{ __('Features') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('features') || $errors->has('features.*') ? 'border-danger' : '' }} w-full"
                                    id="features"
                                    name="features[]"
                                    data-placeholder="{{ __('Select features') }}"
                                    multiple
                                >
                                    <option disabled>{{ __('Select features') }}</option>
                                    @forelse ($features as $feature)
                                        @if (old('features'))
                                            @foreach (old('features') as $old_feature)
                                                <option
                                                    value="{{ $feature->id }}"
                                                    @selected($old_feature == $feature->id)
                                                >
                                                    {{ $feature->name }}
                                                </option>
                                            @endforeach
                                        @elseif (!old('features'))
                                            @foreach ($product->features as $old_feature)
                                                <option
                                                    value="{{ $feature->id }}"
                                                    @selected($old_feature->id == $feature->id)
                                                >
                                                    {{ $feature->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="{{ $feature->id }}">
                                                {{ $feature->name }}
                                            </option>
                                        @endif
                                    @empty
                                        <option disabled>{{ __('Data Empty') }}</option>
                                    @endforelse
                                </select>
                                @error('features')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @error('features.*')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="benefits">{{ __('Benefits') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('benefits') || $errors->has('benefits.*') ? 'border-danger' : '' }} w-full"
                                    id="benefits"
                                    name="benefits[]"
                                    data-placeholder="{{ __('Select benefits') }}"
                                    multiple
                                >
                                    <option disabled>{{ __('Select benefits') }}</option>
                                    @forelse ($benefits as $benefit)
                                        @if (old('benefits'))
                                            @foreach (old('benefits') as $old_benefit)
                                                <option
                                                    value="{{ $benefit->id }}"
                                                    @selected($old_benefit == $benefit->id)
                                                >
                                                    {{ $benefit->name }}
                                                </option>
                                            @endforeach
                                        @elseif (!old('benefits'))
                                            @foreach ($product->benefits as $old_benefit)
                                                <option
                                                    value="{{ $benefit->id }}"
                                                    @selected($old_benefit->id == $benefit->id)
                                                >
                                                    {{ $benefit->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="{{ $benefit->id }}">
                                                {{ $benefit->name }}
                                            </option>
                                        @endif
                                    @empty
                                        <option disabled>{{ __('Data Empty') }}</option>
                                    @endforelse
                                </select>
                                @error('benefits')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @error('benefits.*')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="advantages">{{ __('Advantages') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('advantages') || $errors->has('advantages.*') ? 'border-danger' : '' }} w-full"
                                    id="advantages"
                                    name="advantages[]"
                                    data-placeholder="{{ __('Select advantages') }}"
                                    multiple
                                >
                                    <option disabled>{{ __('Select advantages') }}</option>
                                    @forelse ($advantages as $advantage)
                                        @if (old('advantages'))
                                            @foreach (old('advantages') as $old_advantage)
                                                <option
                                                    value="{{ $advantage->id }}"
                                                    @selected($old_advantage == $advantage->id)
                                                >
                                                    {{ $advantage->name }}
                                                </option>
                                            @endforeach
                                        @elseif (!old('advantages'))
                                            @foreach ($product->advantages as $old_advantage)
                                                <option
                                                    value="{{ $advantage->id }}"
                                                    @selected($old_advantage->id == $advantage->id)
                                                >
                                                    {{ $advantage->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="{{ $advantage->id }}">
                                                {{ $advantage->name }}
                                            </option>
                                        @endif
                                    @empty
                                        <option disabled>{{ __('Data Empty') }}</option>
                                    @endforelse
                                </select>
                                @error('advantages')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @error('advantages.*')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="supports">{{ __('Supports') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('supports') || $errors->has('supports.*') ? 'border-danger' : '' }} w-full"
                                    id="supports"
                                    name="supports[]"
                                    data-placeholder="{{ __('Select supports') }}"
                                    multiple
                                >
                                    <option disabled>{{ __('Select supports') }}</option>
                                    @forelse ($supports as $support)
                                        @if (old('supports'))
                                            @foreach (old('supports') as $old_support)
                                                <option
                                                    value="{{ $support->id }}"
                                                    @selected($old_support == $support->id)
                                                >
                                                    {{ $support->name }}
                                                </option>
                                            @endforeach
                                        @elseif (!old('supports'))
                                            @foreach ($product->supports as $old_support)
                                                <option
                                                    value="{{ $support->id }}"
                                                    @selected($old_support->id == $support->id)
                                                >
                                                    {{ $support->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="{{ $support->id }}">
                                                {{ $support->name }}
                                            </option>
                                        @endif
                                    @empty
                                        <option disabled>{{ __('Data Empty') }}</option>
                                    @endforelse
                                </select>
                                @error('supports')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @error('supports.*')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="faqs">{{ __('Faqs') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('faqs') || $errors->has('faqs.*') ? 'border-danger' : '' }} w-full"
                                    id="faqs"
                                    name="faqs[]"
                                    data-placeholder="{{ __('Select faqs') }}"
                                    multiple
                                >
                                    <option disabled>{{ __('Select faqs') }}</option>
                                    @forelse ($faqs as $faq)
                                        <option
                                            value="{{ $faq->id }}"
                                            @if (old('faqs'))
                                                @foreach (old('faqs') as $old_faq)
                                                    @selected($old_faq == $faq->id)
                                                @endforeach
                                            @elseif (!old('faqs'))
                                                @foreach ($product->faqs as $product_faq)
                                                    @selected($product_faq->id == $faq->id)
                                                @endforeach
                                            @else
                                                {{ '' }}
                                            @endif
                                        >
                                            {{ $faq->question }}
                                        </option>
                                    @empty
                                        <option disabled>{{ __('Data Empty') }}</option>
                                    @endforelse
                                </select>
                                @error('faqs')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @error('faqs.*')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="image_hero"
                            >
                                {{ __('Image Hero') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_hero') ? 'border-danger' : '' }} input-file"
                                id="image_hero"
                                name="image_hero"
                                type="file"
                                value="{{ old('image_hero') }}"
                            />
                            @error('image_hero')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="image_feature"
                            >
                                {{ __('Image Feature') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_feature') ? 'border-danger' : '' }} input-file"
                                id="image_feature"
                                name="image_feature"
                                type="file"
                                value="{{ old('image_feature') }}"
                            />
                            @error('image_feature')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="image_benefit"
                            >
                                {{ __('Image Benefit') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_benefit') ? 'border-danger' : '' }} input-file"
                                id="image_benefit"
                                name="image_benefit"
                                type="file"
                                value="{{ old('image_benefit') }}"
                            />
                            @error('image_benefit')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="image_benefit_mobile"
                            >
                                {{ __('Image Benefit Mobile') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_benefit_mobile') ? 'border-danger' : '' }} input-file"
                                id="image_benefit_mobile"
                                name="image_benefit_mobile"
                                type="file"
                                value="{{ old('image_benefit_mobile') }}"
                            />
                            @error('image_benefit_mobile')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a
                                class="btn btn-outline-secondary mr-1 w-24"
                                href="{{ route('products.index') }}"
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
