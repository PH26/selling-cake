<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function productSearch(Request $request)
    {
        if ($request->ajax()) {
            $find = Product::where('name', 'like', '%'.$request->search.'%')->get();
            return response()->json($find);
        }
    }

}
