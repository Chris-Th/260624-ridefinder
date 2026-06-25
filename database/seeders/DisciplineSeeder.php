<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $names = collect(['road', 'gravel', 'mtb', 'touring', 'e-bike', 'commuting']);
    public function run(): void
    {
        foreach($this->names as $name) {
            Discipline::factory()->create([
                'name' => $name
            ]);
        }
    }
}
