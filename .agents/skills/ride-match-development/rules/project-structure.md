# Project Structure

This project organizes files primarily by **responsibility**, then by **domain**.

The goal is to keep related code easy to locate while maintaining a clear distinction between presentation and behavior.

---

# Directory Structure

```text
resources/
└── views/
    ├── components/          # Anonymous Blade components
    │
    └── livewire/
        ├── layouts/         # Livewire layouts
        ├── pages/           # Full page Livewire components
        └── components/      # Reusable Livewire components
```

Within both `pages` and `components`, organize files by domain.

Example:

```text
livewire/
├── pages/
│   ├── ride/
│   ├── profile/
│   ├── dashboard/
│   └── auth/
│
└── components/
    ├── shared/
    ├── ride/
    ├── profile/
    └── ...
```

---

# Organize By Domain

Files belonging to the same feature should remain close together.

Examples:

```text
pages/
    ride/
        discover.blade.php
        show.blade.php
        create.blade.php
        edit.blade.php

components/
    ride/
        card.blade.php
        filter-bar.blade.php
        join-button.blade.php
        participant-list.blade.php
```

Avoid creating application-wide folders containing unrelated components.

---

# Blade Components

Anonymous Blade components belong in:

```text
resources/views/components/
```

Blade components should be presentational only.

Examples:

```text
components/
    ui/
        button.blade.php
        input.blade.php
        card.blade.php

    ride/
        badge.blade.php
        stat.blade.php

    profile/
        avatar.blade.php
```

Blade components should not own application state or business logic.

---

# Livewire Components

Livewire components belong in:

```text
resources/views/livewire/
```

Each Livewire component should contain:

* PHP component class
* Blade markup
* Component-specific JavaScript
* Alpine.data definitions
* Validation
* User interaction

Follow Livewire 4's single-file component philosophy by keeping these concerns together.

---

# Full Page Components

Pages belong in:

```text
livewire/pages/
```

Examples:

```text
ride/discover.blade.php
ride/show.blade.php
profile/edit.blade.php
```

These components are intended to be routed directly.

---

# Reusable Livewire Components

Interactive components shared by pages belong in:

```text
livewire/components/
```

Examples:

```text
ride/card.blade.php
ride/filter-bar.blade.php
profile/discipline-selector.blade.php
shared/modal.blade.php
```

---

# Naming

Use singular directory names.

Examples:

```text
ride/
profile/
club/
event/
```

Component filenames should describe their purpose.

Examples:

```text
discover.blade.php
show.blade.php
create.blade.php

card.blade.php
filter-bar.blade.php
join-button.blade.php
```

Avoid redundant prefixes.

Prefer:

```text
ride/card.blade.php
```

Over:

```text
ride/ride-card.blade.php
```

The directory already provides the context.

---

# shared Components

Components intended for reuse across multiple domains belong in:

```text
livewire/components/shared/
```

or

```text
components/ui/
```

Choose based on responsibility:

* `components/ui` → presentational Blade components
* `livewire/components/shared` → reusable interactive Livewire components

---

# Decision Rules

When creating a new component, ask:

### Does it own state or behavior?

Yes →

```text
resources/views/livewire/
```

No →

```text
resources/views/components/
```

---

### Is it directly routed?

Yes →

```text
livewire/pages/
```

No →

```text
livewire/components/
```

---

### Is it specific to a single domain?

Yes →

Place it inside that domain's directory.

Example:

```text
ride/
profile/
```

No →

Place it in the shared location.

Examples:

```text
livewire/components/shared/
components/ui/
```

---

# Guiding Principle

Prefer organizing files by **domain** rather than by technical type.

Developers and coding agents should be able to locate everything related to a feature by navigating to a single domain directory before considering implementation details.
