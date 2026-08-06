<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('color')->nullable();
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->dateTime('starts_at');
            $table->string('venue_name');
            $table->text('address');
            $table->longText('description');
            $table->string('banner_image')->nullable();
            $table->enum('status', ['ongoing', 'upcoming', 'past'])->default('upcoming');
            $table->string('map_url')->nullable();
            $table->timestamps();
        });

        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('identity_number');
            $table->string('email');
            $table->string('qr_token')->unique();
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamps();
            $table->unique(['event_id', 'identity_number']);
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path')->nullable();
            $table->string('full_name');
            $table->string('identity_number')->unique();
            $table->enum('identity_type', ['MyKad', 'MyTentera', 'MyPolis']);
            $table->date('birth_date');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('presint');
            $table->string('state')->default('WP Putrajaya');
            $table->string('voter_proof_path')->nullable();
            $table->enum('aid_status', ['diterima', 'sedang_dirancang', 'selesai', 'belum_ada_tindakan'])->default('diterima');
            $table->string('aid_proof_path')->nullable();
            $table->timestamps();
        });

        Schema::create('member_aid_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained()->cascadeOnDelete();
            $table->enum('type', [
                'keperluan_asas_dapur',
                'wang_tunai',
                'katil_hospital_kerusi_roda',
                'van_jenazah_percuma',
                'kad_kesihatan_kunan',
            ]);
            $table->string('patient_name')->nullable();
            $table->string('patient_identity_number')->nullable();
            $table->string('patient_phone')->nullable();
            $table->text('patient_address')->nullable();
            $table->timestamps();
        });

        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identity_number');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
            $table->timestamps();
        });

        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['photo', 'youtube', 'tiktok', 'instagram', 'facebook']);
            $table->string('image_path')->nullable();
            $table->string('external_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('slug')->unique();
            $table->string('position');
            $table->string('photo_path')->nullable();
            $table->longText('bio');
            $table->longText('extra_info')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            $table->string('thumbnail_path')->nullable();
            $table->string('category')->nullable();
            $table->longText('content');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('leaders');
        Schema::dropIfExists('gallery_items');
        Schema::dropIfExists('aspirations');
        Schema::dropIfExists('member_aid_requests');
        Schema::dropIfExists('members');
        Schema::dropIfExists('event_registrations');
        Schema::dropIfExists('events');
        Schema::dropIfExists('event_categories');
    }
};
