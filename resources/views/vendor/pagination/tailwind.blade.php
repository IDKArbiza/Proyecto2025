@if ($paginator->hasPages())
    @php
        // Si no se pasa un nombre de paginador, usar 'page' por defecto
        $pageName = $pageName ?? 'page';
    @endphp

    <div class="flex justify-between items-center mt-4 text-sm text-gray-700">
        {{-- Botón Anterior --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded">Anterior</span>
        @else
            <button
                wire:click="previousPage('{{ $pageName }}')"
                class="px-4 py-2 bg-indigo-600 text-black rounded hover:bg-indigo-700 transition-colors duration-200"
            >
                Anterior
            </button>
        @endif

        {{-- Página actual / total --}}
        <span class="px-4 py-2 text-gray-700">
            Página {{ $paginator->currentPage() }} de {{ $paginator->lastPage() }}
        </span>

        {{-- Botón Siguiente --}}
        @if ($paginator->hasMorePages())
            <button
                wire:click="nextPage('{{ $pageName }}')"
                class="px-4 py-2 bg-indigo-600 text-black rounded hover:bg-indigo-700 transition-colors duration-200"
            >
                Siguiente
            </button>
        @else
            <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded">Siguiente</span>
        @endif
    </div>
@endif
