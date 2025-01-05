<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::simplePaginate(10);
        $orders_count = Order::all()->count();
        return view('pages/ecommerce/orders', compact('orders', 'orders_count'));  
    }
}
