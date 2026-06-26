<?php

namespace Database\Seeders;

use App\Models\Pace;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaceProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::all()->each(function (Profile $p) {
            Pace::all()->pluck('id')->random(rand(1,4))
                ->each(fn ($paceId) => $p->paces()->attach($paceId));
        });
    }
}
