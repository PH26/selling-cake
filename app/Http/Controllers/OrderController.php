<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Product;
use App\User;
use App\Cart;
use App\Order;
use App\OrderDetail;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $categories = Category::all();
        $bestsellers = Product::where('promote_price', '<>', 0)->take(4)->get();
        // $searchProducts = Product::where('name', 'like', "%$keyword%")->take(4)->get();
        view()->share('categories', $categories);
        view()->share('bestsellers', $bestsellers);
    }

    public function getCheckOut()
    {
        return view('frontend.pages.checkout');
    }

    public function postCheckOut(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'payment' => 'required',
            'confirm_password' => 'required|same:password'

            ]);
        $user = new User;
        $user = User::create($request->only('name', 'password', 'phone', 'address', 'email', 'role', 'active'));

        $orders = new Order;
        $orders->user_id = $user->id;
        $orders->date_order = date('Y-m-d');
        $orders->payment = $request->payment;
        $orders->note = $request->note;
        $orders->save();

        $cart = Session::get('cart');
        foreach ($cart->items as $key => $value) {
            $oderDetails = new OrderDetail;
            $oderDetails->order_id = $orders->id;
            $oderDetails->product_id = $key;
            $oderDetails->quantity = $value['qty'];
            $oderDetails->price = ($value['price']/$value['qty']);
            $oderDetails->save();
        }
        $request->session()->forget('cart');
        return redirect()->back()->with('notification', 'The order is saved');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $orderDetails = OrderDetail::all();
        return view('admin.order', compact('orders', 'orderDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
