<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart;
use Session;

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
		
       view()->composer('page.header',function($view){
			if(Session('cart')){
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
			
			$view->with(['cart'=>Session::get('cart'), 
			'product_cart'=>$cart->items,
			'totalPrice'=>$cart->totalPrice,
			'totalQty'=>$cart->totalQty]);
			}
		});
		view()->composer('page.chitietmypham',function($view){
			if(Session('cart')){
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
			
			$view->with(['cart'=>Session::get('cart'), 
			'product_cart'=>$cart->items,
			'totalPrice'=>$cart->totalPrice,
			'totalQty'=>$cart->totalQty]);
			}
		});
		view()->composer('page.dathang',function($view){
			if(Session('cart')){
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
			
			$view->with(['cart'=>Session::get('cart'), 
			'product_cart'=>$cart->items,
			'totalPrice'=>$cart->totalPrice,
			'totalQty'=>$cart->totalQty,
			'thanhtien'=>$cart->thanhtien]);
			}
		});
		view()->composer('page.giohang',function($view){
			if(Session('cart')){
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
			
			$view->with(['cart'=>Session::get('cart'), 
			'product_cart'=>$cart->items,
			'totalPrice'=>$cart->totalPrice,
			'totalQty'=>$cart->totalQty,
			'thanhtien'=>$cart->thanhtien]);
			}
		});
		
    }
}
