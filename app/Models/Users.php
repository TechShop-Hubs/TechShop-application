<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getDetail($email, $password){
        $user = DB::table($this->table)
        ->select('*')
        ->where([
            [
                'email', $email
            ],
            [
                'password', $password
            ]
        ])
        ->first();
        return $user ? $user : null;
    }

    public function addUser($data){
        DB::insert('INSERT INTO users (email, name, password, role, phone_number, status) VALUES (?, ?, ?, ?, ?, ?)', $data);
    }
}
