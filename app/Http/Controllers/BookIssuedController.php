<?php

namespace App\Http\Controllers;

use App\Models\Proceed;
use App\Models\Basket;
use App\Mail\BookStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookIssuedController extends Controller
{
    public function index()
    {
        $page_title = "Book Issued";
        $sub_title = "Book Issued List";
        $proceeds = Proceed::all();
        $baskets = Basket::all();

        return view('bookissued.index', compact('page_title', 'sub_title', 'proceeds', 'baskets'));
    }

    public function confirmation($type, Proceed $proceed)
    {
        if ($type == 'accept') {
            $data = [
                'title' => 'e-library.com',
                'message' => 'Hi, '. $proceed->name .' Your request has confirmed! Enjoy your reading!'
            ];

            $proceed->bookstatus = 1;
            $proceed->update();

            Mail::to($proceed->email)->send(new BookStatus($data));
            return back()->with('toast_success', "Request Approved!");
        }

        $data = [
            'title' => 'e-library.com',
            'message' => 'Hi, '. $proceed->name .' Your request has disapproved/cancelled, please go to counter section!'
        ];
        $proceed->bookstatus = 2;
        $proceed->update();
        Mail::to($proceed->email)->send(new BookStatus($data));
        return back()->with('toast_success', "Request Cancelled!");
    }

    // public function delete(Proceed $proceed)
    // {
    //     $proceed->details->each->delete();
    //     $proceed->delete();

    //     return back()->with('toast_success', "Item Deleted Successfully!");
    // }

    public function edit(Proceed $proceed)
    {
        $page_title = "Author";
        $sub_title = "Edit Author";

        return view('bookissued.edit', compact('page_title', 'sub_title', 'proceed'));
    }
}
