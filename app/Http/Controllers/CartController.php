<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;


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

        $userCart = Cart::with('products')->where('user_id',Auth::user()->id)->first();
        return view('front.shoppingCart', compact('userCart'));
    }














    public function addToCart($productId) {
        
        $product = Product::find($productId);

        $user = User::find(Auth::user()->id);

        if ($product) {
            
            $cart = $user->cart;

            if ($cart) {
                
                $cart->update([
                    'totalquantity' => $cart->totalquantity + 1,
                    'totalPrice' => $cart->totalPrice + $product->price,
                ]);

                // product exist in cart or not, if yes update else add to cart

                $cartProduct = $cart->products()->find($productId);

                if ($cartProduct) {
                    $cart->products()->updateExistingPivot($productId, [
                        'totalPrice' => $cartProduct->demand->totalPrice + $product->price,
                        'quantity' => $cartProduct->demand->quantity + 1,
                    ]);
                } else {
                    $cart->products()->attach($productId, [
                        'totalPrice' => $product->price,
                        'quantity' => 1,
                    ]);
                }
                
            } else {

                $cart = new Cart([
                    'totalquantity' => 1,
                    'totalPrice' => $product->price,
                ]);

                $user->cart()->save($cart);

                $cart->products()->attach($productId, [
                    'totalPrice' => $product->price,
                    'quantity' => 1,
                ]);
                
                
            }
            return redirect()->route('Welcome')->with(['success' => 'product added to cart successfully']);
        }
        return redirect()->route('Welcome')->with(['error' => "product dosn't exist"]);
        
    }










    public function deleteProduct($productId){
        
        $user = User::find(Auth::user()->id);
        $cart = $user->cart;
        if ($cart) {

            // product exist in cart or not, if yes update else add to cart

            $product = $cart->products()->find($productId);
            if ($product) {

                $cart->update([
                    'totalquantity' => $cart->totalquantity - $product->demand->quantity,
                    'totalPrice' => $cart->totalPrice - $product->demand->totalPrice,
                ]);

                if($cart->totalquantity==0){
                    $cart->delete();
                }else{
                    $cart->products()->detach($productId);
                }
                return redirect()->route('shoppingCart')->with(['success' => 'product deleted from cart successfully']);

            }
            
        } 
        return redirect()->route('shoppingCart')->with(['error' => "product dosn't exist"]);
        
    }









    public function increaseProduct($productId){

        $user = User::find(Auth::user()->id);
        $cart = $user->cart;
        if ($cart) {

            // product exist in cart or not, if yes update else return back with error message

            $product = $cart->products()->find($productId);
            if ($product) {

                $cart->update([
                    'totalquantity' => $cart->totalquantity + 1 ,
                    'totalPrice' => $cart->totalPrice + $product->price,
                ]);

                $cart->products()->updateExistingPivot($productId, [
                    'totalPrice' => $product->demand->totalPrice + $product->price,
                    'quantity' => $product->demand->quantity + 1,
                ]);

                return redirect()->route('shoppingCart');

            }
            
        } 
        return redirect()->route('shoppingCart')->with(['error' => "product dosn't exist"]);

    }







    public function decreaseProduct($productId){

        $user = User::find(Auth::user()->id);
        $cart = $user->cart;
        if ($cart) {

            // product exist in cart or not, if yes update else return back with error message

            $product = $cart->products()->find($productId);
            if ($product && $product->demand->quantity>1) {

                $cart->update([
                    'totalquantity' => $cart->totalquantity - 1 ,
                    'totalPrice' => $cart->totalPrice - $product->price,
                ]);

                $cart->products()->updateExistingPivot($productId, [
                    'totalPrice' => $product->demand->totalPrice - $product->price,
                    'quantity' => $product->demand->quantity - 1,
                ]);

            }
            
        } 
        return redirect()->route('shoppingCart');

    }










    public function checkOut(){

        $user = User::find(Auth::user()->id);
        $cart = $user->cart;

        if (isset($cart) && $cart->totalquantity>0) {


            return view('front.checkOut', compact('user'));
    
        } 
        return redirect()->route('shoppingCart')->with(['error' => 'cart is empty']);

    }
}
