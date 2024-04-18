<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';

    public function createContact($data)
    {
        return DB::table($this->table)
            ->insert([
                'user_name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'message' => $data['message'],
                'status' => 0,
            ]);
    }
    public function updateContact($id, $data){
        return DB::table($this->table)
        ->where('id', $id)
        ->update(['status' => $data]);
    }
    public function getDetail($id){
        return DB::table($this->table)->where('id', $id)->first();
    }
    
}
