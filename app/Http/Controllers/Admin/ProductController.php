<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Branch;
use App\Models\District;
use App\Models\ProductCategory;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Events\ProductCreated;
use App\Events\ProductSold;
use App\Events\ProductRenewed;
use App\Events\ProductSubmitEvent;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hot_products(Request $request)
    {
        $product = Product::select('*')->where('product_hot', 1);



        $product->orderBy('id', 'desc');
        $provinces = Province::all();
        $branches = Branch::all();
        $products = $product->paginate(20);
        $params = [
            'provinces' => $provinces,
            'products' => $products,
            'branches' => $branches,
            'filter' => $request->filter
        ];

        return view('admin.products.index', $params);
    }


    public function product_type(Request $request, $product_type)
    {
        $product = Product::select('*');
        switch ($product_type) {
            case 'products':
                $product->where(1);
                break;
            case 'hot_products':
                $product->where('product_hot', 1);
                break;
            case 'future_products':
                $product->where('product_open', 1);
                break;
            case 'block_products':
                $product->where('product_type', 'Block');
                break;
            case 'regular_products':
                $product->where('product_type', 'Regular');
                break;
            case 'delivery_products':
                $product->where('product_type', 'Consignment');
                break;
            case 'delivery_products':
                $product->where('product_type', 'Consignment');
                break;
            case 'expried_products':
                $product->where('status', 'expried');
                break;
            case 'sold_products':
                $product->where('status', 'sold');
                break;
            default:
                # code...
                break;
        }

        $product->orderBy('id', 'desc');
        $provinces = Province::all();
        $branches = Branch::all();
        $products = $product->paginate(20);
        $params = [
            'provinces' => $provinces,
            'products' => $products,
            'branches' => $branches,
            'product_type' => $product_type,
            'filter' => $request->filter
        ];

        return view('admin.products.index', $params);
    }


    public function index(Request $request)
    {
        // $this->authorize('viewAny', Product::class);
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
        if (isset($request->filter['product_type']) && $request->filter['product_type']) {
            $product_type = $request->filter['product_type'];
            switch ($product_type) {
                case 'hot_products':
                    $product->where('product_hot', 1);
                    break;
                case 'future_products':
                    $product->where('product_open', 1);
                    break;
                case 'block_products':
                    $product->where('product_type', 'Block');
                    break;
                case 'regular_products':
                    $product->where('product_type', 'Regular');
                    break;
                case 'delivery_products':
                    $product->where('product_type', 'Consignment');
                    break;
                default:
                    # code...
                    break;
            }
        }
        if (isset($request->filter['status']) && $request->filter['status']) {
            $status = $request->filter['status'];
            $product->where('status', $status);
        }
        if ($request->s) {
            $product->where('name', 'LIKE', '%' . $request->s . '%');
            $product->orwhere('sku', 'LIKE', '%' . $request->s . '%');
            $product->orwhere('id', $request->s);
        }

        $product->orderBy('id', 'desc');
        $provinces = Province::all();
        $branches = Branch::all();
        $products = $product->paginate(20);
        foreach ($products as $product){
            if($product->product_type == 'Consignment'){
                $now = Carbon::now();
                $dt = Carbon::create($product->product_end_date);
                $product->remaining_day = $now->diffInDays($dt);
            }
        }
        $params = [
            'provinces' => $provinces,
            'products' => $products,
            'branches' => $branches,
            'filter' => $request->filter,
            'product_type' => 'all'


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
        $this->authorize('create', Product::class);
        $productCategories = ProductCategory::all();
        $provinces = Province::all();
        $branches = Branch::all();
        $users = User::all();


        $params = [
            'productCategories' => $productCategories,
            'provinces' => $provinces,
            'branches' => $branches,
            'users' => $users
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
        $old_product = $product;
        $product->name = $request->name;
        $product->address = $request->address;
        $product->price = $request->price;
        $product->price = Str::replace(',', '', $product->price);
        $product->description = $request->description;
        $product->product_category_id = $request->product_category_id;
        $product->area = Str::replace(',', '.', $request->area);
        $product->unit = $request->unit;
        $product->houseDirection = $request->houseDirection;
        $product->facade = Str::replace(',', '.', $request->facade);
        $product->status = $request->status;
        $product->juridical = $request->juridical;
        $product->google_map = $request->google_map;
        $product->linkYoutube = $request->linkYoutube;
        $product->stress_width = Str::replace(',', '.', $request->stress_width);
        $product->province_id = $request->province_id;
        $product->ward_id = $request->ward_id;
        $product->district_id = $request->district_id;
        $product->product_type = $request->product_type;
        $product->product_hot = $request->product_hot;
        $product->product_start_date = $request->product_start_date;
        $product->product_end_date = $request->product_end_date;
        $product->product_open = $request->product_open;
        $product->product_open_date = $request->product_open_date;
        $product->user_contact_id = $request->user_contact_id;
        $product->sku = $request->sku;
        
        
        if ($request->price_deposit) {
            $product->price_deposit = Str::replace(',', '', $request->price_deposit);
        }
        if ($request->price_diff) {
            $product->price_diff = Str::replace(',', '', $request->price_diff);
        }
        if ($request->price_commission) {
            $product->price_commission = Str::replace(',', '', $request->price_commission);
        }
        $product->branch_id = ($request->branch_id) ? $request->branch_id : Auth::user()->branch_id;
        $product->user_id = ($request->user_id) ? $request->user_id : Auth::user()->id;
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
                $product_images[] = '/upload/' . $new_image;
            }
        }
        try {
            $product->save();
            if ($product->status == 'selling') {
                //thông báo khi sản phẩm mới được đăng bán
                event(new ProductCreated($product));
            }
            //luu vao bang product_images
            if (count($product_images)) {
                foreach ($product_images as $product_image) {
                    $ProducImage = new ProductImage();
                    $ProducImage->product_id = $product->id;
                    $ProducImage->image_url = $product_image;
                    $ProducImage->save();
                }
            }
            $product->active = 'store';
            event(new ProductSubmitEvent($product));
            Session::flash('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Thêm ' . $request->name  .  ' không thành công');
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
        $this->authorize('update', $product);
        $productCategories = ProductCategory::all();
        $provinces = Province::all();
        $branches = Branch::all();
        $districts = District::where('province_id', $product->province_id)->get();
        $wards = Ward::where('district_id', $product->district_id)->get();
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
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $old_status =  $product->status;
        $product->name = $request->name;
        $product->address = $request->address;
        $product->price = $request->price;
        $product->price = Str::replace(',', '', $product->price);
        $product->description = $request->description;
        $product->product_category_id = $request->product_category_id;
        $product->area = Str::replace(',', '.', $request->area);
        $product->unit = $request->unit;
        $product->houseDirection = $request->houseDirection;
        $product->facade = Str::replace(',', '.', $request->facade);
        $product->status = $request->status;
        $product->juridical = $request->juridical;
        $product->google_map = $request->google_map;
        $product->linkYoutube = $request->linkYoutube;
        $product->stress_width = Str::replace(',', '.', $request->stress_width);
        $product->province_id = $request->province_id;
        $product->ward_id = $request->ward_id;
        $product->district_id = $request->district_id;
        $product->product_type = $request->product_type;
        $product->product_hot = $request->product_hot;
        $product->product_start_date = $request->product_start_date;
        $product->product_end_date = $request->product_end_date;
        $product->product_open = $request->product_open;
        $product->product_open_date = $request->product_open_date;
        $product->user_contact_id = $request->user_contact_id;
        $product->sku = $request->sku;

        if ($request->price_deposit) {
            $product->price_deposit = Str::replace(',', '', $request->price_deposit);
        }
        if ($request->price_diff) {
            $product->price_diff = Str::replace(',', '', $request->price_diff);
        }
        if ($request->price_commission) {
            $product->price_commission = Str::replace(',', '', $request->price_commission);
        }
        $product->branch_id = ($request->branch_id) ? $request->branch_id : Auth::user()->branch_id;
        $product->user_id = ($request->user_id) ? $request->user_id : Auth::user()->id;

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
                $product_images[] = '/upload/' . $new_image;
            }
        }
        try {
            $product->save();
            //luu vao bang product_images
            if (count($product_images)) {
                foreach ($product_images as $product_image) {
                    $ProducImage = new ProductImage();
                    $ProducImage->product_id = $product->id;
                    $ProducImage->image_url = $product_image;
                    $ProducImage->save();
                }
            }
            //kiểm tra trạng thái cũ của sản phẩm
            if ($old_status != $product->status) {
                if ( $old_status == 'draft' && $product->status == 'selling') {
                    //thông báo khi sản phẩm mới được đăng bán
                    event(new ProductCreated($product));
                }
                if ($product->status == 'sold') {
                    //thông báo khi sản phẩm được bán thành công
                    event(new ProductSold($product));
                }
                if ( $old_status == 'expried' && $product->status == 'selling') {
                    //thông báo khi sản phẩm được gia hạn thành công
                    event(new ProductRenewed($product));
                }
            }
            $product->active = 'update';
            event(new ProductSubmitEvent($product));
            return redirect()->route('products.index')
                ->with('success', 'Cập nhật ' . $request->name  . ' thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')
                ->with('error', 'Cập nhật ' . $request->name  . ' không thành công');
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
        $this->authorize('delete', $product);
        try {
            $product->delete();
            $product->active = 'destroy';
            event(new ProductSubmitEvent($product));
            return redirect()->route('products.index')->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', 'Xóa không thành công');
        }
    }


    public function trashedItems(Request $request)
    {
        $product = Product::onlyTrashed();
        //sắp xếp thứ tự lên trước khi update
        $product->orderBy('id', 'desc');
        $provinces = Province::all();
        $branches = Branch::all();
        $products = $product->paginate(20);
        $params = [
            'provinces' => $provinces,
            'products' => $products,
            'branches' => $branches,
            'filter' => $request->filter,
            'product_type' => 'trash',
        ];
        return view('admin.products.trash', $params);
    }

    public function force_destroy($id)
    {

        $product = Product::withTrashed()->find($id);
        $this->authorize('forceDelete', $product);
        try {
            $product->forceDelete();
            return redirect()->route('products.trash')->with('success', 'Xóa' . ' ' . $product->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.trash')->with('error', 'Xóa' . ' ' . $product->name . ' ' .  'không thành công');
        }
    }


    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        try {
            $product->restore();
            return redirect()->route('products.trash')->with('success', 'Khôi phục' . ' ' . $product->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.trash')->with('error', 'Khôi phục' . ' ' . $product->name . ' ' .  'không thành công');
        }
    }


}
