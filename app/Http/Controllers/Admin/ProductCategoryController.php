<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productCategories = ProductCategory::select('*');

        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $productCategories->where('name', 'LIKE', '%' . $name . '%');
        }

        $productCategories = $productCategories->orderBy('id', 'desc')->paginate(3);
        
        return view('admin.productCategories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        try {
            $productCategory->save();
            return redirect()->route('productCategories.index')->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            return redirect()->route('productCategories.index')->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);
        $params = [
            'productCategory' => $productCategory
        ];

        return view('admin.productCategories.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request,  $id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->input('name');
        try {
            $productCategory->save();
            return redirect()->route('productCategories.index')->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            return redirect()->route('productCategories.index')->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'Không thành công');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $productCategory = ProductCategory::withTrashed()->where('id', 1)->restore();
            // $productCategory->delete();
            return redirect()->route('productCategories.index')->with('success', 'Xóa  thành công');
        } catch (\Exception $e) {
            return redirect()->route('productCategories.index')->with('success', 'Xóa không  thành công');
        }
        // $productCategory = ProductCategory::find($id);
    }
}
