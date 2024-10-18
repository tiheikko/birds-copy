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
        Schema::create('birds_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bird_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('date_seen')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->timestamps();

            $table->index('bird_id', 'bird_id_index');
            $table->index('user_id', 'user_id_index');

            $table->foreign('bird_id', 'bird_id_fk')->references('id')->on('species');
            $table->foreign('user_id', 'user_id_fk')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birds_statistics');
    }
};
