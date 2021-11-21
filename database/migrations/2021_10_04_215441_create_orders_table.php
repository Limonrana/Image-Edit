<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->integer('customer_id');
            $table->string('payment_status');
            $table->integer('payment_method')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->string('total');
            $table->integer('conversation_id')->nullable();
            $table->dateTime('deadline');
            $table->integer('is_delivered')->default(0);
            $table->dateTime('delivery_time')->nullable();
            $table->dateTime('delivery_done_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
