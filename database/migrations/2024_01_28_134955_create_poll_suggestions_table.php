<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('poll_suggestions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('poll_id');
            $table->string('book_id');
            $table->jsonb('book')->nullable();
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('poll_id')->references('id')->on('book_polls')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poll_suggestions');
    }
};
