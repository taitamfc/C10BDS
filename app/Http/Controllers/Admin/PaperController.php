<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaperRequest;
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
        $query = Paper::select('*');
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $papers = $query->paginate(10);
        $params = [
            'papers' => $papers,
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
        try {
            $paper->save();
            return redirect()->route('papers.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' . 'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('papers.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' . 'không thành công');
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
    public function update(Request $request, $id)
    {
        $paper = Paper::find($id);
        $paper->title = $request->name;
        $paper->title = $request->status;

        try {
            $paper->save();
            dispatch(new Paper($paper));
            return redirect()->route('messages.index')->with('success', 'Cập nhật' . ' ' . $paper->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('messages.index')->with('error', 'Cập nhật' . ' ' . $paper->title . ' ' .  'không thành công');
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
        try {
            $paper->delete();
            return redirect()->route('messages.index')->with('success', 'Xóa' . ' ' . $paper->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('messages.index')->with('error', 'Xóa' . ' ' . $paper->title . ' ' .  'không thành công');
        }
    }
}
