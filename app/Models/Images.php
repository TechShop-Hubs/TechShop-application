<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Images extends Model
{
    use HasFactory;
    public static function uploadImage($file, $folder)
    {
        $uploadResult = Cloudinary::upload($file->getRealPath());
        return $uploadResult->getSecurePath();
    }
    protected $fillable = [
        'product_id',
        'image',
        'created_at',
        'updated_at'
    ];
}
