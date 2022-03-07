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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('profile_pic');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->string('province');
            $table->string('postal_code');
            $table->string('company');
            $table->string('uid');
            $table->string('tax_id');
            $table->string('terms');
            $table->text('passwordCMS');
            $table->text('token');
            $table->string('username');
            $table->string('usernameTemp');
            $table->string('passwordApp'); 
            $table->string('usernameReview');
            $table->integer('active');
            $table->integer('user_type');
            $table->longText('microsoft_token');
            $table->longText('device_token');
            $table->longText('customer_id_stripe');
            $table->integer('terms_guest');
            $table->integer('cus_id_str');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_details');
    }
};
