<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name');
            $table->string('desc');
            $table->double('percent');
            $table->boolean('active');
            $table->date('startDate');
            $table->date('endDate');

            $table->foreignId('product_id')->nullable(true)->constrained('products', 'id');
            $table->foreignId('basket_id')->nullable(true)->constrained('baskets', 'id');

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
        Schema::dropIfExists('discounts');
    }
}
