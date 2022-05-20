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
use Illuminate\Support\Facades\Log;
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
        if (isset($request->filter['province_id']) && $request->filter['province_id']) {
            $province_id = $request->filter['province_id'];
            $query->where('province_id', $province_id);
        }
        if (isset($request->filter['district_id']) && $request->filter['district_id']) {
            $district_id = $request->filter['district_id'];
            $query->where('district_id', $district_id);
        }
        if (isset($request->filter['ward_id']) && $request->filter['ward_id']) {
            $ward_id = $request->filter['ward_id'];
            $query->where('ward_id', $ward_id);
        }
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $branches = $query->paginate(3);

        $provinces = Province::all();
        $params = [
            'provinces' => $provinces,
            'branches' => $branches,
            'filter' =>$request->filter
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
        $this->authorize('create', Branch::class);
        $branches = Branch::all();
        $provinces = Province::all();
        // $districts = District::all();
        // $wards = Ward::all();

        $params = [
            'branches' => $branches,
            'provinces' => $provinces,
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
            Log::error($e->getMessage());
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
        $this->authorize('update', $branch);
        $provinces = Province::all();
        $districts = District::where('province_id', $branch->province_id)->get();
        $wards = Ward::where('district_id', $branch->district_id)->get();
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
            Log::error($e->getMessage());
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
        
        $branch = Branch::find($id);
        $this->authorize('delete', $branch);
        try {
            $branch->delete();
            return redirect()->route('branches.index')->with('success', 'Xóa' . ' ' . $branch->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('branches.index')->with('error', 'Xóa' . ' ' . $branch->name . ' ' .  'không thành công');
        }
    }

    public function trashedItems(Request $request)
    {
        $query = Branch::onlyTrashed();
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $branches = $query->paginate(3);
        $provinces = Province::all();
        $params = [
            'provinces' => $provinces,
            'branches' => $branches,
            'filter' =>$request->filter
        ];
        return view('admin.branches.trash', $params);
    }

    public function force_destroy($id)
    {
        
        $branch = Branch::withTrashed()->find($id);
        // dd($branch);
        $this->authorize('forceDelete', $branch);
        try {
            $branch->forceDelete();
            return redirect()->route('branches.trash')->with('success', 'Xóa' . ' ' . $branch->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('branches.trash')->with('error', 'Xóa' . ' ' . $branch->name . ' ' .  'không thành công');
        }
    }

    public function restore($id)
    {
        $branch = Branch::withTrashed()->find($id);
        try {
            $branch->restore();
            return redirect()->route('branches.trash')->with('success', 'Khôi phục' . ' ' . $branch->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('branches.trash')->with('error', 'Khôi phục' . ' ' . $branch->name . ' ' .  'không thành công');
        }
    }
}