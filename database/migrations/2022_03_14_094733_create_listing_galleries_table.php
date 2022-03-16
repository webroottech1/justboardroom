<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->string('picture_name');
            $table->tinyInteger('preview_img');
            $table->text('picture');
            $table->text('picture_path');
            $table->text('mobile_path');
            $table->string('size');
            $table->tinyInteger('order');
            $table->foreign('listing_id')->references('id')->on('listings');
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
        Schema::dropIfExists('listing_galleries');
    }
};
