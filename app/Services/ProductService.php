<?php
namespace App\Services;

use DB;

class ProductService
{
   public function ajaxProductSearch($query)
   {
        $products =  DB::table('products')
            ->select('id', 'name', 'description', 'image', 'unit_price', 'promote_price')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
        return $products;
   }
}