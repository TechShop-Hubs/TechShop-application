<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cart_id',
        'name',
        'phone_number',
        'address',
        'payment_method',
        'quantity',
        'total_price',
        'order_date',
        'status',
        'destroy'
    ];
    protected $table = 'orders';

    public function insertOrder($data){
        return DB::table($this->table)
            ->insert([
                'user_id' => $data['user_id'],
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'payment_method' => $data['payment_method'],
                'quantity' => $data['quantity'],
                'total_price' => $data['total_price'],
                'order_date' => $data['order_date'],
                'status' => $data['status'],
                'destroy' => $data['destroy']
            ]);
    }

    public function getDetailOrder($id){
        $order = DB::table('orders')
            ->select('*')
            ->where('id', '=', $id)
            ->where('destroy', '=', 0)
            ->first();
        return $order;
    }

    public function updateOrder($id, $data){
        return DB::table('orders')
        ->where('id', '=', $id)
        ->update($data);
    }

    public function deleteOrder($id){

        return DB::table('orders')
                 ->where('id','=', $id)
                 ->update(['destroy' => 1]);
    }
}
