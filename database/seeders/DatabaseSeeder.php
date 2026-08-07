<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\TypicalRide;
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
            PaceSeeder::class,
            RideTagSeeder::class,
        ]);

        $userSeeder = new UserSeeder(200);
        $userSeeder->run();
        $users = $userSeeder->users;

        $profileSeeder = new ProfileSeeder($users);
        $profileSeeder->run();
        // $profiles = $profileSeeder->profiles;

        $rideSeeder = new RideSeeder($users, $users->random(60));
        $rideSeeder->run();

        // $typicalRideSeeder = new TypicalRideSeeder($profiles);
        // $typicalRideSeeder->run();

        $profiles = Profile::all();

        // Typical rides
        TypicalRide::factory(5)
            ->for($profiles->random())
            ->create();

        TypicalRide::factory(2)
            ->for($profiles->random())
            ->beginnerFriendly()
            ->noDrop()
            ->create();

        TypicalRide::factory(2)
            ->for($profiles->random())
            ->experiencedOnly()
            ->noEbikes()
            ->create();

        // Beginner-oriented rides
        TypicalRide::factory(3)
            ->for($profiles->random())
            ->beginnersOnly()
            ->beginnerFriendly()
            ->noDrop()
            ->create();

        // E-bike rides
        TypicalRide::factory(2)
            ->for($profiles->random())
            ->ebikesOnly()
            ->create();

        $this->call([
            RideFeedbackSeeder::class,
            PaceProfileSeeder::class,
        ]);
    }
}
