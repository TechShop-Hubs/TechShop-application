<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\select;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'discount',
        'sell_price',
        'quantity_product',
        'describe_product',
        'screen_type',
        'ram',
        'memory',
        'cpu',
        'weight',
        'price',
        'status'
    ];
    protected $table = 'products';

    //get detail
    public function getDetail($id)
    {
        $product = DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        return $product ? $product : null;
    }

    //update
    public function updateProduct($id, $data)
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'discount' => $data['discount'],
                'sell_price' => $data['sell_price'],
                'quantity_product' => $data['quantity_product'],
                'describe_product' => $data['describe_product'],
                'screen_type' => $data['screen_type'],
                'ram' => $data['ram'],
                'memory' => $data['memory'],
                'cpu' => $data['cpu'],
                'weight' => $data['weight'],
                'price' => $data['price'],
            ]);
    }

    //delete
    public function deleteProduct($id){
        return DB::table($this->table)
                 ->where('id', $id)
                 ->update(['status' => 0]);
    }
}
