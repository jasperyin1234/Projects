<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_user_id')->references('user_id')->on('employers')->onDelete('cascade');
            $table->String('title');
            $table->String('logo')->nullable();
            $table->String('tags');
            $table->String('company');
            $table->String('academic_field')->nullable();
            $table->String('location');
            $table->String('email');
            $table->String('website');
            $table->longText('description');
            $table->Boolean('reported')->default(0);
            $table->Boolean('verified')->default(0);
            $table->Boolean('boosted')->default(0);
            $table->integer('slots_available')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }

};
