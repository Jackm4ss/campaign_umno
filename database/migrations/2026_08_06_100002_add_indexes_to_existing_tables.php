<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table): void {
                $table->index('status');
                $table->index('starts_at');
            });
        }

        if (Schema::hasTable('articles')) {
            Schema::table('articles', function (Blueprint $table): void {
                $table->index('status');
                $table->index('published_at');
            });
        }

        if (Schema::hasTable('members')) {
            Schema::table('members', function (Blueprint $table): void {
                $table->index('created_at');
            });
        }

        if (Schema::hasTable('leaders')) {
            Schema::table('leaders', function (Blueprint $table): void {
                $table->index(['is_published', 'sort_order']);
            });
        }

        if (Schema::hasTable('gallery_items')) {
            Schema::table('gallery_items', function (Blueprint $table): void {
                $table->index(['is_published', 'sort_order']);
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('events')) {
            Schema::table('events', function (Blueprint $table): void {
                $table->dropIndex(['status']);
                $table->dropIndex(['starts_at']);
            });
        }

        if (Schema::hasTable('articles')) {
            Schema::table('articles', function (Blueprint $table): void {
                $table->dropIndex(['status']);
                $table->dropIndex(['published_at']);
            });
        }

        if (Schema::hasTable('members')) {
            Schema::table('members', function (Blueprint $table): void {
                $table->dropIndex(['created_at']);
            });
        }

        if (Schema::hasTable('leaders')) {
            Schema::table('leaders', function (Blueprint $table): void {
                $table->dropIndex(['leaders_is_published_sort_order_index']);
            });
        }

        if (Schema::hasTable('gallery_items')) {
            Schema::table('gallery_items', function (Blueprint $table): void {
                $table->dropIndex(['gallery_items_is_published_sort_order_index']);
            });
        }
    }
};
