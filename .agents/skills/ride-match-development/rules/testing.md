# testing.md

# Testing Rules

## Purpose

Tests serve two purposes:

1. Verify essential application behavior.
2. Guide development.

Tests should describe what the system is expected to do from a user's perspective.

---

## Feature Tests First

Feature tests are the primary testing tool for this project.

Examples:

* User can create a ride.
* User can join a ride.
* User cannot edit another user's ride.
* User can filter rides by discipline.
* User can leave a ride.

Feature tests should generally be written before implementation.

---

## TDD For Essential Features

Use a test-first workflow for important business functionality.

Recommended workflow:

1. Define expected behavior.
2. Create feature tests.
3. Run tests and verify failure.
4. Implement functionality.
5. Refactor once tests pass.

Examples of features that should normally use TDD:

* Ride creation
* Ride participation
* Authorization
* Validation
* Discovery and filtering
* Reputation calculations

---

## Do Not Test Framework Behavior

Do not create tests that simply verify Laravel, Livewire, Alpine, or PHP behavior.

Focus on project-specific business rules.

Bad examples:

* Framework validation already guaranteed by Laravel.
* Livewire rendering behavior without project logic.

Good examples:

* Guests cannot create rides.
* Ride hosts can edit their own rides.
* A rider cannot join the same ride twice.

---

## Prefer Behavior Over Implementation

Tests should describe outcomes rather than internal implementation.

Prefer:

"User can join a ride."

Over:

"JoinRideAction was called."

---

## Test Only What Matters

Do not create tests solely to increase coverage.

If a behavior is not important enough to justify a test, question whether it is important enough to justify implementation complexity.

---

## When Agents Add Features

Before implementing significant functionality:

1. Identify essential business behavior.
2. Add or update feature tests.
3. Implement the simplest solution that satisfies those tests.
