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
        Schema::create('panometa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pano_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('pano_id')->references('id')->on('pano');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panometa');
    }
};
