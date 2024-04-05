<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        $data = Order::with('orderdetails')->get();
        return view('order.index',compact('data'));
    }
}
