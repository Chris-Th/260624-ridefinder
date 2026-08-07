RideTagSeeder
│
▼
┌─────────────────────────────┐
│ Fixed ride-tag vocabulary │
│ │
│ experience: │
│ beginner-only │
│ experienced-only │
│ │
│ ebike: │
│ ebikes-only │
│ no-ebikes │
│ │
│ independent: │
│ no_drop │
│ regroup_at_climbs │
│ coffee_stop │
│ beginner_friendly │
└──────────────┬──────────────┘
│
▼
RideTag::findByName()
│
┌───────┴────────┐
▼ ▼
RideFactory TypicalRideFactory
│ │
└───────┬────────┘
▼
HasRideTagStates
│
▼
Polymorphic tags
│
┌───────┴─────────┐
▼ ▼
Ride TypicalRide
