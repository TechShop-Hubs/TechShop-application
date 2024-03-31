<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function reduceQuantity(Request $request)
    {
        $id = $request->cart_id;
        $cart = Cart::find($id);

        $product_quantity = $cart->product_quantity - 1;
    
        if ($product_quantity <= 0) {
            $cart->delete();
            return redirect()->route('cart')->with('msg', 'Cart item deleted');
        }
        $cart->product_quantity = $product_quantity;
        $cart->save();
        return redirect()->route('cart')->with('msg', 'Cart item quantity updated');
    }
    public function increaseQuantity(Request $request)
    {
        $id = $request->cart_id;
        $cart = Cart::find($id);
        $product_quantity = $cart->product_quantity + 1;
        $cart->product_quantity = $product_quantity;
        $cart->save();
        return redirect()->route('cart')->with('msg', 'Cart item quantity updated');
    }
  
    
    
}
