<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Carbon\Carbon;
use  App\Jobs\ProductNotifyJob;
use Telegram\Bot\Laravel\Facades\Telegram;

class ProductNotifyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ProductNotifyCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thông báo sản phẩm sắp hết hạn';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dt = Carbon::now();
        $nextDate = $dt->addDays(3)->toDateString();//2022-05-17
        $products = Product::where('product_type', '=', 'Consignment')
        ->where('product_end_date', $nextDate)
        ->where('status', '=', 'selling')
        ->where('notifyExpired',0)
        ->get();

        if (count($products) > 0){
            foreach ($products as $product){
                dispatch( new ProductNotifyJob($product) )->delay(now()->addMinutes(1));
            }
        }
    }
}
