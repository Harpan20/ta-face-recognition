<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Posts') }} | {{ env('APP_NAME') }}
        </title>
    </x-slot>

    @if (session()->has('deleted'))
        <x-notification.success>
            {{ session()->get('deleted') }}
            <x-slot name="info">
                {{ __('Notification will be close in ') }}
            </x-slot>
        </x-notification.success>
    @endif

    <!-- BEGIN: Content -->
    <div class="content">
        <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">
                {{ __('Posts') }}
            </h2>
            <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
                <a
                    class="btn btn-primary mr-2 shadow-md"
                    href="{{ route('posts.create') }}"
                >
                    {{ __('Add New Posts') }}
                </a>
                {{-- <div class="dropdown ml-auto sm:ml-0">
                    <button class="dropdown-toggle btn box px-2" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="flex h-5 w-5 items-center justify-center">
                            <i class="h-4 w-4" data-lucide="plus"></i>
                        </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="mr-2 h-4 w-4" data-lucide="share-2"></i> Share Post
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="mr-2 h-4 w-4" data-lucide="download"></i> Download Post
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="intro-y mt-5 grid grid-cols-12 gap-6">
            <!-- BEGIN: Blog Layout -->
            @foreach ($posts as $post)
                <div class="intro-y box col-span-12 md:col-span-6 xl:col-span-4">
                    <div class="flex items-center border-b border-slate-200/60 px-5 py-4 dark:border-darkmode-400">
                        <div class="image-fit h-10 w-10 flex-none">
                            <img
                                class="rounded-full"
                                src="{{ handle_get_image_from_db($post->image_hero) }}"
                                alt="{{ $post->title }}"
                            >
                        </div>
                        <div class="ml-3 mr-auto">
                            <a
                                class="font-medium"
                                href=""
                            >{{ $post->title }}</a>
                            <div class="mt-0.5 flex truncate text-xs text-slate-500">
                                <a
                                    class="inline-block truncate text-primary"
                                    href=""
                                >
                                    {{ $post->category->name ?? __('None') }}
                                </a>
                                <span class="mx-1">•</span>
                                {{ $post->formatedDateDFH() }}
                            </div>
                        </div>
                        <div class="dropdown ml-3">
                            <a
                                class="dropdown-toggle h-5 w-5 text-slate-500"
                                data-tw-toggle="dropdown"
                                href="javascript:;"
                                aria-expanded="false"
                            >
                                <i
                                    class="h-4 w-4"
                                    data-lucide="more-vertical"
                                ></i>
                            </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('posts.edit', $post->id) }}"
                                        >
                                            <i
                                                class="mr-2 h-4 w-4"
                                                data-lucide="edit-2"
                                            ></i>
                                            {{ __('Edit') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            data-tw-toggle="modal"
                                            data-tw-target="#delete-confirmation-modal-{{ $post->id }}"
                                            href="javascript:;"
                                        >
                                            <i
                                                class="mr-2 h-4 w-4"
                                                data-lucide="trash"
                                            ></i>
                                            {{ __('Delete') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="image-fit h-40 2xl:h-56">
                            <img
                                class="rounded-md"
                                src="{{ handle_get_image_from_db($post->image_hero) }}"
                                alt="{{ $post->title }}"
                            >
                        </div>
                        <div class="image-fit mt-5 h-40 2xl:h-56">
                            <img
                                class="rounded-md"
                                src="{{ handle_get_image_from_db($post->image_l) }}"
                                alt="{{ $post->title }}"
                            >
                        </div>
                        <div class="image-fit mt-5 h-40 2xl:h-56">
                            <img
                                class="rounded-md"
                                src="{{ handle_get_image_from_db($post->image_s) }}"
                                alt="{{ $post->title }}"
                            >
                        </div>
                        <a
                            class="mt-5 block text-base font-medium"
                            href=""
                        >
                            {{ $post->title }}
                        </a>
                        <div class="mt-2 text-slate-600 dark:text-slate-500">
                            {{ $post->excerpt }}
                        </div>
                        <div class="mt-5 text-slate-600 dark:text-slate-500">
                            <div class="flex items-center">
                                <i
                                    class="mr-2 h-4 w-4"
                                    data-lucide="layers"
                                ></i>
                                {{ __('Type') }}: {{ $post->postType->name ?? __('None') }}
                            </div>
                            <div class="mt-2 flex items-center">
                                <i
                                    class="mr-2 h-4 w-4"
                                    data-lucide="triangle"
                                ></i>
                                {{ __('Category') }}: {{ $post->category->name ?? __('None') }}
                            </div>
                            <div class="mt-2 flex items-center">
                                <i
                                    class="mr-2 h-4 w-4"
                                    data-lucide="tag"
                                ></i>
                                {{ __('Tags') }}:
                                @forelse ($post->tags as $tag)
                                    {{ $tag->name }}{{ $loop->last ? '' : ',' }}
                                @empty
                                    {{ __('There is no tag') }}
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- END: Blog Layout -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
                {{ $posts->links('pagination.page') }}
                {{-- <select class="box form-select mt-3 w-20 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select> --}}
            </div>
            <!-- END: Pagination -->
        </div>
        <!-- BEGIN: Delete Confirmation Modal -->
        @forelse ($posts as $post)
            <div
                class="modal"
                id="delete-confirmation-modal-{{ $post->id }}"
                aria-hidden="true"
                tabindex="-1"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <form
                                action="{{ route('posts.destroy', $post->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('delete')
                                <div class="p-5 text-center">
                                    <i
                                        class="mx-auto mt-3 h-16 w-16 text-danger"
                                        data-lucide="x-circle"
                                    ></i>
                                    <div class="mt-5 text-3xl">
                                        {{ __('Are you sure?') }}
                                    </div>
                                    <div class="mt-2 text-slate-500">
                                        {{ __('Do you really want to delete these records?') }}
                                        {{-- <br>
                                            This process cannot be undone. --}}
                                        <br>
                                        {{ $post->title }}
                                    </div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <button
                                        class="btn btn-outline-secondary mr-1 w-24"
                                        data-tw-dismiss="modal"
                                        type="button"
                                    >
                                        {{ __('Cancel') }}
                                    </button>
                                    <button
                                        class="btn btn-danger w-24"
                                        type="submit"
                                    >
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
        <!-- END: Delete Confirmation Modal -->
    </div>
    <!-- END: Content -->
</x-layout>
