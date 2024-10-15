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
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('latin_name');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('family_id')->nullable();
            $table->unsignedBigInteger('genus_id')->nullable();
            $table->boolean('rare');
            $table->boolean('red_list');

            $table->timestamps();


            $table->index('order_id', 'order_species_idx');
            $table->index('family_id', 'family_species_idx');
            $table->index('genus_id', 'genus_species_idx');


            $table->foreign('order_id', 'order_species_fk')->references('id')->on('orders');
            $table->foreign('family_id', 'family_species_fk')->references('id')->on('families');
            $table->foreign('genus_id', 'genus_species_fk')->references('id')->on('genera');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('species');
    }
};
