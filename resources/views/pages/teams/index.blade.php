<x-layout>
    <x-slot name="head">
        <title>
            {{ __('Teams') }} | {{ env('APP_NAME') }}
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
        <h2 class="intro-y mt-10 text-lg font-medium">{{ __('Teams List') }}</h2>
        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
                <a
                    class="btn btn-primary mr-2 shadow-md"
                    href="{{ route('teams.create') }}"
                >
                    {{ __('Add New Team') }}
                </a>
                {{-- <div class="dropdown">
                    <button class="dropdown-toggle btn box px-2" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="flex h-5 w-5 items-center justify-center">
                            <i class="h-4 w-4" data-lucide="plus"></i>
                        </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="mr-2 h-4 w-4" data-lucide="printer"></i> Print
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="mr-2 h-4 w-4" data-lucide="file-text"></i> Export to Excel
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="mr-2 h-4 w-4" data-lucide="file-text"></i> Export to PDF
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                {{ $teams->links('pagination.info') }}
                <div class="mt-3 w-full sm:mt-0 sm:ml-auto sm:w-auto md:ml-0">
                    <div class="relative w-56 text-slate-500">
                        <input
                            class="form-control box w-56 pr-10"
                            type="text"
                            placeholder="{{ __('Search') }}..."
                        >
                        <i
                            class="absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"
                            data-lucide="search"
                        ></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Users Layout -->
            @foreach ($teams as $team)
                <div class="intro-y col-span-12 md:col-span-6">
                    <div class="box">
                        <div class="flex flex-col items-center p-5 lg:flex-row">
                            <div class="image-fit h-24 w-24 lg:mr-1 lg:h-12 lg:w-12">
                                <img
                                    class="rounded-full"
                                    src="{{ handle_get_image_from_db($team->image) }}"
                                    alt="{{ $team->name }}"
                                >
                            </div>
                            <div class="mt-3 text-center lg:ml-2 lg:mr-auto lg:mt-0 lg:text-left">
                                <a
                                    class="font-medium"
                                    href=""
                                >{{ $team->name }}</a>
                                <div class="mt-0.5 text-xs text-slate-500">{{ $team->position->name }}</div>
                            </div>
                            <div class="mt-4 flex lg:mt-0">
                                <a
                                    class="btn btn-primary mr-2 py-1 px-2"
                                    href="{{ route('teams.edit', $team->id) }}"
                                >
                                    {{ __('Edit') }}
                                </a>
                                <a
                                    class="btn btn-outline-secondary py-1 px-2"
                                    data-tw-toggle="modal"
                                    data-tw-target="#delete-confirmation-modal-{{ $team->id }}"
                                    href="javascript:;"
                                >
                                    {{ __('Delete') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- BEGIN: Users Layout -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
                {{ $teams->links('pagination.page') }}
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
        @forelse ($teams as $team)
            <div
                class="modal"
                id="delete-confirmation-modal-{{ $team->id }}"
                aria-hidden="true"
                tabindex="-1"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <form
                                action="{{ route('teams.destroy', $team->id) }}"
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
                                        {{ $team->name }}
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
