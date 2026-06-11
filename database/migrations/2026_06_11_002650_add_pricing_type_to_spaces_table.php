<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('spaces', function (Blueprint $table) {
            $table->enum('pricing_type', ['daily', 'monthly', 'commission'])->default('monthly')->after('price');
            $table->decimal('commission_rate', 5, 2)->nullable()->after('pricing_type');
        });
    }

    public function down(): void
    {
        Schema::table('spaces', function (Blueprint $table) {
            $table->dropColumn(['pricing_type', 'commission_rate']);
        });
    }
};
