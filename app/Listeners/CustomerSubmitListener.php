<?php

namespace App\Listeners;

use App\Events\CustomerSubmitEvent;
use App\Models\SystemLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class CustomerSubmitListener
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
     * @param  \App\Events\CustomerSubmitEvent  $event
     * @return void
     */
    public function handle(CustomerSubmitEvent $event)
    {
        $user = Auth::user();
        $data = '';
        $username = $user->id . '-' .  $user->name;
        $customername = $event->customer->id . '-' . $event->customer->name;

        switch ($event->customer->active) {
            case 'store':
                $data = $username . 'đã thêm khách hàng' . $customername;
                break;
            case 'update':
                $data = $username . 'đã sửa khách hàng' . $customername;
                break;
            case 'destroy':
                $data = $username . 'đã xóa khách hàng' . $customername;
                break;
            default:

                break;
        }

        $customer = new SystemLog();
        $customer->type = 'CustomerSubmitEvent';
        $customer->data = $data;
        $customer->user_id = $user->id;

        $customer->save();
    }
}
