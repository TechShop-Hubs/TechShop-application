<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $errors;
    public function getAllCategorys()
    {
        $categories = DB::table('category')->distinct()->paginate(5);
        return $categories;
    }
    public function createCategory($data)
    {
        // Kiểm tra xem cặp 'kind' và 'brand' đã tồn tại chưa
        $existingCategory = DB::table('category')
            ->where('kind', $data['kind'])
            ->where('brand', $data['brand'])
            ->exists();

        // Nếu cặp 'kind' và 'brand' đã tồn tại, bạn có thể xử lý tùy ý, ví dụ: ném ra một ngoại lệ
        if ($existingCategory) {
            // throw new \Exception('Tên hãng và loại sản phẩm đã tồn tại');
            return false;
        } else {
            // Nếu không, thêm dữ liệu vào cơ sở dữ liệu
            DB::insert('INSERT INTO category (kind, brand) VALUES (?, ?)', [$data['kind'], $data['brand']]);
        }
    }
    public function updateCategory($data, $id)
    {
        // Check if the 'kind' and 'brand' combination already exists
        $existingCategory = DB::table('category')
            ->where('kind', $data['kind'])
            ->where('brand', $data['brand'])
            ->exists();
    
        // If the combination already exists, handle it accordingly
        if ($existingCategory) {
            return false; // You may want to handle this case differently
        } else {
            // Use parameterized query to prevent SQL injection
            return DB::table('category')
                ->where('id', $id)
                ->update([
                    'kind' => $data['kind'],
                    'brand' => $data['brand']
                ]);
        }
    }
    public function deleteCategory($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id=?', [$id]);
    }
}
