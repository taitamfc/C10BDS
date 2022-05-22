<?php

namespace App\Listeners;

use App\Events\ProductSubmitEvent;
use App\Models\SystemLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class ProductSubmitListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProductSubmitEvent  $event
     * @return void
     */
    public function handle(ProductSubmitEvent $event)
    {
        $user = Auth::user();

        $data = '';
        $username = $user->id . '-' . $user->name;
        $productname = $event->product->id . '-' .  $event->product->name;
        $productname = '<a href="https://crm.quanggroup.vn/products/'.$event->product->id.'">'. $productname .'</a>';

        switch ($event->product->active) {
            case 'update':
                $data =  $username . ' đã cập nhật sản phẩm: ' . $productname;
                break;
            case 'store':
                $data =  $username . ' đã thêm sản phẩm: ' . $productname;
                break;
            case 'destroy':
                $data =  $username . ' đã xóa sản phẩm: ' . $productname;
                break;
            default:
                # code...
                break;
        }
        $product = new SystemLog();
        $product->type = 'ProductSubmitEvent';
        $product->data = $data;
        $product->user_id = $user->id;
        $product->save();
    }
}
