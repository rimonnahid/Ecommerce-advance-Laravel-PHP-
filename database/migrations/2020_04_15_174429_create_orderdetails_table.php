<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigIncrements('orderdetails_id');
            $table->integer('order_id');
            $table->integer('product_id')->nullable();
            $table->string('product_name');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->integer('qty');
            $table->string('image')->nullable();
            $table->string('single_price');
            $table->string('total_price');
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
        Schema::dropIfExists('orderdetails');
    }
}
