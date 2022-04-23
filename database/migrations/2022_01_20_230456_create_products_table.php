<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id')->unsigned();
            $table->string('name')->unique();
            $table->string('desc');
            $table->string('image');
            $table->string('mesure_unit');
            $table->integer('min_quantity');
            $table->double('stock');
            $table->double('sell_price');
            $table->double('buy_price');
            $table->double('buy_quantity');
            $table->foreignId('category_id')->constrained('Category', 'id');
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
        Schema::dropIfExists('products');
    }
}
