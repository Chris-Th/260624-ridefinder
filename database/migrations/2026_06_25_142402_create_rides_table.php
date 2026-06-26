<?php

use App\Models\Discipline;
use App\Models\Pace;
use App\Models\RideType;
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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class); // host
            $table->string('title');
            $table->string('description')->nullable();
            $table->foreignIdFor(Discipline::class);
            $table->foreignIdFor(Pace::class);
            $table->foreignIdFor(RideType::class);
            $table->decimal('distance_km', 5, 1);
            $table->integer('elevation_m');
            $table->string('meeting_point_name');
            $table->string('meeting_point_address');
            $table->dateTime('meets_at');
            $table->dateTime('leaves_at')->nullable();
            $table->integer('max_riders')->nullable();
            $table->boolean('no_drop')->default(false);
            $table->boolean('regroup_at_climbs')->default(false);
            $table->boolean('coffee_stop')->default(false);
            $table->boolean('beginner_friendly')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
