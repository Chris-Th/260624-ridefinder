<?php

use App\Enums\RideDistance;
use App\Enums\ZurichCantonCity;
use App\Models\TypicalRide;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::profile.show')
        ->assertStatus(200);
});

describe('auth', function () {
    test('guest navigating to a user profile is redirected to login', function () {
        [,$profile] = createUserProfile();

        $this->actingAsGuest()
            ->get('profiles/'.$profile->id)
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
});

describe('basic profile info', function () {

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
});

// Disciplines

it('shows all disciplines associated with the profile', function () {
    $this->seedRideParents();
    [$user, $profile] = createUserProfile();

    $typicalRide1 = TypicalRide::factory()->for($profile)->create();
    $typicalRide2 = TypicalRide::factory()->for($profile)->create();

    [$user, $profile, $page] = visitUserProfilePage($user, $profile);

    $page
        ->assertSee($typicalRide1->discipline->name)
        ->assertSee($typicalRide2->discipline->name);
});

// Typical rides
describe('Typical Rides', function () {
    describe('distance range', function () {
        it('shows a distance range when both minimum and maximum are present', function () {

            [$user, $profile] = $this->createTypicalRide(typicalRideAttrs: [
                'min_distance' => RideDistance::Km25,
                'max_distance' => RideDistance::Km75,
            ]);

            [,,$page] = visitUserProfilePage($user, $profile);

            $page->assertSee('25 Km - 75 Km');
        });

        it('shows correct phrase when only minimum distance exists', function () {
            [$user, $profile] = $this->createTypicalRide(typicalRideAttrs: [
                'min_distance' => RideDistance::Km100,
                'max_distance' => null,
            ]);

            [,,$page] = visitUserProfilePage($user, $profile);

            $page->assertSee('100 Km or more');
        });

        it('shows correct phrase when only maximum distance exists', function () {
            [$user, $profile] = $this->createTypicalRide(typicalRideAttrs: [
                'min_distance' => null,
                'max_distance' => RideDistance::Km50,
            ]);

            [,,$page] = visitUserProfilePage($user, $profile);

            $page->assertSee('Up to 50 Km');
        });

        it('shows Any Distance when min and max distance are null', function () {
            [$user, $profile] = $this->createTypicalRide(typicalRideAttrs: [
                'min_distance' => null,
                'max_distance' => null,
            ]);

            [,,$page] = visitUserProfilePage($user, $profile);

            $page->assertSee('Any Distance');
        });

        it('shows a single distance when min and max distance are equal', function () {
            [$user, $profile] = $this->createTypicalRide(typicalRideAttrs: [
                'min_distance' => RideDistance::Km50,
                'max_distance' => RideDistance::Km50,
            ]);

            [,,$page] = visitUserProfilePage($user, $profile);

            $page->assertSee('50 Km')
                ->assertDontSee('50 Km - 50 Km');
        });
    });

    describe('ride tags', function () {
        it('shows ride tags', function () {
            $this->seedRideParents();
            [$user, $profile] = createUserProfile();
            TypicalRide::factory()->for($profile)
                ->noDrop()
                ->create();

            [,,$page] = visitUserProfilePage($user, $profile);
            $page->assertSee('No Drop');
        });
    });

    it('shows the names of multiple typical rides', function () {
        [$user, $profile, $typicalRide1] = $this->createTypicalRide();
        [,,$typicalRide2] = $this->createTypicalRide(user: $user, profile: $profile);

        $typicalRide1 = TypicalRide::factory()->for($profile)->create();
        $typicalRide2 = TypicalRide::factory()->for($profile)->create();

        [,,$page] = visitUserProfilePage($user, $profile);

        $page
            ->assertSee($typicalRide1->name)
            ->assertSee($typicalRide2->name);
    });

    it('shows the ride type when present', function () {
        [$user, $profile, $typicalRide] = $this->createTypicalRide();

        [,,$page] = visitUserProfilePage($user, $profile);

        $page->assertSee($typicalRide->rideType->name);
    });

    it('shows the discipline when present', function () {
        [$user, $profile, $typicalRide] = $this->createTypicalRide();

        [,,$page] = visitUserProfilePage($user, $profile);

        $page->assertSee($typicalRide->discipline->name);
    });

    it('shows the pace when present', function () {
        [$user, $profile, $typicalRide] = $this->createTypicalRide();

        [,,$page] = visitUserProfilePage($user, $profile);

        $page->assertSee($typicalRide->pace->name);
    });

    // it('handles a typical ride with no optional attributes');
});

// Reliability

it('shows the number of rides hosted');

it('shows the number of rides joined');

it('shows the attendance rate');

// Authorization / privacy (future)

it('hides private profile information');

it('shows edit actions only to the profile owner');

// Performance

it('eager loads all relationships required by the page');
