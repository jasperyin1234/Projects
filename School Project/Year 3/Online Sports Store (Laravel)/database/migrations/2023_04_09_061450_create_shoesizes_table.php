<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoesizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoesizes', function (Blueprint $table) {
            $table->id();
            $table->integer('US8');
            $table->integer('US9');
            $table->integer('US10');
            $table->integer('US11');
            $table->integer('US12');
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
        Schema::dropIfExists('shoesizes');
    }
}
