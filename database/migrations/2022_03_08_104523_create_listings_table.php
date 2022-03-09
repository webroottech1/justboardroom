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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->text('description');
            $table->text('picture');
            $table->double('price_per_hour', 8, 2);
            $table->double('price_per_day', 8, 2);
            $table->integer('review_stars');
            $table->unsignedInteger('listing_capacity_id');
            $table->integer('status');
            $table->tinyInteger('half_day_discount');
            $table->tinyInteger('half_discount_rate');
            $table->tinyInteger('full_day_discount');
            $table->tinyInteger('full_discount_rate');
            $table->tinyInteger('hst_check');
            $table->double('sale_tax', 8, 2);
            $table->text('full_day_start_time');
            $table->text('full_day_end_time');
            $table->text('min_hour');
            $table->string('advance_notice');
            $table->longText('hosting_instruction');
            $table->integer('cleaning_fee');
            $table->double('cleaning_fee_percent',8,2);
            $table->integer('step');
            $table->text('sync_token');
            $table->tinyInteger('is_first_listing');
            $table->string('currency');
            $table->integer('listing_type');
            $table->unsignedInteger('address_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('listing_capacity_id')->references('id')->on('listing_capacities');
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
        Schema::dropIfExists('listings');
    }
};
