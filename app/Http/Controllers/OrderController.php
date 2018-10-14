<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Category;
use App\Product;
use App\User;
use Cart;
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
        if (!Auth::check()){
            return redirect()->back()->with('warning', 'You must login to process checkout');
        } else {
            request()->validate([
                'payment' => 'required',
                ]);

            $orders = new Order;
            $orders->user_id = Auth::user()->id;
            $orders->date_order = date('Y-m-d');
            $orders->payment = $request->payment;
            $orders->note = $request->note;
            $orders->save();


            foreach (Cart::content() as $cart) {
                $oderDetails = new OrderDetail;
                $oderDetails->order_id = $orders->id;
                $oderDetails->product_id = $cart->id;
                $oderDetails->quantity = $cart->qty;
                $oderDetails->price = ($cart->price/$cart->qty);
                $oderDetails->save();
            }
            $request->session()->forget('cart');
            return redirect()->back()->with('notification', 'The order is saved');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders= Order::with(['users','orderDetails.products'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::find($id);
        return view('admin.orders.edit', compact('orders'));
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
        $changeStatus = Order::find($id);
        $changeStatus->status = $request->status;
        $changeStatus->save();
        return redirect('admin/order/index')->with('notification','The order changed status successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $orderDetails = OrderDetail::all();
        foreach ($orderDetails as $orderDetail)
        {
            if ( !$orderDetail->isCommittedToOrders() )
            {
                $orderDetail->delete();
            }
        }
        Order::destroy($id);
        return redirect('admin/order/index')->with('notification','The order deleted successfully');
    }
}
