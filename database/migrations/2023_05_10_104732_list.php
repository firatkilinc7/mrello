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
        Schema::create('list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pano_id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->foreign('pano_id')->references('id')->on('pano');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list');
    }
};
