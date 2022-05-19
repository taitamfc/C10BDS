<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Jobs\ProductExpriedJob;


class ProductExpriedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ProductExpriedCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thay đỗi trạng thái sắp hết hạn';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dt = Carbon::now();
        $currentDate = $dt->toDateString();
        $products = Product::where('product_type', 'Consignment')
            ->where('product_end_date', $currentDate)
            ->where('status', 'selling')
            ->get();

        if (count($products) > 0) {
            foreach ($products as $product) {
                dispatch( new ProductExpriedJob($product) ); 
            }
        }
    }
}
