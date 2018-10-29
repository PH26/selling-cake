<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashBoard()
    {
        $user = User::all();
        $product = Product::all();
        $category = Category::all();
        $orders = Order::all();
        return view('admin.dashboard', compact('user', 'product', 'category','orders'));
    }


}
