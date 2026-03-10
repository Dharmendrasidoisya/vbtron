<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('servicesposts_translations')) {
            Schema::create('servicesposts_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('servicesposts_id');
                $table->string('name', 255)->nullable();
                $table->string('description', 400)->nullable();
                $table->longText('content')->nullable();

                $table->primary(['lang_code', 'servicesposts_id'], 'servicesposts_translations_primary');
            });
        }

        if (! Schema::hasTable('servicescategories_translations')) {
            Schema::create('servicescategories_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('servicescategories_id');
                $table->string('name', 255)->nullable();
                $table->string('description', 400)->nullable();

                $table->primary(['lang_code', 'categories_id'], 'servicescategories_translations_primary');
            });
        }

        if (! Schema::hasTable('servicestags_translations')) {
            Schema::create('servicestags_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('tags_id');
                $table->string('name', 255)->nullable();
                $table->string('description', 400)->nullable();

                $table->primary(['lang_code', 'tags_id'], 'servicestags_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('servicesposts_translations');
        Schema::dropIfExists('servicescategories_translations');
        Schema::dropIfExists('servicestags_translations');
    }
};
