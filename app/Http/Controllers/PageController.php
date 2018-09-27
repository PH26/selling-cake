<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Slide;
use App\Category;
use App\Product;
use App\User;

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
        // view()->share('searchProducts', $searchProducts);
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

}
