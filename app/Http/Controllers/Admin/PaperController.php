<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',Paper::class);
        $query = Paper::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $papers = $query->paginate(10);
        $params = [
            'papers' => $papers,
            'name' => $request->name
        ];
        return View('admin.papers.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Paper::class);
        return view('admin.papers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaperRequest $request)
    {
        $paper = new Paper();
        $paper->name = $request->name;
        $paper->status = $request->status;
        try {
            $paper->save();
            return redirect()->route('papers.index')->with('success', 'Thêm giấy tờ' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('papers.index')->with('success', 'Thêm giấy tờ' . ' ' . $request->name . ' ' . 'không thành công');
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
        $paper = Paper::find($id);
        $this->authorize('update',$paper);
        $params = [
            'paper' => $paper
        ];
        return view('admin.papers.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaperRequest $request, $id)
    {
        $paper = Paper::find($id);
        $paper->name = $request->name;
        $paper->status = $request->status;
        try {
            $paper->save();
            return redirect()->route('papers.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('papers.index')->with('error', 'Cập nhật' . ' ' . $request->status . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paper = Paper::find($id);
        $this->authorize('delete', $paper);
        try {
            $paper->delete();
            return redirect()->route('papers.index')->with('success', 'Xóa' . ' ' . $paper->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('papers.index')->with('error', 'Xóa' . ' ' . $paper->title . ' ' .  'không thành công');
        }
    }

    public function trashedItems(Request $request)
    {
        $query = Paper::onlyTrashed();
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        $papers = $query->paginate(5);
        $params = [
            'papers' => $papers,
            'name' => $request->name

        ];
        return view('admin.papers.trash', $params);
    }

    public function force_destroy($id)
    {

        $paper = Paper::withTrashed()->find($id);
        $this->authorize('forceDelete', $paper);
        // dd($message);
        try {
            $paper->forceDelete();
            return redirect()->route('papers.trash')->with('success', 'Xóa' . ' ' . $paper->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('papers.trash')->with('error', 'Xóa' . ' ' . $paper->name . ' ' .  'không thành công');
        }
    }

    public function restore($id)
    {
        $paper = Paper::withTrashed()->find($id);
        $this->authorize('restore', $paper);
        try {
            $paper->restore();
            return redirect()->route('papers.trash')->with('success', 'Khôi phục' . ' ' . $paper->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('papers.trash')->with('error', 'Khôi phục' . ' ' . $paper->name . ' ' .  'không thành công');
        }
    }
}
