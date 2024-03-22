<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class userController extends Controller
{

    public function index()
    {
        $data = Category::where('status',true)->pluck('name','id')->toArray();
        // dd($data);
        return view('user',compact('data'));
    }
}
