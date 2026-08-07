<?php

use App\Enums\RideDistance;
use App\Enums\ZurichCantonCity;
use App\Models\Profile;
use App\Models\TypicalRide;
use App\Models\User;
use Database\Seeders\DisciplineSeeder;
use Database\Seeders\PaceSeeder;
use Database\Seeders\RideTagSeeder;
use Database\Seeders\RideTypeSeeder;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::profile.show')
        ->assertStatus(200);
});

it('profile.show shows correct user name', function () {
    [$user, $profile] = createUserProfile();

    Livewire::actingAs($user)->test('pages::profile.show', ['profile' => $profile])
        ->assertSee($user->name);
});

test('guest navigating to a user profile is redirected to login', function () {
    $user = User::factory()->create();

    $this->actingAsGuest()
        ->get('users/'.$user->id)
        ->assertRedirect('/login');
});

test('logged in user can see their own profile bio', function () {
    [$user, $profile] = createUserProfile();

    Livewire::actingAs($user)
        ->test('pages::profile.show', ['profile' => $profile])
        ->assertSee($profile->bio);
});

test('logged in user can see other users profile bio', function () {
    [$user, $profile] = createUserProfile();
    $otherUser = User::factory()->create();

    Livewire::actingAs($otherUser)
        ->test('pages::profile.show', ['profile' => $profile])
        ->assertSee($profile->bio);
});

it('shows the riders name', function () {
    [$user, $profile] = createUserProfile(userAttrs: ['name' => 'FooBarBob']);

    Livewire::test('pages::profile.show', ['profile' => $profile])
        ->assertSee('FooBarBob');
});

it('shows the riders location', function () {
    [$user, $profile] = createUserProfile(profileAttrs: [
        'location' => ZurichCantonCity::Horgen->value,
    ]);

    Livewire::test('pages::profile.show', ['profile' => $profile])
        ->assertSee('Horgen');
});

it('shows the riders profile photo', function () {
    [$user, $profile] = createUserProfile();
    $file = UploadedFile::fake()->image('avatar.jpg');
    $profile->addMedia($file)->preservingOriginal()->toMediaCollection('profile-photo');

    Livewire::actingAs($user)->test('pages::profile.show', ['profile' => $profile])
        ->assertSee('avatar.jpg');

});

// Disciplines

it('shows all disciplines associated with the profile', function () {
    $this->seed([
        RideTypeSeeder::class,
        DisciplineSeeder::class,
        PaceSeeder::class,
        RideTagSeeder::class,
    ]);
    [$user, $profile] = createUserProfile();
    $typicalRide1 = TypicalRide::factory()->for($profile)->create();
    $typicalRide2 = TypicalRide::factory()->for($profile)->create();

    Livewire::actingAs($user)
        ->test('pages::profile.show', ['profile' => $profile])
        ->assertSee($typicalRide1->discipline->name)
        ->assertSee($typicalRide2->discipline->name);
});

// Typical rides

it('shows all typical rides', function () {
    $user = User::factory()->create();
    $profile = Profile::factory()->for($user)->create();
    $typicalRide1 = TypicalRide::factory()->for($profile)->create([
        'name' => 'Typical Ride 1',
        'min_distance' => RideDistance::Km25,
        'max_distance' => RideDistance::Km75,
    ]);
    $typicalRide2 = TypicalRide::factory()->for($profile)->create([
        'name' => 'Typical Ride 2',
        'min_distance' => RideDistance::Km100,
        'max_distance' => null,
    ]);

    visit('/profiles/1')
        ->assertSee('Typical Ride 1')
        ->assertSee('25')
        ->assertSee('75')
        ->assertSee('100')
        ->assertSee('or more');
});

it('shows the name of each typical ride');

it('shows the ride type when present');

it('shows the discipline when present');

it('shows the pace when present');

it('shows a distance range when both minimum and maximum are present');

it('shows correct phrase when only minimum distance exists');

it('shows correct phrase when only maximum distance exists');

it('handles a typical ride with no optional attributes');

// Reliability

it('shows the number of rides hosted');

it('shows the number of rides joined');

it('shows the attendance rate');

// Authorization / privacy (future)

it('hides private profile information');

it('shows edit actions only to the profile owner');

// Performance

it('eager loads all relationships required by the page');

it('displays user name', function () {
    User::factory()->create([
        'name' => 'FooBarBob',
    ]);

    Livewire::test('pages::profile.show')
        ->assertSee('FooBarBob');
});

it('displays profile info', function () {
    $user = User::factory()->create();
    $profile = Profile::factory()->for($user)->create();
});

it('displays typical rides', function () {});
