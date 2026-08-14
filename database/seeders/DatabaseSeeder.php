<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Pace;
use App\Models\Profile;
use App\Models\Ride;
use App\Models\RideType;
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

        $userSeeder = new UserSeeder(80);
        $userSeeder->run();
        $users = $userSeeder->users;

        $profileSeeder = new ProfileSeeder($users);
        $profileSeeder->run();

        // $profiles = $profileSeeder->profiles;

        // $rideSeeder = new RideSeeder($users, $users->random(10));
        // $rideSeeder->run();

        // $typicalRideSeeder = new TypicalRideSeeder($profiles);
        // $typicalRideSeeder->run();

        $profiles = Profile::all();

        $paces = Pace::all();
        $disciplines = Discipline::all();
        $rideTypes = RideType::all();

        $profiles->splice(0, 5)->each(function ($profile) {
            Ride::factory()
                ->for($profile)
                ->beginnersOnly()
                ->noDrop()
                ->create();
        });

        $profiles->random(2)->each(function ($profile) {
            Ride::factory()
                ->for($profile)
                ->beginnersOnly()
                ->noDrop()
                ->create();
        });

        $profiles->random(5)->each(function ($profile) {
            Ride::factory()
                ->for($profile)

                ->create();
        });

        $profiles->random(5)->each(function ($profile) {
            Ride::factory()
                ->for($profile)
                ->beginnerFriendly()
                ->regroupAtClimbs()
                ->noDrop()
                ->create();
        });

        $profiles->random(5)->each(function ($profile) {
            Ride::factory()
                ->for($profile)
                ->experiencedOnly()
                ->noEbikes()
                ->coffeeStop()
                ->create();
        });

        $profiles->random(5)->each(function ($profile) use ($paces, $disciplines) {
            $ride = Ride::factory()
                ->for($profile)
                ->experiencedOnly()
                ->noEbikes()
                ->coffeeStop()
                ->regroupAtClimbs()
                ->noDrop()
                ->create();

            $ride->pace()->associate($paces->where('name', 'race'))->first();
            $ride->discipline()->associate($disciplines->where('name', 'road'))->first();
            $ride->save();
        });

        $rideTypeNames = RideType::pluck('name');
        $profiles->random(5)->each(function ($profile) use ($paces, $rideTypes, $rideTypeNames) {
            $ride = Ride::factory()
                ->for($profile)
                ->beginnerFriendly()
                ->regroupAtClimbs()
                ->noDrop()
                ->create();

            $ride->pace()->associate($paces->where('name', 'easy'))->first();
            $ride->rideType()->associate($rideTypes->where('name', $rideTypeNames->shift())->first());
            $ride->save();
        });

        // Ordinary rides
        // Ride::factory(5)
        //     ->for($profiles->random())
        //     ->create();

        // Beginner-oriented rides
        /* Ride::factory(5)
            ->for($profiles->random())
            ->beginnersOnly()
            ->beginnerFriendly()
            ->noDrop()
            ->create(); */

        // Ride::factory(10)
        //     ->for($profiles->random())
        //     ->beginnerFriendly()
        //     ->regroupAtClimbs()
        //     ->noDrop()
        //     ->create();
        /*
            // Fast / experienced rides
            // Ride::factory(8)
            //     ->for($profiles->random())
            //     ->experiencedOnly()
            //     ->noEbikes()
            //     ->create();

            // // E-bike rides
            // Ride::factory(2)
            //     ->for($profiles->random())
            //     ->ebikesOnly()
            //     ->create();

            // // Social rides
            // Ride::factory(3)
            //     ->for($profiles->random())
            //     ->coffeeStop()
            //     ->regroupAtClimbs()
            //     ->create();
        */

        $rideTypeNames = RideType::pluck('name');
        $disciplineNames = Discipline::pluck('name');
        $paces = Pace::all();

        $profiles = Profile::all();

        $profile1 = $profiles->find($profiles->count());

        $typicalRide = TypicalRide::factory()
            ->for($profile1)
            ->beginnerFriendly()
            ->regroupAtClimbs()
            ->noDrop()
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'social')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'social')
                ->first());
        $typicalRide->discipline()
            ->associate($disciplines->where('name', 'road')
                ->first());
        $typicalRide->save();

        $typicalRide = TypicalRide::factory()
            ->for($profile1)
            ->beginnersOnly()
            ->beginnerFriendly()
            ->regroupAtClimbs()
            ->noDrop()
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'easy')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'trails')
                ->first());
        $typicalRide->discipline()
            ->associate($disciplines->where('name', 'gravel')
                ->first());
        $typicalRide->save();

        $typicalRide = TypicalRide::factory()
            ->for($profile1)
            ->experiencedOnly()
            ->noEbikes()
            ->coffeeStop()
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'easy')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'endurance')
                ->first());
        $typicalRide->discipline()
            ->associate($disciplines->where('name', 'road')
                ->first());
        $typicalRide->save();

        $typicalRide = TypicalRide::factory()
            ->for($profile1)
            ->beginnerFriendly()
            ->ebikesOnly()
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'social')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'adventure')
                ->first());
        $typicalRide->discipline()
            ->associate($disciplines->where('name', 'e-bike')
                ->first());
        $typicalRide->save();

        $typicalRide = TypicalRide::factory()
            ->for($profile1)
            ->coffeeStop()
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'fast')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'climbing')
                ->first());
        $typicalRide->discipline()
            ->associate($disciplines->where('name', 'road')
                ->first());
        $typicalRide->save();

        $typicalRide = TypicalRide::factory()
            ->for($profile1)
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'brisk')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'endurance')
                ->first());
        $typicalRide->discipline()
            ->associate($disciplines->where('name', 'road')
                ->first());
        $typicalRide->save();

        $typicalRide = TypicalRide::factory()
            ->for($profile1)
            ->beginnerFriendly()
            ->noDrop()
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'easy')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'family')
                ->first());
        $typicalRide->save();

        $profile2 = $profiles->find($profiles->count() - 1);

        $typicalRide = TypicalRide::factory()
            ->for($profile2)
            ->beginnersOnly()
            ->beginnerFriendly()
            ->regroupAtClimbs()
            ->noDrop()
            ->create();
        $typicalRide->pace()
            ->associate($paces->where('name', 'easy')
                ->first());
        $typicalRide->rideType()
            ->associate($rideTypes->where('name', 'trails')
                ->first());
        $typicalRide->discipline()
            ->associate($disciplines->where('name', 'gravel')
                ->first());
        $typicalRide->save();

        $chunk1 = $profiles->splice(0, 10);
        $chunk1->each(function ($profile) use ($paces, $disciplines, $disciplineNames, $rideTypes, $rideTypeNames) {
            $typicalRide = TypicalRide::factory()
                ->for($profile)
                ->beginnerFriendly()
                ->regroupAtClimbs()
                ->noDrop()
                ->create();

            $typicalRide->pace()->associate($paces->where('name', 'easy'))->first();

            if ($rideTypeNames->isNotEmpty()) {

                $rideType = $rideTypes->where('name', $rideTypeNames->shift());

                $typicalRide->rideType()->associate($rideType->first());
            }

            if ($disciplineNames->isNotEmpty()) {
                $typicalRide->discipline()
                    ->associate($disciplines->where('name', $disciplineNames->shift())
                        ->first());
            }

            $typicalRide = TypicalRide::factory()
                ->for($profile)
                ->experiencedOnly()
                ->coffeeStop()
                ->create();

            $typicalRide->pace()->associate($paces->where('name', 'fast'))->first();

            if ($rideTypeNames->isNotEmpty()) {

                $rideType = $rideTypes->where('name', $rideTypeNames->shift());

                $typicalRide->rideType()->associate($rideType->first());
            }

            if ($disciplineNames->isNotEmpty()) {
                $typicalRide->discipline()
                    ->associate($disciplines->where('name', $disciplineNames->shift())
                        ->first());
            }

            $typicalRide->save();
        });

        $chunk2 = $profiles->splice(0, 10);
        $paces = Pace::all();
        $chunk2->each(function ($profile) use ($paces, $disciplines, $rideTypes) {
            $typicalRide = TypicalRide::factory()
                ->for($profile)
                ->experiencedOnly()
                ->noEbikes()
                ->coffeeStop()
                ->regroupAtClimbs()
                ->noDrop()
                ->create();

            $rideType = collect(['climbing', 'endurance', 'paceline'])->random();
            $typicalRide->pace()->associate($paces->where('name', 'race'))->first();
            $typicalRide->discipline()->associate($disciplines->where('name', 'road')->first());

            $typicalRide->rideType()->associate($rideTypes->where('name', $rideType)->first());
            $typicalRide->save();
        });

        $profiles->random(10)->each(function ($profile) {
            TypicalRide::factory()
                ->for($profile)
                ->beginnersOnly()
                ->noDrop()
                ->create();
        });

        $profiles->random(10)->each(function ($profile) {
            TypicalRide::factory()
                ->for($profile)
                ->beginnersOnly()
                ->noDrop()
                ->create();
        });
        // Typical rides
        TypicalRide::factory(5)
            ->for($profiles->random())
            ->create();

        TypicalRide::factory(10)
            ->for($profiles->random())
            ->beginnerFriendly()
            ->noDrop()
            ->create();

        TypicalRide::factory(8)
            ->for($profiles->random())
            ->experiencedOnly()
            ->noEbikes()
            ->create();

        // Beginner-oriented rides
        TypicalRide::factory(6)
            ->for($profiles->random())
            ->beginnersOnly()
            ->beginnerFriendly()
            ->noDrop()
            ->create();

        // E-bike rides
        TypicalRide::factory(4)
            ->for($profiles->random())
            ->ebikesOnly()
            ->create();

        $this->call([
            RideFeedbackSeeder::class,
        ]);

        $rides = Ride::all();

        // $rides->each(function ($ride) use ($profiles) {
        //     $ride->riders()->attach(
        //         $profiles->random(rand(0, 20))->pluck('id')->toArray()
        //     );
        // });

        $rides->each(function ($ride) use ($profiles) {
            $profiles->random(rand(0, 15))->each(function ($profile) use ($ride) {
                $ride->riders()->save($profile);
            });
        });

        $profiles->random($profiles->count() / 4)->each(function ($profile) use ($rides) {
            $rides->each(function ($ride) use ($profile) {
                $profile->hostedRides()->save($ride);
            });
        });
    }
}
