<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Promotions;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeletePromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-promotions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Xóa chương trình giảm giá';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->toDateString();
        $promotions = Promotions::where('end_date','<', $today)->get();
        foreach ($promotions as $promotion) {
            $products = Product::where('promotion_id', $promotion->id)->get();
            if(count($products) > 0) {
                foreach ($products as $product) {
                    $product->update(['promotion_id' => null]);
                }
            }
            $promotion->delete();
        }
        $this->info('Đã hủy liên kết và xóa bản ghi thành công.');
    }
}
