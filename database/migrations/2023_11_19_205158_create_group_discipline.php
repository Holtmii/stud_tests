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
        Schema::create('group_disciplines', function (Blueprint $table) {
            $table->unsignedInteger('id_group');
            $table->unsignedInteger('id_discipline');

            $table->foreign('id_group')->references('id')->on('groups');
            $table->foreign('id_discipline')->references('id')->on('disciplines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
