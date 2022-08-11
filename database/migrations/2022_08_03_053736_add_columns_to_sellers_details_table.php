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
        Schema::table('sellers_details', function (Blueprint $table) {
            $table->string('shop_mobile')->after('shop_name');
            $table->string('shop_banner')->after('shop_mobile');
            $table->string('shop_logo')->after('shop_banner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sellers_details', function (Blueprint $table) {
            $table->dropColumn('shop_mobile');
            $table->dropColumn('shop_banner');
            $table->dropColumn('shop_logo');
        });
    }
};
