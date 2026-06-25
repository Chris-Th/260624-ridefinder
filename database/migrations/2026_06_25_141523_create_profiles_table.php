<?php

use App\Models\Discipline;
use App\Models\PaceLevel;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('location');
            $table->string('bio');
            $table->string('profile_photo_path')->nullable();
            $table->smallInteger('distance_min_km');
            $table->smallInteger('distance_max_km')->nullable();
            $table->foreignIdFor(Discipline::class)->nullable()->constrained();
            $table->foreignIdFor(PaceLevel::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
