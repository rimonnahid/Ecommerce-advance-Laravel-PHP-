<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->bigIncrements('shipping_id');
            $table->integer('order_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('zipcode')->nullable();
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
        Schema::dropIfExists('shippings');
    }
}
