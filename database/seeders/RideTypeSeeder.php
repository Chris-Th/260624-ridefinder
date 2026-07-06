<?php

namespace Database\Seeders;

use App\Models\RideType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RideTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $rides = collect(['Coffee Ride', 'XC / Trails', 'Climbing', 'Social', 'Endurance', 'Bikepacking', 'Adventure', 'Gravel']);

        $rides->each(fn ($ride) => RideType::create([
            'name' => $ride,
            'slug' => Str::of($ride)->slug('-')
        ]));
    }
}
