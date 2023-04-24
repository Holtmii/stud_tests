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
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mark');
            $table->unsignedInteger('id_subject');
            $table->unsignedInteger('id_user');
            $table->boolean('done');


            $table->timestamps();
            $table->foreign('id_subject')->references('id')->on('subjects');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
