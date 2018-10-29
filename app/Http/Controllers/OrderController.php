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
use Mail;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCheckOut()
    {
        return view('frontend.pages.checkout');
    }

    public function postCheckOut(Request $request)
    {
        // dd($request->all());
        if (!Auth::check()){
            return redirect()->back()->with('warning', 'You must login to process checkout');
        } else {
            $request->validate([
                'name' => 'sometimes|required',
                'email' => 'sometimes|required',
                'phone' => 'sometimes|required',
                'address' => 'sometimes|required',
                'payment' => 'required',
                ]);

            try {
                \DB::transaction(function () use ($request) {
                    $orders = new Order;
                    $orders->user_id = Auth::user()->id;
                    $orders->date_order = date('Y-m-d H:i:s');
                    $orders->payment = $request->payment;
                    $orders->note = $request->note;
                    $orders->save();

                    foreach (Cart::content() as $cart) {
                        $product= Product::where('id', $cart->id)->first();
                        if ($product->quantity >= $cart->qty) {
                            $oderDetails = new OrderDetail;
                            $oderDetails->order_id = $orders->id;
                            $oderDetails->product_id = $cart->id;
                            $oderDetails->quantity = $cart->qty;
                            $oderDetails->price = ($cart->price/$cart->qty);
                            $oderDetails->save();
                            DB::table('products')->where('id', $cart->id)->decrement('quantity', $oderDetails->quantity);
                            
                        } else {
                            throw new \Exception("Error Processing Request", 1);
                    }
                        //Send mail order successfully
                        $order_details = OrderDetail::where('order_id', $orders->id)->get();
                        $user = User::find($orders->user_id);
                        foreach ($order_details as $detail) {
                            $product = Product::find($detail->product_id);
                            $data = [
                                'name' => $user->name,
                                'email' => $user->email,
                                'productName' => $product->name,
                                'quantity' => $detail->quantity,
                                'price' => $detail->price
                            ];
                        }
                        // dd($datas);
                        Mail::send('emails.orders', $data, function($message) use ($data){
                            $message->to($data['email']);
                            $message->subject('Your order at Vanila Bakery');
                        });
                    }
                });
                
                $request->session()->forget('cart');
                
                return redirect()->back()->with('notification', 'The order is saved. Please checks mail to see your order!');
            } catch (\Exception $ex) {
                \DB::rollback();
                // dd($ex->getMessage());
                return redirect()->back()->with('warning', 'The order is error!');
            }

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

        //Send mail change status order
        $order_details = OrderDetail::where('order_id', $changeStatus->id)->get();
        $user = User::find($changeStatus->user_id);
        foreach ($order_details as $detail) {
            $product = Product::find($detail->product_id);
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'productName' => $product->name,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
                'status' => $changeStatus->status
            ];
        }
        // dd($data);
        Mail::send('emails.status-order', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject('Order Status');
        });
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
        //Send mail delete order 
        $order_details = OrderDetail::where('order_id', $order->id)->get();
        $user = User::find($order->user_id);
        foreach ($order_details as $detail) {
            $product = Product::find($detail->product_id);
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'productName' => $product->name,
                'quantity' => $detail->quantity,
                'price' => $detail->price,
            ];
        }
        // dd($data);
        Mail::send('emails.delete-order', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject('Order was deleted');
        });

        Order::destroy($id);
        return redirect('admin/order/index')->with('notification','The order deleted successfully');
    }
}
