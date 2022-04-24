<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(){
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
        $status = ($request->status) ? $request->status : 'selling';
        $items = Product::where('status',$status)->where('branch_id',$this->user->branch_id);

        if($request->id){
            $items->where('id', 'LIKE', '%' . $request->id . '%');
        }
        if($request->name){
            $items->where('id', 'LIKE', '%' . $request->name . '%');
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

        $items = $items->paginate(5);
        if(count($items)){
            foreach($items as $item){
                $item->tinh_thanh_pho = $item->district->name.', '.$item->province->name;
                $item->price = number_format($item->price);
            }
        }
        return response()->json($items, 200);
    }


    public function show($id)
    {
        $item = Product::with(['product_images','product_logs','district','province'])
        ->where('id',$id)
        ->where('branch_id',$this->user->branch_id)
        ->first();

        $item->tinh_thanh_pho = $item->district->name.', '.$item->province->name;
        $item->price = number_format($item->price);
        if($item->product_logs){
            foreach( $item->product_logs as $product_log ){
                $product_log->time_format = date('d/m/Y H:s',strtotime($product_log->created_at));
            }
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
        foreach( $fields as $field => $value ){
            $product->$field = $value;
        }
        $product->save();
        return response()->json($product, 201);
    }
}
