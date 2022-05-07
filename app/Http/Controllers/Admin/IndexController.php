<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $product_count = Product::where('status','!=','draft')->count();
        $product_price = Product::where('status','sold')->sum('price');
        $customer_count = Customer::count();
        $new_products = Product::where('status','!=','draft')->take(5)->orderBy('id','DESC')->get();
        $new_customers = Customer::take(5)->orderBy('id','DESC')->get();

        $params = [
            'product_count' => $product_count,
            'customer_count' => $customer_count,
            'product_price' => $product_price,
            'new_customers' => $new_customers,
            'new_products' => $new_products,
        ];
        return view('admin.home.index', $params);
    }
}
