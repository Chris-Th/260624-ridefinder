<?php

namespace Database\Factories;

use App\Enums\EbikePreference;
use App\Enums\ExperiencePreference;
use App\Models\RideTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RideTag>
 */
class RideTagFactory extends Factory
{
    public ?string $tag = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            [
                'name' => ExperiencePreference::BeginnerOnly->value,
                'group' => 'experience',
            ],
            [
                'name' => ExperiencePreference::ExperiencedOnly->value,
                'group' => 'experience',
            ],
            [
                'name' => EbikePreference::Only->value,
                'group' => 'ebike',
            ],
            [
                'name' => EbikePreference::None->value,
                'group' => 'ebike',
            ],

            [
                'name' => 'no-drop',
                'group' => null,
            ],
            [
                'name' => 'regroup-at-climbs',
                'group' => null,
            ],
            [
                'name' => 'coffee-stop',
                'group' => null,
            ],
            [
                'name' => 'beginner-friendly',
                'group' => null,
            ],
        ];

        $tags = collect($tags);
        $tag = $this->tag ? $this->tag : $tags->random();

        return [
            'name' => $tag,
        ];
    }
}
