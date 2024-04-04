<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WishList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
    ];
    protected $table = 'wishlist';
    public function postWishList($user_id, $product_id) {
        DB::table($this->table)->insert([
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);
    }
    public function checkList($user_id, $product_id) {
        return DB::table($this->table)->where(['user_id' => $user_id, 'product_id' => $product_id])->exists();
    }
    
}
