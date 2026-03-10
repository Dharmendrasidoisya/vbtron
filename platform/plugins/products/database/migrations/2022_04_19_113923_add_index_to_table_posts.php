<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('productsposts', function (Blueprint $table) {
            $table->index('status', 'productsposts_status_index');
            $table->index('author_id', 'productsposts_author_id_index');
            $table->index('author_type', 'productsposts_author_type_index');
            $table->index('created_at', 'productsposts_created_at_index');
        });

        Schema::table('productscategories', function (Blueprint $table) {
            $table->index('parent_id', 'productscategories_parent_id_index');
            $table->index('status', 'productscategories_status_index');
            $table->index('created_at', 'productscategories_created_at_index');
        });
    }

    public function down(): void
    {
        Schema::table('productsposts', function (Blueprint $table) {
            $table->dropIndex('productsposts_status_index');
            $table->dropIndex('productsposts_author_id_index');
            $table->dropIndex('productsposts_author_type_index');
            $table->dropIndex('productsposts_created_at_index');
        });

        Schema::table('productscategories', function (Blueprint $table) {
            $table->dropIndex('productscategories_parent_id_index');
            $table->dropIndex('productscategories_status_index');
            $table->dropIndex('productscategories_created_at_index');
        });
    }
};
