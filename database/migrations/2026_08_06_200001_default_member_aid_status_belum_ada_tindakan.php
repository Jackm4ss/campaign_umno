<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('members')) {
            return;
        }

        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'mysql') {
            DB::statement("ALTER TABLE members ALTER COLUMN aid_status SET DEFAULT 'belum_ada_tindakan'");
        }

        // SQLite cannot ALTER COLUMN defaults; the controller and admin form
        // set the status explicitly, so no action needed there.
    }

    public function down(): void
    {
        if (! Schema::hasTable('members')) {
            return;
        }

        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'mysql') {
            DB::statement("ALTER TABLE members ALTER COLUMN aid_status SET DEFAULT 'diterima'");
        }
    }
};
