# Project Context

## Project Overview

Working title: **RideMatch** or **RideFinder**. The 2 Titles are used interchangably throughout this document and throughout .agents/skills/ride-match-development. They describe the same project.

RideMatch is a mobile-first web application that helps cyclists discover compatible rides and connect with other cyclists.

The primary goal is not to build another cycling social network. The primary goal is to help cyclists answer a single question:

> "Can I find a ride and riding partners that match the kind of ride I want to do?"

The application focuses on ride discovery, ride organization, and compatibility between riders and rides.

---

# Product Principles

## Core Value

A user should be able to:

1. Discover a ride.
2. Determine whether it matches their expectations.
3. Join the ride.

Everything else is secondary.

---

## Focus On Ride Compatibility

The platform prioritizes compatibility and expectations over performance metrics.

Examples:

* Coffee Ride
* Social Ride
* Training Ride
* Climbing Ride
* Scenic Ride

The experience of the ride is more important than average speed or power output.

---

## Avoid Building "Strava Lite"

The application is not intended to:

* Record rides
* Analyze performance
* Track fitness
* Replace Strava

Those concerns are intentionally outside MVP scope.

---

# MVP Scope

## Included

* User registration and authentication
* User profiles
* Ride creation
* Ride discovery
* Ride participation
* Ride details
* Basic ride filtering

## Explicitly Excluded

* Real-time tracking
* GPX route management
* Private messaging
* Clubs
* Bike shop pages
* Strava integration
* Achievements
* Gamification
* Social feed

These features may be revisited after validation.

---

# Technology Stack

## Backend

* Laravel 13
* PHP 8.x
* Pest

## Frontend

* Livewire 4 Full Page Components
* Alpine.js
* Blade

## Development Style

* Mobile-first
* Server-driven UI
* Progressive enhancement
* Minimize custom JavaScript

---

# Livewire Architecture

The project follows Livewire 4's co-location philosophy wherever practical.

Components should keep related concerns together:

* Component class
* Template
* JavaScript
* Validation
* Tests

Favor self-contained components over fragmented architectures.

---

## Full Page Components

Pages should generally be implemented as Livewire Full Page Components.

Examples:

* Discover Rides
* Ride Details
* Create Ride
* Profile

---

## Partial Components

Use Livewire components when:

* State management is required
* User interaction is significant
* Reusability provides value

Examples:

* Ride filters
* Join ride controls
* Participant lists

---

## Blade Partials

Use Blade partials when:

* Rendering is purely presentational
* No state is required
* No interaction is required

---

# JavaScript Guidelines

JavaScript should remain minimal.

Prefer:

1. Livewire
2. Alpine.js
3. Custom JavaScript

In that order.

Component-specific JavaScript should remain inside the owning Livewire component whenever possible.

Avoid creating large global JavaScript modules unless a clear need emerges.

---

# Testing Philosophy

## Purpose Of Tests

Tests serve two purposes:

1. Verify essential behavior.
2. Guide and structure development.

Tests are not written merely to maximize coverage.

The test suite should describe the system's most important business behavior.

---

## TDD Strategy

A pragmatic TDD workflow is used.

TDD applies primarily to essential features and business rules.

Not every implementation detail requires a test-first workflow.

Examples of features that should generally be developed using TDD:

* Ride creation
* Ride participation
* Authorization
* Filtering logic
* Validation rules
* Permissions

Examples that may not require strict TDD:

* Layout refinements
* Visual presentation
* Non-critical UI enhancements

---

## Test Types

### Feature Tests First

Feature tests are the primary testing tool.

They describe user-visible behavior and application workflows.

Examples:

* User can create a ride.
* User can join a ride.
* Host can edit own ride.
* Non-host cannot edit ride.
* Ride filters return correct results.

---

### Unit Tests Sparingly

Use unit tests when:

* Business logic becomes isolated and complex.
* Rules can be expressed independently from HTTP or UI workflows.

Avoid creating unit tests solely to increase coverage.

---

## Tests As Development Checkpoints

Before implementing a feature:

1. Define expected user behavior.
2. Create essential feature tests.
3. Implement functionality.
4. Refactor as needed.

The feature test suite acts as the development roadmap.

---

# Coding Agent Guidelines

## Agent Responsibilities

Coding agents are primarily used for:

* Scaffolding
* Repetitive implementation
* Test generation
* Boilerplate creation
* Refactoring assistance

Agents should not make product decisions.

Agents should not expand scope.

Agents should not introduce architecture beyond current project needs.

---

## Scope Discipline

Agents must prefer the simplest implementation that satisfies:

* Existing tests
* Existing requirements
* Current MVP scope

Avoid speculative features.

Avoid premature abstractions.

Avoid future-proofing for hypothetical requirements.

---

## Preferred Development Sequence

When implementing a new feature:

1. Define behavior.
2. Create feature tests.
3. Implement simplest solution.
4. Refactor only after behavior passes.

---

# Initial MVP Development Order

## Phase 1

Authentication

Leverage starter kit functionality.

Minimal customization.

---

## Phase 2

User Profiles

Users define:

* Location
* Cycling disciplines
* Ride preferences

---

## Phase 3

Ride Creation

Users can create rides with:

* Title
* Description
* Discipline
* Ride style
* Pace
* Distance
* Elevation
* Meeting point
* Start time

---

## Phase 4

Ride Participation

Users can:

* Join rides
* Leave rides
* View participants

---

## Phase 5

Ride Discovery

Users can:

* Browse rides
* Filter rides
* View ride details

---

# Design Principles

## Mobile First

The primary experience is mobile.

Desktop support is important but secondary.

---

## Information Density

Ride discovery should prioritize quick scanning.

Users should be able to determine:

* What kind of ride it is
* When it starts
* Whether it matches expectations

within seconds.

---

## Content Before Decoration

Prioritize:

* Clarity
* Simplicity
* Readability

Avoid decorative UI that obscures information.

---

# Success Metric

The primary success metric for the MVP is:

> Successful rides created and completed through the platform.

Not:

* Page views
* Followers
* Likes
* Engagement metrics

The application succeeds when cyclists use it to organize and complete rides.
