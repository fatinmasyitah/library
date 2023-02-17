<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->has('search')){
            $authors = Author::where('authorname', 'LIKE', '%' .$request->search.'%')->paginate(2);

        }else{
            $authors = Author::paginate(2);

        }

        $page_title = "Author";
        $sub_title = "List of Authors";       
        
        return view('author.index', compact('page_title', 'sub_title',  'authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Author";
        $sub_title = "Create New Author";
        $publishers = Publisher::all();

        return view('author.create', compact('page_title', 'sub_title', 'publishers'));
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
            'publisherID' => 'required',
            'authorname' => 'required',
            'authorimage' => 'required|mimes:jpg,jpeg,png',
        ]);

        $image = $request->file('authorimage');
        $path = 'uploads/author/';

        Author::create([
            'publisherID' => $request->publisherID,
            'authorname' => $request->authorname,
            'authorimage' => uploadImage($image, $path)
        ]);

        return redirect()->route('author.index')->with('toast_success', 'Author Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $page_title = "Author";
        $sub_title = "Edit Author";
        $publishers = Publisher::all();

        return view('author.edit', compact('page_title', 'sub_title', 'publishers', 'author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'publisherID' => 'required',
            'authorname' => 'required',
            'authorimage' => 'mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('authorimage')) {
            $image = $request->file('authorimage');
            $path = 'uploads/author/';
            $old_path = public_path($author->authorimage);
        }

        $author->update([
            'publisherID' => $request->publisherID,
            'authorname' => $request->authorname,
            'authorimage' => $request->hasFile('authorimage') ? uploadImage($image, $path, $old_path):$author->authorimage,
        ]);

        return redirect()->route('author.index')->with('toast_success', 'Author Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if (file_exists(public_path($author->authorimage))) {
            unlink(public_path($author->authorimage));
        }
        $author->delete();
        return back()->with('toast_success', 'Author Deleted Successfully.');
    }
}