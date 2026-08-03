I think this is a very nice evolution of the model. In fact, I think it's a better fit than the previous `typical_*` columns on `profiles`.

The biggest advantages are:

- a rider can describe multiple personas ("Sunday coffee rides", "200 km brevets", "Bikepacking weekends")
- searches can later say _"show me riders with a typical ride similar to this one"_ without inventing more profile fields
- adding new ride characteristics later becomes much easier
- the profile table once again contains only actual profile information

I'd probably even think of `TypicalRide` as a "saved ride template" rather than merely profile metadata.

---

# relationships.md

The old file still contains the original `typicalDiscipline()` relationship and some outdated many-to-many relationships on `Profile`.

I'd replace it with something like:

```md
# Relationship Overview

# Relationships

## User

- hasOne Profile
- hasMany Ride
- belongsToMany Ride (through ride_user)
- hasMany RideFeedback

## Profile

- belongsTo User
- hasMany TypicalRide

## TypicalRide

- belongsTo Profile
- belongsTo Discipline
- belongsTo Pace
- belongsTo RideType

## Discipline

- belongsToMany Profile
- hasMany Ride
- hasMany TypicalRide

## Pace

- hasMany Ride
- hasMany TypicalRide

## RideType

- hasMany TypicalRide
- belongsToMany Ride

## Ride

- belongsTo User
- belongsTo Discipline
- belongsTo Pace
- belongsToMany RideType
- belongsToMany User (through ride_user)
- hasMany RideFeedback

## RideFeedback

- belongsTo Ride
- belongsTo User
```

Notice that:

- `Profile` no longer belongs to a discipline.
- `Profile` no longer belongs to pace.
- `Profile` no longer belongs to ride types.
- `TypicalRide` becomes the owner of those preferences.

---

# schema.md

The current schema still stores ride preferences directly on `profiles`.

I'd change it to:

```text
profiles
--------
id                          bigint PK
user_id                     bigint FK users.id unique
location                    string
bio                         text nullable
profile_photo_path          string nullable
created_at                  timestamp
updated_at                  timestamp
```

and add

```text
typical_rides
-------------
id                          bigint PK

profile_id                  bigint FK profiles.id

name                        string

min_distance_km             integer nullable
max_distance_km             integer nullable

ride_type_id                bigint FK ride_types.id nullable
discipline_id               bigint FK disciplines.id nullable
pace_id                     bigint FK paces.id nullable

created_at                  timestamp
updated_at                  timestamp
```

I would deliberately use nullable foreign keys exactly as you proposed.

That allows things like

| Name          | Discipline | Distance | Pace |
| ------------- | ---------- | -------- | ---- |
| Evening spin  | Road       | 30-60    | null |
| Family outing | null       | 0-15     | Easy |
| Long brevet   | Road       | 200-600  | Fast |

which feels quite natural.

---

## One small suggestion

I'd rename

```
min_distance
max_distance
```

to

```
min_distance_km
max_distance_km
```

just because every other distance field in your schema already carries the unit (`distance_km`, `elevation_m`). It keeps naming consistent.

---

# rider-profile.md (summary)

Since that file is essentially a transcript of earlier design discussions, much of it is now obsolete regarding typical rides.

I'd reduce it to something like:

```md
# Rider Profile

## Stored

### User

- name
- profile photo

### Profile

- location
- bio

### Disciplines

Many-to-many relationship between profiles and disciplines.

A rider may be interested in multiple disciplines.

---

## Typical Rides

A profile may define multiple typical rides.

Each TypicalRide represents one kind of ride the rider commonly enjoys.

Fields:

- name
- ride type (optional)
- discipline (optional)
- minimum distance (optional)
- maximum distance (optional)
- pace (optional)

Examples:

- "Evening Spin"
- "Weekend Climber"
- "Coffee Ride"
- "Brevet"

Typical rides may later be used as presets for rider discovery and quick searches.

---

## Reliability

Computed.

- rides joined
- rides hosted
- attendance rate

---

## Future

Potential additions:

- ride description accuracy
- availability
- compatibility score
```

I'd keep it intentionally short. Once the schema stabilizes, that document becomes much easier to maintain.

---

# ProfileShowTest.php

Given what you've said previously about wanting tests to act as a development roadmap, I'd order them in roughly the order I'd implement the page.

```php
it('guests cannot view a profile');

it('shows the requested profile');

it('shows the riders name');

it('shows the riders location');

it('shows the riders biography');

it('shows the riders profile photo');

// Disciplines

it('shows all disciplines associated with the profile');

// Typical rides

it('shows all typical rides');

it('shows the name of each typical ride');

it('shows the ride type when present');

it('shows the discipline when present');

it('shows the pace when present');

it('shows a distance range when both minimum and maximum are present');

it('shows only a minimum distance when no maximum exists');

it('shows only a maximum distance when no minimum exists');

it('handles a typical ride with no optional attributes');

// Reliability

it('shows the number of rides hosted');

it('shows the number of rides joined');

it('shows the attendance rate');

// Authorization / privacy (future)

it('hides private profile information');

it('shows edit actions only to the profile owner');

// Performance

it('eager loads all relationships required by the page');
```

## The workflow I'd personally follow

This order minimizes backtracking while giving you frequent green test runs:

1. Route resolves.
2. Authorization.
3. Basic profile data.
4. Disciplines.
5. Typical rides list.
6. Formatting logic (distance rendering).
7. Reliability statistics.
8. Owner-only actions.
9. Performance/eager-loading.

That gives you a natural sequence of increasingly sophisticated functionality without forcing you to redesign the page midway through implementation.

---

One final thought: I would consider adding a `sort_order` column to `typical_rides` from the beginning:

```text
sort_order                  unsigned smallint default 0
```

Users will almost certainly develop a "main" ride ("Weekend Road Ride") plus several secondary ones. Allowing them to drag-and-drop or otherwise order their typical rides later is much easier if the column already exists, and it avoids relying on `created_at` for display order.
