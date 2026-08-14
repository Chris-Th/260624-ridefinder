<?php

namespace Database\Seeders;

use App\Enums\EbikePreference;
use App\Enums\ExperiencePreference;
use App\Enums\RideTagGroup;
use App\Models\RideTag;
use Illuminate\Database\Seeder;

class RideTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // some ride tags are mutually exclusive. They are grouped by enums. 'group' column is backed by enum RideTagGroup. Value null means its a non grouped (independent) tag.
        $tags = [
            [
                'name' => ExperiencePreference::BeginnerOnly->value,
                'group' => RideTagGroup::Experience->value,
            ],
            [
                'name' => ExperiencePreference::ExperiencedOnly->value,
                'group' => RideTagGroup::Experience->value,
            ],
            [
                'name' => EbikePreference::Only->value,
                'group' => RideTagGroup::Ebike->value,
            ],
            [
                'name' => EbikePreference::None->value,
                'group' => RideTagGroup::Ebike->value,
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

        foreach ($tags as $tag) {
            RideTag::updateOrCreate(
                ['name' => $tag['name']],
                ['group' => $tag['group']],
            );
        }
    }
}
