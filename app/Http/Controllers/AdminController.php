<?php

namespace App\Http\Controllers;
// use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public $data = [];
    public function index(Request $request)
    {
        $data['title'] = 'Danh sách sản phẩm';
        $products = DB::table('products')->paginate(5); // Phân trang với mỗi trang chứa 10 sản phẩm
        return view('admin.home', compact('data', 'products'));
    }
    public function getCategories(Request $request){
        $data['title'] = 'Danh sách danh mục';
        $categories = DB::table('category')->paginate(5); // Phân trang với mỗi trang chứa 10 sản phẩm
        return view('admin.category', compact('data', 'categories'));
    }
    public function getFormCreateCategory(){
        $data['title'] = 'Tạo mới danh mục';
        return view('admin.forms.create_category', compact('data'));

    }
    public function getUpdateCategory($id){
        $data['title'] = 'Chỉnh sửa thông tin danh mục';   
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $category = DB::table('category')->where('id', $id)->first();
        return view('admin.forms.update_category', compact('data', 'category'));

    }
    public function getAllUsers(Request $request){
        $data['title'] = 'Danh sách người dùng';
        $users = DB::table('users')->paginate(5); // Phân trang với mỗi trang chứa 10 sản phẩm
        return view('admin.user', compact('data', 'users'));
    }
    public function getAllOrders(Request $request){
        $data['title'] = 'Danh sách đơn hàng';
        $orders = DB::table('orders')->paginate(5); // Phân trang với mỗi trang chứa 10 sản phẩm
        return view('admin.order', compact('data', 'orders'));
    }
    public function getFormCreateProduct(Request $request){
        $data['title'] = 'Tạo mới sản phẩm';
        // Lấy danh sách các danh mục không trùng lặp
        $categories = DB::table('category')->select('kind')->distinct()->get();
        return view('admin.forms.create_product', compact('data', 'categories'));
    }
    public function getDetailProduct($id){
        $data['title'] = 'Chi tiết sản phẩm';
        
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = DB::table('products')->where('id', $id)->first();
    
        return view('admin.forms.detail_product', compact('data', 'product'));
    }
    public function getUpdateProduct($id){
        $data['title'] = 'Chỉnh sửa sản phẩm';   
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.forms.update_product', compact('data', 'product'));
    }
    public function getDeleteProduct($id){
        $data['title'] = 'Xóa sản phẩm';   
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.forms.delete_product', compact('data', 'product'));
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
    public function getContact(){
        $data['title'] = 'Danh sách liên hệ';   
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $contacts = DB::table('contact')->paginate(5);
        return view('admin.contact', compact('data', 'contacts'));
    }
    public function getBanner(){
        $data['title'] = 'Danh sách banner';   
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $banners = DB::table('banner')->paginate(5);
        return view('admin.banner', compact('data', 'banners'));
    }
    
    
}
