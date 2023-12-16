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
        Schema::create('book_clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo_url');
            $table->text('description');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->boolean('is_private')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_clubs');
    }
};
