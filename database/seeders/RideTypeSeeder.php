<?php

namespace Database\Seeders;

use App\Models\RideType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RideTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rides = collect(['coffee', 'trails', 'climbing', 'social', 'endurance', 'bikepacking', 'adventure', 'family', 'paceline']);

        $rides->each(fn ($ride) => RideType::create([
            'name' => $ride,
            'slug' => Str::of($ride)->slug('-'),
            'icon_view_component' => 'vectors.stamps.ride-type-motives.'.Str::of($ride)->slug('-'),
        ]));
    }
}
