<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name');
            $table->string('desc')->nullable(true);
            $table->string('image')->nullable(true);
            $table->string('type');
            $table->double('sell_price')->nullable();
            $table->boolean('active')->default(true);
            $table->double('stock')->nullable();
            $table->foreignId('user_id')->nullable(true)->constrained('users', 'id');
            $table->foreignId('category_id')->nullable(true)->constrained('Category', 'id');
            $table->foreignId('discount_id')->nullable(true)->constrained('discounts', 'id');

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
        Schema::dropIfExists('baskets');
    }
}
