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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('content');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->string('tag');
            $table->string('slug');
            $table->boolean('status')->default(0)->comment('0 = Publish, 1 = Pending');
            /* Users: 0=>Publish, 1=>Pending */
            $table->integer('views')->default(0);
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
