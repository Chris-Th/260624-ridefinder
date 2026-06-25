<?php

use App\Models\Ride;
use App\Models\User;
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
        Schema::create('ride_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ride::class);
            $table->foreignIdFor(User::class);
            $table->enum('matched_description', ['yes', 'mostly', 'mostly not', 'no']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ride_feedback');
    }
};
