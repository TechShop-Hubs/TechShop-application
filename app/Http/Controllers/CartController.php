<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function removeFromCart($id)
    {
        // dd($request);
        // $cart = Cart::find($id)->update($request->all());
    
        // Trả về response
        // return response()->json(['data' => $cart,200]);
        Cart::find($id)->delete();
        return response()->json(['data' => 'xondfe',200]);
    }
    
}
