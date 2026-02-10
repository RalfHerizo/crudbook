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

    public function index(Request $request){
        
        $search = $request->search;
        $books = $this->bookRepository->getPaginated(5, $search);

        return view('books.index', compact('books'));
    }
    
    public function store(StoreBookRequest $request){
        
        $validate_data = $request->validated();

        $this->bookRepository->create($validate_data);
        return redirect()->route('books.index')->with('success','Live créé avec succès!');
    }

    public function show($id){
        $book = $this->bookRepository->getById($id);
        return view('books.show',compact('book'));
    }
    
    public function update($id, StoreBookRequest $request){
        
        $validate_data = $request->validated();
        $this->bookRepository->update( $id , $validate_data );

        return redirect()->route('books.index')->with('success','Livre mis à jour avec succès!');
    }

    public function destroy($id){
        $this->bookRepository->delete($id);
        return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès!');
    }

    public function truncate(){
        $this->bookRepository->truncate();
        return redirect()->route('books.index')->with('success', 'Tous livres sont supprimés avec succès !');
    }
}
