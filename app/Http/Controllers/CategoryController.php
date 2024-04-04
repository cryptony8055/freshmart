<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

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
        $url = '';
        $image = $request->file('image');
        //   dd($image);
        if($image){
            $path = $image->store('catagoryImage', 'public');
            $url = $path;
        }
        // dd($url);
        // dd(Auth::user()->id);
        $category = new Category();
        $category->name = $request->inputCategoryName;
        $category->image_url = $url;
        $category->created_by = Auth::user()->id;
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
        $url='';
        $image = $request->file('image');
        if($image){
            // dd($images);
            $path = $image->store('image', 'public');
            $url = $path;
        }
        $category = Category::find($id);
        $loggedInUser = auth()->user();
        $category->name = $request->inputCategoryName;
        if($url != ''){
            $category->image_url = $url;
        }

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
