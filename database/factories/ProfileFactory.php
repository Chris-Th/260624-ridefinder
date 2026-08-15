<?php

namespace Database\Factories;

use App\Enums\ZurichCantonCity;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ottaviano\Faker\Gravatar;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $locations = collect(ZurichCantonCity::cases());

        return [
            'user_id' => User::all()->pluck('id')->random(),
            'location' => $locations->random(),
            'bio' => fake()->paragraph(2),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Profile $profile) {
            if ($profile->hasMedia('profile-photo')) {
                return;
            }
            $faker = \Faker\Factory::create();
            $faker->addProvider(new Gravatar($faker));

            $email = $profile->user?->email ?? fake()->email();

            $profile
                ->addMediaFromUrl($faker->gravatarUrl('robohash', $email, 512))
                ->usingName('profile-avatar')
                ->toMediaCollection('profile-photo');
        });
    }
}
