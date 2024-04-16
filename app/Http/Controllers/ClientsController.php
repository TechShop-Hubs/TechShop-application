<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Users;
use App\Models\Category;
use App\Models\Orders;
use App\Models\WishList;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use App\Models\orderItem;

class ClientsController extends Controller
{
    public $data = [];
    private $products;
    private $users;
    private $orders;
    private $orderItems;
    private $categories;
    private $wishlist;
    public function __construct()
    {
        $this->products = new Product();
        $this->users = new Users();
        $this->categories = new Category();
        $this->orders = new Orders();
        $this->orderItems = new orderItem();
        $this->wishlist = new WishList();
    }

    public function index(Request $request)
    {
        $data['title'] = 'Home Page';
        $banners = DB::table('banner')->where('status', '1')->get();
        $phones = DB::table('products')
        ->join('category', 'products.category_id', '=', 'category.id')
        ->where('category.kind', 'Điện thoại')
        ->join('images', 'products.id', '=', 'images.product_id')
        ->inRandomOrder()
        ->limit(5)
        ->get();
        $products = DB::table('products')
        ->where('discount', '>=', 10)
        ->join('images', 'products.id', '=', 'images.product_id')
        ->inRandomOrder()
        ->limit(5)
        ->get();
        return view('clients.home', compact('data', 'phones','products', 'banners'));
    }
    public function products(Request $request)
    {
        $data['title'] = 'Products Page';
        $kindquery = "";
        $brandquery = "";
        $kindquery = $request->query('kind');
        $brandquery = $request->query('brand');
        $products = [];
        $products = DB::table('products')->get();
        $products = DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();

        // dd($products);
        $kinds = $this->categories->getDistinctNameCategory();

        // Tạo một mảng để lưu trữ thông tin thương hiệu cho mỗi loại sản phẩm
        $brandsByKind = [];

        // Lặp qua các loại sản phẩm để lấy các thương hiệu tương ứng
        foreach ($kinds as $key => $kind) {
            // Kiểm tra xem đã có thông tin về thương hiệu cho loại sản phẩm này chưa
            if (!isset($brandsByKind[$kind->kind])) {
                // Nếu chưa có, lấy thông tin thương hiệu cho loại sản phẩm này
                $brandsByKind[$kind->kind] = $this->categories->getBrand($kind->kind);
            }
        }
        if ($kindquery != '' && $brandquery != '') {
            // Xử lý loại sản phẩm nào đổ ra sản phẩm đó
            $categoryId = $this->categories->getCategoryID($kindquery, $brandquery);
            // dd($categoryId);
            if ($categoryId) {
                $products = DB::table('products')->join('images', 'products.id', '=', 'images.product_id')->where('category_id', $categoryId[0]->id)->get();
            } else {
                echo "Category ID not found"; // Hoặc thông báo lỗi khác tùy vào trường hợp của bạn
            }
        }
        return view('clients.products', compact('data', 'products', 'kinds', 'brandsByKind'));
    }
    public function iphone(Request $request)
    {
        $data['title'] = 'Iphone';
        $banners = DB::table('banner')->get();

        $products = DB::table('products')
            ->where('category_id', 1)
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        return view('clients.iphone', compact('data', 'products', 'banners'));
    }

    public function laptop(Request $request)
    {
        $data['title'] = 'Laptop';
        $banners = DB::table('banner')->get();
        $products = DB::table('products')
            ->where('category_id', 7)
            ->join('images', 'products.id', '=', 'images.product_id')
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
            ->join('images', 'products.id', '=', 'images.product_id')
            ->get();
        return view('clients.samsung', compact('data', 'products', 'banners'));
    }

    //PRODUCT
    public function getProduct($id)
    {
        $data['title'] = 'Chi tiết sản phẩm';

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = $this->products->getDetail($id);

        return view('clients.detail_product', compact('data', 'product'));
    }

