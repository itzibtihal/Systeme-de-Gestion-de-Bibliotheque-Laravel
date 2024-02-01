<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view ('books.index',['books'=>$books]);
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'image' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'publication_year' => 'required',
            'total_copies' => 'required|numeric',
            'available_copies' => 'required|numeric',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
    
        $data = $request->except('image'); // Exclude image from the main data array
        $data['image'] = $imagePath;
    
        $newBook = Book::create($data);
    
        return redirect(route('book.index'));
    }
    

    public function edit(Book $book){
        //  dd($book);
        return view('books.edit',['book' => $book]);
    }

    public function update(Book $book ,Request $request){
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'publication_year' => 'required',
            'total_copies' => 'required|numeric',
            'available_copies' => 'required|numeric',
            
        ]);

        $book->update($data);

        return redirect(route('book.index'))->with('success','book updated succesffully!');
    }

    public function destroy(Book $book){
        $book->delete(); 
        return redirect(route('book.index'))->with('success', 'Book deleted successfully!');
    }
    
}
