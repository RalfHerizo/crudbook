@props(['status','errors'=>[]])

@php
    $show = ($status == 'success' && session('success')) || ($status == 'danger' && count($errors) > 0);
@endphp

@if($show)
    <div id="alert-3"
        {{ $attributes->class(
            [
                "absolute z-99 w-full flex sm:items-center p-4 mb-4 text-sm  rounded-base ",
                "bg-success-soft text-fg-success-strong" => $status == "success",
                "bg-danger-soft text-fg-danger-strong" => $status == "danger",
            ]) 
        }}
        role="alert">
        <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span class="sr-only">Ajout de livre</span>
        <div class="ms-2 text-sm ">
            @if ($status == "success")            
                {{ session($status) }}
            @else
                <ul>
                    @foreach ( $errors as $error )
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <button type="button"
            {{ $attributes->class(
                [
                    "ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2  p-1.5  inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0",
                    "hover:bg-success-medium focus:ring-success-medium" => $status == "success",
                    "hover:bg-danger-medium focus:ring-danger-medium" => $status == "danger",
                ]) 
            }}
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
        </button>
    </div>
@endif
