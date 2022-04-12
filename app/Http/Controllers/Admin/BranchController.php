<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
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
        $branches = Branch::paginate(3);
        $search = $request->search;

        $branches = Branch::select('*');


        if ($search) {
            $branches = $branches->where('name', 'like', '%' . $search . '%')->where('name', $search)->orwhere('id', $search);
        }

        $branches = $branches->paginate(3);

        return view('admin.branches.index', compact('branches'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchRequest $request)
    {


        $branch = new Branch();
        $branch->name = $request->name;
        $branch->address = $request->address;
        $branch->phone = $request->phone;


        $branch->save();

        return redirect()->route('branches.index')->with('success','Thêm'. ' ' . $request->name.' '.  'thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit( $id) 
    {
        $branch = Branch::find($id);
        $params = [
            'branch' => $branch
        ];

        return view('admin.branches.edit',$params);
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
        Branch::find($id)->update($request->only('name'));
        return redirect()->route('branches.index')->with('success', 'Sửa '. ' ' . $request->name.' ' .'thành công');

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
        $branch->delete();
        
        
        return redirect()->route('branches.index')->with('success','Xóa  thành công');

    }
}
