<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Proceed;
use Illuminate\Http\Request;


class ProceedController extends Controller
{
    public function proceed(Request $request, $user)
    {

        $request->validate([
            

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal' => 'required',
            'date' => 'required'

        ]);

        $proceed = Proceed::create([

            'userID' => $user,
            'basketID' => $basket,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal' => $request->postal,
            'date' => $request->date,
            'bookstatus' => 0,

        ]);


        return redirect(route('home'))->with('success', "Your book is being processed, please be patient, thank you.");

    }
}
