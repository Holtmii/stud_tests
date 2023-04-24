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
        Schema::create('discipline_subject', function (Blueprint $table) {
            $table->unsignedInteger('id_subject');
            $table->unsignedInteger('id_discipline');

            $table->foreign('id_subject')->references('id')->on('subjects');
            $table->foreign('id_discipline')->references('id')->on('disciplines');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discipline_subject');
    }
};
