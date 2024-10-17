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
        Schema::create('genera', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('latin_name');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('family_id')->nullable();

            $table->timestamps();

            $table->index('order_id', 'genus_order_idx');
            $table->index('family_id', 'family_genus_idx');

            $table->foreign('order_id', 'genus_order_fk')->references('id')->on('orders');
            $table->foreign('family_id', 'family_genus_fk')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genera');
    }
};
