<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketBasketPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_basket', function (Blueprint $table) {
            $table->unsignedBigInteger('custom_basket_id')->index();
            $table->foreign('custom_basket_id')->references('id')->on('baskets')->onDelete('cascade');
            $table->unsignedBigInteger('fixed_basket_id')->index();
            $table->foreign('fixed_basket_id')->references('id')->on('baskets')->onDelete('cascade');
            $table->primary(['custom_basket_id', 'fixed_basket_id']);
            $table->integer('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_basket');
    }
}
