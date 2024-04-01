<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class userController extends Controller
{

    public function index()
    {
        $data = Category::where('status',true)->pluck('name','id')->toArray();
        // dd($data);
        return view('user',compact('data'));
    }

    public function userslisting()
    {
        $data = User::select('id','name','email','created_at')->get();
        // dd($data);
        return view('users.usersindex',compact('data'));
    }
}
