<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('campaign_event_contents', function (Blueprint $table): void {
            $table->date('starts_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('campaign_event_contents', function (Blueprint $table): void {
            $table->dropColumn('starts_at');
        });
    }
};
