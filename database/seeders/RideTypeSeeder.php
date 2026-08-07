<?php

namespace Database\Seeders;

use App\Enums\RideType as RideTypeEnum;
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
        $rideTypes = collect(RideTypeEnum::values());

        $rideTypes->each(fn ($ride) => RideType::updateOrCreate([
            'name' => $ride,
            'slug' => Str::of($ride)->slug('-'),
            'icon_view_component' => 'vectors.stamps.ride-type-motives.'.Str::of($ride)->slug('-'),
        ]));
    }
}
