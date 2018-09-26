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
        view()->share('categories', $categories);
        view()->share('slides', $slides);
    }

    public function homepage()
    {
        $products = Product::where('promote_price', '<>', 0)->take(4)->get();
        return view('frontend.pages.homepage',compact('products'));
    }

    public function category()
    {
        $products = Product::paginate(6);
        $bestsellers = Product::where('promote_price', '<>', 0)->take(3)->get();
        return view('frontend.pages.category', compact('products', 'bestsellers'));
    }
}
