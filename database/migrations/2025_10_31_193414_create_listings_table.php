<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();

            // Relationship
            $table->unsignedBigInteger('user_id');

            // Listing details
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('lease_type')->nullable(); // e.g., 4-month, 8-month, lease
            $table->boolean('pet_friendly')->default(false);
            $table->boolean('ensuite_washroom')->default(false);
            $table->string('property_type')->default('apartment'); // apartment or house

            // ✅ New column for photo storage (multiple file paths as JSON)
            $table->json('photos')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
