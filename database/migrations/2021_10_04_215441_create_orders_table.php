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
            $table->integer('user_id');
            $table->integer('complexity_id');
            $table->integer('conversation_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_status');
            $table->integer('payment_terms');
            $table->string('payment_method')->nullable();
            $table->integer('qty');
            $table->string('cp_price');
            $table->string('total');
            $table->string('return_file_types');
            $table->string('background_type');
            $table->longText('instructions')->nullable();
            $table->integer('deadline')->default(120);
            $table->dateTime('delivered')->nullable();
            $table->dateTime('delivery_accepted')->nullable();
            $table->integer('is_refund')->default(0);
            $table->integer('status')->default(0);
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
