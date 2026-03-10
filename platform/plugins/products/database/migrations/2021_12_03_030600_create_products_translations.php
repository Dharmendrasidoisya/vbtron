<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('productsposts_translations')) {
            Schema::create('productsposts_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('productsposts_id');
                $table->string('name', 255)->nullable();
                $table->string('description', 400)->nullable();
                $table->longText('content')->nullable();

                $table->primary(['lang_code', 'productsposts_id'], 'productsposts_translations_primary');
            });
        }
        // if (! Schema::hasTable('productscategories_translations')) {
        //     Schema::create('productscategories_translations', function (Blueprint $table) {
        //         $table->string('lang_code', 20);
        //         $table->foreignId('productscategories_id');
        //         $table->string('name', 255)->nullable();
        //         $table->string('description', 400)->nullable();

        //         $table->primary(['lang_code', 'categories_id'], 'productscategories_translations_primary');
        //     });
        // }

        if (! Schema::hasTable('productstags_translations')) {
            Schema::create('productstags_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('tags_id');
                $table->string('name', 255)->nullable();
                $table->string('description', 400)->nullable();

                $table->primary(['lang_code', 'tags_id'], 'productstags_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('productsposts_translations');
        Schema::dropIfExists('productscategories_translations');
        Schema::dropIfExists('productstags_translations');
    }
};
