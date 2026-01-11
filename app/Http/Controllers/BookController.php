<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Interfaces\BookRepositoryInterface;

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
    
    public function store(Request $request){
        $details = $request->only(['title','author','description']);
        $this->bookRepository->create($details);
        return redirect()->back()->with('success','Live créé !');
    }

    public function show($id){
        $book = $this->bookRepository->getById($id);
        return view('books.show',compact('book'));
    }
    
    public function udpate($id, Request $request){
        $details = $request->only(['title','author', 'description']);
        $this->bookRepository->udpate( $id , $details );
    }

    public function destroy($id){
        $this->bookRepository->delete($id);
        return back()->with('success', 'Livre supprimé !');
    }
}
