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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('comment');
            $table->timestamps();

            $table->index('article_id', 'article_id_idx');
            $table->index('user_id', 'user_id_idx');

            $table->foreign('article_id', 'comments_article_id_foreign')
                ->references('id')
                ->on('articles');

            $table->foreign('user_id', 'comments_user_id_foreign')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
