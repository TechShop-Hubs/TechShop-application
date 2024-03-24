<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class AdminController extends Controller
{
    public $data = [];
    private $categories;
    public function __construct(){
        $this->categories = new Category();
    }

    public function index(Request $request)
    {
        $data['title'] = 'Danh sách sản phẩm';
        $products = DB::table('products')->paginate(5); // Phân trang với mỗi trang chứa 10 sản phẩm
        return view('admin.home', compact('data', 'products'));
    }
    public function getCategories(Request $request){
        $data['title'] = 'Danh sách danh mục';
        // $categories = DB::table('category')->paginate(5); // Phân trang với mỗi trang chứa 10 sản phẩm
        $categories = $this->categories->getAllCategorys(); 
        return view('admin.category', compact('data', 'categories'));
    }
    public function getFormCreateCategory(){
        $data['title'] = 'Tạo mới danh mục';
        return view('admin.forms.create_category', compact('data'));
    }


    public function postCreateCategory(Request $request){
        // Thực hiện validate dữ liệu
        $request->validate([
            'kind' =>'required',
            'brand' =>'required',
        ],[
            'kind.required' =>'Loại sản phẩm bắt buộc phải nhập',
            'brand.required' =>'Tên hãng bắt buộc nhập',
        ]);
    
        // Xử lý thêm dữ liệu vào database
        $dataInsert = [
            'kind' => $request->kind,
            'brand' => $request->brand
        ];
    
        $success = $this->categories->createCategory($dataInsert);
    
        if($success){
            // Chuyển hướng về route 'categories' với thông báo thành công
            return redirect()->route('categories')->with('msg', 'Thêm thành công');
        } else {
            // Nếu dữ liệu không thể được thêm vào cơ sở dữ liệu, trở lại trang tạo mới danh mục với thông báo lỗi
            // return redirect()->route('createCategory')->with('msg', 'Thêm thất bại');
        }
    }
        
    public function getUpdateCategory($id){
        $data['title'] = 'Chỉnh sửa thông tin danh mục';   
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $category = DB::table('category')->where('id', $id)->first();
        return view('admin.forms.update_category', compact('data', 'category'));
    }

    public function postUpdateCategory(Request $request)
    {
        // Validate request data
        $request->validate([
            'kind' =>'required',
            'brand' =>'required',
        ],[
            'kind.required' =>'Loại sản phẩm bắt buộc phải nhập',
            'brand.required' =>'Tên hãng bắt buộc nhập',
        ]);
    
        // Process data insertion into the database
        $dataInsert = [
            'kind' => $request->kind,
            'brand' => $request->brand
        ];
    
        $success = $this->categories->updateCategory($dataInsert, $request->id);
    
        if($success){
            // Redirect to the 'categories' route with success message
            return redirect()->route('categories')->with('msg', 'Cập nhật thành công');
        } else {
            // Redirect back to the page with error message if data couldn't be updated
            return redirect()->back()->with('msg', 'Cập nhật thất bại');
        }
    }
    public function getDeleteCategory($id){
        $data['title'] = 'Xóa danh mục';   
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $category = DB::table('category')->where('id', $id)->first();
        return view('admin.forms.delete_category', compact('data', 'category'));
    }
    public function postDeleteCategory(Request $request){
        $data['title'] = 'Xóa danh mục';   
        $id = $request->id;
        $this->categories->deleteCategory($id);
        return redirect()->route('categories')->with('msg',' Them thành công');
        
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
