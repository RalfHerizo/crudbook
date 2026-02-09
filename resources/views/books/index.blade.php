@extends('layouts.app')

@section('content')
    <!-- Start block -->
    <section class="bg-desert-sand/25 dark:bg-gray-900 h-screen p-3 sm:p-5 antialiased">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-toasted-almond dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                
                {{-- Alert sections --}}
                <x-tables.alert status="success" />
                <x-tables.alert status="danger" :errors="$errors->all()"/>
                
                
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <x-search />
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <x-actions-buttons />
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <x-tables.main :books="$books" />
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <x-tables.pagination :model="$books" />
                </nav>
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Create modal -->
    <x-tables.create-modal id="createProductModal" title="Ajouter un livre" />
    <!-- Update modal -->
    <x-tables.update-modal id="updateProductModal" title="Mettre à jour les informations du livre" />
    <!-- Read modal -->
    <x-tables.preview-modal id="readProductModal" title="Détails du livre" />
    <!-- Delete modal -->
    <x-tables.delete-modal id="deleteModal" title="Voulez-vous supprimer ce livre?" action=""/>
    <x-tables.delete-modal id="deleteAllModal" title="Voulez-vous tout supprimer?" action=""/>
    
@endsection
