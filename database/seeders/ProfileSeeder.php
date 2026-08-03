<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public Collection $users;

    public $profiles;

    public function __construct(Collection $users)
    {
        $this->users = $users;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* $this->profiles = $this->users->map(fn ($user) => Profile::factory()
           ->for($user)
           ->create()); */

        /* $this->profiles = collect();
        $this->users->each(fn ($user) => $this->profiles->push(
            Profile::factory()->for($user)->create()
        )); */

        $this->profiles = new Collection;
        $this->users->each(fn ($user) => $this->profiles->push(
            Profile::factory()->for($user)->create()
        ));
    }
}
