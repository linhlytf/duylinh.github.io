<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\type_products;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        //truyền 1 phần của trang trong trường hợp là header
        view()->composer('website.header',function($view){
            $type_products = type_products::all();
            $view->with('type_products',$type_products);
        });

        view()->composer(['website.header','website.dathang'],function($view){
            if(Session('cart'))
            {
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with(['cart'=>Session::get('cart'),
                    'product_cart'=>$cart->items,
                    'totalprice'=>$cart->totalPrice,
                    'totalqty'=>$cart->totalQty]);
            }
        });
    }

}