<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('applicationcategories', function (Blueprint $table) {
            $table->foreignId('author_id')->nullable()->change();
        });

        Schema::table('applicationtags', function (Blueprint $table) {
            $table->foreignId('author_id')->nullable()->change();
        });

        Schema::table('applicationposts', function (Blueprint $table) {
            $table->foreignId('author_id')->nullable()->change();
        });
    }
};
