<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_delivery', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('full_name')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('delivery_plan')->nullable(false);
            $table->date('delivery_date')->nullable(false);
            $table->string('address_line1')->nullable(false);
            $table->string('address_line2')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('postal_code')->nullable(false);
            $table->string('status');
            $table->foreignId('delivery_worker_id')->nullable(true)->constrained('users', 'id');
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
        Schema::dropIfExists('order_delivery');
    }
}
