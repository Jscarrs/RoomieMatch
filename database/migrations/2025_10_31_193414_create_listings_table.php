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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('address');
            $table->decimal('price', 10, 2);
            $table->string('lease_type');
            $table->string('property_type');
            $table->enum('gender_preference', ['Male', 'Female', 'Coed']);
            $table->boolean('ensuite_washroom')->default(false);
            $table->boolean('pet_friendly')->default(false);
            $table->decimal('bathrooms', 3, 1)->nullable();
            $table->json('photos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