    //CHECKOUT
    //checkout with many products
    public function checkouts(Request $request)
    {
        $data['title'] = 'Xác nhận thông tin';
        $arrId = json_decode($request->cartIds);
        $request->session()->put('arrayIDCart', $arrId);
        $fee = 0;
        $totalPrice = 0;

        if (count($arrId) > 1) {

            $fee = 0;
        } else {
            $fee = 20000;
        }
        $user = $this->users->getUser(session('user_id'));
        $products = [];
        foreach ($arrId as $product_id) {
            // Sử dụng where() thay vì wheres() và chỉ định cột để so sánh
            $product = DB::table('carts')
                ->select(
                    'carts.id as cart_id',
                    'carts.product_quantity',
                    'products.name as name',
                    'products.*' // Chọn tất cả các trường từ bảng products
                )
                ->leftJoin('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.id', '=', $product_id) // Sử dụng 'carts.cart_id' thay vì 'carts.id'
                ->first();

            // Kiểm tra nếu sản phẩm tồn tại trước khi thêm vào mảng
            if ($product) {
                $products[] = $product; // Sử dụng []= để thêm phần tử vào mảng
            }
            $totalPrice += ($product->sell_price * (1 - $product->discount / 100)) * $product->product_quantity + $fee;
        }
        // dd($products);
        return view('clients.checkouts', compact('data', 'user', 'products', 'fee', 'totalPrice', 'arrId'));
    }



    public function wishlish($id)
    {
        $data['title'] = 'Giỏ hàng';
        if (session('logged_in')) {
            $user = $this->users->getUser(session('user_id'));
            return view('clients.home');
        } else {
            return view('clients.detail_product');
        }
    }
    public function getContact()
    {
        $logged_in = session('logged_in');
        //laays id user
        $user_id = session('user_id');

        if ($logged_in) {
            $user = DB::table('users')->where('id', $user_id)->first();
            $data['title'] = "Liên hệ";
            return view('clients.contact', compact('data', 'user'));
        } else {
            return redirect()->route('home')->with('err', 'Bạn cần đăng nhập để thực hiện chức năng liên hệ này');
        }
    }
    // cart
    public function getCart()
    {
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
                'carts.status AS cart_status',
                'products.*',
                'products.name AS product_name',
                'users.*'
            )
            ->where('carts.user_id', $user_id)
            ->get();

