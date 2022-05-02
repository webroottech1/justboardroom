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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('payment_type');
            $table->integer('account_id');
            $table->longText('status');
            $table->longText('description');
            $table->decimal('payment_amount');
            $table->decimal('payment_total');
            $table->decimal('payment_tax');
            $table->longText('order_id');
            $table->decimal('discount_percent');
            $table->decimal('discount_amount');
            $table->decimal('cleaning_fee_percent');
            $table->decimal('cleaning_fee_amount');
            $table->longText('authorization');
            $table->longText('last_four');
            $table->longText('payment_id');
            $table->longText('payment_status');
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
        Schema::dropIfExists('payments');

    }
};
