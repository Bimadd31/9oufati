<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id')->unsigned();
            $table->double('total');
            $table->string('note');
            $table->boolean('onsite')->default(true);
            $table->string('status');
            $table->boolean('active')->default(true);
            $table->float('discount');
            $table->string('discount_code');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('preparer_worker_id')->nullable(true)->constrained('users', 'id');
            $table->foreignId('payement_details_id')->constrained('payement_details', 'id');
            $table->foreignId('delivery_id')->constrained('order_delivery', 'id');

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
        Schema::dropIfExists('orders');
    }
}
