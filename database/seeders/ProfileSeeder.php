<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{

    public Collection $users;
    public function __construct(Collection $users)
    {
        $this->users = $users;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $this->users->each(fn ($user) => Profile::factory()
            ->for($user)
            ->create());
    }
}
