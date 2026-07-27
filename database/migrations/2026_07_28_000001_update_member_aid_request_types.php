<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('member_aid_requests')) {
            return;
        }

        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'mysql') {
            DB::statement("ALTER TABLE member_aid_requests MODIFY COLUMN type ENUM(
                'keperluan_asas_dapur',
                'wang_tunai',
                'katil_hospital_kerusi_roda',
                'van_jenazah_percuma',
                'kad_kesihatan_kunan',
                'katil_hospital',
                'makanan_asas',
                'wang_tunai_rm_300'
            ) NOT NULL");

            DB::table('member_aid_requests')->where('type', 'makanan_asas')->update(['type' => 'keperluan_asas_dapur']);
            DB::table('member_aid_requests')->where('type', 'wang_tunai_rm_300')->update(['type' => 'wang_tunai']);
            DB::table('member_aid_requests')->where('type', 'katil_hospital')->update(['type' => 'katil_hospital_kerusi_roda']);

            DB::statement("ALTER TABLE member_aid_requests MODIFY COLUMN type ENUM(
                'keperluan_asas_dapur',
                'wang_tunai',
                'katil_hospital_kerusi_roda',
                'van_jenazah_percuma',
                'kad_kesihatan_kunan'
            ) NOT NULL");

            return;
        }

        if ($driver === 'sqlite') {
            // Fresh installs already use the updated create migration.
            // Existing SQLite rows (if any) are remapped best-effort.
            DB::table('member_aid_requests')->where('type', 'makanan_asas')->update(['type' => 'keperluan_asas_dapur']);
            DB::table('member_aid_requests')->where('type', 'wang_tunai_rm_300')->update(['type' => 'wang_tunai']);
            DB::table('member_aid_requests')->where('type', 'katil_hospital')->update(['type' => 'katil_hospital_kerusi_roda']);
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('member_aid_requests')) {
            return;
        }

        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'mysql') {
            DB::statement("ALTER TABLE member_aid_requests MODIFY COLUMN type ENUM(
                'keperluan_asas_dapur',
                'wang_tunai',
                'katil_hospital_kerusi_roda',
                'van_jenazah_percuma',
                'kad_kesihatan_kunan',
                'katil_hospital',
                'makanan_asas',
                'wang_tunai_rm_300'
            ) NOT NULL");

            DB::table('member_aid_requests')->where('type', 'keperluan_asas_dapur')->update(['type' => 'makanan_asas']);
            DB::table('member_aid_requests')->where('type', 'wang_tunai')->update(['type' => 'wang_tunai_rm_300']);
            DB::table('member_aid_requests')->where('type', 'katil_hospital_kerusi_roda')->update(['type' => 'katil_hospital']);
            DB::table('member_aid_requests')->whereIn('type', ['van_jenazah_percuma', 'kad_kesihatan_kunan'])->delete();

            DB::statement("ALTER TABLE member_aid_requests MODIFY COLUMN type ENUM(
                'katil_hospital',
                'makanan_asas',
                'wang_tunai_rm_300'
            ) NOT NULL");

            return;
        }

        if ($driver === 'sqlite') {
            DB::table('member_aid_requests')->where('type', 'keperluan_asas_dapur')->update(['type' => 'makanan_asas']);
            DB::table('member_aid_requests')->where('type', 'wang_tunai')->update(['type' => 'wang_tunai_rm_300']);
            DB::table('member_aid_requests')->where('type', 'katil_hospital_kerusi_roda')->update(['type' => 'katil_hospital']);
            DB::table('member_aid_requests')->whereIn('type', ['van_jenazah_percuma', 'kad_kesihatan_kunan'])->delete();
        }
    }
};
