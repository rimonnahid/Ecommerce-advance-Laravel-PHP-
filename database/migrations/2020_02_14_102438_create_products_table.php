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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcate_id');
            $table->unsignedBigInteger('brand_id');

            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('size')->nullable();
            $table->string('key')->default('details');
            $table->string('en_details')->nullable();
            $table->string('bn_details')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('color')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('videolink')->nullable();
            $table->string('mainslider')->nullable();
            $table->string('bestrated')->nullable();
            $table->string('hotdeal')->nullable();
            $table->string('bestdeal')->nullable();
            $table->string('midslider')->nullable();
            $table->string('hotnew')->nullable();
            $table->string('trend')->nullable();
            $table->string('buyone_getone')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
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
