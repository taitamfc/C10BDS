<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\FileUpload\InputFile;
use App\Models\Product;

class ProductNotifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $product;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
       $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //gửi cho các thành viên ở chi nhánh qua telegram
        $productname = '[' . $this->product->sku . '] - ' .  $this->product->name;
        $productname = '<a href="'.env('APP_URL').'/products/'.$this->product->id.'">'. $productname .'</a>';
        $telegram_channel_id = env('TELEGRAM_CHANNEL_ID', '');
        if ($telegram_channel_id) {
            $arg = [
                'chat_id' => $telegram_channel_id,
                'parse_mode' => 'HTML',
                'text' => 'Sản phẩm <strong>' . $productname . '</strong> sắp hết hạn !'
            ];
            if( isset($this->product->product_images[0]) ){
                $image_url = env('APP_URL').$this->product->product_images[0]->image_url;
                $inputMediaPhoto = new InputFile($image_url,$this->product->name);
                $arg['photo'] = $inputMediaPhoto;
                $arg['caption'] = $arg['text'];
                Telegram::sendPhoto($arg);
            }else{
                Telegram::sendMessage($arg);
            }
        }
        //cập nhật trạng thái đã thông Báo
        $this->product->notifyExpired = 1;
        $this->product->save();
    }
}
