<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->longText('working_process')->nullable();
            $table->longText('tools_used')->nullable();
            $table->dateTime('creating_date')->nullable();
            $table->string('client_name')->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->integer('view')->nullable();
            $table->integer('featured_image_id');
            $table->integer('banner_image_1')->nullable();
            $table->integer('banner_image_2')->nullable();
            $table->integer('banner_image_3')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
