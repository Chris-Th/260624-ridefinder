<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public int $userCount;
    public Collection $users;

    public function __construct(int $userCount = 50)
    {
        $this->userCount = $userCount;
    }
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->users = User::factory()->count($this->userCount)->create();

        // $users->each(fn ($user) => Profile::factory()
        //     ->for($user)
        //     ->create());
    }
}
