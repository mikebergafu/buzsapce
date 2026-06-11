<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type', ['space_owner', 'space_seeker'])->nullable()->after('name');
            $table->string('business_name')->nullable()->after('user_type');
            $table->string('location')->nullable()->after('business_name');
            $table->text('bio')->nullable()->after('location');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_type', 'business_name', 'location', 'bio']);
        });
    }
};
