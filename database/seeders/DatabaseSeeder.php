<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            RideTypeSeeder::class,
            DisciplineSeeder::class,
            PaceSeeder::class
        ]);

        $userSeeder = new UserSeeder(200);
        $userSeeder->run();

        $users = $userSeeder->users;

        $profileSeeder = new ProfileSeeder($users);
        $profileSeeder->run();

        $rideSeeder = new RideSeeder($users, $users->random(30));
        $rideSeeder->run();

        $this->call([
            RideFeedbackSeeder::class,
            PaceProfileSeeder::class
        ]);
    }
}
