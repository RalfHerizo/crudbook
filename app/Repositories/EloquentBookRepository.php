<?php

namespace App\Repositories;

use App\Interfaces\BookrepositoryInterface;
use App\Models\Book;

class EloquentBookRepository implements BookrepositoryInterface
{
    public function getPaginated($perPage = 10){
        return Book::orderBy('created_at','desc')->paginate($perPage);
    }

    public function getAll(){
        return Book::orderBy('created_at','desc')->get();
    }

    public function getById($id){
        return Book::findOrFail($id);
    }

    public function create( array $data ){
        $book = Book::create($data);
    }

    public function update($id, array $data){
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function delete($id){
        $book = Book::destroy($id);
    }

    
}