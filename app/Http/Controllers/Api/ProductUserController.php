<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
    public function get_product_type_by_product_user_id($product_type)
    {
        $user = User::select('users.*')
            ->join('products', 'products.user_id', 'users.id')
            ->where('products.product_type', $product_type)->get();
        return response()->json($user, 200);
    }
}
