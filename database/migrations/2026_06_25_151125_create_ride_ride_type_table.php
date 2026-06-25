<?php

use App\Models\Ride;
use App\Models\RideType;
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
        Schema::create('ride_ride_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id');
            $table->foreignId('ride_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ride_ride_type');
    }
};
