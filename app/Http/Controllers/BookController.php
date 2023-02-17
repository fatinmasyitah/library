<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $books = Book::paginate(8);
        $page_title = "Book";
        $sub_title = "Create New Book";

        return view('book.index', compact('page_title', 'sub_title', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Book";
        $sub_title = "Create New Book";
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();

        return view('book.create', compact('page_title', 'sub_title', 'categories', 'publishers', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryID' => 'required',
            'publisherID' => 'required',
            'authorID' => 'required',
            'booktitle' => 'required',
            'type' => 'required',
            'bookweight' => 'required',
            'description' => 'required',
            'bookimage' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

        $image = $request->file('bookimage');
        $path = 'uploads/book/';

        Book::create([
            'categoryID' => $request->categoryID,
            'publisherID' => $request->publisherID,
            'authorID' => $request->authorID,
            'booktitle' => $request->booktitle,
            'type' => $request->type,
            'bookweight' => $request->bookweight,
            'description' => $request->description,
            'bookimage' => uploadImage($image, $path),
            'status' => $request->status,
        ]);

        return redirect()->route('book.index')->with('toast_success', 'Book Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $page_title = "Book";
        $sub_title = "Edit Book";
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();

        return view('book.edit', compact('page_title', 'sub_title', 'categories', 'publishers', 'authors', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'categoryID' => 'required',
            'publisherID' => 'required',
            'authorID' => 'required',
            'booktitle' => 'required',
            'type' => 'required',
            'bookweight' => 'required',
            'description' => 'required',
            'bookimage' => 'mimes:jpg,jpeg,png',
            'status' => 'required',
        ]);

        if ($request->hasFile('bookimage')) {
            $image = $request->file('bookimage');
            $path = 'uploads/book/';
            $old_path = public_path($book->bookimage);
        }


        $book->update([
            'categoryID' => $request->categoryID,
            'publisherID' => $request->publisherID,
            'authorID' => $request->authorID,
            'booktitle' => $request->booktitle,
            'type' => $request->type,
            'bookweight' => $request->bookweight,
            'description' => $request->description,
            'bookimage' => $request->hasFile('bookimage') ? uploadImage($image, $path, $old_path):$book->bookimage,
            'status' => $request->status,
        ]);

        return redirect()->route('book.index')->with('toast_success', 'Book Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if (file_exists(public_path($book->bookimage))) {
            unlink(public_path($book->bookimage));
        }
        $book->delete();
        return back()->with('toast_success', 'Book Deleted Successfully.');
    }
}
