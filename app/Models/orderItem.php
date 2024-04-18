<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class orderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'total_price'
    ];

    public function insertOrderItem($data){
        return DB::table('orderitems')->insert($data);
    }

    public function getDetailOrder($idOrder){
        $orderItems = DB::table('orderitems')
            ->select('*')
            ->where('order_id', '=', $idOrder)
            ->first();
        return $orderItems;
    }
}
