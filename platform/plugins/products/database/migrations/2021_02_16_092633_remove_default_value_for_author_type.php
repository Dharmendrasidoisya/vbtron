<?php

use Botble\ACL\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasColumn('productscategories', 'author_type')) {
            Schema::table('productscategories', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('productscategories', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });

        if (! Schema::hasColumn('productstags', 'author_type')) {
            Schema::table('productstags', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('productstags', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });

        if (! Schema::hasColumn('productsposts', 'author_type')) {
            Schema::table('productsposts', function (Blueprint $table) {
                $table->string('author_type', 255);
            });
        }

        Schema::table('productsposts', function (Blueprint $table) {
            $table->string('author_type', 255)->change();
        });
    }

    public function down(): void
    {
        Schema::table('productscategories', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });

        Schema::table('productstags', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });

        Schema::table('productsposts', function (Blueprint $table) {
            $table->string('author_type', 255)->default(addslashes(User::class))->change();
        });
    }
};
