<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('Career_categories_translations')) {
            Schema::create('Career_categories_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('Career_categories_id');
                $table->string('name', 120)->nullable();

                $table->primary(['lang_code', 'Career_categories_id'], 'Career_categories_translations_primary');
            });
        }

        if (! Schema::hasTable('Careers_translations')) {
            Schema::create('Careers_translations', function (Blueprint $table) {
                $table->string('lang_code', 20);
                $table->foreignId('Careers_id');
                $table->text('question')->nullable();
                $table->text('answer')->nullable();

                $table->primary(['lang_code', 'Careers_id'], 'Careers_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('Career_categories_translations');
        Schema::dropIfExists('Careers_translations');
    }
};
