<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('welcome_page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('Add book Test', function(){
    $book = Book::create([
        'title'=>'Juste un livre',
        'author'=>'test est author',
        'description'=>'Sera bientôt effacé',
    ]);

    $this->assertCount(1, Book::all());

    $response = $this->delete(route('books.delete', $book->id));

    $this->assertCount(0, Book::all());
    
    $response->assertRedirect(route('books.index'));
    $response->assertSessionHas('success', 'Livre supprimé avec succès!');
});
