<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->has('search')){
            $publishers = Publisher::where('publishername', 'LIKE', '%' .$request->search.'%')->orWhere('publisheremail', 'LIKE', '%' .$request->search.'%')->orWhere('publisheraddress', 'LIKE', '%' .$request->search.'%')->paginate(2);

        }else{
            $publishers = Publisher::paginate(2);

        }

        $page_title = "Publisher";
        $sub_title = "List of Publishers";       
        
        return view('publisher.index', compact('page_title', 'sub_title',  'publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Publisher";
        $sub_title = "Create New Publisher";

        return view('publisher.create', compact('page_title', 'sub_title'));
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
            'publishername' => 'required',
            'publisheremail' => 'required',
            'publisheraddress' => 'required',
        ]);

        Publisher::create([
            'publishername' => $request->publishername,
            'publisheremail' => $request->publisheremail,
            'publisheraddress' =>  $request->publisheraddress
        ]);

        return redirect()->route('publisher.index')->with('toast_success', 'Publisher Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        $page_title = "Publisher";
        $sub_title = "Edit Publisher";

        return view('publisher.edit', compact('page_title', 'sub_title', 'publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'publishername' => 'required',
            'publisheremail' => 'required',
            'publisheraddress' => 'required',
        ]);


        $publisher->update([
            'publishername' => $request->publishername,
            'publisheremail' => $request->publisheremail,
            'publisheraddress' =>  $request->publisheraddress
        ]);

        return redirect()->route('publisher.index')->with('toast_success', 'Publisher Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return back()->with('toast_success', 'Publisher Deleted Successfully.');
    }
}
