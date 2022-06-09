<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductLog;
use App\Models\ProductCustomer;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->user = auth('api')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $can_view_other_branch = true;
        $status = ($request->status) ? [$request->status] : ['selling','expired','sold'];
        $items = Product::with(['product_images', 'product_customers', 'product_logs', 'district', 'province'])->whereIn('status', $status);

        //chỉ xem sản phẩm thuộc chi nhánh hiện tại
        if (!$can_view_other_branch) {
            $items->where('branch_id', $this->user->branch_id);
        }

        if ($request->product_type) {
            switch ($request->product_type) {
                case 'hot_products':
                    $items->where('product_hot', 1);
                    break;
                case 'future_products':
                    $items->where('product_open', 1);
                    break;
                case 'block_products':
                    $items->where('product_type', 'Block');
                    break;
                case 'regular_products':
                    $items->where('product_type', 'Regular');
                    break;
                case 'delivery_products':
                    $items->where('product_type', 'Consignment');
                    break;
                case 'expired_products':
                    $items->where('status', 'expired');
                    break;
                case 'sold_products':
                    $items->where('status', 'sold');
                    break;
                case 'quang_tri':
                    $items->where('province_id', 30);
                    break;
                case 'quang_binh':
                    $items->where('province_id', 29);
                    break;
                case 'hue':
                    $items->where('province_id', 31);
                    break;
                case 'da_nang':
                    $items->where('province_id', 32);
                    break;
                default:
                    # code...
                    break;
            }
        }

        if ($request->id) {
            $items->where('id', 'LIKE', '%' . $request->id . '%');
        }
        if ($request->s) {
            $items->where('sku', 'LIKE', '%' . $request->s . '%');
        }
        if ($request->name) {
            $items->where('id', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->houseDirection) {
            $items->where('houseDirection', $request->houseDirection);
        }

        if ($request->province_id) {
            $items->where('province_id', $request->province_id);
        }

        if ($request->district_id) {
            $items->where('district_id', $request->district_id);
        }

        if ($request->ward_id) {
            $items->where('ward_id', $request->ward_id);
        }
        $items->orderBy('id', 'desc');
        $items = $items->paginate(6);
        if (count($items)) {
            foreach ($items as $item) {
                $item->tinh_thanh_pho = $item->district->name . ', ' . $item->province->name;
                $item->price = $this->formatPrice($item->unit,$item->price);
                $item->name = Str::words($item->name, 15, ' ...');

                if( !count($item->product_images) ){
                    $item->product_images[] = [
                        'image_url' => '/upload/no-image.jpg'
                    ];
                }

            }
        }
 
        return response()->json($items, 200);
    }


    public function show($id)
    {
        $item = Product::with(['product_images', 'district', 'province'])
            ->where('id', $id)
            //->where('branch_id', $this->user->branch_id)
            ->first();

        $item->tinh_thanh_pho = ($item->district) ? $item->district->name : '' . ', ' . $item->province->name;

        //chỉ xem được log của bản thân và hệ thống
        if (false) {
            $item->product_logs = ProductLog::whereIn('user_id', [1, $this->user->id])
                ->where('product_id', $id)->orderBy('created_at', 'DESC')
                ->get();
        } else {
            //cho phép xem toàn bộ
            $item->product_logs = ProductLog::where('product_id', $id)->orderBy('created_at', 'DESC')
                ->get();
        }

        //chỉ xem được log của bản thân và hệ thống
        if (true) {
            $item->product_customers = ProductCustomer::select('customers.*')
                ->join('customers', 'customers.id', '=', 'product_customers.customer_id')
                ->whereIn('product_customers.user_id', [1, $this->user->id])
                ->where('product_customers.product_id', $id)
                ->where('customers.deleted_at', NULL)
                ->orderBy('product_customers.created_at', 'DESC')
                ->get();
        } else {
            //cho phép xem toàn bộ
            $item->product_customers = ProductCustomer::select('customers.*')
                ->join('customers', 'customers.id', '=', 'product_customers.customer_id')
                ->where('product_customers.product_id', $id)
                ->where('customers.deleted_at', NULL)
                ->orderBy('product_customers.created_at', 'DESC')
                ->get();
        }

        if ($item->product_logs) {
            foreach ($item->product_logs as $product_log) {
                $product_log->time_format = date('d/m/Y H:s', strtotime($product_log->created_at));
            }
        }

        if( !count($item->product_images) ){
            $item->product_images[] = [
                'image_url' => '/upload/no-image.jpg'
            ];
        }
        $item->product_end_date = date('d/m/Y', strtotime($item->product_end_date));
        $item->price = $this->formatPrice($item->unit,$item->price);
        $item->price_diff = $this->formatPrice('VND',$item->price_diff);
        $item->price_commission = $this->formatPrice('VND',$item->price_commission);
        $item->price_deposit = $this->formatPrice('VND',$item->price_deposit);
        $item->product_type_label = __($item->product_type);
        $item->juridical = __($item->juridical);
        $item->juridical = __($item->juridical);
        $item->houseDirection = __($item->houseDirection);
        if($item->user_contact_id){
            $item->user_contact = User::withTrashed()->find($item->user_contact_id);
            $item->user_contact = $item->user_contact->name .'( '.$item->user_contact->phone .' )';
        }else{
            $item->user_contact = '-';
        }
        

        return response()->json($item, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = $request->all();
        $product = Product::find($id);
        foreach ($fields as $field => $value) {
            $product->$field = $value;
        }
        $product->save();
        return response()->json($product, 201);
    }

    private function formatPrice($unit,$price){
        switch ($unit) {
            case 'VND':
                return number_format($price).' VND';
                break;
            case 'm2':
                return number_format($price).'/m2';
                break;
            case 'agree':
                return 'Thỏa thuận';
                break;
            default:
                # code...
                break;
        }
    }
}
