<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReadKeySaleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_products', function (Blueprint $table) {
//            $table->dropForeign('sale_products_product_id_foreign');
//            $table->foreign('product_id')->references('id')->on('tovars');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_products', function (Blueprint $table) {
//            $table->dropForeign('sale_products_product_id_foreign');
//            $table->foreign('product_id')->references('id')->on('products');
        });
    }
}
