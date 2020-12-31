<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('profession')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('about')->nullable();
            $table->string('nationality')->nullable();
            $table->string('status')->nullable();
            $table->string('email_op')->nullable();
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
        Schema::dropIfExists('userdetails');
    }
}
