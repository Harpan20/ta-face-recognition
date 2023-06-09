<x-layout>
    <x-slot name="head">
        <title>
            {{ __('FAQs') }} | {{ env('APP_NAME') }}
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
        <h2 class="intro-y mt-10 text-lg font-medium">{{ __('FAQs List') }}</h2>
        <div class="mt-5 grid grid-cols-12 gap-6">
            <div class="intro-y col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
                <a class="btn btn-primary mr-2 shadow-md" href="{{ route('faqs.create') }}">
                    {{ __('Add New FAQ') }}
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
                {{ $faqs->links('pagination.info') }}
                <div class="mt-3 w-full sm:mt-0 sm:ml-auto sm:w-auto md:ml-0">
                    <div class="relative w-56 text-slate-500">
                        <input class="form-control box w-56 pr-10" type="text" placeholder="{{ __('Search') }}...">
                        <i class="absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4" data-lucide="search"></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table-report -mt-2 table">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">{{ __('QA') }}</th>
                            <th class="whitespace-nowrap text-center">{{ __('ACTIONS') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                            <tr class="intro-x">
                                <td>
                                    <p class="font-semibold text-slate-600">
                                        {{ __('Question :') }}
                                    </p>
                                    <p class="mb-4">
                                        {{ $faq->question }}
                                    </p>
                                    <p class="font-semibold text-slate-600">
                                        {{ __('Answer :') }}
                                    </p>
                                    <p class="mb-4">
                                        {{ $faq->answer }}
                                    </p>
                                    <div class="whitespace-nowrap text-xs text-slate-500">
                                        NO. {{ $faqs->firstItem() + $loop->index }}
                                    </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex items-center justify-center">
                                        <a class="mr-3 flex items-center" href="{{ route('faqs.edit', $faq->id) }}">
                                            <i class="mr-1 h-4 w-4" data-lucide="check-square"></i> {{ __('Edit') }}
                                        </a>
                                        <a class="flex items-center text-danger" href="javascript:;"
                                            data-tw-toggle="modal"
                                            data-tw-target="#delete-confirmation-modal-{{ $faq->id }}">
                                            <i class="mr-1 h-4 w-4" data-lucide="trash-2"></i> {{ __('Delete') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
                {{ $faqs->links('pagination.page') }}
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
        @forelse ($faqs as $faq)
            <div class="modal" id="delete-confirmation-modal-{{ $faq->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="p-5 text-center">
                                    <i class="mx-auto mt-3 h-16 w-16 text-danger" data-lucide="x-circle"></i>
                                    <div class="mt-5 text-3xl">
                                        {{ __('Are you sure?') }}
                                    </div>
                                    <div class="mt-2 text-slate-500">
                                        {{ __('Do you really want to delete these records?') }}
                                        {{-- <br>
                                        This process cannot be undone. --}}
                                        <br>
                                        {{ $faq->name }}
                                    </div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <button class="btn btn-outline-secondary mr-1 w-24" type="button"
                                        data-tw-dismiss="modal">
                                        {{ __('Cancel') }}
                                    </button>
                                    <button class="btn btn-danger w-24" type="submit">
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
