<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('servicesposts', function (Blueprint $table) {
            $table->index('status', 'servicesposts_status_index');
            $table->index('author_id', 'servicesposts_author_id_index');
            $table->index('author_type', 'servicesposts_author_type_index');
            $table->index('created_at', 'servicesposts_created_at_index');
        });

        Schema::table('servicescategories', function (Blueprint $table) {
            $table->index('parent_id', 'servicescategories_parent_id_index');
            $table->index('status', 'servicescategories_status_index');
            $table->index('created_at', 'servicescategories_created_at_index');
        });
    }

    public function down(): void
    {
        Schema::table('servicesposts', function (Blueprint $table) {
            $table->dropIndex('servicesposts_status_index');
            $table->dropIndex('servicesposts_author_id_index');
            $table->dropIndex('servicesposts_author_type_index');
            $table->dropIndex('servicesposts_created_at_index');
        });

        Schema::table('servicescategories', function (Blueprint $table) {
            $table->dropIndex('servicescategories_parent_id_index');
            $table->dropIndex('servicescategories_status_index');
            $table->dropIndex('servicescategories_created_at_index');
        });
    }
};
