@props(['book'=>null])
<button id="{{$book->id}}-dropdown-button"
    data-dropdown-toggle="{{$book->id}}-dropdown"
    class="inline-flex items-center text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 p-1.5 dark:hover-bg-gray-800 text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
    type="button">
    <svg class="w-5 h-5 fill-gray-50 group-hover:fill-blue-slate"
        aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
    </svg>
</button>