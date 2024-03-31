<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

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
