@props(['id','title'])

<x-modal-layout id="{{ $id }}" title="{{ $title }}">
    <form method="POST" action="">
        @csrf
        <div class="grid gap-4 mb-4 sm:grid-cols-2">
            <div>
                <label for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                <input id="data-title-edit-modal-book" type="text" name="title" id="title"
                    value="Harry Potter à l'école des sorciers"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Ex. Apple iMac 27&ldquo;">
            </div>
            <div>
                <label for="author"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Auteur</label>
                <input id="data-title-author-modal-book" type="text" name="author" id="author"
                    value=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Ex. Apple">
            </div>
            <div class="sm:col-span-2"><label for="data-title-description-modal-book"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="data-title-description-modal-book" name="description" rows="5"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Write a description..."></textarea>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <button type="submit"
                class="text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary-soft shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Mettre à jour
            </button>
        </div>
    </form>
</x-modal-layout>