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
        Schema::create('user_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->integer('shade');
            $table->string('image_path');
            $table->string('fabric');
            $table->string('color');
            $table->integer('yards');
            $table->text('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_inputs');
    }
};
