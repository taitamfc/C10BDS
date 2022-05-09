<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemLog;
use Illuminate\Http\Request;

class SystemLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $systemlogs = SystemLog::paginate(5);

        $systemlog = SystemLog::select('*');

        if (isset($request->filter['id']) && $request->filter['id']) {
            $id = $request->filter['id'];
            $systemlog->where('id', 'LIKE', '%' . $id . '%');
        }

        if (isset($request->filter['start_date']) && $request->filter['start_date']) {
            $start_date = $request->filter['start_date'];
            $systemlog->where('created_at', '<=', $start_date);
        }

        if (isset($request->filter['end_date']) && $request->filter['end_date']) {
            $end_date = $request->filter['end_date'];
            $systemlog->where('created_at', '>=', $end_date);
        }

        $systemlogs = $systemlog->paginate(5);

        return view('admin.systemlogs.index', compact('systemlogs'));
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
        //
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
