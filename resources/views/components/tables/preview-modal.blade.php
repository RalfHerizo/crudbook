@props(['id', 'title'])

<x-modal-layout id="{{ $id }}" title="{{ $title }}">
    <div class="">
        <!-- Modal header -->
        <div class="flex justify-between mb-4 rounded-t sm:mb-5">
            <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                <h3 id="read-modal-book-title" class="font-semibold "></h3>
                <p id="read-modal-book-author" class="font-bold"></p>
            </div>
        </div>
        <dl>
            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Description</dt>
            <dd id="read-modal-book-description" class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"></dd>
        </dl>
    </div>
</x-modal-layout>
