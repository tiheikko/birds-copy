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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bird_id')->nullable();
            $table->text('voice_audio')->nullable();
            $table->text('general_info');
            $table->text('appearance');
            $table->text('appearance_img')->nullable();
            $table->text('appearance_img_note')->nullable();
            $table->text('voice_description');
            $table->text('habitat');
            $table->text('habitat_img')->nullable();
            $table->text('habitat_img_note')->nullable();
            $table->text('behavior');
            $table->text('feeding');
            $table->text('feeding_img')->nullable();
            $table->text('feeding_img_note')->nullable();
            $table->text('breeding');
            $table->text('breeding_img')->nullable();
            $table->text('breeding_img_note')->nullable();


            $table->index('bird_id', 'bird_article_idx');

            $table->foreign('bird_id', 'bird_article_fk')->references('id')->on('species');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