        if ($logged_in) {
            $data['title'] = 'Giỏ hàng';
            return view('clients.cart', compact('data', 'carts', 'total_price'));
        } else {
            return redirect()->route('home')->with('err', 'Bạn cần đăng nhập để thực hiện chức năng liên hệ này');
        }
    }
    //Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function order(Request $request)
    {
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
            'total_price' => $request->total_price,
            'order_date' => date('Y-m-d'),
            'status' => 'Đơn hàng mới',
            'destroy' => 0
        ];

        if ($request->payment_method == 'COD') {
            $this->orders->insertOrder($dataInsert);
            $order = DB::table('orders')
                ->select('id')
                ->orderByDesc('id')
                ->limit(1)
                ->first();
            foreach (session('arrayIDCart') as $cart_id) {
                $cart = DB::table('carts')->where('id', $cart_id)->first();
                $product = DB::table('products')->where('id', $cart->product_id)->first();
                $total_price = (($product->sell_price * (1 - $product->discount / 100))  * $cart->product_quantity) + $request->fee;

                $data = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $product->sell_price,
                    'quantity' => $cart->product_quantity,
                    'total_price' => $total_price,
                ];
                $this->orderItems->insertOrderItem($data);
                DB::table('carts')->where('id', $cart_id)->delete();
            }

            return redirect()->route('home')->with('msg', 'Bạn đã đặt hàng thành công');
        }

        if ($request->payment_method == 'Momo') {

            function execPostRequest($url, $data)
            {
                $ch = curl_init($url);
                var_dump($ch);
                if ($ch === false) {
                    die('Curl initialization failed');
                }
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                $result = curl_exec($ch);
                if ($result === false) {
                    die('Curl execution failed: ' . curl_error($ch));
                }
                curl_close($ch);
                return $result;
            }
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $request->total_price;
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/momo/callback";
            $ipnUrl = "http://127.0.0.1:8000/cart";
            $extraData = "";
            $partnerCode = $partnerCode;
            $accessKey = $accessKey;
            $serectkey = $secretKey;
            $orderId = $orderId; // Mã đơn hàng
            $orderInfo = $orderInfo;
            $amount = $amount;
            $ipnUrl = $ipnUrl;
            $redirectUrl = $redirectUrl;
            $extraData = $extraData;
            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);
            if (isset($jsonResult['payUrl'])) {
                $request->session()->put('dataInsert', $dataInsert);
                return redirect($jsonResult['payUrl']);
            } else {
                echo "Error: Missing payUrl in the response.";
            }
        }
    }

    public function handleCallback(Request $request)
    {
        if ($request->input('errorCode') == 0) {
            $this->orders->insertOrder(session('dataInsert'));
            $order = DB::table('orders')
                ->select('id')
                ->orderByDesc('id')
                ->limit(1)
                ->first();
            foreach (session('arrayIDCart') as $cart_id) {
                $cart = DB::table('carts')->where('id', $cart_id)->first();
                $product = DB::table('products')->where('id', $cart->product_id)->first();
                $total_price = (($product->sell_price * (1 - $product->discount / 100))  * $cart->product_quantity) + $request->fee;
                $data = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $product->sell_price,
                    'quantity' => $cart->product_quantity,
                    'total_price' => $total_price,
                ];
                $this->orderItems->insertOrderItem($data);
                DB::table('carts')->where('id', $cart_id)->delete();
            }

            $request->session()->forget('dataInsert');

            return redirect()->route('home')->with('msg', 'Bạn đã đặt hàng online thành công');
        } else {
            return redirect()->route('home')->with('msg', 'Bạn đặt hàng không thành công');
        }
    }

    //wish list
    public function postWishList($id)
    {
        $logged_in = session('logged_in');
        $user_id = session('user_id');

        if(!$logged_in){
            return redirect()->route('detail_product', ['id' => $id])->with('err', 'Bạn cần đăng nhập');
        }

        $check = $this->wishlist->checkList($user_id,$id);
        if($check){
            return redirect()->route('detail_product', ['id' => $id])->with('err', 'bạn đã thích sản phẩm này rồi');
        }else{
            $this->wishlist->postWishList($user_id,$id);
            return redirect()->route('detail_product', ['id' => $id])->with('msg', 'Thành công');
        }
    }

    public function historyOrder()
    {
        $logged_in = session('logged_in');
        $user_id = session('user_id');

        if ($logged_in) {
            $user = DB::table('users')->where('id', $user_id)->first();
            $listOrders = DB::table('orders')->where('user_id', $user_id)->get();
            $data['title'] = "Lịch sử đơn hàng";
            return view('clients.history_order', compact('data', 'user', 'listOrders'));
        } else {
            return redirect()->route('home')->with('msg', 'Bạn cần đăng nhập để thực hiện chức năng liên hệ này');
        }
    }

    public function changePassword()
    {
        $data['title'] = "Thay đổi mật khẩu";
        $user = DB::table('users')->where('id', session('user_id'))->first();
        $password = $user->password;
        return view('clients.change_password', compact('password', 'data'));
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
        ], [
            'password.required' => 'Mật khẩu bắt buộc phải nhập',
            'password.min' => 'Mật khẩu phải từ :min kí tự trở lên',
        ]);

        $success = DB::table('users')->where('id', session('user_id'))->update(['password' => $request->password]);

        if ($success) {
            return redirect()->route('historyOrder')->with('msg', 'Thay đổi mật khẩu thành công');
        } else {
            return back()->withInput($request->all());
        }
    }

    public function updateInformation()
    {
        $data['title'] = "Thay đổi thông tin";
        $user = $this->users->getUser(session('user_id'));
        return view('clients.update_information', compact('user', 'data'));
    }

    public function postUpdateInfo(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|min:3',
            'phone_number' => 'required|min:10',
        ], [
            'email.required' => 'Email bắt buộc phải nhập',
            'email.unique' => 'Email đã tồn tại trên hệ thống.',
            'phone_number.required' => 'Số điện thoại bắt buộc phải nhập',
            'phone_number.min' => 'Số điện thoại phải từ :min kí tự trở lên',
            'name.required' => 'Tên bắt buộc phải nhập',
            'name.min' => 'Tên phải từ :min kí tự trở lên',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];

        $success = DB::table('users')->where('id', session('user_id'))->update($data);

        if ($success) {
            return redirect()->route('historyOrder')->with('msg', 'Thay đổi thông tin thành công');
        } else {
            return back()->withInput($request->all())->with('msg', 'Thay đổi thông tin không thành công');
        }
    }

    public function getDetailOrders($id){
        $data['title'] = "Các sản phẩm";
        $orderItems =  DB::table('orderitems')
            ->join('products', 'orderitems.product_id', '=', 'products.id')
            ->select(
                'orderitems.*',
                'products.name AS product_name',
            )
            ->where('orderitems.order_id', $id)
            ->get();
        return view('clients.order_item', compact('orderItems', 'data'));
    }

    public function cancelOrder($id){
        $dataInsert = [
            'status' => 'Đơn hàng đã huỷ',
        ];
        $this->orders->updateOrder($id, $dataInsert);
        return redirect()->route('historyOrder')->with('msg','Huỷ thành công');
    }
}
