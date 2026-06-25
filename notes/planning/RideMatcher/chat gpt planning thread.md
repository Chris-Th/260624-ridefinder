PROMPT
I was talking to friend today who owns a bike sails and repair shop plus he is an amateur cyclist himself who loves to tour with other people. And he probably knows quite well the internet services that are popular amongst cyclists. He knew that I was searching for ideas for a web app. He says he would like to see sort of a social network offering quick and easy ways for likeminded biking enthusiasts to hook up and go on rides together, offering things like classifications of competitiveness or special interests such as finding mates to form a paceline, or riding along mountain passes, or building groups for  coffee rides or for sightseeing by bike. Of course it would also differentiate between the different sub genres like mountain bike, race etc. Maybe there is some kind of reputation system (e.g. batches for those who have proven to be reliable or for being honest in their performance self evaluation etc). Also there might be some kind of real time tracking system for members incorporating maps to facilitate hooking up on the fly. Please do some research to help me evaluate the possible demand for this and what are the closest existing web services. Of course this app would have to be built as mobile first or even as a progressive web app.

REPLY
This is actually a much more interesting idea than it might seem at first glance.

The research suggests **the problem is real**, but also that **many people have tried to solve it already**, which means the opportunity is likely in _better execution and positioning_, not in inventing a completely new concept.

## The core problem appears genuine

A recurring theme appears everywhere:

> "I want to ride with people, but finding the right people is surprisingly difficult."

Cyclists often rely on:

- WhatsApp groups
    
- Facebook groups
    
- Strava clubs
    
- Meetup
    
- Local bike shop websites
    
- Instagram posts
    
- Club newsletters
    
- Word of mouth
    

