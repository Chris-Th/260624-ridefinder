<?php

use App\Models\Profile;
use App\Models\Ride;
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
        Schema::create('profile_ride', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Profile::class);
            $table->foreignIdFor(Ride::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_ride');
    }
};
