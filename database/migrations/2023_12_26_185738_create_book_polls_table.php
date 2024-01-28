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
        Schema::create('book_polls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_club_id');
            $table->unsignedBigInteger('user_id');

            $table->dateTimeTz('start_date_poll')->default(now());
            $table->dateTimeTz('end_date_poll')->default(now()->addDays(7));
            $table->dateTimeTz('final_read_date')->nullable();
            $table->string('book_id')->nullable();
            $table->jsonb('book')->nullable();

            $table->foreign('book_club_id')->references('id')->on('book_clubs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_polls');
    }
};
