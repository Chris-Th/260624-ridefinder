# Development Principles

This document defines the development rules for the project.

These principles are intended for both human developers and coding agents.

When in doubt, follow these principles over personal preferences or speculative improvements.

---

# Core Philosophy

## Build The Simplest Thing That Works

Implement the smallest solution that satisfies:

* Current requirements
* Existing tests
* MVP scope

Avoid solving problems that do not exist yet.

Avoid building infrastructure for hypothetical future features.

---

## Behavior Before Architecture

Prioritize working behavior over architectural patterns.

A feature that works and is easy to understand is preferred over a more abstract solution.

Do not introduce additional layers without a demonstrated need.

Examples of patterns that should require justification:

* Repository pattern
* Service layers
* Action classes
* DTOs
* Event-driven architectures

These are tools, not default requirements.

---

## Optimize For Readability

Code is read more often than it is written.

Prefer:

* Clear names
* Small methods
* Explicit behavior

Avoid:

* Clever abstractions
* Excessive indirection
* Unnecessary generic solutions

---

# Testing Rules

## Tests Define Behavior

Tests should describe expected application behavior.

They are not written solely to maximize coverage.

A good test answers:

> "What should the system do?"

---

## Feature Tests First

Feature tests are the primary testing tool.

Examples:

* User can create a ride.
* User can join a ride.
* User cannot edit another user's ride.
* Ride filters return expected results.

Favor feature tests over isolated implementation tests.

---

## TDD For Essential Features

For important functionality:

1. Define behavior.
2. Write tests.
3. Implement.
4. Refactor.

Examples:

* Authorization
* Validation
* Ride creation
* Ride participation
* Filtering

Strict TDD is optional for visual refinements and low-risk UI work.

---

## Do Not Test Framework Behavior

Do not write tests that merely verify Laravel, Livewire, or Alpine functionality.

Test project behavior.

---

# Livewire Principles

## Full Page Components By Default

Pages should generally be implemented as Livewire Full Page Components.

Examples:

* Ride discovery
* Ride details
* Ride creation
* User profile

---

## Keep Related Code Together

Follow Livewire's co-location philosophy.

Keep related concerns close to the component that owns them.

Examples:

* Component logic
* Markup
* Validation
* JavaScript

Avoid unnecessary fragmentation.

---

## Reusable Components Only When Needed

Extract reusable components when:

* Reuse exists
* Complexity justifies extraction

Do not extract components prematurely.

---

# JavaScript Principles

## JavaScript Is Allowed

Use JavaScript when it improves the user experience or simplifies implementation.

There is no requirement to force every interaction through Livewire.

Choose the most appropriate solution for the problem.

---

## Prefer Alpine Data Objects

Interactive client-side behavior should generally be implemented using reusable Alpine.data objects.

Example structure:

```php
<div x-data="carousel">
    ...
</div>

<script>
    Alpine.data('carousel', () => ({
        // state

        // computed properties

        // methods
    }));
</script>
```

Avoid large collections of loose inline Alpine expressions.

Favor named Alpine components with explicit state and methods.

---

## Keep JavaScript Local

Component-specific JavaScript should remain inside the component that owns it whenever practical.

Avoid global scripts unless behavior is intentionally shared across multiple areas of the application.

---

## Prefer Explicit State

Favor:

```js
open: false

toggle() {
    this.open = !this.open
}
```

Over complex inline expressions.

Keep state easy to understand.

---

# UI Principles

## Mobile First

The mobile experience is the primary experience.

Design and implementation decisions should start with mobile layouts.

---

## Content First

Prioritize:

* Information hierarchy
* Readability
* Fast scanning

Especially on ride discovery screens.

---

## Progressive Enhancement

Start simple.

Add complexity only when it provides measurable value.

---

# Agent Guidelines

## Agents Do Not Expand Scope

Implement requested behavior.

Do not introduce:

* New features
* Alternative workflows
* Additional architecture

unless explicitly requested.

---

## Agents Should Generate Tests

When implementing important functionality:

1. Identify essential behaviors.
2. Create or update feature tests.
3. Implement functionality.

Tests help drive development.

---

## Agents Should Explain Significant Decisions

If a task requires a non-obvious architectural choice, explain the reasoning before or alongside the implementation.

---

# Decision Rule

When multiple solutions are possible, choose the solution that is:

1. Easiest to understand.
2. Easiest to test.
3. Easiest to change later.

Not the solution that is theoretically the most flexible.
