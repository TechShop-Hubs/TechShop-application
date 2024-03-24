<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function login(Request $request)
    {
        $userDetail = $this->users->getDetail($request->email, $request->password);
        if (!empty($userDetail)) {
            return redirect()->route('home');
        }else {
            return back()->withInput($request->only('email'));
        }
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'vnpassword' => 'required|same:password',
        ], [
            'email.unique' => 'Email đã tồn tại trên hệ thống.',
            'vnpassword.same' => 'Mật khẩu và mật khẩu xác nhận không khớp.'
        ]);
        $dataInsert = [
            $request->email,
            $request->userName,
            $request->password,
            0,
            $request->phone,
            1
        ];
        $this->users->addUser($dataInsert);

        return redirect()->route('home');
    }
}
