<?php

namespace App\Http\Controllers\Backend;

use App\Models\Proceed;
use App\Models\Book;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $todayIssued = Proceed::whereDate('created_at', Carbon::today())->count();
        $totalBook = Book::all()->count();
        $pendingIssued = Proceed::where('bookstatus', 0)->count();
        $proceeds = Proceed::latest('created_at')->limit(5)->get();
        $books = Book::latest('created_at')->limit(5)->get();

        return view('dashboard', compact('todayIssued', 'totalBook', 'pendingIssued', 'proceeds', 'books'));
    }
}
