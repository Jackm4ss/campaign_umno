<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('source', 50)->nullable()->default('direct')->after('aid_proof_path');
        });

        Schema::table('aspirations', function (Blueprint $table) {
            $table->string('source', 50)->nullable()->default('direct')->after('message');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('source');
        });

        Schema::table('aspirations', function (Blueprint $table) {
            $table->dropColumn('source');
        });
    }
};
