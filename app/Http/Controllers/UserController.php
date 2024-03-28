<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use SebastianBergmann\Type\VoidType;
use App\Models\User; // Assuming your User model is named User

class UserController extends Controller
{
    private $users;
    private int $role;
    private int $status;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function setRole(int $role){
        // role =1 là administrator
       $this->role = $role;
       return $this->role;
    }
    public function setStatus(int $status){
        // status =1 là tài khoản đang hoạt động
       $this->status = $status;
       return $this->status;
    }
    public function getDetailUser($id){
        $data['title'] = 'Chi tiết khách hàng';
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.forms.detail_user', compact('data', 'user'));
    }
    public function getUpdateUser($id){
        $data['title'] = 'Chỉnh sửa thông tin khách hàng';
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.forms.update_user', compact('data', 'user'));
    }


    public function postUpdateUser(Request $request){
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id),
            ],
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ], [
            'email.unique' => 'Email đã tồn tại trên hệ thống.',
        ]);

        $dataInsert = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
            'role' => $this->setRole(0),
            'phone_number' => $request->phone,
            'status' => $this->setStatus(1)
        ];

        $this->users->updateUser($request->id, $dataInsert);

        return redirect()->route('users')->with('msg', 'Chỉnh sửa dùng thành công');
    }



    public function getFormCreateUser(){
        $data['title'] = 'Tạo mới người dùng';
        return view('admin.forms.create_user',compact('data'));
    }
    public function getAllUsers(Request $request){
        $data['title'] = 'Danh sách người dùng';
        $users = DB::table('users')
                    ->where('status', 1) // Add condition to filter by status = 1
                    ->paginate(5); // Paginate the results with 5 users per page
        return view('admin.user', compact('data', 'users'));
    }

    //tạo mới người dùng admin
    public function createUser(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ], [
            'email.unique' => 'Email đã tồn tại trên hệ thống.',
        ]);
        $dataInsert = [
            $request->email,
            $request->name,
            $request->password,
            $this->setRole(0),
            $request->phone,
            $this->setStatus(1)
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users')->with('msg' ,'Thêm người dùng mới thành công');
    }

    public function getDeleteUser($id) {
        $data['title'] = 'Xóa người dùng';
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $users = DB::table('users')->where('id', $id)->first();
        return view('admin.forms.delete_user', compact('data', 'users'));
    }

    public function postDeleteUser(Request $request){
        $id = $request->id;
        $this->users->deleteUser($id);
        return redirect()->route('users')->with('msg',' Xóa thành công');
    }

    public function login(Request $request)
    {
        $user = $this->users->getDetail($request->email, $request->password);
        if (!empty($user)) {
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            $request->session()->put('logged_in', true);
            if ($user->role === 1) {
                return redirect()->route('product');
            }
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
            $this->setRole(0),
            $request->phone,
            $this->setStatus(1)
        ];
        $this->users->addUser($dataInsert);

        return redirect()->route('login');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
