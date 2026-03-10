<?php

use Botble\ACL\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasColumn('servicescategories', 'author_type')) {
            Schema::table('servicescategories', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('servicescategories', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });

        if (! Schema::hasColumn('servicestags', 'author_type')) {
            Schema::table('servicestags', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('servicestags', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });

        if (! Schema::hasColumn('servicesposts', 'author_type')) {
            Schema::table('servicesposts', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('servicesposts', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });
    }

    public function down(): void
    {
        Schema::table('servicescategories', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });

        Schema::table('servicestags', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });

        Schema::table('servicesposts', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });
    }
};
