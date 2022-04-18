<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreateInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new order instance.
     *
     * @return Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order #'.$this->order->order_number.' - Invoice')
            ->view('emails.orders.create')->with([
                'order' => $this->order,
                'address' => $this->order->user->address,
            ]);
    }
}
