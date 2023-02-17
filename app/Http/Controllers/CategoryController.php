<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('type') == 'nonfiction') {
            $categories = Category::where('type', 1)->get();
        }else{
            $categories = Category::where('type', 0)->get();
        }

        $page_title = "Category";
        $sub_title = "List of Categories"; 

        return view('category.index', compact('page_title', 'sub_title', 'categories'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Category";
        $sub_title = "Create New Category";

        return view('category.create', compact('page_title', 'sub_title'));
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
            'categoryname' => 'required',
            'type' => 'required'
        ]);

        Category::create([
            'categoryname' => $request->categoryname,
            'type' =>  $request->type
        ]);

        if ($request->type == 0) {
            return redirect(route('category.index').'?type=fiction')->with('toast_success', 'Category Created Successfully!');
        }else{
            return redirect(route('category.index').'?type=nonfiction')->with('toast_success', 'Category Created Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $page_title = "Category";
        $sub_title = "Edit Category";

        return view('category.edit', compact('page_title', 'sub_title', 'category'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'categoryname' => 'required',
            'type' => 'required'
        ]);

        $category->update([
            'categoryname' => $request->categoryname,
            'type' =>  $request->type
        ]);

        if ($request->type == 0) {
            return redirect(route('category.index').'?type=fiction')->with('toast_success', 'Category Updated Successfully!');
        }else{
            return redirect(route('category.index').'?type=nonfiction')->with('toast_success', 'Category Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('toast_success', 'Category Deleted Successfully');
    }
}
