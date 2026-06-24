# architecture.md

# Architecture Rules

## Build The Simplest Thing That Works

Implement the smallest solution that satisfies:

* Current requirements
* Existing tests
* MVP scope

Avoid solving future problems before they exist.

---

## Behavior Before Architecture

Working behavior is more important than architectural purity.

Prioritize:

* Clarity
* Readability
* Simplicity

before introducing additional abstractions.

---

## Avoid Premature Abstractions

Do not introduce patterns because they might be useful later.

Examples requiring clear justification:

* Repository pattern
* Service layers
* DTOs
* Complex event systems
* Custom infrastructure

Use framework conventions first.

---

## Optimize For Readability

Future maintainability is more important than theoretical flexibility.

Prefer:

* Clear names
* Explicit code
* Small focused methods

Avoid:

* Clever code
* Deep indirection
* Over-generalization

---

## Follow Existing Conventions

Before introducing a new pattern, inspect the existing codebase.

Prefer consistency over personal preference.

A slightly imperfect but consistent codebase is preferable to multiple competing styles.

---

## No Silent Refactors

When implementing a feature:

* Modify only the code required for the task.
* Do not restructure unrelated areas.
* Do not perform broad architectural rewrites.

Large refactors should be separate, intentional tasks.

---

## Agents Must Not Expand Scope

Implement requested functionality.

Do not introduce:

* Additional features
* Alternative workflows
* Future-facing architecture

unless explicitly requested.

---

## Refactor Only After Behavior Exists

Prefer this order:

1. Define behavior.
2. Write tests.
3. Implement.
4. Refactor.

Avoid designing elaborate architecture before working behavior exists.

---

## Decision Rule

When multiple solutions are possible, choose the solution that is:

1. Easiest to understand.
2. Easiest to test.
3. Easiest to change later.

Not the solution that is theoretically the most flexible.
