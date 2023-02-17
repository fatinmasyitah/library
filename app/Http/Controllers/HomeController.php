<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->limit(4)->get();

        return view('home', compact('books'));
    }

    public function book()
    {
        $books = Book::orderBy('id', 'DESC')->get();

        return view('frontend.book', compact('books'));
    }

    public function getBook(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();

        return view('frontend.details', compact('book', 'categories', 'publishers', 'authors'));
    }

}
