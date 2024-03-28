<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['product_quantity'];

    public function updateQuantity($quantity)
    {
        $this->product_quantity = $quantity;
        $this->save();
    }}
