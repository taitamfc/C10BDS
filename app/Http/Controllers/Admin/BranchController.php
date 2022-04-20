<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',Branch::class);
        $query = Branch::select('*');
        // dd($query);
        if( isset( $request->filter['name'] ) && $request->filter['name'] ){
            $name = $request->filter['name'];
            $query->where('name','LIKE','%'.$name.'%');
        }
        if( isset( $request->filter['address'] ) && $request->filter['address'] ){
            $address = $request->filter['address'];
            $query->where('address','LIKE','%'.$address.'%');
        }
        if( isset( $request->filter['phone'] ) && $request->filter['phone'] ){
            $phone = $request->filter['phone'];
            $query->where('phone','LIKE','%'.$phone.'%');
        }
        if( isset( $request->filter['province_id'] ) && $request->filter['province_id'] ){
            $province_id = $request->filter['province_id'];
            $query->where('province_id',$province_id);
        }
        
        if( isset( $request->filter['district_id'] ) && $request->filter['district_id'] ){
            $district_id = $request->filter['district_id'];
            $query->where('district_id',$district_id);
        }
        if( isset( $request->filter['ward_id'] ) && $request->filter['ward_id'] ){
            $ward_id = $request->filter['ward_id'];
            $query->where('ward_id',$ward_id);
        }
        $query->orderBy('id','DESC');

        $branches = $query->paginate(3);

        $provinces = Province::all();
        $params =[
            'provinces' => $provinces,
            'branches' => $branches,
        ];

        return view('admin.branches.index', $params);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $this->authorize('create', Branch::class);
        $branches = Branch::all();
        $provinces = Province::all();
        // $districts = District::all();
        // $wards = Ward::all();

        $params = [
            'branches' => $branches,
            'provinces' => $provinces,
            // 'districts' => $districts,
            // 'wards' => $wards,
        ];
        return view('admin.branches.add', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->province_id = $request->province_id;
        $branch->district_id = $request->district_id;
        $branch->ward_id = $request->ward_id;       
    
        try {
            $branch->save();
            return redirect()->route('branches.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            return redirect()->route('branches.index')->with('error', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
      $this->authorize('view', Branch::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
       // $this->authorize('update', $branch);
        $provinces = Province::all();
        $districts = District::all();
        $wards = Ward::all();
        $params = [
            'branch' => $branch,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
        ];

        return view('admin.branches.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchRequest  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, $id)
    {
        $branch = Branch::find($id);
        $branch->name = $request->name;
        $branch->address = $request->address;
        $branch->phone = $request->phone;
        $branch->province_id = $request->province_id;
        $branch->district_id = $request->district_id;
        $branch->ward_id = $request->ward_id;       
    
        try {
            $branch->save();
            return redirect()->route('branches.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            return redirect()->route('branches.index')->with('error', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->authorize('delete', Branch::class);
        $branch = Branch::find($id);
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Xóa thành công');
    }
}
