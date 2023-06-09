<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Add New Post') }} | {{ env('APP_NAME') }}
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
                {{ __('Add New Post') }}
            </h2>
        </div>

        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <form
                    action="{{ route('posts.update', $post->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <div class="intro-y box p-5">
                        <div>
                            <label
                                class="form-label"
                                for="title"
                            >{{ __('Title') }}</label>
                            <input
                                class="form-control {{ $errors->has('title') ? 'border-danger' : '' }} w-full"
                                id="title"
                                name="title"
                                type="text"
                                value="{{ old('title', $post->title) }}"
                                placeholder="{{ __('Title') }}"
                            >
                            @error('title')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="post_type_id">{{ __('Post type') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('post_type_id') ? 'border-danger' : '' }} w-full"
                                    id="post_type_id"
                                    name="post_type_id"
                                    data-placeholder="{{ __('Select post type') }}"
                                >
                                    <option
                                        selected
                                        disabled
                                    >{{ __('Select post type') }}</option>
                                    @forelse ($post_types as $post_type)
                                        <option
                                            value="{{ $post_type->id }}"
                                            @selected(old('post_type_id', $post->post_type_id) == $post_type->id)
                                        >
                                            {{ $post_type->name }}
                                        </option>
                                    @empty
                                        <option disabled></option>
                                    @endforelse
                                </select>
                                @error('post_type_id')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="category_id">{{ __('Category') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('category_id') ? 'border-danger' : '' }} w-full"
                                    id="category_id"
                                    name="category_id"
                                    data-placeholder="{{ __('Select category') }}"
                                >
                                    <option
                                        selected
                                        disabled
                                    >{{ __('Select category') }}</option>
                                    @forelse ($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            @selected(old('category_id', $post->category_id) == $category->id)
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @empty
                                        <option disabled></option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="tags">{{ __('Tags') }}</label>
                            <div class="mt-2">
                                <select
                                    class="tom-select {{ $errors->has('tags') || $errors->has('tags.*') ? 'border-danger' : '' }} w-full"
                                    id="tags"
                                    name="tags[]"
                                    data-placeholder="{{ __('Select tags') }}"
                                    multiple
                                >
                                    <option disable>{{ __('Select tags') }}</option>
                                    @forelse ($tags as $tag)
                                        @if (old('tags'))
                                            @foreach (old('tags') as $old_tag)
                                                <option
                                                    value="{{ $tag->id }}"
                                                    @selected($old_tag == $tag->id)
                                                >
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach
                                        @elseif (!old('tags'))
                                            @foreach ($posts->tags as $old_tag)
                                                <option
                                                    value="{{ $tag->id }}"
                                                    @selected($old_tag->id == $tag->id)
                                                >
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </option>
                                        @endif
                                    @empty
                                        <option disabled>{{ __('Data Empty') }}</option>
                                    @endforelse
                                </select>
                                @error('tags')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @error('tags.*')
                                    <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="body">{{ __('Content') }}</label>
                            <div class="mt-2">
                                <textarea
                                    class="editor"
                                    id="body"
                                    name="body"
                                >{{ old('body', $post->body) }}</textarea>
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
                                class="{{ $errors->has('image_hero') ? 'border-danger' : '' }} w-full text-sm text-gray-500 file:mr-5 file:rounded-full file:border-0 file:bg-primary/5 file:py-2 file:px-6 file:text-sm file:font-medium file:text-primary hover:file:cursor-pointer hover:file:bg-primary/20 hover:file:text-primary"
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
                                for="image_hero"
                            >
                                {{ __('Image Large') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_l') ? 'border-danger' : '' }} w-full text-sm text-gray-500 file:mr-5 file:rounded-full file:border-0 file:bg-primary/5 file:py-2 file:px-6 file:text-sm file:font-medium file:text-primary hover:file:cursor-pointer hover:file:bg-primary/20 hover:file:text-primary"
                                id="image_l"
                                name="image_l"
                                type="file"
                                value="{{ old('image_l') }}"
                            />
                            @error('image_l')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="image_hero"
                            >
                                {{ __('Image Small') }}
                            </label>
                            <input
                                class="{{ $errors->has('image_s') ? 'border-danger' : '' }} w-full text-sm text-gray-500 file:mr-5 file:rounded-full file:border-0 file:bg-primary/5 file:py-2 file:px-6 file:text-sm file:font-medium file:text-primary hover:file:cursor-pointer hover:file:bg-primary/20 hover:file:text-primary"
                                id="image_s"
                                name="image_s"
                                type="file"
                                value="{{ old('image_s') }}"
                            />
                            @error('image_s')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label
                                class="form-label"
                                for="published_at"
                            >{{ __('Publish Date') }}</label>
                            <input
                                class="form-control {{ $errors->has('published_at') ? 'border-danger' : '' }} w-full"
                                id="published_at"
                                name="published_at"
                                type="datetime-local"
                                value="{{ old('published_at', $post->published_at) }}"
                                placeholder="{{ __('Publish Date') }}"
                            >
                            @error('published_at')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <div class="form-check form-switch flex flex-col items-start">
                                <label
                                    class="form-check-label ml-0 mb-2"
                                    for="is_publish"
                                >
                                    {{ __('Published') }}
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
                                    value="{{ old('is_publish', $post->is_publish) }}"
                                    @checked(old('is_publish') || $post->is_publish == '1')
                                >
                            </div>
                            @error('is_publish')
                                <div class="pristine-error mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-5 text-right">
                            <a
                                class="btn btn-outline-secondary mr-1 w-24"
                                href="{{ route('posts.index') }}"
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
