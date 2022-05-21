<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;

class ProductImageDelete extends Controller
{
    public function product_images_delete($id)
    {
        $productImage = ProductImage::find($id);
        $fullImgPath = storage_path($productImage->image_url);
        $productImage->delete();
        return response()->json([
            'error' => false,
            'productImage'  => $productImage,
        ], 200);
        $productImage->save();
    }
}
