<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::with('createdCategory:id,name')->get();
        return view('category.categoryindex',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputCategoryName' => 'required',
        ]);
        // $loggedInUser = auth()->user();
        // $userName = $loggedInUser->id;
        $userName = 1;
        $category = new Category();
        $category->name = $request->inputCategoryName;
        $category->created_by = $userName;
        $category->status = true;
        $category->save();
        return Redirect::route('category.create')->with('status', 'category-added-successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Category::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('category.categoryedit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'inputCategoryName' => 'required',
        ]);

        $category = Category::find($id);
        $loggedInUser = auth()->user();
        $category->name = $request->inputCategoryName;
        $category->update();
        return Redirect::route('category.index')->with('status', 'category-updated-successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return Redirect::route('category.index')->with('status', 'category-deleted-successfully');
    }
    public function toggleStatusCat($id){
        //updates status
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->update();
        return response()->json(['status' => $category->status]);
    }
}
