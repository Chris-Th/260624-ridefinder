<?php

use App\Enums\RideDistance;
use App\Models\Profile;
use App\Models\TypicalRide;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::profile.show')
        ->assertStatus(200);
});

it('renders the profile.show component', function () {
    $user = User::factory()->create();
    $profile = Profile::factory()->for($user)->create();

    $this->actingAs($user)->get('/profiles/1')
        ->assertSeeLivewire('pages::profile.show');
});

test('guest navigating to a user profile is redirected to login', function () {
    $user = User::factory()->create();
    $profile = Profile::factory()->for($user)->create();

    Livewire::actingAsGuest()->test('pages::profile.show', ['user' => $user])
        ->assertRedirect('/login');
});

test('logged in user can see their own profile bio', function () {
    $user = User::factory()->create();
    $profile = Profile::factory()->for($user)->create();

    Livewire::actingAs($user)
        ->test('pages::profile.show', ['user' => $user])
        ->assertSee($profile->bio);
});

test('logged in user can see other users profile bio', function () {
    $user = User::factory()->create();
    $profile = Profile::factory()->for($user)->create();
    $otherUser = User::factory()->create();

    Livewire::actingAs($otherUser)
        ->test('pages::profile.show', ['user' => $user])
        ->assertSee($profile->bio);
});

it('shows the riders name', function () {
    User::factory()->create([
        'name' => 'FooBarBob',
    ]);

    Livewire::test('pages::profile.show')
        ->assertSee('FooBarBob');
});

it('shows the riders location');

it('shows the riders biography');

it('shows the riders profile photo');

// Disciplines

it('shows all disciplines associated with the profile');

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
        'max_distance' => RideDistance::Any,
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

it('shows only a minimum distance when no maximum exists');

it('shows only a maximum distance when no minimum exists');

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
