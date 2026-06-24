# javascript.md

# JavaScript Rules

## General Principle

JavaScript is encouraged when it improves user experience or simplifies implementation.

There is no requirement to force all interactivity through Livewire.

Use the simplest solution that produces maintainable behavior.

---

## Prefer Alpine Data Objects

Interactive behavior should generally be implemented using Alpine.data objects.

Preferred structure:

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

Avoid large collections of anonymous inline Alpine expressions.

---

## Keep JavaScript Local

Component-specific behavior should remain inside the component that owns it.

Whenever practical:

* Alpine component definition
* Template
* Related markup

should live together.

This aligns with Livewire's co-location philosophy.

---

## Prefer Explicit State

Favor clearly named state properties.

Example:

```js
open: false,

toggle() {
    this.open = !this.open
}
```

Avoid deeply nested or difficult-to-follow expressions.

---

## Favor Reusable Alpine Components

When behavior appears in multiple places, extract it into a reusable Alpine.data object.

Examples:

* Modal
* Dropdown
* Carousel
* Tabs

Do not duplicate identical JavaScript across multiple components.

---

## Minimize Global Scripts

Avoid creating global JavaScript unless behavior is intentionally shared application-wide.

Prefer local ownership over centralized script files.

---

## Business Logic Stays In PHP

JavaScript should primarily handle:

* Interaction
* Presentation state
* Client-side UX

Business rules and domain logic belong in PHP.

---

## Progressive Enhancement

Features should continue to function whenever reasonable without relying entirely on client-side JavaScript.

Use JavaScript to enhance the experience, not to replace core functionality.
