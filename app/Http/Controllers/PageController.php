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
use App\Cart;
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
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDeleteItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getViewCart()
    {
        return view('frontend.pages.cart');
    }

    // public function changeQty(Request $request)
    // {

    //     if($request->ajax()){
    //         \Log::info('message'.$request->get('id').'qty'.$request->get('qty'));

    //         $id = $request->get('id');
    //         $qty = $request->get('qty');
    //         $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     \Log::info('message'.$request->get('id').'qty'.$request->get('qty').'cart'.json_encode($oldCart));

    //         if(empty($oldCart)){
    //             \Log::info('not have sess');
    //         }
    //         // dd($oldCart);exit();
    //         // if (empty($oldCart)) {
    //         //     return json_encode(['not ok']);
    //         // } else {
    //         //     return json_encode($oldCart);
    //         // }
    //         // dd(Session::has('cart'), $oldCart);

    //         $cart = new Cart($oldCart);
    //         $cart->update($id, $qty);
    //         $request->session()->put('cart', $cart);
    //         // return redirect()->back();
    //         return json_encode(['ok']);
    //     }
    // }

    public function showLoginForm()
    {
            return view('frontend.pages.login');
    }

    public function login(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            // 'role' => 0
        ];
        if(Auth::attempt($login)){
            return redirect('user/profile');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function userProfile()
    {
        return view('frontend.users.profile');
    }

}
