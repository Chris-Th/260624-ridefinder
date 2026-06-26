<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = collect(['road', 'gravel', 'mtb', 'touring', 'e-bike', 'commuting']);
        $names->each(fn ($name) => Discipline::create([
            'name' => $name,
            'slug' => Str::of($name)->slug()
        ]));
    }
}
