<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('applicationposts', function (Blueprint $table) {
            $table->index('status', 'applicationposts_status_index');
            $table->index('author_id', 'applicationposts_author_id_index');
            $table->index('author_type', 'applicationposts_author_type_index');
            $table->index('created_at', 'applicationposts_created_at_index');
        });

        Schema::table('applicationcategories', function (Blueprint $table) {
            $table->index('parent_id', 'applicationcategories_parent_id_index');
            $table->index('status', 'applicationcategories_status_index');
            $table->index('created_at', 'applicationcategories_created_at_index');
        });
    }

    public function down(): void
    {
        Schema::table('applicationposts', function (Blueprint $table) {
            $table->dropIndex('applicationposts_status_index');
            $table->dropIndex('applicationposts_author_id_index');
            $table->dropIndex('applicationposts_author_type_index');
            $table->dropIndex('applicationposts_created_at_index');
        });

        Schema::table('applicationcategories', function (Blueprint $table) {
            $table->dropIndex('applicationcategories_parent_id_index');
            $table->dropIndex('applicationcategories_status_index');
            $table->dropIndex('applicationcategories_created_at_index');
        });
    }
};
