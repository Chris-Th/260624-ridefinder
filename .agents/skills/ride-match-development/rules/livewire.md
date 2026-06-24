# livewire.md

# Livewire Architecture Rules

## Full Page Components By Default

Pages should generally be implemented as Livewire Full Page Components.

Examples:

* Ride discovery
* Ride details
* Ride creation
* User profile

Prefer full page components unless there is a clear reason not to.

---

## Follow Co-Location Principles

Keep related concerns together whenever practical.

A component should own:

* State
* Actions
* Validation
* Markup
* Component-specific JavaScript

Avoid unnecessary separation of closely related concerns.

---

## Extract Components Only When Needed

Create reusable components when:

* A component is used multiple times.
* A component has become difficult to understand.
* Extraction improves maintainability.

Do not extract components preemptively.

---

## Blade vs Livewire

Use Blade partials when:

* Rendering is purely presentational.
* No state is required.
* No user interaction is required.

Use Livewire components when:

* State exists.
* User interaction exists.
* Server communication exists.

---

## Keep Components Focused

Components should generally have a single responsibility.

Examples:

Good:

* RideFilter
* ParticipantList
* JoinRideButton

Avoid large components responsible for unrelated behavior.

---

## Prefer Explicit Behavior

Favor readable methods and clearly named actions.

Avoid hiding important business logic inside complex view expressions.

Business logic belongs in PHP.

---

## Avoid Premature Abstractions

Do not introduce additional architectural layers unless a real need exists.

Examples that require justification:

* Repository pattern
* Service layers
* Custom infrastructure

Simple solutions are preferred until complexity demands otherwise.
