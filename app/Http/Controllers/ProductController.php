<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with('createdUser:id,name')->orderby('id')->get();
        return view('product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('product.addProduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputProductPrice' => 'required',
            'inputProductName' => 'required',
            'inputProductDescription' => 'required',
        ]);
        $loggedInUser = auth()->user();
        $userName = $loggedInUser->id;
        $product = new Product();
        $product->catagory_id = 1;
        $product->product_price = $request->inputProductPrice;
        $product->product_name = $request->inputProductName;
        $product->description = $request->inputProductDescription;
        $product->catagory_id = $request->selectCategoryId;
        $product->created_by = $userName;
        $product->save();
        return Redirect::route('product.create')->with('status', 'product-added-successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // $data = Product::all();
        // return view('product.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('product.edit',compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'inputProductPrice' => 'required',
            'inputProductName' => 'required',
            'inputProductDescription' => 'required',
            'selectCategoryId' => 'required',
        ]);

        $product = Product::find($id);
        $loggedInUser = auth()->user();
        $product->updated_by = $loggedInUser->id;
        $product->product_name = $request->inputProductName;
        $product->product_price = $request->inputProductPrice;
        $product->catagory_id = $request->selectCategoryId;
        $product->description = $request->inputProductDescription;
        $product->update();
        return Redirect::route('product.edit',[$id])->with('status', 'product-updated-successfully');
    }

    public function destroy(Request $request,$id)
    {
        //deletes product
        $product = Product::findOrFail($id);
        $product->delete();
        return Redirect::route('product.index')->with('status', 'product-deleted-successfully');
    }

    public function toggleStatus($id){
        //updates status
        $product = Product::findOrFail($id);
        $product->status = !$product->status;
        $product->update();
        return response()->json(['status' => $product->status]);
    }
}
