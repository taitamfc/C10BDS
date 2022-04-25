<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Branch;
use App\Models\District;
use App\Models\ProducImage;
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
    public function index(Request $request)
    {
        // $this->authorize('viewAny',Product::class);
        $product = Product::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $product->where('name', 'LIKE', '%' . $name . '%');
        }

        if (isset($request->filter['province_id']) && $request->filter['province_id']) {
            $province_id = $request->filter['province_id'];
            $product->where('province_id', $province_id);
        }

        if (isset($request->filter['district_id']) && $request->filter['district_id']) {
            $district_id = $request->filter['district_id'];
            $product->where('district_id', $district_id);
        }

        if (isset($request->filter['ward_id']) && $request->filter['ward_id']) {
            $ward_id = $request->filter['ward_id'];
            $product->where('ward_id', $ward_id);
        }

        if (isset($request->filter['branch_id']) && $request->filter['branch_id']) {
            $branch_id = $request->filter['branch_id'];
            $product->where('branch_id', $branch_id);
        }

        if (isset($request->filter['status']) && $request->filter['status']) {
            $status = $request->filter['status'];
            $product->where('status', $status);
        }
        if ($request->s){
            $product->where('name', 'LIKE', '%' . $request->s . '%');
            $product->orwhere('id', $request->s);
        }
        $product->orderBy('id', 'desc');
        $provinces = Province::all();
        $branches = Branch::all();
        $products = $product->paginate(5);
        $params = [
            'provinces' => $provinces,
            'products' => $products,
            'branches' => $branches
        ];
        

        return view('admin.products.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Product::class);
        $productCategories = ProductCategory::all();
        $provinces = Province::all();
        $branches = Branch::all();

        $params = [
            'productCategories' => $productCategories,
            'provinces' => $provinces,
            'branches' => $branches
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
        $product->product_category_id = $request->product_category_id;
        $product->area = $request->area;
        $product->unit = $request->unit;
        $product->houseDirection = $request->houseDirection;
        $product->facade = $request->facade;
        $product->status = $request->status;
        $product->juridical = $request->juridical;
        $product->google_map = $request->google_map;
        $product->linkYoutube = $request->linkYoutube;
        $product->stress_width = $request->stress_width;
        $product->province_id = $request->province_id;
        $product->branch_id = $request->branch_id;
        $product->user_id = $request->user_id;
        $product->district_id = $request->district_id;
        $product->ward_id = $request->ward_id;

        $product_images = [];
        if ($request->hasFile('image_urls')) {
            $image_urls          = $request->image_urls;
            foreach ($image_urls as $key => $image) {
                //tạo file upload trong public để chạy ảnh
                $path               = 'upload';
                $get_name_image     = $image->getClientOriginalName(); //abc.jpg
                //explode "." [abc,jpg]
                $name_image         = current(explode('.', $get_name_image)); 
                //trả về phần tử thứ 1 của mản -> abc
                //getClientOriginalExtension: tra ve  đuôi ảnh
                $new_image          = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
                $image->move($path, $new_image); //chuyển file ảnh tới thư mục
                $product_images[] = $new_image;
            }
            // dd($product_images);
        }
        try {
            $product->save();
            //luu vao bang product_images
            if( count($product_images) ){
                foreach ($product_images as $product_image) {
                    $ProducImage = new ProducImage();
                    $ProducImage->product_id = $product->id;
                    $ProducImage->image_url = $product_image;
                }
            }
            $ProducImage->save();
            Session::flash('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
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
        $product = Product::find($id);
        // $this->authorize('update', $product);
        $productCategories = ProductCategory::all();
        $provinces = Province::all();
        $branches = Branch::all();
        $districts = District::all();
        $wards = Ward::all();
        $users = User::all();

        $params = [
            'productCategories' => $productCategories,
            'product' => $product,
            'provinces' => $provinces,
            'branches' => $branches,
            'districts' => $districts,
            'wards' => $wards,
            'users' => $users
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
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->address = $request->input('address');
        $product->price = $request->input('price');
        $product->unit = $request->input('unit');
        $product->description = $request->input('description');
        $product->product_category_id = $request->input('product_category_id');
        $product->area = $request->input('area');
        $product->juridical = $request->input('juridical');
        $product->linkYoutube = $request->input('linkYoutube');
        $product->houseDirection = $request->input('houseDirection');
        $product->google_map = $request->input('google_map');
        $product->facade = $request->input('facade');
        $product->stress_width = $request->input('stress_width');
        $product->province_id = $request->input('province_id');
        $product->branch_id = $request->input('branch_id');
        $product->district_id = $request->input('district_id');
        $product->user_id = $request->input('user_id');
        $product->ward_id = $request->input('ward_id');
        try {
            $product->save();
            return redirect()->route('products.index')
                ->with('success', 'Sửa danh mục' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
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
        // $this->authorize('delete', Product::class);
        $product = Product::find($id);
        try {
            $product->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('success', 'Xóa  thành công');
        }
        return redirect()->route('products.index')->with('success', 'Xóa không  thành công');
    }
}
