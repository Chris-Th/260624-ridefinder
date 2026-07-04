# Laravel Package Cheat Sheet — `ride-control-mark`

## 1. Scaffold

```text
packages/
└── eatsfunk/
    └── ride-control-mark/
```

```text
src/
resources/
config/
routes/
tests/
composer.json
README.md
```

---

## 2. PSR-4

```json
"autoload": {
  "psr-4": {
    "Eatsfunk\\RideControlMark\\": "src/"
  }
}
```

```bash
composer dump-autoload
```

---

## 3. Service Provider

```php
RideControlMarkServiceProvider
```

Registers:

- views
- config
- assets
- Blade components

---

## 4. Resources

```text
resources/
    views/components/
        control-mark.blade.php

    svg/
        stamp.svg
        defs.svg
        filters.svg
        symbols/
```

Never publish these by default unless users want to override them.

---

## 5. Config

```php
return [

    'font' => 'IBM Plex Mono',

    'colors' => [...],

    'ride_types' => [...],

];
```

Allow application overrides.

---

## 6. Blade API

```blade
<x-control-mark
    type="coffee"
    place="Einsiedeln"
    datetime="$ride->starts_at"
/>
```

Everything else should be automatic.

---

## 7. PHP API

```php
ControlMark::make($ride)

ControlMark::svg(...)

ControlMark::color(...)

ControlMark::label(...)
```

Useful outside Blade.

---

## 8. Asset Strategy

Package owns

- SVG
- filters
- icons

Application owns

- data
- colors (optional override)
- CSS

---

## 9. Configuration Publishing

```bash
php artisan vendor:publish
```

Only publish

- config
- optional SVG overrides

---

## 10. Testing

Pest

```text
tests/

Feature/
Unit/
Snapshots/
```

Snapshot-test rendered SVG output.

---

## 11. Local Development

Host app

```json
"repositories": [
    {
        "type": "path",
        "url": "packages/eatsfunk/ride-control-mark"
    }
]
```

Composer

```bash
composer require eatsfunk/ride-control-mark:@dev
```

No Packagist needed.

---

## 12. Extract Only Stable Code

Package should **not know** about:

- Ride model
- Livewire
- Alpine
- Filament
- Tailwind
- Authentication

Only:

```text
Input
 ↓
Render SVG
 ↓
Output
```

---

## Golden Rule

```text
Application
    knows
        "This is a coffee ride."

Package
    knows
        "This is how a coffee control mark looks."
```

That separation keeps the package highly reusable—not just for rideMatch, but for any application that needs structured, stamp-like visual markers.
