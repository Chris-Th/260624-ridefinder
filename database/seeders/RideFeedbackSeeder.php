<?php

namespace Database\Seeders;

use App\Models\RideFeedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RideFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RideFeedback::factory()->count(300)->create();
    }
}
