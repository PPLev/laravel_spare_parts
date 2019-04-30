<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('tovar_id')->unsigned();
            $table->foreign('tovar_id')->references('id')->on('tovars');
            $table->integer('price_up')->nullable();
            $table->integer('price_down')->nullable();
            $table->bigInteger('manufacturer_id')->unsigned();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->boolean('status_order')->nullable();
            $table->timestamps();
//            $table->bigInteger('manufacturer_id')->nullable();
//            $table->bigInteger('product_id')->nullable();
//            $table->bigInteger('sale_id')->unsigned();
//            $table->foreign('sale_id')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_products');
    }
}
