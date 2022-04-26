<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function __construct(){
        $this->user = auth('api')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::find($this->user->id)->notifications()->paginate(2);
        foreach( $items as $item ){
            $item->time_format = $item->created_at->diffForHumans();
            //$item->data_format  = json_decode($item->data);
            $link = 'window.history.pushState({}, "", "/products/1");';
            switch ($item->type) {
                case 'App\Notifications\NewProductNotification':
                    $item->title    = 'Sản phẩm mới';
                    $item->content  = '[<a onclick='.$link.' href="javascript:;">'. $item->data['name'] .'</a>] vừa được đăng bán';
                    break;
                case 'App\Notifications\SoldProductNotification':
                    $item->title    = 'Sản phẩm đã bán ';
                    
                    $item->content  = '[<a onclick="'.$link.'" href="javascript:;">'. $item->data['name'] .'</a>] vừa được bán thành công';
                    break;
                default:
                    $item->title    = 'Chưa phân loại';
                    $item->content  = '';
                    break;
            }
        }
        return response()->json($items, 200);
    }

    public function destroy($id)
    {
        DB::table('notifications')->where('id',$id)->delete();
        return response()->json(['msg'=>'OK'], 200);
    }
}
