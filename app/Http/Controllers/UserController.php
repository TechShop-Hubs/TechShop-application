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

    public function index(){
        return view('login');
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
}
