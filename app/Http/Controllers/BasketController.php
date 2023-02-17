<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addBasket($book, $user)
    {


        Basket::create([

            'userID' => $user,
            'bookID' => $book,
            'quantity' => 1

        ]);

        return back()->with('success', 'Book added to basket!');

    }

    public function getBasket($user)
    {

        $baskets = Basket::where('userID', $user)->get();

        return view('frontend.basket', compact('baskets'));

    }

    public function destroy(Basket $basket, $user)
    {
        $basket->delete();

        return redirect(route('getBasket', $user))->with('success', 'Book removed from basket!');
    }
}
