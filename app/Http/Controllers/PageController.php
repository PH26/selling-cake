<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Slide;
use App\Category;
use App\Product;
use App\User;
use App\Cart;
use Session;

class PageController extends Controller
{
    function __construct()
    {
        $categories = Category::all();
        $slides = Slide::all();
        $bestsellers = Product::where('promote_price', '<>', 0)->take(4)->get();
        // $searchProducts = Product::where('name', 'like', "%$keyword%")->take(4)->get();
        view()->share('categories', $categories);
        view()->share('slides', $slides);
        view()->share('bestsellers', $bestsellers);
    }

    public function homepage()
    {
        $products = Product::where('promote_price', '<>', 0)->take(4)->get();
        return view('frontend.pages.homepage',compact('products'));
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

    public function changeQty(Request $request, $id, $qty)
    {
        if($request->ajax()){
            $id = Request::get('id');
            $qty = Request::get('qty');
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);
            if(count($cart->items) > 0){
                Session::put(['cart' =>  $cart, 'id' => $id, 'qty' => $qty]);
            }
            return redirect()->back();
            echo 'ok';
        }
    }
}
