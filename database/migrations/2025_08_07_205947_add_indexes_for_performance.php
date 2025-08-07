<?php

// database/migrations/add_indexes_for_performance.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->index(['is_active', 'created_at']);
            $table->index('last_login_at');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->index(['is_published', 'published_at']);
            $table->index(['user_id', 'is_published']);
        });
    }

    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['is_active', 'created_at']);
            $table->dropIndex('last_login_at');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'published_at']);
            $table->dropIndex(['user_id', 'is_published']);
        });
    }
};
