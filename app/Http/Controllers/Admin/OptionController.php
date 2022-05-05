<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny',Option::class);
        $query = Option::select('*');
        if (isset($request->filter['option_name']) && $request->filter['option_name']) {
            $option_name = $request->filter['option_name'];
            $query->where('option_name', 'LIKE', '%' . $option_name . '%');
        }
        if (isset($request->filter['option_group']) && $request->filter['option_group']) {
            $option_group = $request->filter['option_group'];
            $query->where('option_group', 'LIKE', '%' . $option_group . '%');
        }
        if (isset($request->filter['option_value']) && $request->filter['option_value']) {
            $option_value = $request->filter['option_value'];
            $query->where('option_value', 'LIKE', '%' . $option_value . '%');
        }
        if (isset($request->filter['option_label']) && $request->filter['option_label']) {
            $option_label = $request->filter['option_label'];
            $query->where('option_label', 'LIKE', '%' . $option_label . '%');
        }
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $options = $query->paginate(3);
        return view('admin.options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create',Option::class);
        // $options = Option::all();
        // $params = [
        //     'options' => $options,
        // ];
        $option = Option::all();
        return view('admin.options.add', compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionRequest $request)
    {
        $option = new Option();
        $option->option_name = $request->option_name;
        $option->option_group = $request->option_group;
        $option->option_value = $request->option_value;
        $option->option_label = $request->option_label;
        try {
            $option->save();
            return redirect()->route('options.index')->with('success', 'Thêm' . ' ' . $request->option_name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('options.index')->with('error', 'Thêm' . ' ' . $request->option_name . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        // $this->authorize('view', Option::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $option = Option::find($id);
        // $this->authorize('update', Option::class);
        $params = [
            'option' => $option
        ];
        return view('admin.options.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOptionRequest  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionRequest $request, $id)
    {
        $option = Option::find($id);
        $option->option_name = $request->option_name;
        $option->option_group = $request->option_group;
        $option->option_value = $request->option_value;
        $option->option_label = $request->option_label;

        try {
            $option->save();
            return redirect()->route('options.index')->with('success', 'Chỉnh sửa' . ' ' . $request->option_name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('options.index')->with('error', 'Chỉnh sửa' . ' ' . $request->option_name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->authorize('delete', Option::class);
        $option = Option::find($id);
        try {
            $option->delete();
            return redirect()->route('options.index')->with('success', 'Xóa' . ' ' . $option->option_name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('options.index')->with('error', 'Xóa' . ' ' . $option->options_name . ' ' .  'không thành công');
        }
    }
}
