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
            $table->bigIncrements('order_id');
            $table->integer('user_id');
            $table->string('ammount');
            $table->string('vat');
            $table->string('shipping');
            $table->string('total_ammount');
            $table->string('paying_ammount');
            $table->string('order_date');
            $table->string('month');
            $table->integer('year');
            $table->string('pay_by');
            $table->string('card_number');
            $table->string('tracking_code');
            $table->integer('order_status')->default(0);
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
