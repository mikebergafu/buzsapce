<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('spaces', function (Blueprint $table) {
            $table->decimal('width', 8, 2)->nullable()->after('longitude');
            $table->decimal('length', 8, 2)->nullable()->after('width');
            $table->string('dimension_unit', 10)->default('ft')->after('length');
        });
    }

    public function down(): void
    {
        Schema::table('spaces', function (Blueprint $table) {
            $table->dropColumn(['width', 'length', 'dimension_unit']);
        });
    }
};
