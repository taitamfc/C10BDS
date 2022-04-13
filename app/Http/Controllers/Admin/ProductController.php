<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\District;
use App\Models\ProductCategory;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        $products = Product::all();
        $provinces = Province::all();
        $districts = District::all();
        $wards = Ward::all();

        $params = [
            'productCategories' => $productCategories,
            'products' => $products,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards
        ];
        return view('admin.products.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->address = $request->address;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->area = $request->area;
        $product->juridical = $request->juridical;
        $product->google_map = $request->google_map;
        $product->stress_width = $request->stress_width;
        $product->product_category_id = $request->product_category_id;
        $product->province_id = $request->province_id;
        $product->district_id = $request->district_id;
        $product->ward_id = $request->ward_id;
        try {
            $product->save();
            Session::flash('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Session::flash('success', 'Thêm' . ' ' . $request->name . ' ' .  'Không thành công');
        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategories = ProductCategory::all();
        $product = Product::find($id);
        $provinces = Province::all();
        $districts = District::all();
        $wards = Ward::all();

        $params = [
            'productCategories' => $productCategories,
            'product' => $product,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards
        ];
        return view('admin.products.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request,$id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->address = $request->input('address');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->area = $request->input('area');
        $product->juridical = $request->input('juridical');
        $product->google_map = $request->input('google_map');
        $product->stress_width = $request->input('stress_width');
        $product->product_category_id = $request->input('product_category_id');
        $product->province_id = $request->input('province_id');
        $product->district_id = $request->input('district_id');
        $product->ward_id = $request->input('ward_id');
        try {
            $product->save();
            return redirect()->route('products.index')
                ->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            return redirect()->route('products.index')
                ->with('error', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'Không thành công');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa  thành công');
    }
}
