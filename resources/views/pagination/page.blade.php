@if ($paginator->hasPages())
    <nav class="flex w-full items-center justify-between sm:mr-auto sm:w-auto" role="navigation"
        aria-label="{{ __('Pagination Navigation') }}">
        <ul class="pagination">
            {{-- First Page Link --}}
            <li class="page-item">
                @if ($paginator->onFirstPage())
                    <span class="page-link !cursor-default !text-slate-500" aria-disabled="true"
                        aria-label="{{ __('pagination.first') }}">
                        <i class="h-4 w-4" data-lucide="chevrons-left"></i>
                    </span>
                @else
                    <a class="page-link" href="{{ $paginator->url(1) }}" rel="prev"
                        aria-label="{{ __('pagination.first') }}">
                        <i class="h-4 w-4" data-lucide="chevrons-left"></i>
                    </a>
                @endif
            </li>
            {{-- First Page Link --}}
            {{-- Previous Page Link --}}
            <li class="page-item">
                @if ($paginator->onFirstPage())
                    <span class="page-link !cursor-default !text-slate-500" aria-disabled="true"
                        aria-label="{{ __('pagination.previous') }}">
                        <i class="h-4 w-4" data-lucide="chevron-left"></i>
                    </span>
                @else
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="{{ __('pagination.previous') }}">
                        <i class="h-4 w-4" data-lucide="chevron-left"></i>
                    </a>
                @endif
            </li>
            {{-- Previous Page Link --}}
            {{-- Tree Dots --}}
            @if ($paginator->currentPage() - 1 > 1)
                <li class="page-item">
                    <span class="page-link !cursor-default">...</span>
                </li>
            @endif
            {{-- Tree Dots --}}
            {{-- Prev current Page Link --}}
            @if (!$paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1) }}">
                        {{ $paginator->currentPage() - 1 }}
                    </a>
                </li>
            @endif
            {{-- Prev current Page Link --}}
            {{-- Current Page Link --}}
            <li class="page-item active" aria-current="page">
                <span class="page-link !cursor-default">
                    {{ $paginator->currentPage() }}
                </span>
            </li>
            {{-- Current Page Link --}}
            {{-- Next current Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}">
                        {{ $paginator->currentPage() + 1 }}
                    </a>
                </li>
            @endif
            {{-- Next current Page Link --}}
            {{-- Tree Dots --}}
            @if ($paginator->lastPage() - $paginator->currentPage() > 1)
                <li class="page-item">
                    <span class="page-link !cursor-default">...</span>
                </li>
            @endif
            {{-- Tree Dots --}}
            {{-- Next Page Link --}}
            <li class="page-item">
                @if ($paginator->hasMorePages())
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="{{ __('pagination.next') }}">
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                @else
                    <span class="page-link !cursor-default !text-slate-500" aria-disabled="true"
                        aria-label="{{ __('pagination.next') }}">
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </span>
                @endif
            </li>
            {{-- Next Page Link --}}
            {{-- Last Page Link --}}
            <li class="page-item">
                @if ($paginator->hasMorePages())
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="last"
                        aria-label="{{ __('pagination.last') }}">
                        <i class="h-4 w-4" data-lucide="chevrons-right"></i>
                    </a>
                @else
                    <span class="page-link !cursor-default !text-slate-500" aria-disabled="true"
                        aria-label="{{ __('pagination.last') }}">
                        <i class="h-4 w-4" data-lucide="chevrons-right"></i>
                    </span>
                @endif
            </li>
            {{-- Last Page Link --}}
        </ul>
    </nav>
@endif
