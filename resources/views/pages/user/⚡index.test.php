<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::user.index')
        ->assertStatus(200);
});

test('displays user list columns and header', function () {
    Livewire::test('pages::user.index')
        ->assertSee('Name')
        ->assertSee('Location')
        ->assertSee('Pace Preference')
        ->assertSee('Attendance')
        ->assertSee('Reliability');
});

test('shows a paginated list of users', function () {
    Livewire::test('pages::user.index')
        ->assertSee('Showing 1 to 10 of');
});

test('filters users by pace preference', function () {
    Livewire::test('pages::user.index')
        ->set('filters.pace_preference', 'moderate')
        ->call('applyFilters')
        ->assertSee('moderate');
});

test('sorts users by reliability score', function () {
    Livewire::test('pages::user.index')
        ->call('sortBy', 'reliability_score')
        ->assertSee('Reliability');
});

test('shows empty state when no users are found', function () {
    Livewire::test('pages::user.index')
        ->set('filters.location', 'Nowhere')
        ->call('applyFilters')
        ->assertSee('No users found');
});
