<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$query = customer::query(true);
        $query = Customer::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if (isset($request->filter['email']) && $request->filter['email']) {
            $email = $request->filter['email'];
            $query->where('email', 'LIKE', '%' . $email . '%');
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
        $customers = $query->paginate(3);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //   $this->authorize('view', customer::class);
        $customers = Customer::all();
        return view('admin.customers.add');
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
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;

        try {
            $customer->save();
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
        //   $this->authorize('view', customer::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $this->authorize('update', $customer);
        $customer = Customer::find($id);
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
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        try {
            $customer->save();
            return redirect()->route('customers.index')->with('success', 'Chỉnh sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', 'Chỉnh sửa' . ' ' . $request->name . ' ' .  'không thành công');
        }    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        try {
            $customer->delete();
            return redirect()->route('customers.index')->with('success', 'Xóa' . ' ' . $customer->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customers.index')->with('error', 'Xóa' . ' ' . $customer->name . ' ' .  'không thành công');
        }    
    }
}
