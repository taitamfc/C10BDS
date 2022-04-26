<?php

namespace App\Listeners;

use App\Events\ProductSold;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Notification;
use App\Notifications\SoldProductNotification;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\User;


class SendSoldProductNotification
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
     * @param  \App\Events\ProductSold  $event
     * @return void
     */
    public function handle(ProductSold $event)
    {
        //gửi cho các thành viên ở chi nhánh nơi sản phẩm thuộc về
        $users = User::where('branch_id',$event->product->branch_id)->get();
        Notification::send($users, new SoldProductNotification($event->product));

        //gửi cho các thành viên ở chi nhánh qua telegram
        $telegram_channel_id = env('TELEGRAM_CHANNEL_ID', '');
        $telegram_channel_id = '';
        if($telegram_channel_id){
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                'parse_mode' => 'HTML',
                'text' => 'hello'
            ]);
        }
        
    }
}
