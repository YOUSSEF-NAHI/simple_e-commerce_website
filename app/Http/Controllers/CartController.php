<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Command;


class CartController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        
        $userCart = Cart::with('commands')->where('user_id',Auth::user()->id)->first();
        return view('front.shoppingCart', compact('userCart'));
    }

    public function addToCart($productId) {
        
        $product = Product::find($productId);
       // return $product->price;

        if ($product) {
            
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            if ($cart) {
                
                $cart->update([
                    'totalquantity' => $cart->totalquantity + 1,
                    'totalPrice' => $cart->totalPrice + $product->price,
                ]);

            } else {
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->totalquantity = 1;
                $cart->totalPrice = $product->price;
                $cart->save();
                
            }

            $command = Command::where('cart_id', $cart->id)->where('product_id', $product->id)->first();

            if ($command) {

                $command->update([
                    'totalPrice' => $command->totalPrice + $product->price,
                    'quantity' => $command->quantity + 1,
                ]);

            } else {

                $command = new Command();
                $command->cart_id = $cart->id;
                $command->product_id = $product->id;
                $command->quantity = 1;
                $command->totalPrice = $product->price;
                $command->save();     
            }

            return redirect()->route('Welcome');
        }
        
    }
}
