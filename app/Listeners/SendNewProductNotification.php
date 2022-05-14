<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Notification;
use App\Notifications\NewProductNotification;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\User;


class SendNewProductNotification
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
     * @param  \App\Events\ProductCreated  $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        //gửi cho các thành viên ở chi nhánh nơi sản phẩm thuộc về
        $users = User::where('branch_id',$event->product->branch_id)->get();
        Notification::send($users, new NewProductNotification($event->product));

        //gửi cho các thành viên ở chi nhánh qua telegram
        $productname = '['.$event->product->id . '] - ' .  $event->product->name;
        $telegram_channel_id = env('TELEGRAM_CHANNEL_ID', '');
        if($telegram_channel_id){
            Telegram::sendMessage([
                'chat_id' => $telegram_channel_id,
                'parse_mode' => 'HTML',
                'text' => 'Sản phẩm <strong>'.$productname.'</strong> vừa được đăng bán !'
            ]);
        }
    }
}
