<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('admin.productCategories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productCategories.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->save();

        return redirect()->route('productCategories.index')->with('success','Thêm'. ' ' . $request->name.' '.  'thành công');



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
    public function edit( $id)
    {
        $productCategory = ProductCategory::find($id);
        $params = [
            'productCategory' => $productCategory
        ];
        return view('admin.productCategories.index', $params);
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
        ProductCategory::find($id)->update($request->only('name'));
        return redirect()->route('productCategories.index')->with('success', 'Sửa danh mục'. ' ' . $request->name.' ' .'thành công');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();

        return redirect()->route('productCategories.index')->with('success','Xóa  thành công');

    }
}
