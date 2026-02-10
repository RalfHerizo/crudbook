<?php

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('welcome_page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('Add book TEST', function(){
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

test('Looking for a book TEST', function(){
    Book::create([
        'title'=> 'Harry Potter',
        'author'=> 'J.K. Rowling',
        'description'=> 'Un sorcier célèbre',
    ]);

    Book::create([
        'title' => 'Le Hobbit',
        'author' => 'J.R.R. Tolkien',
        'description' => 'Une aventure en Terre du Milieu'
    ]);

    $response = $this->get(route('books.index',['search'=>'Harry']));

    $response->assertStatus(200);
    $response->assertSee('Harry');
    $response->assertDontSee('Le Hobbit');

});
