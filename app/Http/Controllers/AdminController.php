<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Orders;
use App\Models\Contact;
use App\Models\WishList;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public $data = [];
    private $categories;
    private $products;
    private $contacts;
    private $order;
    private $wishlist;
    public function __construct(){
        $this->categories = new Category();
        $this->products = new Product();
        $this->contacts = new Contact();
        $this->order = new Orders();
        $this->wishlist = new Wishlist();
    }

    public function index(Request $request)
    {
        $data['title'] = 'Danh sách sản phẩm';
        $products = DB::table('products')->where('status', '=', 1)->paginate(5); // Phân trang với mỗi trang chứa 10 sản phẩm
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

        if($success!=false){
            // Chuyển hướng về route 'categories' với thông báo thành công
            return redirect()->route('categories')->with('msg', 'Thêm thành công danh mục thành công');
        } else {
            // Nếu dữ liệu không thể được thêm vào cơ sở dữ liệu, trở lại trang tạo mới danh mục với thông báo lỗi
            return redirect()->route('createCategory')->with('msg', 'Thêm thất bại do danh mục và tên này đã tồn tại');
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
        return redirect()->route('categories')->with('msg',' Xóa thành công');

    }

    public function getAllOrders(Request $request){
        $data['title'] = 'Danh sách đơn hàng';
        $orders = DB::table('orders')
        ->where('destroy', '=', '0')
        ->paginate(5);
        return view('admin.order', compact('data', 'orders'));
    }
    public function getFormCreateProduct(Request $request){
        $data['title'] = 'Tạo mới sản phẩm';
        // Lấy danh sách các danh mục không trùng lặp
        $categoryName = $this->categories->getAllCategoriesName();
        return view('admin.forms.create_product', compact('data', 'categoryName'));
    }
    public function getDetailProduct($id){
        $data['title'] = 'Chi tiết sản phẩm';

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = $this->products->getDetail($id);
        $category = DB::table('category')->where('id', $product->category_id)->first();

        return view('admin.forms.detail_product', compact('data', 'product', 'category'));
    }

    public function getUpdateProduct($id){
        $data['title'] = 'Chỉnh sửa sản phẩm';
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = $this->products->getDetail($id);
        $categoryName = $this->categories->getAllCategoriesName();
        return view('admin.forms.update_product', compact('data', 'product', 'categoryName'));
    }

    public function postDeleteProduct($id){
        $this->products->deleteProduct($id);
        return redirect()->route('product');
    }

    public function getDeleteProduct($id){
        $data['title'] = 'Xóa sản phẩm';
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $product = DB::table('products')->where('id', $id)->first();
        return view('admin.forms.delete_product', compact('data', 'product'));
    }

    public function postUpdateProduct(Request $request, $id){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'discount' => 'required',
            'sell_price' => 'required',
            'quantity_product' => 'required',
            'describe_product' => 'required',
            'screen_type' => 'required',
            'ram' => 'required',
            'memory' => 'required',
            'cpu' => 'required',
            'weight' => 'required',
            'price' => 'required'
        ], [
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'discount.required' => 'Vui lòng nhập giảm giá.',
            'sell_price.required' => 'Vui lòng nhập giá bán.',
            'quantity_product.required' => 'Vui lòng nhập số lượng sản phẩm.',
            'describe_product.required' => 'Vui lòng nhập mô tả sản phẩm.',
            'screen_type.required' => 'Vui lòng nhập loại màn hình.',
            'ram.required' => 'Vui lòng nhập dung lượng RAM.',
            'memory.required' => 'Vui lòng nhập dung lượng bộ nhớ.',
            'cpu.required' => 'Vui lòng nhập thông tin CPU.',
            'weight.required' => 'Vui lòng nhập trọng lượng sản phẩm.',
            'price.required' => 'Vui lòng nhập giá sản phẩm.'
        ]);

        $dataInsert = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'discount' => $request->discount,
            'sell_price' => $request->sell_price,
            'quantity_product' => $request->quantity_product,
            'describe_product' => $request->describe_product,
            'screen_type' => $request->screen_type,
            'ram' => $request->ram,
            'memory' => $request->memory,
            'cpu' => $request->cpu,
            'weight' => $request->weight,
            'price' => $request->price
        ];

        $this->products->updateProduct($id, $dataInsert);

        return redirect()->route('product');
    }

    public function createProduct(Request $request){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'discount' => 'required',
            'sell_price' => 'required',
            'quantity_product' => 'required',
            'describe_product' => 'required',
            'screen_type' => 'required',
            'ram' => 'required',
            'memory' => 'required',
            'cpu' => 'required',
            'weight' => 'required',
            'price' => 'required'
        ], [
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'discount.required' => 'Vui lòng nhập giảm giá.',
            'sell_price.required' => 'Vui lòng nhập giá bán.',
            'quantity_product.required' => 'Vui lòng nhập số lượng sản phẩm.',
            'describe_product.required' => 'Vui lòng nhập mô tả sản phẩm.',
            'screen_type.required' => 'Vui lòng nhập loại màn hình.',
            'ram.required' => 'Vui lòng nhập dung lượng RAM.',
            'memory.required' => 'Vui lòng nhập dung lượng bộ nhớ.',
            'cpu.required' => 'Vui lòng nhập thông tin CPU.',
            'weight.required' => 'Vui lòng nhập trọng lượng sản phẩm.',
            'price.required' => 'Vui lòng nhập giá sản phẩm.'
        ]);

        $dataInsert = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'discount' => $request->discount,
            'sell_price' => $request->sell_price,
            'quantity_product' => $request->quantity_product,
            'describe_product' => $request->describe_product,
            'screen_type' => $request->screen_type,
            'ram' => $request->ram,
            'memory' => $request->memory,
            'cpu' => $request->cpu,
            'weight' => $request->weight,
            'price' => $request->price,
            'status' => 1
        ];

        $this->products->createProduct($dataInsert);

        return redirect()->route('product');
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

    // quản lý liên hệ
    public function createContact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', // Kiểm tra định dạng email
            'phone' => 'required|digits_between:10,15', // Kiểm tra số điện thoại từ 10 đến 15 chữ số
            'message' => 'required',
        ], [
            'email.required' => 'Email bắt buộc nhập',
            'email.email' => 'Email không hợp lệ',
            'name.required' => 'Tên bắt buộc nhập',
            'phone.required' => 'Số điện thoại bắt buộc nhập',
            'phone.digits_between' => 'Số điện thoại phải có từ 10 đến 15 chữ số và chỉ bao gồm số',
            'message.required' => 'Message bắt buộc nhập',
        ]);
        $dataInsert = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message
        ];
        $this->contacts->createContact($dataInsert);
        return redirect()->route('client.contact')->with('msg' ,'Cảm ơn bạn đã liên hệ');
    }
    public function updateContact(Request $request){
        $this->contacts->updateContact($request->id,$request->status);
        return redirect()->route('contact')->with('msg', 'Chỉnh sửa trạng thái thành công');
    }
    public function getUpdateContact($id){
        $data['title'] = 'Chỉnh sửa sản phẩm';
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $contact = $this->contacts->getDetail($id);
        return view('admin.forms.update_contact', compact('data', 'contact'));
    }

    public function getDetailOrder($id){
        $data['title'] = 'Chi tiết đơn hàng';
        $order = $this->order->getDetailOrder($id);
        $orderItems =  DB::table('orderitems')
            ->join('products', 'orderitems.product_id', '=', 'products.id')
            ->select(
                'orderitems.*',
                'products.name AS product_name',
            )
            ->where('orderitems.order_id', $id)
            ->get();
        $statusArr = ['Đơn hàng mới', 'Đơn hàng đang giao', 'Đơn hàng đã giao', 'Đơn hàng đã hủy'];
        return view('admin.forms.detail_order', compact('data', 'order', 'orderItems', 'statusArr'));
    }

    public function getUpdateOrder($id){
        $data['title'] = 'Chỉnh sửa đơn hàng';
        $order = $this->order->getDetailOrder($id);
        $statusArr = ['Đơn hàng mới', 'Đơn hàng đang giao', 'Đơn hàng đã giao', 'Đơn hàng đã hủy'];
        return view('admin.forms.update_order', compact('data', 'order', 'statusArr'));
    }

    public function getDeleteOrder($id){
        $data['title'] = 'Xóa đơn hàng';
        $order = DB::table('orders')->where('id', $id)->first();
        return view('admin.forms.delete_order', compact('data', 'order'));
    }

    public function postUpdateOrder(Request $request, $id){
        $dataInsert = [
            'status' => $request->status,
        ];
        $this->order->updateOrder($id, $dataInsert);
        return redirect()->route('orders')->with('msg',' Cập nhật đơn hàng thành công');
    }

    public function postDeleteOrder($id){
        $data['title'] = 'Xóa đơn hàng';
        // Lấy thông tin sản phẩm từ cơ sở dữ liệu với id đã cho
        $this->order->deleteOrder($id);
        return redirect()->route('orders')->with('msg',' Xóa đơn hàng thành công');
    }

    public function getWishLish(){
        $data['title'] = 'Wishlist';
        $wishlists = $this->wishlist->getAllWishList();
        // dd($wishlists);
        return view('admin.wishlist',compact('data','wishlists'));
    }

    public function getCreateBanner(){
        $data['title'] = 'Tạo mới banner';
        return view('admin.forms.create_banner', compact('data'));
    }

    public function postCreateBanner(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ], [
            'name.required' => 'Tên bắt buộc nhập',
            'image.required' => 'Bắt buộc phải chọn hình ảnh',
        ]);

        $file = $request->file("image");
        $imageName = time()."_".$file->getClientOriginalName();
        $file->move(\public_path("banner/"), $imageName);

        $dataInsert = [
            'name'=>$request->name,
            'image'=>$imageName
        ];
        DB::table('banner')->insert($dataInsert);
        return redirect()->route('banner')->with('msg' ,'Tạo banner thành công');
    }

    public function getDeleteBanner($id){
        $data['title'] = 'Xóa banner';
        $banner = DB::table('banner')->where('id', $id)->first();
        return view('admin.forms.delete_banner', compact('data', 'banner'));
    }

    public function postDeleteBanner($id) {
        $banner = DB::table('banner')->where('id', $id)->first();
        if (File::exists("banner/".$banner->image)) {
            File::delete("banner/".$banner->image);
        }
        DB::table('banner')->where('id', $id)->delete();
        return redirect()->route('banner')->with('msg' ,'Xoá banner thành công');
    }

    public function getUpdateBanner($id){
        $data['title'] = 'Cập nhật banner';
        $banner = DB::table('banner')->where('id', $id)->first();
        return view('admin.forms.update_banner', compact('data', 'banner'));
    }

    public function postUpdateBanner(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tên bắt buộc nhập',
        ]);

        if ($request->image == null) {
            $dataUpdate = [
                'name' => $request->name,
                'status' => $request->status
            ];
        }else {
            $file = $request->file("image");
            $imageName = time()."_".$file->getClientOriginalName();
            $file->move(\public_path("banner/"), $imageName);

            $dataUpdate = [
                'name' => $request->name,
                'image' => $imageName,
                'status' => $request->status
            ];
        }

        DB::table('banner')->where('id', $id)->update($dataUpdate);
        return redirect()->route('banner')->with('msg' ,'Cập nhật banner thành công');
    }
}
