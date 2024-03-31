<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Users;
use App\Models\Category;
use App\Models\Orders;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public $data = [];
    private $products;
    private $users;
    private $orders;
    private $categories;
    public function __construct(){
        $this->products = new Product();
        $this->users = new Users();
        $this->categories = new Category();
        $this->orders = new Orders();
    }

    public function index(Request $request)
    {
        $data['title'] = 'Home Page';
        $banners = DB::table('banner')->get();
        $products = DB::table('products')
            ->where('discount', '>', 0)
            ->paginate(5);
        return view('clients.home', compact('data', 'products', 'banners'));
    }

    public function products(Request $request)
    {
        $data['title'] = 'Products Page';
        $banners = DB::table('banner')->get();
        $products = DB::table('products')->get();
        return view('clients.products', compact('data', 'products'));
    }

    public function iphone(Request $request)
    {
        $data['title'] = 'Iphone';
        $banners = DB::table('banner')->get();

        $products = DB::table('products')
            ->where('category_id', 1)
            ->get();
        // $quantity = $products->quantity_product;
        // $describe_product = $products->describe_product;

        // if ($products) {
        //     $quantity = $products->quantity_product;
        // } else {
        //     $quantity = 0;
        // }
        // return view('clients.iphone', compact('data', 'products', 'quantity', 'describe_product'));
        return view('clients.iphone', compact('data', 'products', 'banners'));
    }

    public function laptop(Request $request)
    {
        $data['title'] = 'Laptop';
        $banners = DB::table('banner')->get();
        $products = DB::table('products')
            ->where('category_id', 7)
            ->get();
        return view('clients.laptop', compact('data', 'products', 'banners'));
    }

    public function filters(Request $request)
    {
        $filters = [];
        $data['title'] = $request->path();
        $banners = DB::table('banner')->get();
        $products = DB::table('products')->get();
        $view = $request->path();
        if ($request->isMethod('post')) {
            $filters = $request->input('filters');

            if (intval($filters) < '2000000') {
                $products = DB::table('products')
                    ->where('sell_price', '<', '2000000')
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) >= '2000000' && intval($filters) <= '4000000') {
                $products = DB::table('products')
                    ->whereBetween('sell_price', [2000000, 4000000])
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) >= 4000000 && intval($filters) <= 7000000) {
                $products = DB::table('products')
                    ->whereBetween('sell_price', [4000000, 7000000])
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) >= 7000000 && intval($filters) <= 13000000) {
                $products = DB::table('products')
                    ->whereBetween('sell_price', [7000000, 13000000])
                    ->whereIn('price', $filters)
                    ->get();
            } elseif (intval($filters) > 13000000) {
                $products = DB::table('products')
                    ->where('sell_price', '>', 13000000)
                    ->whereIn('price', $filters)
                    ->get();
            } else {
                $products = DB::table('products')->get();
            }
        }
        return view($view, compact('data', 'products', 'banners', 'filters'));
    }

    public function samsung(Request $request)
    {
        $data['title'] = 'Samsung';
        $banners = DB::table('banner')->get();

        $products = DB::table('products')
            ->where('category_id', 2)
            ->get();
        return view('clients.samsung', compact('data', 'products', 'banners'));
    }

    //PRODUCT
    public function getProduct($id){
        $data['title'] = 'Chi tiết sản phẩm';

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = $this->products->getDetail($id);

        return view('clients.detail_product', compact('data', 'product'));
    }

    //CHECKOUT
    public function checkout($id){
        if (session('logged_in')) {
            $data['title'] = 'Xác nhận thông tin';
            $user = $this->users->getUser(session('user_id'));
            $product = $this->products->getDetail($id);
            $category = DB::table('category')->where('id', $product->category_id)->first();
            $fee = 15000;
            if ($product->discount > 5) {
                $fee = 20000;
            }
            return view('clients.checkout', compact('data', 'product', 'user', 'category', 'fee'));
        } else {
            return redirect()->route('home')->with('msg', 'Bạn cần đăng nhập để thực hiện đặt hàng');
        }
    }

    // public function cart($id){
    //     $data['title'] = 'Giỏ hàng';
    //     if (session('logged_in')) {
    //         $user = $this->users->getUser(session('user_id'));
    //         return view('clients.home');
    //     } else {
    //         return view('clients.detail_product');
    //     }
    // }

    public function wishlish($id){
        $data['title'] = 'Giỏ hàng';
        if (session('logged_in')) {
            $user = $this->users->getUser(session('user_id'));
            return view('clients.home');
        } else {
            return view('clients.detail_product');
        }
    }
    public function getContact(){
        $logged_in = session('logged_in');
        //laays id user
        $user_id = session('user_id');

        if($logged_in) {
            $user = DB::table('users')->where('id', $user_id)->first();
            $data['title'] = "Liên hệ";
            return view('clients.contact', compact('data', 'user'));

        } else {
            return redirect()->route('home')->with('msg', 'Bạn cần đăng nhập để thực hiện chức năng liên hệ này');
        }
    }
    // cart
    public function getCart(){
        $logged_in = session('logged_in');
        $total_price = 0;
        //laays id user
        $user_id = session('user_id');
        $carts = DB::table('carts')
        ->leftJoin('products', 'carts.product_id', '=', 'products.id')
        ->leftJoin('users', 'carts.user_id', '=', 'users.id')
        ->select(
            'carts.id AS cart_id', // Đổi tên trường id của carts thành cart_id
            'carts.*',
            'products.*',
            'products.name AS product_name',
            'users.*'
        )
        ->where('carts.user_id', $user_id)
        ->get();
        // dd($carts);
        // dd($cart);
        if($logged_in){
            $data['title'] = 'Giỏ hàng';
            return view('clients.cart',compact('data','carts','total_price'));
        }
        else {
            return redirect()->route('home')->with('msg', 'Bạn cần đăng nhập để thực hiện chức năng liên hệ này');
        }
    }
    //Logout
    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function order(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Tên bắt buộc nhập',
            'phone_number.required' => 'Số điện thoại bắt buộc nhập',
            'address.required' => 'Địa chỉ bắt buộc nhập',
        ]);

        $dataInsert = [
            'user_id' => session('user_id'),
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'order_date' => date('Y-m-d'),
            'status' => 'Đơn hàng mới',
            'destroy' => 0
        ];

        $this->orders->insertOrder($dataInsert);

        if ( $request->payment_method == 'Online') {
            return redirect()->route('home')->with('msg', 'Bạn chọn thanh toán online');
        }

        return redirect()->route('home')->with('msg', 'Bạn đã đặt hàng thành công');
    }
}
