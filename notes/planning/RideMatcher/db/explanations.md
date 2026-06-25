I'd keep the schema intentionally small. One of the nice things about your current MVP is that nearly everything revolves around:

* Users
* Profiles
* Rides
* Participation

Everything else is supporting data.

---

# users

Laravel starter kit table.

```sql
users
-----
id
name
email
email_verified_at
password
remember_token
created_at
updated_at
```

No cycling-specific fields here.

---

# profiles

One-to-one with users.

```sql
profiles
--------
id
user_id

location
bio

typical_discipline_id
typical_distance_range_id
typical_pace_id

profile_photo_path

created_at
updated_at
```

### Relationships

```php
Profile belongsTo User
User hasOne Profile
```

---

# disciplines

Shared lookup table.

```sql
disciplines
-----------
id

name
slug

created_at
updated_at
```

### Seed Data

```text
Road
Gravel
MTB
Touring
E-Bike
Commuting
```

---

# distance_ranges

Lookup table.

```sql
distance_ranges
---------------
id

name
min_distance_km
max_distance_km

created_at
updated_at
```

### Seed Data

```text
0-25 km
25-50 km
50-75 km
75-100 km
100+ km
```

---

# pace_levels

Lookup table.

```sql
pace_levels
-----------
id

name
sort_order

created_at
updated_at
```

### Seed Data

```text
Easy
Social
Brisk
Fast
Race
```

The sort order becomes useful later.

---

# ride_types

Lookup table.

```sql
ride_types
----------------
id

name
slug

created_at
updated_at
```

### Seed Data

```text
Coffee Ride
Training
Climbing
Scenic Ride
Endurance
Bikepacking
```

---

# discipline_profile

Many-to-many.

A cyclist may participate in multiple disciplines.

```sql
discipline_profile
------------------
profile_id
discipline_id
```

Composite unique key:

```sql
(profile_id, discipline_id)
```

---

# profile_ride_type

Many-to-many.

```sql
profile_ride_type
-----------------------
profile_id
ride_type_id
```

Composite unique key:

```sql
(profile_id, ride_type_id)
```

---

# rides

Core business entity.

```sql
rides
-----
id

host_id

title
description

discipline_id
pace_level_id

distance_km
elevation_m

meeting_point_name
meeting_point_address

starts_at

max_riders

created_at
updated_at
```

---

## Notes

### host_id

References:

```sql
users.id
```

Host is simply a user.

No special host model required.

---

### distance_km

```sql
decimal(5,1)
```

Examples:

```text
42.5
75.0
120.0
```

---

### elevation_m

```sql
integer
```

Examples:

```text
300
1200
2500
```

---

# ride_ride_type

Many-to-many.

Allows rides to have multiple characteristics.

Example:

```text
Coffee Ride
Scenic Ride
```

for a single ride.

```sql
ride_ride_type
--------------------
ride_id
ride_type_id
```

Composite unique key:

```sql
(ride_id, ride_type_id)
```

---

# ride_rules

I would not create a table.

Use boolean columns.

```sql
rides
-----
is_no_drop
regroup_at_climbs
coffee_stop
beginner_friendly
```

Simple.

Fast.

Easy to query.

---

# ride_user

Participation pivot.

Very important table.

```sql
ride_user
---------
ride_id
user_id

status

joined_at

created_at
updated_at
```

---

### Status

Enum-like values:

```text
joined
cancelled
attended
no_show
```

Could be implemented using:

```php
ParticipationStatus enum
```

---

### Unique Constraint

```sql
(ride_id, user_id)
```

One participation record per rider.

---

# ride_feedback

Future feature.

Not MVP-critical.

```sql
ride_feedback
-------------
id

ride_id
user_id

matched_description

created_at
updated_at
```

---

### matched_description

Values:

```text
yes
mostly
no
```

---



# Tables I'd Deliberately NOT Create Yet

Avoid these until actual demand exists:

```text
clubs
bike_shops
routes
gpx_files
messages
notifications
badges
achievements
followers
friendships
activity_feed
strava_accounts
```

The resulting MVP schema is only about **10 real tables plus pivots**, which is small enough to understand at a glance and large enough to support everything we've discussed so far.
