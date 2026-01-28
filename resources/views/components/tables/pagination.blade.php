<ul class="inline-flex items-stretch -space-x-px">
    <li>
        <x-tables.pagination-step>
            <span class="sr-only">Previous</span>
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </x-tables.pagination-step>
    </li>
    <li>
        <x-tables.pagination-button >1</x-tables.pagination-button>
    </li>
    <li>
        <x-tables.pagination-button >2</x-tables.pagination-button>
    </li>
    <li>
        <x-tables.pagination-button aria-current="page" :isActive=true>3</x-tables.pagination-button>
    </li>
    <li>
        <x-tables.pagination-button >...</x-tables.pagination-button>
    </li>
    <li>
        <x-tables.pagination-button >100</x-tables.pagination-button>
    </li>
    <li>
        <x-tables.pagination-step position="right" >
            <span class="sr-only">Next</span>
            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </x-tables.pagination-step>
    </li>
</ul>