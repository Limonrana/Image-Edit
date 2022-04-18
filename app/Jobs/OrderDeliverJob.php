<?php

namespace App\Jobs;

use App\Actions\Admin\OrderDeliveryFilesUpload;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderDeliverJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return Order
     */
    public $order;

    /**
     * Create a new job instance.
     *
     * @return @array $files
     */
    public $files;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order, Array $files)
    {
        $this->order = $order;
        $this->files = $files;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order_id = $this->order->id;
        $user_id = $this->order->user_id;
        $files = $this->files;
        foreach ($files as $file) {
            OrderDeliveryFilesUpload::upload($file, $user_id, $order_id);
        }
    }
}
