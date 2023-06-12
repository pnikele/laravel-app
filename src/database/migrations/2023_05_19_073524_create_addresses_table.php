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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country', 60);
            $table->string('county_or_city');
            $table->string('address');
            // $table->string('county', 60);
            // $table->string('parish', 60);
            // $table->string('city', 60)->nullable();
            // $table->string('village',60)->nullable();
            // $table->string('street', 60);
            // $table->integer('house_number')->nullable();
            // $table->integer('apartment_number')->nullable();
            // $table->string('house_name', 60)->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
