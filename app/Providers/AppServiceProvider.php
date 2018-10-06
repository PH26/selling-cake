<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart;
use Session;
use App\Category;
use App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
            $bestsellers = Product::where('promote_price', '<>', 0)->take(4)->get();
            $view->with('bestsellers', $bestsellers);
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => Session::get('cart'),
                             'product_cart' => $cart->items,
                             'totalPrice' => $cart->totalPrice,           'totalQty' => $cart->totalQty]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
