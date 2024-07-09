<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        
        return view('book.home', ['books'=> $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('book.addbook');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required',
            'author'=> 'required',
            'isbn'=> 'nullable',
            'pages'=> 'required',
            
        ]);
        
        //

        Book::create($data);

        return redirect()->route('book.home')->with('success','Book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view('book.edit', ['book'=> $book]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'author'=> 'required',
            'isbn'=> 'nullable',
            'pages'=> 'required',
            
        ]);

        $book -> update($data);
        return redirect()->route('book.home')->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route('book.home')->with('success','Book deleted successfully');
    }
}
