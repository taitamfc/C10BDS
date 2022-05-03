<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\ProductCustomer;
use Illuminate\Support\Facades\Log;

class ProductCustomerController extends Controller
{
    public function __construct()
    {
        $this->user = auth('api')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $customer_id       = $request->customer_id;
        $phone       = $request->phone;

        $customer = Customer::where('phone',$phone)->first();
        if(!$customer_id){
            $customer = new Customer();
            $customer->name     = $request->name;
            $customer->address  = $request->address;
            $customer->phone    = $request->phone;
            $customer->note     = $request->note;
            $customer->user_id  = $this->user->id;
            $customer->save();
            $customer_id = $customer->id;
        }

        $productCustomer = new ProductCustomer();
        $productCustomer->customer_id   = $customer_id;
        $productCustomer->user_id       = $this->user->id;
        $productCustomer->product_id    = $request->product_id;
        $productCustomer->content       = $request->note;

        try {
            $productCustomer->save();
            return response()->json([
                'message' => 'Thêm khách hàng thành công',
                'customer' => $customer
            ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Thêm khách hàng không thành công'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
