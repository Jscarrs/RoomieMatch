<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Add a new bathrooms column after the property_type column
            $table->decimal('bathrooms', 2, 1)->nullable()->after('property_type');
        });
    }

    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Remove the bathrooms column if rolled back
            $table->dropColumn('bathrooms');
        });
    }

};
