<?php

namespace Database\Seeders;

use App\Enums\PaceLevel;
use App\Models\Pace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = PaceLevel::cases();
        $sortOrder = 1;

        forEach($levels as $level) {
            Pace::create([
                'name' => $level,
                'sort_order' => $sortOrder
            ]);

            $sortOrder++;
        }
    }
}
