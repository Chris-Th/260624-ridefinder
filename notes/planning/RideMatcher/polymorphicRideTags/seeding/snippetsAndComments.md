seed them explicitly:

```php
// RideTagSeeder.php

public function run(): void
{
    $tags = [
        [
            'name' => ExperiencePreference::BeginnerOnly->value,
            'group' => 'experience',
        ],
        [
            'name' => ExperiencePreference::ExperiencedOnly->value,
            'group' => 'experience',
        ],
        [
            'name' => EbikePreference::Only->value,
            'group' => 'ebike',
        ],
        [
            'name' => EbikePreference::None->value,
            'group' => 'ebike',
        ],

        [
            'name' => 'no_drop',
            'group' => null,
        ],
        [
            'name' => 'regroup_at_climbs',
            'group' => null,
        ],
        [
            'name' => 'coffee_stop',
            'group' => null,
        ],
        [
            'name' => 'beginner_friendly',
            'group' => null,
        ],
    ];

    foreach ($tags as $tag) {
        RideTag::updateOrCreate(
            ['name' => $tag['name']],
            ['group' => $tag['group']],
        );
    }
}
```

give RideTag a small helper:

```php
public static function findByName(string|BackedEnum $name): self
{
    $name = $name instanceof BackedEnum
        ? $name->value
        : $name;

    return static::where('name', $name)->firstOrFail();
}
```

then:

```php
RideTag::findByName(EbikePreference::Only);
RideTag::findByName(ExperiencePreference::BeginnerOnly);
RideTag::findByName('coffee_stop');
```

Use factory states for the mutually exclusive options

For example, in RideFactory:

```php
public function ebikesOnly(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName(EbikePreference::Only)
        );
    });
}

public function noEbikes(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName(EbikePreference::None)
        );
    });
}

public function beginnersOnly(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName(ExperiencePreference::BeginnerOnly)
        );
    });
}

public function experiencedOnly(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName(ExperiencePreference::ExperiencedOnly)
        );
    });
}
```

And independent properties:

```php
public function noDrop(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName('no_drop')
        );
    });
}

public function regroupAtClimbs(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName('regroup_at_climbs')
        );
    });
}

public function coffeeStop(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName('coffee_stop')
        );
    });
}

public function beginnerFriendly(): static
{
    return $this->afterCreating(function (Ride $ride) {
        $ride->tags()->attach(
            RideTag::findByName('beginner_friendly')
        );
    });
}
```

### Trait

Because you're going to duplicate those methods between RideFactory and TypicalRideFactory, I'd probably eventually create something like:

```php
trait HasRideTagStates
{
    public function ebikesOnly(): static
    {
        return $this->afterCreating(function ($model) {
            $model->tags()->attach(
                RideTag::findByName(EbikePreference::Only)
            );
        });
    }

    public function noEbikes(): static
    {
        return $this->afterCreating(function ($model) {
            $model->tags()->attach(
                RideTag::findByName(EbikePreference::None)
            );
        });
    }

    public function noDrop(): static
    {
        return $this->afterCreating(function ($model) {
            $model->tags()->attach(
                RideTag::findByName('no_drop')
            );
        });
    }

    // ...
}
```

Then:

```php
class RideFactory extends Factory
{
    use HasRideTagStates;

    // ...
}
// and:
class TypicalRideFactory extends Factory
{
    use HasRideTagStates;

    // ...
}
```

In databaseSeeder, create several representative scenarios. Example:

```php
public function run(): void
{
    $this->call([
        RideTagSeeder::class,
        DisciplineSeeder::class,
        PaceLevelSeeder::class,
        // ...
    ]);

    User::factory(10)
        ->has(Profile::factory())
        ->create();

    $users = User::all();

    // Ordinary rides
    Ride::factory(5)
        ->for($users->random())
        ->create();

    // Beginner-oriented rides
    Ride::factory(3)
        ->for($users->random())
        ->beginnersOnly()
        ->beginnerFriendly()
        ->noDrop()
        ->create();

    // Fast / experienced rides
    Ride::factory(3)
        ->for($users->random())
        ->experiencedOnly()
        ->noEbikes()
        ->create();

    // E-bike rides
    Ride::factory(2)
        ->for($users->random())
        ->ebikesOnly()
        ->create();

    // Social rides
    Ride::factory(3)
        ->for($users->random())
        ->coffeeStop()
        ->regroupAtClimbs()
        ->create();

    // Typical rides
    TypicalRide::factory(5)
        ->for($users->random())
        ->create();

    TypicalRide::factory(2)
        ->for($users->random())
        ->beginnerFriendly()
        ->noDrop()
        ->create();

    TypicalRide::factory(2)
        ->for($users->random())
        ->experiencedOnly()
        ->ebikesOnly()
        ->create();
}
```

In short: I'd make the tag seeder deterministic, make the factories express valid domain combinations through named states, share those tag states between RideFactory and TypicalRideFactory, and let the main DatabaseSeeder deliberately construct a variety of realistic scenarios.

One thing I'd reconsider before implementing it, though, is whether group should contain strings like 'experience' / 'ebike', or whether you should make the group itself an enum. Given that you've already introduced ExperiencePreference and EbikePreference, I think there's a particularly clean solution there.

```txt
RideTagSeeder
        │
        ▼
┌─────────────────────────────┐
│ Fixed ride-tag vocabulary   │
│                             │
│ experience:                 │
│   beginner-only             │
│   experienced-only          │
│                             │
│ ebike:                      │
│   ebikes-only               │
│   no-ebikes                 │
│                             │
│ independent:                │
│   no_drop                   │
│   regroup_at_climbs         │
│   coffee_stop               │
│   beginner_friendly         │
└──────────────┬──────────────┘
               │
               ▼
       RideTag::findByName()
               │
       ┌───────┴────────┐
       ▼                ▼
 RideFactory      TypicalRideFactory
       │                │
       └───────┬────────┘
               ▼
       HasRideTagStates
               │
               ▼
       Polymorphic tags
               │
       ┌───────┴─────────┐
       ▼                 ▼
     Ride            TypicalRide
```
