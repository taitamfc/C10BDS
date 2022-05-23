<?php

namespace App\Http\Controllers\Admin;

use App\Events\CustomerSubmitEvent;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Exports\CustomerExport;
use Excel;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Customer::class);
        //$query = customer::query(true);
        $query = Customer::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if (isset($request->filter['address']) && $request->filter['address']) {
            $address = $request->filter['address'];
            $query->where('address', 'LIKE', '%' . $address . '%');
        }
        if (isset($request->filter['phone']) && $request->filter['phone']) {
            $phone = $request->filter['phone'];
            $query->where('phone', 'LIKE', '%' . $phone . '%');
        }
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $customers = $query->paginate(10);
        $params = [
            'customers' => $customers,
            'filter' => $request->filter
        ];
        return view('admin.customers.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Customer::class);
        $customers = Customer::all();
        return view('admin.customers.add', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;

        try {
            $customer->save();

            $customer->active = 'store';
            event(new CustomerSubmitEvent($customer));


            return redirect()->route('customers.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $this->authorize('view', Customer::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $this->authorize('update', $customer);
        $params = [
            'customer' => $customer
        ];

        return view('admin.customers.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        try {
            $customer->save();

            $customer->active = 'update';
            event(new CustomerSubmitEvent($customer));


            return redirect()->route('customers.index')->with('success', 'Chỉnh sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', 'Chỉnh sửa' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $this->authorize('delete', $customer);

        try {
            $customer->delete();

            $customer->active = 'destroy';
            event(new CustomerSubmitEvent($customer));

            return redirect()->route('customers.index')->with('success', 'Xóa' . ' ' . $customer->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', 'Xóa' . ' ' . $customer->name . ' ' .  'không thành công');
        }
    }

    public function trashedItems(Request $request)
    {
        $query = Customer::onlyTrashed();
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $customers = $query->paginate(10);
        $params = [
            'customers' => $customers,
            'filter' => $request->filter
        ];
        return view('admin.customers.trash', $params);
    }

    public function force_destroy($id)
    {

        $customer = Customer::withTrashed()->find($id);
        // dd($customer);
        $this->authorize('forceDelete', $customer);
        try {
            $customer->forceDelete();
            return redirect()->route('customers.trash')->with('success', 'Xóa' . ' ' . $customer->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.trash')->with('error', 'Xóa' . ' ' . $customer->name . ' ' .  'không thành công');
        }
    }


    public function restore($id)
    {
        $customer = Customer::withTrashed()->find($id);
        $this->authorize('restore', $customer);

        try {
            $customer->restore();
            return redirect()->route('customers.trash')->with('success', 'Khôi phục' . ' ' . $customer->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.trash')->with('error', 'Khôi phục' . ' ' . $customer->name . ' ' .  'không thành công');
        }
    }
    public function export(){
        return FacadesExcel::download(new CustomerExport, 'customer.xlsx');
    }
}
