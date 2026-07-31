<?php

use App\Enums\DistanceRange;
use App\Models\Discipline;
use App\Models\Pace;
use App\Models\Profile;
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
        Schema::create('typical_rides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Profile::class)->nullable();
            $table->foreignIdFor(RideType::class)->nullable();
            $table->foreignIdFor(Discipline::class)->nullable();
            $table->foreignIdFor(Pace::class)->nullable();
            $table->enum('min_distance', DistanceRange::cases())->nullable();
            $table->enum('max_distance', DistanceRange::cases())->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typical_rides');
    }
};
