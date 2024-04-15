<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cart extends Model
{
    protected $fillable = ['product_quantity'];
    protected $table = 'carts';
    public function updateQuantity($quantity)
    {
        $this->product_quantity = $quantity;
        $this->save();
    }
    public function createCart($data){
        return Cart::insert([
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id'],
            'product_quantity' => $data['product_quantity']
        ]);
    }
    public function checkCart($user_id, $product_id) {
        return DB::table($this->table)->where(['user_id' => $user_id, 'product_id' => $product_id])->exists();
    }
    public function findID($user_id, $product_id){
        return DB::table($this->table)
            ->where(['user_id' => $user_id, 'product_id' => $product_id])
            ->value('id');
    }

    
}