Information is fragmented across many channels. Multiple cyclists on Reddit specifically mention that ride discovery is scattered and difficult, especially when moving to a new city or traveling. ([Reddit](https://www.reddit.com/r/Velo/comments/1rg5iwv/nodrop_finding_group_rides_and_riding_with_friends/?utm_source=chatgpt.com "Nodrop: Finding group rides and riding with friends"))

This is a strong signal that there is a real pain point.

---

## Existing competitors

Your friend's idea is not unique, but that's actually useful because it validates demand.

Closest existing products:

|Service|Similarity|
|---|---|
|[Link My Ride](https://app.linkmyride.com/?utm_source=chatgpt.com)|Very close|
|[BikeCrew](https://www.bikecrew.app/?utm_source=chatgpt.com)|Extremely close|
|[Roll.ooo](https://roll.ooo/?utm_source=chatgpt.com)|Group ride discovery|
|[Cyclique](https://www.getcyclique.com/en.html?utm_source=chatgpt.com)|Ride matching|
|[GroupRideApp](https://grouprideapp.com/?utm_source=chatgpt.com)|Ride recommendation engine|
|[WePedal](https://www.wepedal.es/?utm_source=chatgpt.com)|Cycling-focused social network|
|[Strava Clubs & Events](https://www.strava.com/?utm_source=chatgpt.com)|Partial solution|

Several of these specifically advertise:

- finding nearby cyclists
    
- matching by skill level
    
- organizing rides
    
- ride calendars
    
- local clubs
    
- maps
    
- messaging
    
- recurring rides
    

([app.linkmyride.com](https://app.linkmyride.com/?utm_source=chatgpt.com "Link My Ride"))

---

## Why none of them seem dominant

This is the interesting part.

If you ask cyclists what they use today, the answer is still often:

- Strava
    
- Meetup
    
- Facebook
    
- WhatsApp
    

not these dedicated services. ([Reddit](https://www.reddit.com/r/cycling/comments/1pnsu27/how_do_you_usually_coordinate_group_cycling_rides/?utm_source=chatgpt.com "How do you usually coordinate group cycling rides?"))

That suggests one of two things:

### Possibility 1

The market is too small.

Not enough people care enough to switch.

### Possibility 2

Nobody has nailed the experience yet.

This is the more interesting possibility.

Most cycling apps focus on:

- ride recording
    
- training metrics
    
- routes
    

but not on:

- finding compatible people
    

The "dating app for cyclists" angle remains surprisingly underdeveloped.

---

# What I think is genuinely interesting

Not:

"Create another Strava."

Very difficult.

Instead:

### Compatibility matching

Something like:

"I'm looking for"

- Road cycling
    
- Sunday mornings
    
- 60-90 km
    
- average 28-32 km/h
    
- coffee stop mandatory
    
- no racing
    

Then instantly see:

- 17 compatible riders nearby
    
- 4 upcoming rides
    

This is closer to what your friend described.

---

### Riding personality

This could become your moat.

Examples:

#### Pace

- Recovery
    
- Casual
    
- Social
    
- Fast
    
- Race
    

#### Ride style

- Paceline
    
- Climbing
    
- Gravel adventure
    
- Coffee ride
    
- Sightseeing
    
- Bikepacking
    

#### Expectations

- No drop
    
- Wait at summits
    
- Competitive
    
- Training focused
    
- Beginner friendly
    

Many group ride disasters happen because these expectations aren't explicit.

---

### Reliability score

I like this idea.

Not based on speed.

Based on:

- actually showing up
    
- canceling responsibly
    
- ride completion
    
- peer ratings
    

Think:

> "Trusted Ride Partner"

rather than:

> "Fast Rider"

---

### Traveler mode

This seems especially promising.

Imagine:

"I'm in Zurich for 3 days."

Show:

- local rides
    
- local cyclists
    
- bike-friendly cafés
    
- rental shops
    

Touring cyclists constantly have this problem.

---

## The feature I would avoid

### Real-time rider tracking

Sounds cool.

Terrible MVP.

You immediately get:

- battery concerns
    
- privacy concerns
    
- safety concerns
    
- map infrastructure costs
    
- legal considerations
    

Build this much later.

---

# If I were building it

I would start absurdly small.

### MVP

Mobile-first web app / PWA

Users create profile:

- discipline
    
- pace
    
- ride style
    
- location
    

Users can:

- create ride
    
- join ride
    
- chat before ride
    

Ride page:

- distance
    
- elevation
    
- average expected pace
    
- coffee stop yes/no
    
- max riders
    
- no-drop yes/no
    

That's it.

No tracking.

No Strava integration.

No achievements.

No social feed.

---

# Business risk

The biggest risk is not technology.

It's network effects.

A cyclist joins.

There are no rides.

They leave.

Classic marketplace problem.

---

## Possible wedge strategy

This is where your friend's bike shop connection becomes interesting.

Instead of:

> "Let's get cyclists."

Start with:

> "Let's get bike shops and clubs."

Each shop becomes a local community hub.

Shops already organize:

- coffee rides
    
- demo rides
    
- training rides
    
- club rides
    

If a few shops adopt the platform, riders arrive automatically.

This is likely a much easier path than trying to compete head-on with Strava.

---

## My overall assessment

**Problem:** 8/10  
**Market size:** 6/10  
**Competition:** 7/10 (many small players, no obvious winner)  
**Technical difficulty MVP:** 4/10  
**Technical difficulty mature product:** 9/10  
**Chance for a solo developer to build MVP:** high

The strongest version of this idea is not a social network.

It's:

> **"Find compatible cyclists and rides nearby."**

Everything else—profiles, reputation, clubs, tracking, achievements—comes later.

That positioning is much narrower, easier to explain, and appears to address the actual pain point that cyclists repeatedly mention online. ([Reddit](https://www.reddit.com/r/Velo/comments/1rg5iwv/nodrop_finding_group_rides_and_riding_with_friends/?utm_source=chatgpt.com "Nodrop: Finding group rides and riding with friends"))

PROMPT
I like what you are proposing. Let's start to sharpen the picture.

REPLY
Good sign: as we sharpen the picture, the idea is becoming less of a "social network" and more of a **coordination platform**.

That distinction matters because social networks are incredibly difficult to bootstrap, whereas coordination tools can provide value immediately.

## What problem are we really solving?

Not:

> "Cyclists want another place to post photos and chat."

Not:

> "Cyclists want Facebook but for bikes."

More likely:

> "I want to find people for the ride I want to do."

Everything should support that goal.

---

# User Story

Imagine Anna:

- 42 years old
    
- Road cyclist
    
- Visiting a city for a weekend
    
- Doesn't know anyone locally
    

She opens the app and says:

> Looking for:
> 
> - Road cycling
>     
> - Sunday morning
>     
> - 70-100 km
>     
> - Social pace
>     
> - Coffee stop
>     
> - No-drop
>     

Within seconds she finds:

- 3 upcoming rides
    
- 12 compatible riders
    
- 2 local groups
    

That feels like the core experience.

---

# The Marketplace Model

The system has two entities:

## Riders

People.

Profile includes:

- Name
    
- Location
    
- Disciplines
    
- Experience
    
- Riding preferences
    

---

## Rides

Events.

A ride contains:

- Start point
    
- Date/time
    
- Distance
    
- Elevation
    
- Discipline
    
- Pace
    
- Ride style
    
- Rider limit
    
- Description
    

Almost everything revolves around rides.

---

# The Most Important Design Decision

Most cycling communities classify by skill.

I think that is wrong.

Instead classify by **expectation**.

## Example

Two riders may both average 28 km/h.

But:

### Rider A

- Wants structured training
    
- Rotating paceline
    
- Minimal stops
    

### Rider B

- Wants coffee and conversation
    

They are incompatible despite similar fitness.

---

So perhaps the matching system revolves around:

### Ride Intent

- Training
    
- Social
    
- Exploration
    
- Coffee
    
- Sightseeing
    
- Climbing
    
- Endurance
    
- Bikepacking
    

---

### Ride Dynamics

- No-drop
    
- Regroup at summits
    
- Continuous pace
    
- Frequent stops
    

---

### Pace

Only after those.

---

# Profile Concept

Instead of building a detailed social profile:

```
Road Cycling
⭐⭐⭐⭐

Preferred Rides

✓ Coffee rides
✓ Endurance rides
✓ Climbs

Avoid

✗ Race simulations
✗ Sprint training
```

Simple.

Actionable.

---

# Reputation System

Your friend's intuition is good.

But avoid popularity metrics.

Bad:

- Followers
    
- Likes
    
- Karma
    

Good:

### Reliability

- Joined 24 rides
    
- 23 completed
    
- 1 cancellation
    

### Accuracy

Peer feedback:

"Ride pace matched description."

This solves a genuine problem.

---

# Local Discovery

This feels like the killer feature.

Imagine opening the app and seeing:

```
Today

Road Ride
85 km
Social Pace
Coffee Stop

Starts in 45 min
2 km away
4 riders attending
```

Very low friction.

---

# Communities

I would not start with groups.

I would start with:

### Ride Hosts

A host can be:

- individual rider
    
- bike shop
    
- cycling club
    
- tour organizer
    

The distinction may not even matter initially.

Everything is simply a host organizing rides.

---

# Where Shops Fit

Your friend's bike shop is actually a valuable signal.

Shops already have:

- customers
    
- mailing lists
    
- local credibility
    

Imagine:

"Saturday Coffee Ride"

hosted by:

Bike Shop X

People join through the platform.

That creates immediate activity.

---

# What I Would Remove From MVP

These sound exciting but create huge complexity:

❌ Real-time location sharing

❌ Route recording

❌ Performance analytics

❌ Strava replacement features

❌ News feed

❌ Private messaging

❌ Gamification

---

# What I Would Keep

### Profiles

Minimal.

### Rides

Core object.

### Matching

Core value.

### RSVP

Essential.

### Ride Chat

Temporary chat attached to ride.

### Reliability

Simple but useful.

---

# A Possible Positioning Statement

Something like:

> Find the right cyclists for the ride you actually want to do.

Or:

> Discover compatible rides, riders, and cycling communities nearby.

Notice how neither statement mentions "social networking."

The strongest version of this concept looks less like a cycling Facebook and more like a cross between:

- Meetup
    
- local cycling clubs
    
- event discovery
    

with a matching layer specifically designed for cyclists.

That narrower focus makes it much more realistic as a solo-developer project while still leaving plenty of room for future expansion into clubs, touring, reputation systems, route sharing, and eventually live ride coordination.

PROMPT
Let's draft an mvp based on your analysis

REPLY
At this stage I'd optimize for one thing:

> A cyclist can discover and join a compatible ride in under 60 seconds.

Everything else is secondary.

---

# MVP Vision

### Working title

RideMatch

### One sentence

Find compatible cyclists and group rides nearby.

---

# Core User Types

### Rider

Creates profile, discovers rides, joins rides.

### Host

Creates and manages rides.

A host can be:

- individual cyclist
    
- bike shop
    
- club
    
- tour organizer
    

No separate host system needed initially.

Any rider can host.

---

# MVP User Journey

## 1. Sign Up

Minimal onboarding.

### Basic Info

- Name
    
- Home location
    
- Profile photo (optional)
    

### Cycling Discipline

Choose one or more:

- Road
    
- Gravel
    
- Mountain Bike
    
- Touring
    
- Commuting
    
- E-Bike
    

### Ride Preferences

Choose tags:

- Coffee rides
    
- Training
    
- Climbing
    
- Sightseeing
    
- Endurance
    
- Bikepacking
    
- Social
    
- Fast group rides
    

---

## 2. Discover Rides

This is the homepage.

Each ride card shows:

```text
Sunday Coffee Ride

Road
75 km
800m climbing

Social Pace
No Drop
Coffee Stop

Starts 09:00
5 riders attending
```

Simple.

No map required initially.

---

## 3. Join Ride

User clicks:

Join Ride

That's it.

---

## 4. Ride Chat

Every ride gets a temporary chat room.

Questions like:

- "Which café are we stopping at?"
    
- "Running 10 minutes late."
    
- "Weather looks rough."
    

Chat disappears automatically after the ride.

---

## 5. Ride Completion

After ride ends:

Participants receive:

```text
Did this ride match its description?

○ Yes
○ Mostly
○ No
```

This becomes the basis for reputation.

---

# Matching System

The key differentiator.

Not based primarily on fitness.

Based primarily on ride intent.

---

## Ride Classification

### Discipline

- Road
    
- Gravel
    
- MTB
    
- Touring
    
- E-Bike
    

---

### Ride Style

- Coffee Ride
    
- Training Ride
    
- Climbing Ride
    
- Scenic Ride
    
- Endurance Ride
    
- Bikepacking
    

---

### Pace

- Easy
    
- Social
    
- Brisk
    
- Fast
    
- Race
    

---

### Ride Rules

Checkboxes:

- No Drop
    
- Regroup At Summits
    
- Coffee Stop
    
- Beginner Friendly
    

---

# Reputation MVP

Keep it extremely simple.

Every user receives:

### Reliability Score

```text
Hosted: 12 rides

Joined: 35 rides

Attendance:
97%
```

---

### Ride Accuracy

```text
Ride descriptions accurate:
94%
```

Based on post-ride feedback.

This is much more useful than likes or followers.

---

# MVP Data Model

## User

```text
id
name
location
disciplines
preferences
reliability_score
```

---

## Ride

```text
id
host_id

title
description

discipline
ride_style
pace

distance
elevation

start_time
meeting_point

max_riders
```

---

## Participation

```text
ride_id
user_id

joined_at
status
```

---

## Feedback

```text
ride_id
user_id

matched_description
```

---

# Screens

Only five are needed.

### 1. Discover

List of nearby rides.

### 2. Ride Detail

Ride information.

### 3. Create Ride

Simple form.

### 4. Profile

Cyclist profile.

### 5. Ride Chat

Temporary group chat.

That's enough for an MVP.

---

# Technology Fit

This idea aligns surprisingly well with the stack you've discussed before.

### Backend

- Laravel
    
- Livewire 4
    
- MySQL/Postgres
    

### Frontend

- Livewire pages
    
- Alpine.js for interaction
    
- PWA support
    

### Mapping

Skip map providers initially.

Store:

```text
meeting location name
address
coordinates
```

and open external map apps when needed.

This avoids API costs and complexity.

---

# Future Roadmap (Not MVP)

## Phase 2

- Club pages
    
- Bike shop pages
    
- Recurring rides
    
- Route uploads (GPX)
    

## Phase 3

- Strava integration
    
- Route recommendations
    
- Advanced reputation
    
- Ride series
    

## Phase 4

- Live location sharing
    
- Real-time meetup assistance
    
- Touring/travel mode
    
- Ride recommendations powered by matching
    

---

# MVP Success Metric

Not DAU.

Not followers.

Not posts.

The key metric is:

> Number of successful rides completed through the platform.

If two strangers discover each other, show up, and complete a ride together because of the app, the product has delivered its core value. Everything else can be built on top of that.


PROMPT
Ok so lets start planning the project development

REPLY
For a solo developer, I'd strongly recommend planning around **validation milestones**, not feature milestones.

The goal isn't "build all planned features." The goal is to answer:

> "Will cyclists actually use this to organize rides?"

as early as possible.

---

# Phase 0 — Product Discovery

**Goal:** Verify the concept before writing much code.

### Activities

Talk to:

- your friend (bike shop owner)
    
- local cycling clubs
    
- touring cyclists
    
- road cyclists
    
- gravel riders
    

Questions:

- How do you currently find rides?
    
- What frustrates you?
    
- Have you tried Strava Clubs?
    
- Have you tried Meetup?
    
- What information do you need before joining a ride?
    
- What makes you refuse a ride invitation?
    

### Deliverable

A short product brief:

- target users
    
- primary problem
    
- MVP scope
    
- features explicitly excluded
    

---

# Phase 1 — Clickable Prototype

**Goal:** Test the user experience.

No backend.

No database.

No authentication.

Create a clickable prototype showing:

1. Ride discovery
    
2. Ride detail
    
3. Join ride
    
4. Create ride
    
5. Profile
    

Tools could be:

- Figma
    
- Penpot
    
- a quick frontend prototype
    

### Questions to answer

Can a cyclist understand:

- what the app does
    
- how rides are classified
    
- why it's different from Strava
    

### Deliverable

A tested user flow.

---

# Phase 2 — Foundation

**Goal:** Establish the architecture.

### Setup

- Laravel
    
- Livewire 4
    
- Pest
    
- Authentication
    
- User profiles
    

### Build

#### User model

Basic profile information.

#### Discipline taxonomy

```text
Road
Gravel
MTB
Touring
E-Bike
```

#### Preference taxonomy

```text
Coffee Ride
Training
Climbing
Sightseeing
Endurance
Bikepacking
```

Keep these configurable from day one.

### Deliverable

Users can register and complete a profile.

---

# Phase 3 — Ride Management

This is the first real product.

### Build

#### Create Ride

Form with:

- title
    
- description
    
- discipline
    
- style
    
- pace
    
- date
    
- meeting point
    

#### Ride Detail Page

View all information.

#### Join Ride

RSVP system.

#### Participant List

Visible attendees.

### Deliverable

A user can create a ride and another user can join it.

At this point the product technically works.

---

# Phase 4 — Discovery

Now focus on the core value.

### Build

Filtering:

- discipline
    
- pace
    
- ride style
    
- date
    

Sorting:

- distance
    
- soonest
    
- popularity
    

### Homepage

Show rides relevant to user preferences.

### Deliverable

Users can easily find rides.

---

# Phase 5 — Ride Chat

Add communication.

### Features

Per-ride chat room.

Requirements:

- lightweight
    
- mobile-friendly
    
- no separate DMs
    

### Deliverable

Participants can coordinate before the ride.

---

# Phase 6 — Reputation

Only after real ride participation exists.

### Build

Post-ride feedback.

Questions:

```text
Did the ride match its description?

Yes
Mostly
No
```

```text
Did the host communicate well?

Yes
No
```

Generate:

- attendance score
    
- reliability score
    
- ride accuracy score
    

### Deliverable

Trust starts forming in the platform.

---

# Suggested Development Order (Epics)

```text
Epic 1
Authentication

Epic 2
Profiles

Epic 3
Ride Creation

Epic 4
Ride Participation

Epic 5
Ride Discovery

Epic 6
Ride Chat

Epic 7
Reputation
```

---

# ==Database Design Strategy==

A common solo-developer mistake is over-normalizing too early.

For the MVP:

### Users

```text
users
```

### Rides

```text
rides
```

### Participation

```text
ride_user
```

### Messages

```text
ride_messages
```

### Feedback

```text
ride_feedback
```

That's probably enough.

Avoid:

```text
clubs
badges
achievements
leaderboards
routes
gps_tracks
notifications
```

until there is evidence they are needed.

---

# Testing Strategy

Given your preference for Laravel and Pest:

### Feature Tests

Focus on:

- creating rides
    
- joining rides
    
- cancelling participation
    
- permissions
    
- ride filtering
    

### Unit Tests

Very few initially.

Most value is in feature tests because the business rules are user-flow based.

---

# What I'd Put in Version 0.1

If I were trying to launch in 4–6 weeks as a solo developer:

### Included

✅ Registration

✅ Profile

✅ Create ride

✅ Join ride

✅ Ride discovery

✅ Ride detail page

✅ Attendance tracking

### Excluded

❌ Chat

❌ Reputation

❌ Clubs

❌ Bike shops

❌ Maps

❌ GPX routes

❌ Live tracking

❌ Strava integration

---

That gives you a surprisingly small first release:

> "Create rides. Discover rides. Join rides."

If people won't use that, none of the more advanced features matter. If they do use it, you'll have a solid foundation and real user feedback guiding the next phases.

PROMPT
Give me some ideas on how to design ride discovery. Grid of cards?

REPLY
For this product, I'd think about **what cyclists are trying to decide** when browsing.

They are not shopping for products or reading content.

They are answering:

> "Would I join this ride?"

That pushes the design toward **scannability** rather than visual richness.

---

# Option 1: Mobile Card List (Recommended MVP)

Each ride appears as a compact card.

```text
☕ Sunday Coffee Ride

Road · Social
75 km · 800 m

No Drop
Coffee Stop

Sun 09:00
5 riders attending

[View Ride]
```

Advantages:

- extremely easy to build
    
- mobile-friendly
    
- easy filtering
    
- works well with Livewire
    

This is probably where I'd start.

---

# Option 2: Tinder-like Feed

One ride at a time.

```text
Sunday Coffee Ride

Road
75 km

Coffee Stop
Social Pace

Join
Skip
```

Interesting conceptually.

Terrible for discovery.

Users need comparison.

I would avoid it.

---

# Option 3: Grid of Cards

Like Airbnb.

```text
┌──────────┐
│ Ride A   │
└──────────┘

┌──────────┐
│ Ride B   │
└──────────┘
```

Works well on desktop.

Poor information density.

Cyclists need:

- distance
    
- climbing
    
- discipline
    
- pace
    
- start time
    

A grid quickly becomes crowded.

I would not make it the primary view.

---

# Option 4: Table/List View

Think airline flights.

```text
Sun 09:00

Road
75 km
Social

5 riders
```

Very efficient.

Very boring.

Power users would love it.

New users may not.

Potentially useful as an alternative view later.

---

# Option 5: Map First

Large map with ride pins.

Common instinct.

Usually a mistake.

Reasons:

- expensive APIs
    
- harder UX
    
- users care about ride characteristics more than exact location
    
- poor mobile experience
    

A map should probably be secondary.

---

# What I Would Build

A hybrid.

## Top Section

Quick filters.

```text
[Road]
[Gravel]
[MTB]

[Today]
[Weekend]

[Coffee]
[Training]
[Climbing]
```

Horizontal scroll on mobile.

---

## Main Section

Vertical card list.

Each card contains:

```text
☕ Sunday Coffee Ride

Road · Social

75 km
800 m climbing

No Drop
Coffee Stop

09:00
5 riders
```

No photos.

No avatars.

No clutter.

---

# An Interesting Twist

I would seriously consider making the primary visual element the **ride type icon**.

For example:

```text
☕ Coffee Ride

⛰ Climbing Ride

🚴 Paceline

🌄 Scenic Ride

🏕 Bikepacking
```

Because cyclists often decide:

> "What kind of experience am I looking for?"

before they decide:

> "How many kilometers?"

---

# Progressive Enhancement Roadmap

### MVP

Filterable card list.

### Version 2

Map toggle.

```text
[List] [Map]
```

### Version 3

Personalized discovery.

```text
Recommended for You
```

based on previous joins.

### Version 4

Travel mode.

```text
Rides Near Me
Rides Near Hotel
Rides This Weekend
```

---

# One Concept I'd Explore

Instead of emphasizing distance first, emphasize **ride identity**.

Most cycling platforms do:

```text
75 km
800 m
29 km/h
```

Your platform could do:

```text
☕ Coffee Ride

Road
Social Pace

75 km
800 m
```

or

```text
⛰ Alpine Climbing

Road
Fast Pace

110 km
2200 m
```

The first thing users see is the _experience_, not the statistics.

That would reinforce the app's positioning around compatibility and expectations rather than pure performance.

PROMPT
I will build on top of a Laravel 13, Livewire 4 starter kit. Since that offers registration and authentication scaffolding out of the box and since the database design is right out of Laravel for Dummies, I'm going to skip the pure frontend prototype part. The prototype is simply an early version of the app, or parts of it. I will loosely follow a TDD workflow: essential features are covered, the rest is optional. Meaning: TDD applies to essential features only. Pages are built using livewires full page components, partial components are livewire based where feasible, plain blade otherwise. File structure will be built around the livewire 4 co-location philosophy https://livewire.laravel.com/docs/4.x/components where it makes sense. Javascript is written directly inside livewire components https://livewire.laravel.com/docs/4.x/javascript#executing-scripts and is scoped via Alpine.js components.  Agents coding directly to the project are probably only used for tedious tasks, such identifying essential tests and scaffolding or fully writing these feature tests. From there I will take over coding in the tdd workflow. So, one of the main purposes of tests (next to - well, testing),  is to help structure and guide the development process. With those things in mind, please create a project context md-file that offers guidance for myself and potential coding agents alike.

REPLY
This is exactly the sort of document that benefits from being explicit. It should not merely describe the product; it should communicate _how development decisions are made_. That becomes especially valuable when coding agents enter the picture.

# Project Context

## Project Overview

Working title: **RideMatch**

RideMatch is a mobile-first web application that helps cyclists discover compatible rides and connect with other cyclists.

The primary goal is not to build another cycling social network. The primary goal is to help cyclists answer a single question:

> "Can I find a ride and riding partners that match the kind of ride I want to do?"

The application focuses on ride discovery, ride organization, and compatibility between riders and rides.

---

# Product Principles

## Core Value

A user should be able to:

1. Discover a ride.
    
2. Determine whether it matches their expectations.
    
3. Join the ride.
    

Everything else is secondary.

---

## Focus On Ride Compatibility

The platform prioritizes compatibility and expectations over performance metrics.

Examples:

- Coffee Ride
    
- Social Ride
    
- Training Ride
    
- Climbing Ride
    
- Scenic Ride
    

The experience of the ride is more important than average speed or power output.

---

## Avoid Building "Strava Lite"

The application is not intended to:

- Record rides
    
- Analyze performance
    
- Track fitness
    
- Replace Strava
    

Those concerns are intentionally outside MVP scope.

---

# MVP Scope

## Included

- User registration and authentication
    
- User profiles
    
- Ride creation
    
- Ride discovery
    
- Ride participation
    
- Ride details
    
- Basic ride filtering
    

## Explicitly Excluded

- Real-time tracking
    
- GPX route management
    
- Private messaging
    
- Clubs
    
- Bike shop pages
    
- Strava integration
    
- Achievements
    
- Gamification
    
- Social feed
    

These features may be revisited after validation.

---

# Technology Stack

## Backend

- Laravel 13
    
- PHP 8.x
    
- Pest
    

## Frontend

- Livewire 4 Full Page Components
    
- Alpine.js
    
- Blade
    

## Development Style

- Mobile-first
    
- Server-driven UI
    
- Progressive enhancement
    
- Minimize custom JavaScript
    

---

# Livewire Architecture

The project follows Livewire 4's co-location philosophy wherever practical.

Components should keep related concerns together:

- Component class
    
- Template
    
- JavaScript
    
- Validation
    
- Tests
    

Favor self-contained components over fragmented architectures.

---

## Full Page Components

Pages should generally be implemented as Livewire Full Page Components.

Examples:

- Discover Rides
    
- Ride Details
    
- Create Ride
    
- Profile
    

---

## Partial Components

Use Livewire components when:

- State management is required
    
- User interaction is significant
    
- Reusability provides value
    

Examples:

- Ride filters
    
- Join ride controls
    
- Participant lists
    

---

## Blade Partials

Use Blade partials when:

- Rendering is purely presentational
    
- No state is required
    
- No interaction is required
    

---

# JavaScript Guidelines

JavaScript should remain minimal.

Prefer:

1. Livewire
    
2. Alpine.js
    
3. Custom JavaScript
    

In that order.

Component-specific JavaScript should remain inside the owning Livewire component whenever possible.

Avoid creating large global JavaScript modules unless a clear need emerges.

---

# Testing Philosophy

## Purpose Of Tests

Tests serve two purposes:

1. Verify essential behavior.
    
2. Guide and structure development.
    

Tests are not written merely to maximize coverage.

The test suite should describe the system's most important business behavior.

---

## TDD Strategy

A pragmatic TDD workflow is used.

TDD applies primarily to essential features and business rules.

Not every implementation detail requires a test-first workflow.

Examples of features that should generally be developed using TDD:

- Ride creation
    
- Ride participation
    
- Authorization
    
- Filtering logic
    
- Validation rules
    
- Permissions
    

Examples that may not require strict TDD:

- Layout refinements
    
- Visual presentation
    
- Non-critical UI enhancements
    

---

## Test Types

### Feature Tests First

Feature tests are the primary testing tool.

They describe user-visible behavior and application workflows.

Examples:

- User can create a ride.
    
- User can join a ride.
    
- Host can edit own ride.
    
- Non-host cannot edit ride.
    
- Ride filters return correct results.
    

---

### Unit Tests Sparingly

Use unit tests when:

- Business logic becomes isolated and complex.
    
- Rules can be expressed independently from HTTP or UI workflows.
    

Avoid creating unit tests solely to increase coverage.

---

## Tests As Development Checkpoints

Before implementing a feature:

1. Define expected user behavior.
    
2. Create essential feature tests.
    
3. Implement functionality.
    
4. Refactor as needed.
    

The feature test suite acts as the development roadmap.

---

# Coding Agent Guidelines

## Agent Responsibilities

Coding agents are primarily used for:

- Scaffolding
    
- Repetitive implementation
    
- Test generation
    
- Boilerplate creation
    
- Refactoring assistance
    

Agents should not make product decisions.

Agents should not expand scope.

Agents should not introduce architecture beyond current project needs.

---

## Scope Discipline

Agents must prefer the simplest implementation that satisfies:

- Existing tests
    
- Existing requirements
    
- Current MVP scope
    

Avoid speculative features.

Avoid premature abstractions.

Avoid future-proofing for hypothetical requirements.

---

## Preferred Development Sequence

When implementing a new feature:

1. Define behavior.
    
2. Create feature tests.
    
3. Implement simplest solution.
    
4. Refactor only after behavior passes.
    

---

# Initial MVP Development Order

## Phase 1

Authentication

Leverage starter kit functionality.

Minimal customization.

---

## Phase 2

User Profiles

Users define:

- Location
    
- Cycling disciplines
    
- Ride preferences
    

---

## Phase 3

Ride Creation

Users can create rides with:

- Title
    
- Description
    
- Discipline
    
- Ride style
    
- Pace
    
- Distance
    
- Elevation
    
- Meeting point
    
- Start time
    

---

## Phase 4

Ride Participation

Users can:

- Join rides
    
- Leave rides
    
- View participants
    

---

## Phase 5

Ride Discovery

Users can:

- Browse rides
    
- Filter rides
    
- View ride details
    

---

# Design Principles

## Mobile First

The primary experience is mobile.

Desktop support is important but secondary.

---

## Information Density

Ride discovery should prioritize quick scanning.

Users should be able to determine:

- What kind of ride it is
    
- When it starts
    
- Whether it matches expectations
    

within seconds.

---

## Content Before Decoration

Prioritize:

- Clarity
    
- Simplicity
    
- Readability
    

Avoid decorative UI that obscures information.

---

# Success Metric

The primary success metric for the MVP is:

> Successful rides created and completed through the platform.

Not:

- Page views
    
- Followers
    
- Likes
    
- Engagement metrics
    

The application succeeds when cyclists use it to organize and complete rides.

One thing I would add to the repository outside this document is a second file named something like `development-principles.md` containing a short list of non-negotiable rules ("feature tests before implementation", "prefer Livewire over custom JS", "avoid introducing services/repositories without demonstrated need", etc.). Agents tend to follow concise operational rules even more reliably than long-form project descriptions.

PROMPT
Please create deveopment-principles.md. Maybe ommit anything like "prefer Livewire over custom JS", since I actually enjoy writing js. Rather instruct agents to write any javascript inside reusable Alpine.data objects and to place them inside html tags as displayed in this example of a livewire full page component: <?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div x-data="carousel">
    <div x-show="hasImages">
        <!-- ... -->
    </div>
</div>

<script>
    Alpine.data('carousel', () => ({
        images:...,
 
        get hasImages() {
            // ...
        },
    }));
</script>

REPLY
I agree. "Prefer Livewire over JavaScript" is often too dogmatic and tends to produce awkward solutions. A better rule is:

> Use the simplest tool for the job, but keep behavior local to the component that owns it.

That aligns well with Livewire 4's co-location philosophy and gives both you and coding agents clear guidance.

# Development Principles

This document defines the development rules for the project.

These principles are intended for both human developers and coding agents.

When in doubt, follow these principles over personal preferences or speculative improvements.

---

# Core Philosophy

## Build The Simplest Thing That Works

Implement the smallest solution that satisfies:

- Current requirements
    
- Existing tests
    
- MVP scope
    

Avoid solving problems that do not exist yet.

Avoid building infrastructure for hypothetical future features.

---

## Behavior Before Architecture

Prioritize working behavior over architectural patterns.

A feature that works and is easy to understand is preferred over a more abstract solution.

Do not introduce additional layers without a demonstrated need.

Examples of patterns that should require justification:

- Repository pattern
    
- Service layers
    
- Action classes
    
- DTOs
    
- Event-driven architectures
    

These are tools, not default requirements.

---

## Optimize For Readability

Code is read more often than it is written.

Prefer:

- Clear names
    
- Small methods
    
- Explicit behavior
    

Avoid:

- Clever abstractions
    
- Excessive indirection
    
- Unnecessary generic solutions
    

---

# Testing Rules

## Tests Define Behavior

Tests should describe expected application behavior.

They are not written solely to maximize coverage.

A good test answers:

> "What should the system do?"

---

## Feature Tests First

Feature tests are the primary testing tool.

Examples:

- User can create a ride.
    
- User can join a ride.
    
- User cannot edit another user's ride.
    
- Ride filters return expected results.
    

Favor feature tests over isolated implementation tests.

---

## TDD For Essential Features

For important functionality:

1. Define behavior.
    
2. Write tests.
    
3. Implement.
    
4. Refactor.
    

Examples:

- Authorization
    
- Validation
    
- Ride creation
    
- Ride participation
    
- Filtering
    

Strict TDD is optional for visual refinements and low-risk UI work.

---

## Do Not Test Framework Behavior

Do not write tests that merely verify Laravel, Livewire, or Alpine functionality.

Test project behavior.

---

# Livewire Principles

## Full Page Components By Default

Pages should generally be implemented as Livewire Full Page Components.

Examples:

- Ride discovery
    
- Ride details
    
- Ride creation
    
- User profile
    

---

## Keep Related Code Together

Follow Livewire's co-location philosophy.

Keep related concerns close to the component that owns them.

Examples:

- Component logic
    
- Markup
    
- Validation
    
- JavaScript
    

Avoid unnecessary fragmentation.

---

## Reusable Components Only When Needed

Extract reusable components when:

- Reuse exists
    
- Complexity justifies extraction
    

Do not extract components prematurely.

---

# JavaScript Principles

## JavaScript Is Allowed

Use JavaScript when it improves the user experience or simplifies implementation.

There is no requirement to force every interaction through Livewire.

Choose the most appropriate solution for the problem.

---

## Prefer Alpine Data Objects

Interactive client-side behavior should generally be implemented using reusable Alpine.data objects.

Example structure:

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

Avoid large collections of loose inline Alpine expressions.

Favor named Alpine components with explicit state and methods.

---

## Keep JavaScript Local

Component-specific JavaScript should remain inside the component that owns it whenever practical.

Avoid global scripts unless behavior is intentionally shared across multiple areas of the application.

---

## Prefer Explicit State

Favor:

```js
open: false

toggle() {
    this.open = !this.open
}
```

Over complex inline expressions.

Keep state easy to understand.

---

# UI Principles

## Mobile First

The mobile experience is the primary experience.

Design and implementation decisions should start with mobile layouts.

---

## Content First

Prioritize:

- Information hierarchy
    
- Readability
    
- Fast scanning
    

Especially on ride discovery screens.

---

## Progressive Enhancement

Start simple.

Add complexity only when it provides measurable value.

---

# Agent Guidelines

## Agents Do Not Expand Scope

Implement requested behavior.

Do not introduce:

- New features
    
- Alternative workflows
    
- Additional architecture
    

unless explicitly requested.

---

## Agents Should Generate Tests

When implementing important functionality:

1. Identify essential behaviors.
    
2. Create or update feature tests.
    
3. Implement functionality.
    

Tests help drive development.

---

## Agents Should Explain Significant Decisions

If a task requires a non-obvious architectural choice, explain the reasoning before or alongside the implementation.

---

# Decision Rule

When multiple solutions are possible, choose the solution that is:

1. Easiest to understand.
    
2. Easiest to test.
    
3. Easiest to change later.
    

Not the solution that is theoretically the most flexible.

One additional rule you may want to add later, once the project has some momentum, is a **"No Silent Refactors"** principle: agents should not restructure unrelated code while working on a feature. That single rule prevents a surprising amount of AI-generated churn in Laravel projects.


PROMPT
Inside the livewire starting kit there is a folder .agents/skills containing subfolders like laravel-best-practices containing a file SKILL.md and another  nested folder called rules with items like routing.md and others. Is .agents a good place to put deveopment-principles.md  and/or project-context.md and if yes, what should their respective subfolders be called?


REPLY
Yes, I think `.agents/skills` is actually a very good place for both documents **if their primary audience is coding agents**.

The distinction I'd make is:

### project-context.md

Answers:

> What are we building?

### development-principles.md

Answers:

> How do we build it?

Those are effectively two separate skills.

I'd probably structure it like this:

```text
.agents/
└── skills/
    ├── laravel-best-practices/
    │   ├── SKILL.md
    │   └── rules/
    │       ├── routing.md
    │       ├── ...
    │
    ├── ride-match-context/
    │   └── SKILL.md
    │
    └── ride-match-development/
        ├── SKILL.md
        └── rules/
            ├── testing.md
            ├── livewire.md
            ├── javascript.md
            └── architecture.md
```

---

## ride-match-context

This becomes your project vision skill.

```text
.agents/skills/ride-match-context/SKILL.md
```

Contents:

- project overview
    
- product goals
    
- target users
    
- MVP scope
    
- excluded features
    
- success metrics
    

Essentially your current `project-context.md`.

This file changes relatively infrequently.

---

## ride-match-development

This becomes your implementation skill.

```text
.agents/skills/ride-match-development/SKILL.md
```

A short overview:

```md
# RideMatch Development Principles

This skill defines how the project is implemented.

Consult rule documents for:

- testing
- livewire architecture
- javascript
- project structure
```

Then split the actual guidance into rule files.

---

### testing.md

Contains:

- feature tests first
    
- TDD for essential features
    
- tests as development roadmap
    
- avoid testing framework behavior
    

---

### livewire.md

Contains:

- full page components by default
    
- co-location philosophy
    
- extraction rules
    
- blade vs livewire component decisions
    

---

### javascript.md

Contains your Alpine preferences.

Example:

```md
# JavaScript Rules

Interactive behavior should generally be implemented
using reusable Alpine.data objects.

Prefer:

<div x-data="carousel">

<script>
Alpine.data('carousel', () => ({
    ...
}));
</script>

Avoid large collections of inline Alpine expressions.

Keep component behavior close to the component
that owns it.
```

---

### architecture.md

Contains:

- simplest solution first
    
- avoid repositories unless justified
    
- avoid premature abstractions
    
- agents must not expand scope
    
- no speculative architecture
    

---

## Why I Prefer Multiple Rule Files

Agents are surprisingly good at consuming:

```text
rules/testing.md
```

when asked:

> write feature tests

and

```text
rules/javascript.md
```

when asked:

> add an image carousel

This tends to produce better results than a single 2,000-line document.

---

## One Additional Skill I'd Add Later

Once the project grows:

```text
.agents/skills/ride-match-domain/
```

Containing:

```text
ride.md
user.md
participation.md
reputation.md
```

This becomes the canonical source for business terminology.

For example:

```md
# Ride

A Ride is an event organized by a Host.

A Ride has:

- discipline
- pace
- ride style
- meeting point
- start time

A Ride is not:

- a GPX route
- a ride recording
```

This prevents agents from gradually inventing conflicting concepts over time.

So my recommendation would be:

- Put **project-context.md** into `.agents/skills/ride-match-context/SKILL.md`
    
- Put **development-principles.md** into `.agents/skills/ride-match-development/SKILL.md`
    
- Move the detailed implementation guidance into a `rules/` directory under `ride-match-development`
    

That structure scales nicely from MVP to a much larger project without becoming a dumping ground of unrelated instructions.


PROMPT
Can you please create appropriate basic content for the 4 files inside rules folder, following the overviews provided by you?

REPLY
# testing.md

# Testing Rules

## Purpose

Tests serve two purposes:

1. Verify essential application behavior.
    
2. Guide development.
    

Tests should describe what the system is expected to do from a user's perspective.

---

## Feature Tests First

Feature tests are the primary testing tool for this project.

Examples:

- User can create a ride.
    
- User can join a ride.
    
- User cannot edit another user's ride.
    
- User can filter rides by discipline.
    
- User can leave a ride.
    

Feature tests should generally be written before implementation.

---

## TDD For Essential Features

Use a test-first workflow for important business functionality.

Recommended workflow:

1. Define expected behavior.
    
2. Create feature tests.
    
3. Run tests and verify failure.
    
4. Implement functionality.
    
5. Refactor once tests pass.
    

Examples of features that should normally use TDD:

- Ride creation
    
- Ride participation
    
- Authorization
    
- Validation
    
- Discovery and filtering
    
- Reputation calculations
    

---

## Do Not Test Framework Behavior

Do not create tests that simply verify Laravel, Livewire, Alpine, or PHP behavior.

Focus on project-specific business rules.

Bad examples:

- Framework validation already guaranteed by Laravel.
    
- Livewire rendering behavior without project logic.
    

Good examples:

- Guests cannot create rides.
    
- Ride hosts can edit their own rides.
    
- A rider cannot join the same ride twice.
    

---

## Prefer Behavior Over Implementation

Tests should describe outcomes rather than internal implementation.

Prefer:

"User can join a ride."

Over:

"JoinRideAction was called."

---

## Test Only What Matters

Do not create tests solely to increase coverage.

If a behavior is not important enough to justify a test, question whether it is important enough to justify implementation complexity.

---

## When Agents Add Features

Before implementing significant functionality:

1. Identify essential business behavior.
    
2. Add or update feature tests.
    
3. Implement the simplest solution that satisfies those tests.
    

# livewire.md

# Livewire Architecture Rules

## Full Page Components By Default

Pages should generally be implemented as Livewire Full Page Components.

Examples:

- Ride discovery
    
- Ride details
    
- Ride creation
    
- User profile
    

Prefer full page components unless there is a clear reason not to.

---

## Follow Co-Location Principles

Keep related concerns together whenever practical.

A component should own:

- State
    
- Actions
    
- Validation
    
- Markup
    
- Component-specific JavaScript
    

Avoid unnecessary separation of closely related concerns.

---

## Extract Components Only When Needed

Create reusable components when:

- A component is used multiple times.
    
- A component has become difficult to understand.
    
- Extraction improves maintainability.
    

Do not extract components preemptively.

---

## Blade vs Livewire

Use Blade partials when:

- Rendering is purely presentational.
    
- No state is required.
    
- No user interaction is required.
    

Use Livewire components when:

- State exists.
    
- User interaction exists.
    
- Server communication exists.
    

---

## Keep Components Focused

Components should generally have a single responsibility.

Examples:

Good:

- RideFilter
    
- ParticipantList
    
- JoinRideButton
    

Avoid large components responsible for unrelated behavior.

---

## Prefer Explicit Behavior

Favor readable methods and clearly named actions.

Avoid hiding important business logic inside complex view expressions.

Business logic belongs in PHP.

---

## Avoid Premature Abstractions

Do not introduce additional architectural layers unless a real need exists.

Examples that require justification:

- Repository pattern
    
- Service layers
    
- Custom infrastructure
    

Simple solutions are preferred until complexity demands otherwise.

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

- Alpine component definition
    
- Template
    
- Related markup
    

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

- Modal
    
- Dropdown
    
- Carousel
    
- Tabs
    

Do not duplicate identical JavaScript across multiple components.

---

## Minimize Global Scripts

Avoid creating global JavaScript unless behavior is intentionally shared application-wide.

Prefer local ownership over centralized script files.

---

## Business Logic Stays In PHP

JavaScript should primarily handle:

- Interaction
    
- Presentation state
    
- Client-side UX
    

Business rules and domain logic belong in PHP.

---

## Progressive Enhancement

Features should continue to function whenever reasonable without relying entirely on client-side JavaScript.

Use JavaScript to enhance the experience, not to replace core functionality.

# architecture.md

# Architecture Rules

## Build The Simplest Thing That Works

Implement the smallest solution that satisfies:

- Current requirements
    
- Existing tests
    
- MVP scope
    

Avoid solving future problems before they exist.

---

## Behavior Before Architecture

Working behavior is more important than architectural purity.

Prioritize:

- Clarity
    
- Readability
    
- Simplicity
    

before introducing additional abstractions.

---

## Avoid Premature Abstractions

Do not introduce patterns because they might be useful later.

Examples requiring clear justification:

- Repository pattern
    
- Service layers
    
- DTOs
    
- Complex event systems
    
- Custom infrastructure
    

Use framework conventions first.

---

## Optimize For Readability

Future maintainability is more important than theoretical flexibility.

Prefer:

- Clear names
    
- Explicit code
    
- Small focused methods
    

Avoid:

- Clever code
    
- Deep indirection
    
- Over-generalization
    

---

## Follow Existing Conventions

Before introducing a new pattern, inspect the existing codebase.

Prefer consistency over personal preference.

A slightly imperfect but consistent codebase is preferable to multiple competing styles.

---

## No Silent Refactors

When implementing a feature:

- Modify only the code required for the task.
    
- Do not restructure unrelated areas.
    
- Do not perform broad architectural rewrites.
    

Large refactors should be separate, intentional tasks.

---

## Agents Must Not Expand Scope

Implement requested functionality.

Do not introduce:

- Additional features
    
- Alternative workflows
    
- Future-facing architecture
    

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


PROMPT
What information should a user profile contain?

REPLY
For the MVP, I'd be very careful not to let the profile turn into a mini-Strava profile.

The profile exists to answer:

> "Would I enjoy riding with this person?"

not

> "How strong is this cyclist?"

---

# MVP Profile

## Basic Information

- Display name
    
- Profile photo (optional)
    
- Home area / city
    
- Short bio (optional)
    

Example:

```text
Chris
Zurich

Road, Gravel

Enjoy long social rides, climbing days,
and coffee stops.
```

That's enough human context.

---

## Disciplines

Multi-select.

Examples:

- Road
    
- Gravel
    
- MTB
    
- Touring
    
- E-Bike
    
- Commuting
    

This becomes useful for filtering and matching.

---

## Ride Preferences

This is probably the most important section.

Examples:

### Enjoys

- Coffee Rides
    
- Climbing
    
- Endurance
    
- Scenic Rides
    
- Bikepacking
    
- Training
    

### Avoids (optional)

- Race Pace
    
- Technical MTB
    
- Sprint Training
    

This helps set expectations.

---

## Pace Preference

I'd avoid exact numbers initially.

Instead:

```text
Easy
Social
Brisk
Fast
Race
```

Most cyclists overestimate consistency of average speed because:

- terrain varies
    
- wind varies
    
- group size varies
    

The labels communicate intent better.

---

## Ride Expectations

Checkbox-style attributes.

Examples:

```text
✓ No-Drop Rides

✓ Coffee Stops

✓ Regroup At Climbs

✗ Competitive Training
```

This may be more valuable than fitness information.

---

# Reputation Section

Only after rides exist.

Example:

```text
Joined: 18 rides

Hosted: 6 rides

Attendance: 100%
```

and later:

```text
Ride Description Accuracy: 95%
```

These are trust metrics.

---

# Things I Would Avoid Initially

## FTP

```text
FTP: 312
```

No.

Very niche.

---

## Power Data

No.

---

## Bike Collection

Fun but not relevant to ride matching.

---

## Strava Statistics

No.

You aren't building Strava.

---

## Followers

No.

---

## Likes

No.

---

# One Thing I Would Add

A "Typical Ride" section.

Something like:

```text
Typical Ride

Road
70-100 km

Social Pace

Coffee Stop Required
```

or

```text
Typical Ride

Gravel
40-60 km

Brisk Pace

Exploration Focused
```

This gives an immediate picture of the rider.

---

# If I Were Designing the Profile Screen

I'd structure it like this:

```text
[Photo]

Chris
Zurich

Road • Gravel

----------------

About

Enjoy climbing, coffee rides
and weekend adventures.

----------------

Typical Ride

Road
70-100 km
Social Pace

----------------

Preferences

☕ Coffee Rides
⛰ Climbing
🌄 Scenic Routes

----------------

Reliability

Joined 18 rides
Hosted 6 rides
Attendance 100%
```

Notice what's missing:

- power numbers
    
- fitness metrics
    
- leaderboards
    
- followers
    

The profile is optimized for **ride compatibility and trust**, which aligns directly with the core purpose of the app.