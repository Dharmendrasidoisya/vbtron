<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('applicationposts_translations')) {
            Schema::create('applicationposts_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('applicationposts_id');
                $table->string('name', 255)->nullable();
                $table->string('description', 400)->nullable();
                $table->longText('content')->nullable();

                $table->primary(['lang_code', 'applicationposts_id'], 'applicationposts_translations_primary');
            });
        }

        // if (! Schema::hasTable('applicationcategories_translations')) {
        //     Schema::create('applicationcategories_translations', function (Blueprint $table) {
        //         $table->string('lang_code', 20);
        //         $table->foreignId('applicationcategories_id');
        //         $table->string('name', 255)->nullable();
        //         $table->string('description', 400)->nullable();

        //         $table->primary(['lang_code', 'categories_id'], 'applicationcategories_translations_primary');
        //     });
        // }

        if (! Schema::hasTable('applicationtags_translations')) {
            Schema::create('applicationtags_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('tags_id');
                $table->string('name', 255)->nullable();
                $table->string('description', 400)->nullable();

                $table->primary(['lang_code', 'tags_id'], 'applicationtags_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('applicationposts_translations');
        Schema::dropIfExists('applicationcategories_translations');
        Schema::dropIfExists('applicationtags_translations');
    }
};
