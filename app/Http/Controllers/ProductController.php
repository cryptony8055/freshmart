<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.addProduct');
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
        $product->created_by = $userName;
        $product->save();
        return Redirect::route('product.create')->with('status', 'product-added-successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
