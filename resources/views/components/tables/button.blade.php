@props(['book'=>null, 'modal'=>null])

<button 
    @if ($book && $modal !== "deleteModal")
        
        data-title="{{$book->title}}"
        data-author="{{$book->author}}"
        data-description="{{$book->description}}"
    @endif

{{ $attributes->class([
    
    'flex w-full items-center py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600',
    
    'text-gray-700 dark:hover:text-white dark:text-gray-200' => isset($book)
    
    ])->merge([
    
        'type'=>'button',
        'data-modal-target' => $modal,
        'data-modal-toggle' => $modal,
        'data-id'=> $book?->id
    
    ]) }}>
        
        {{ $slot }}

</button>
