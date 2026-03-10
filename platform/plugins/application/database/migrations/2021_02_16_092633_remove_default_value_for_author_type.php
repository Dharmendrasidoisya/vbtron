<?php

use Botble\ACL\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasColumn('applicationcategories', 'author_type')) {
            Schema::table('applicationcategories', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('applicationcategories', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });

        if (! Schema::hasColumn('applicationtags', 'author_type')) {
            Schema::table('applicationtags', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('applicationtags', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });

        if (! Schema::hasColumn('applicationposts', 'author_type')) {
            Schema::table('applicationposts', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('applicationposts', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });
    }

    public function down(): void
    {
        Schema::table('applicationcategories', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });

        Schema::table('applicationtags', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });

        Schema::table('applicationposts', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });
    }
};
