<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    private $carts;
    public function __construct(){
        $this->carts = new Cart();

    }
    public function reduceQuantity(Request $request)
    {
        $id = $request->cart_id;
        $cart = Cart::find($id);

        
        if ($cart->product_quantity == 1) {
            return redirect()->route('cart')->with('err', 'If you want delete click delete button');
        }else{
            $product_quantity = $cart->product_quantity - 1;
            $cart->product_quantity = $product_quantity;
            $cart->save();
            return redirect()->route('cart')->with('msg', 'Cart item quantity updated');
        }
    }
    public function increaseQuantity(Request $request)
    {
        $id = $request->cart_id;
        $cart = Cart::find($id);
        $product_id = $cart->product_id;
        $product = Product::find($product_id);
        //số lượng trogn bảng product
        $product->quantity_product;
        // gọi product và xử lý nếu số lượng tăng vượt quá số lượng gốc thì báo lloxi
        if($cart->product_quantity>=$product->quantity_product){
            return redirect()->route('cart')->with('err', 'Quantity is limit you can not increase quantity');
        }else{
            $product_quantity = $cart->product_quantity + 1;
            $cart->product_quantity = $product_quantity;
            $cart->save();
            return redirect()->route('cart')->with('msg', 'Cart item quantity updated');
        }
    }
    public function postCart($id){
        $logged_in = session('logged_in');
        $user_id = session('user_id');
        if(!$logged_in){
            return redirect()->route('detail_product', ['id' => $id])->with('err', 'Bạn cần đăng nhập');
        }
        $check = $this->carts->checkCart($user_id,$id);
        if($check){
            $cart = Cart::find($this->carts->findID($user_id,$id));
            $product_quantity = $cart->product_quantity + 1;
            $cart->product_quantity = $product_quantity;
            $cart->save();
            return redirect()->route('detail_product',['id' => $id])->with('msg', 'Plus 1 into cart with this product');
        }else{
            $data = [
                'product_id' => $id,
                'user_id' => $user_id,
                'product_quantity' => 1
            ];
            $this->carts->createCart($data);
            return redirect()->route('detail_product',['id' => $id])->with('msg', 'Success add to cart');
        }
    }
    public function deleteCart(Request $request){
        $id = $request->cart_id;
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cart')->with('msg', 'Cart item deleted');
    }

    
}
