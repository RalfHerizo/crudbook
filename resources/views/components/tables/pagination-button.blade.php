@props(['isActive'=>false])
<a href="#"
    {{ $attributes->class([
        'flex items-center justify-center text-sm py-2 px-3 leading-tight   border hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white',
        'bg-powder-bush border-powder-bush' => $isActive,
        'border-gray-300 bg-white text-gray-500' => !$isActive,
    ]) }}>
    {{ $slot }}
</a>