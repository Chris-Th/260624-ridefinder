```php
test('guests cannot view a profile');

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
