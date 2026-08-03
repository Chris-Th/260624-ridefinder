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
