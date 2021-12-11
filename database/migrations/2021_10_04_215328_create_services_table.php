<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('collection_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->integer('featured_image_id')->nullable();
            $table->integer('banner_image_1')->nullable();
            $table->integer('banner_image_2')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('note')->nullable();
            $table->longText('faqs')->nullable();
            $table->longText('variants')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('services');
    }
}
