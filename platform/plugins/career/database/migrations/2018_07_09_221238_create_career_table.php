<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('career_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->tinyInteger('order')->default(0);
            $table->string('status', 60)->default('published');
            $table->timestamps();
        });

        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('name');
            $table->text('company');
            $table->text('qualification');
            $table->text('experience');
            $table->text('location');
            $table->text('answer');
            $table->foreignId('category_id');
            $table->string('status', 60)->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_categories');
        Schema::dropIfExists('careers');
    }
};
