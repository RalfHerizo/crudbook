<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Interfaces\BookRepositoryInterface;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository){
        $this->bookRepository = $bookRepository;
    }

    public function index(){
        $books = $this->bookRepository->getAll();
        return view('books.index', compact('books'));
    }
    
    public function store(StoreBookRequest $request){
        
        $validate_data = $request->validated();

        $this->bookRepository->create($validate_data);
        return redirect()->back()->with('success','Live créé !');
    }

    public function show($id){
        $book = $this->bookRepository->getById($id);
        return view('books.show',compact('book'));
    }
    
    public function update($id, StoreBookRequest $request){
        
        $validate_data = $request->validated();
        $this->bookRepository->update( $id , $validate_data );

        return redirect()->back()->with('success','Livre mis à jour!');
    }

    public function destroy($id){
        $this->bookRepository->delete($id);
        return back()->with('success', 'Livre supprimé !');
    }
}
