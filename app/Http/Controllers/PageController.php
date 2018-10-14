<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Slide;
use App\Category;
use App\Product;
use App\User;
use App\Order;
use App\OrderDetail;
use Cart;
use Session;
use Mail;

class PageController extends Controller
{

    public function homepage()
    {
        $slides = Slide::all();
        $products = Product::where('promote_price', '<>', 0)->take(4)->get();
        return view('frontend.pages.homepage',compact('products', 'slides'));
    }

    public function allProduct()
    {
        $products = Product::paginate(6);
        return view('frontend.pages.allproduct', compact('products'));
    }

    public function category($id)
    {
        $products = Product::where('category_id', $id)->paginate(3);
        return view('frontend.pages.category', compact('products'));
    }

    public function product($id)
    {
        $products = Product::where('id', $id)->get();
        return view('frontend.pages.product',compact('products'));
    }
    //Function for Cart
    public function getAddToCart($id)
    {
        $product = Product::where('id', $id)->first();
        $cart = Cart::add(['id' => $id, 'name' => $product->name, 'qty' => 1,
                    'price' => $product->promote_price == 0 ?   $product->unit_price : $product->promote_price ,
                    'options' => ['image' => $product->image]]);
        return redirect()->back();
    }

    public function getDeleteItemCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function getViewCart()
    {
        return view('frontend.pages.cart');
    }

    public function changeQty(Request $request)
    {
        if ($request->ajax()){
            $id = $request->get('id');
            $qty = $request->get('qty');
            Cart::update($id, $qty);
            echo 'ok';
        }
    }

    public function userProfile()
    {
        return view('frontend.users.profile');
    }

    public function changeUserProfile(Request $request,$id)
    {
        request()->validate([
            'email' => 'email|unique:users,email',
            'phone' => 'numeric',
            'confirm_password' => 'same:password'
            ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->back()->with('notification','Your profile is saved');
    }

    public function userOrder()
    {
        $orders= Auth::user()->orders;
        return view('frontend.users.order', compact('orders'));
    }

    public function deleteOrder($id)
    {
        $orders= Auth::user()->orders;
        $orderDetails = OrderDetail::all();
        foreach ($orderDetails as $orderDetail)
        {
            if ( !$orderDetail->isCommittedToOrders() )
            {
                $orderDetail->delete();
            }
        }
        Order::destroy($id);
        return redirect('user/order')->with('notification','Your order deleted successfully');
    }
}
