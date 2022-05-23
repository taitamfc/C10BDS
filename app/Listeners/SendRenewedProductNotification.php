<?php

namespace App\Listeners;

use App\Events\ProductRenewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRenewedProductNotification
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
     * @param  \App\Events\ProductRenewed  $event
     * @return void
     */
    public function handle(ProductRenewed $event)
    {
         //gửi cho các thành viên ở chi nhánh qua telegram
         $productname = '[' . $event->product->sku . '] - ' .  $event->product->name;
         $productname = '<a href="'.env('APP_URL').'/products/'.$event->product->id.'">'. $productname .'</a>';
         $telegram_channel_id = env('TELEGRAM_CHANNEL_ID', '');
         if ($telegram_channel_id) {
             $arg = [
                 'chat_id' => $telegram_channel_id,
                 'parse_mode' => 'HTML',
                 'text' => 'Sản phẩm <strong>' . $productname . '</strong> vừa được gia hạn !'
             ];
             if( isset($event->product->product_images[0]) ){
                 $image_url = env('APP_URL').$event->product->product_images[0]->image_url;
                 $inputMediaPhoto = new InputFile($image_url,$event->product->name);
                 $arg['photo'] = $inputMediaPhoto;
                 $arg['caption'] = $arg['text'];
                 Telegram::sendPhoto($arg);
             }else{
                 Telegram::sendMessage($arg);
             }
         }
    }
}
