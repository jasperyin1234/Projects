<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClothessizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothessizes', function (Blueprint $table) {
            $table->id();
            $table->integer('S');
            $table->integer('M');
            $table->integer('L');
            $table->integer('XL');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('product');
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
        Schema::dropIfExists('clothessizes');
    }
}
