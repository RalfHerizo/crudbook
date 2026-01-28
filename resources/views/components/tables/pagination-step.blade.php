@props(['position'=>'left'])
<a href="#"
    {{ $attributes->class([
        'flex items-center justify-center h-full py-1.5 px-3 text-gray-500 bg-white  border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white',
        'rounded-l-lg  ml-0'=> $position==="left",
        'rounded-r-lg leading-tight'=> $position==="right",
        ]) }}>
    {{ $slot }}
</a>
