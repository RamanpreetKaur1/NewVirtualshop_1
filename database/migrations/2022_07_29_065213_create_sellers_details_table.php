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
        Schema::create('sellers_details', function (Blueprint $table) {
            $table->id();
            $table->string('seller_name');
            $table->string('seller_email');
            $table->string('seller_password');
            $table->string('seller_mobile');
            $table->string('seller_city');
            $table->string('seller_state');
            $table->string('seller_country');
            $table->string('seller_pincode');
            $table->text('seller_address');
            $table->string('seller_image');
            $table->tinyInteger('status')->default('1');
            $table->string('shop_name');
            $table->text('shop_address');
            $table->string('shop_city');
            $table->string('shop_state');
            $table->string('shop_country');
            $table->string('shop_pincode');
            $table->string('shop_category');
            $table->string('address_proof');
            $table->string('address_proof_image');
            $table->string('account_holder_name');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('bank_ifsc_code');



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
        Schema::dropIfExists('sellers_details');
    }
};
