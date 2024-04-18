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
            ->where('email', $email)
            ->where('status', '=',1)
            ->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                return $user;
            }
        }
        return null;
    }

    // register
    public function addUser($data)
    {
        // Chỉnh sửa dữ liệu trước khi chèn vào cơ sở dữ liệu nếu cần thiết
    
        // Chú ý rằng ta sử dụng trường 'name' thay vì 'username' trong mảng dữ liệu
        // $data['name'] = $data['name'];
    
        // DB::insert('INSERT INTO users (email, name, password, role, phone_number, status) VALUES (?, ?, ?, ?, ?, ?)', $data);
    
        DB::table($this->table)->insert($data);
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
                    
                     'role' => $data['role'],
                     'phone_number' => $data['phone_number'],
                     'status' => $data['status']
                 ]);
    }


}
