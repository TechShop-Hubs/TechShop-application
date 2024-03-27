<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\select;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',
        'password',
        'role',
        'phone_number',
        'status'
    ];
    protected $table = 'users';

    public function getUser($id)
    {
        $user = DB::table($this->table)
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        return $user ? $user : null;
    }

    //login
    public function getDetail($email, $password)
    {
        $user = DB::table($this->table)
            ->select('*')
            ->where([
                [
                    'email',
                    $email
                ],
                [
                    'password',
                    $password
                ]
            ])
            ->first();
        return $user ? $user : null;
    }

    // register
    public function addUser($data)
    {
        DB::insert('INSERT INTO users (email, name, password, role, phone_number, status) VALUES (?, ?, ?, ?, ?, ?)', $data);
    }

    public function deleteUser($id){
        return DB::table($this->table)
                 ->where('id', $id)
                 ->update(['status' => 0]);
    }

    public function updateUser($id, $data){
        return DB::table('users')
                 ->where('id', $id)
                 ->update([
                     'email' => $data['email'],
                     'name' => $data['name'],
                     'password' => $data['password'],
                     'role' => $data['role'],
                     'phone_number' => $data['phone_number'],
                     'status' => $data['status']
                 ]);
    }


}
