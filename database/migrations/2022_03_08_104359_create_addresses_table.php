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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('listing_id');
            $table->text('formatted_address');
            $table->text('postal_code');
            $table->text('lat');
            $table->text('lng');
            $table->text('building_name');
            $table->text('intersection_a');
            $table->text('intersection_b');
            $table->text('address');
            $table->text('city');
            $table->text('province');
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');

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
        Schema::dropIfExists('addresses');
    }
};
