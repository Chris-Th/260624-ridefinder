<?php

namespace Database\Seeders;

use App\Enums\RiderStatus;
use App\Models\Ride;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class RideSeeder extends Seeder
{
    private Collection $riders;
    private Collection $hosts;

    public function __construct(Collection $riders, Collection $hosts)
    {
        $this->riders = $riders;
        $this->hosts = $hosts;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->hosts as $host) {
            $rides = Ride::factory()->count(rand(5, 25))->create();
            $rides->each(fn ($ride) => $ride->host()->associate($ride));
        }

        Ride::all()->each(function (Ride $ride) {
            $riders = $this->riders->random(rand(5, 25));

            foreach($riders as $rider) {
                if($rider->id != $ride->user_id) {
                    $ride->riders()->attach($rider, [
                        'status' => collect(RiderStatus::cases())->pluck('value')->random()
                    ]);
                }
            }
        });
    }
}
