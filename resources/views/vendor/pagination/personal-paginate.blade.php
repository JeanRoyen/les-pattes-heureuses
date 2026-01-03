@if ($paginator->hasPages())
    <nav class="flex items-center justify-center gap-2 mt-6">

        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 rounded-lg bg-gray-300 text-gray-500 cursor-not-allowed">
                ←
            </span>
        @else
            <button
                wire:click="previousPage"
                class="px-3 py-1 rounded-lg transition"
            >
                ←
            </button>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-1 rounded-lg bg-cta-orange text-white font-semibold">
                            {{ $page }}
                        </span>
                    @else
                        <button
                            wire:click="gotoPage({{ $page }})"
                            class="px-4 py-1 rounded-lg bg-orange-900 hover:bg-hover transition text-white"
                        >
                            {{ $page }}
                        </button>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <button
                wire:click="nextPage"
                class="px-3 py-1 rounded-lg transition"
            >
                →
            </button>
        @else
            <span class="px-3 py-1 rounded-lg bg-gray-300 text-gray-500 cursor-not-allowed">
                →
            </span>
        @endif
    </nav>
@endif
