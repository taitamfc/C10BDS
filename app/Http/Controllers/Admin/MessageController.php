<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Message::select('*');
        if (isset($request->filter['title']) && $request->filter['title']) {
            $title = $request->filter['title'];
            $query->where('title', 'LIKE', '%' . $title . '%');
        }
        $query->orderBy('id', 'DESC');
        $messages = $query->paginate(5);
        $params = [
            'messages' => $messages,
            'filter' => $request->filter

        ];

        return view('admin.messages.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $message = new Message();
        $message->title = $request->title;
        $message->content = $request->content;
        $message->type = $request->type;
        $message->status = $request->status;
        $message->date_send = $request->date_send;

        try {
            $message->save();
            return redirect()->route('messages.index')->with('success', 'Thêm' . ' ' . $message->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('messages.index')->with('error', 'Thêm' . ' ' . $message->title . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        $params = [
            'message' => $message
        ];
        return view('admin.messages.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, $id)
    {
        $message = Message::find($id);
        $message->title = $request->title;
        $message->content = $request->content;
        $message->type = $request->type;
        $message->status = $request->status;
        $message->date_send = $request->date_send;

        try {
            $message->save();
            return redirect()->route('messages.index')->with('success', 'Cập nhật' . ' ' . $message->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('messages.index')->with('error', 'Cập nhật' . ' ' . $message->title . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        try {
            $message->delete();
            return redirect()->route('messages.index')->with('success', 'Xóa' . ' ' . $message->title . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('messages.index')->with('error', 'Xóa' . ' ' . $message->title . ' ' .  'không thành công');
        }
    }
}
