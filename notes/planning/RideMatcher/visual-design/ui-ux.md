I actually think your personal taste could become a differentiator for this project—but I'd be careful about *where* to express it.

The target audience is broad: road cyclists in their 50s, gravel enthusiasts, MTB riders, touring cyclists. Many cycling apps feel very "corporate SaaS" or "sports analytics." A slightly opinionated visual identity could make yours memorable.

The trick is to let the **visual language** be edgy while keeping the **interaction patterns** completely conventional.

## I would make one thing iconic

Earlier I suggested making the ride type icon central. The more I think about it, the more I like it.

Instead of this:

```text
┌─────────────────────────────┐
│ Sunday Coffee Ride          │
│ ☕ Coffee Ride              │
│ 🚴 Road                     │
│ 72 km                       │
└─────────────────────────────┘
```

I'd almost invert the hierarchy:

```text
┌─────────────────────────────┐
│            ☕               │
│                             │
│ Sunday Coffee Ride          │
│ Road · Social               │
│ 72 km · 450 m               │
└─────────────────────────────┘
```

or

```text
┌─────────────────────────────┐
│        ▲                    │
│                             │
│ Alpine Pass Ride            │
│ Road                        │
│ 125 km · 2400 m             │
└─────────────────────────────┘
```

The icon becomes the visual anchor.

---

## I'd lean into geometric design

Your mention of brutalism immediately made me think of:

* 2px borders
* square corners
* bold typography
* restrained shadows
* generous whitespace

Think:

```text
□
■
▲
●
```

rather than gradients and glassmorphism.

Cycling equipment already has lots of geometric forms.

---

## I'd avoid "fake brutalism"

Many "brutalist" designs become exhausting.

Instead I'd use brutalist **details**.

Examples:

Instead of:

* neon colours
* overlapping elements
* deliberately ugly spacing

I'd use:

* crisp black borders
* hard shadows
* bold section dividers
* oversized icons
* monospace for metadata

The experience should still feel premium.

---

## Ride cards could almost feel like printed brevet cards

Imagine:

```text
□□□□□□□□□□□□□□□□□□□□□□□□

▲

ALPINE PASS LOOP

Road
125 km
2400 m

Sunday
08:30

□□□□□□□□□□□□□□ Join □□□□□□□□□□□□□□
```

Very little decoration.

Everything aligned.

Very tactile.

---

# Your icon system

I think this deserves significant design effort.

I'd establish maybe 12–20 canonical ride types.

Examples:

```text
☕ Coffee

▲ Climbing

⚡ Training

◉ Social

🌄 Scenic

🏕 Touring

🌲 Gravel

🛞 MTB

🌙 Night

🚴 Commute

🧭 Exploration

🚄 Paceline
```

Not emojis, but your own icon set.

Those icons should appear everywhere:

* discovery cards
* filters
* profile
* ride detail
* notifications

Eventually users recognize them instantly.

---

# This reminds me of...

Not cycling apps.

It reminds me more of transit maps.

You immediately recognize:

* train
* tram
* metro

without reading.

That's exactly what your ride types should become.

---

# Design inspiration I'd study

Rather than searching for cycling, I'd search for visual styles.

## Swiss Design ⭐⭐⭐⭐⭐

Since you're in Switzerland anyway...

Search:

* Swiss graphic design
* International Typographic Style
* Josef Müller-Brockmann
* Swiss posters
* Swiss signage

Not to copy literally, but to absorb:

* grids
* typography
* spacing
* hierarchy

It fits perfectly with mapping and navigation.

---

## Neo Brutalism ⭐⭐⭐⭐☆

Search:

* neo brutalism UI
* brutalist interface
* brutal web design

Take only:

* borders
* shadows
* confidence

Leave:

* intentionally awkward UX

---

## Transit systems ⭐⭐⭐⭐⭐

Study:

* metro maps
* transport signage
* airport wayfinding

Especially how icons and typography work together.

---

## Vintage cycling ephemera

Search for:

* vintage cycling posters
* brevet cards
* randonnée control cards
* race number bibs

Lots of beautiful functional typography.

---

# One thing I'd steal

From old web design:

```css
box-shadow: 4px 4px 0 #000;
```

instead of

```css
box-shadow: 0 10px 40px rgba(...);
```

It's playful.

It fits your aesthetic.

It works well with square cards.

---

# The biggest design opportunity

I don't think it's the colours.

I don't think it's the typography.

I think it's creating a **visual language around ride intent**.

If every ride type has:

* an icon
* a shape
* perhaps even an accent colour
* a recognizable card layout

then users will begin recognizing rides at a glance.

They won't think:

> "This is a coffee ride because I read the text."

They'll think:

> "Ah, the ☕ card."

That's a much stronger identity than another clean Tailwind app with rounded cards and pastel gradients. If you can make those ride-type symbols as instantly recognizable as wayfinding icons on a transit map, you'll have a design system that's both distinctive and genuinely useful.



Imagine all your ride icons are built from the same visual grammar:

2 px stroke
45° and 90° angles
circles and triangles
equal visual weight
square line caps

Then the whole icon family already shares a "shape language."

For example:

☕ Coffee

might use circles.

▲ Alpine

uses triangles.

▶ Paceline

uses repeated arrows.

⬢ Gravel

uses hexagons.

You don't have to add decorative motifs—the icon family itself becomes the motif.


---------


I know exactly what you mean. The style is generally called **ASCII art** or, since it uses Unicode box-drawing characters (`┌ │ └ ─`), more precisely **Unicode box drawing**.

The funny thing is: I don't think you actually want to imitate the **technology**. I think you like the **qualities** it has.

Those qualities are:

* perfectly aligned grid
* monospaced typography
* sharp corners
* no unnecessary decoration
* obvious hierarchy
* "designed by engineers" feel

You can get all of that with HTML and CSS.

---

## Option 1 — CSS Grid (my favourite)

Instead of drawing a box:

```text
┌────────────────────┐
│        ▲           │
│                    │
│ ALPINE PASS        │
│                    │
│ Road               │
│ 125 km             │
│ 2400 m             │
└────────────────────┘
```

Think of it as:

```html
<div class="ride-card">
    <div class="symbol">▲</div>

    <h2>ALPINE PASS</h2>

    <ul>
        <li>Road</li>
        <li>125 km</li>
        <li>2400 m</li>
    </ul>
</div>
```

with CSS like

```css
border: 2px solid;
border-radius: 0;
padding: 24px;
display: grid;
gap: .75rem;
```

It *feels* like ASCII without being ASCII.

---

## Option 2 — A design grid

Swiss design is obsessed with grids.

Imagine every card is based on an invisible 8×8 grid.

Everything snaps.

Nothing floats.

You get the same feeling of precision.

---

## Option 3 — Monospace headings

This one surprised me.

If you combine

* Inter
* IBM Plex Mono
* JetBrains Mono

carefully, you immediately get some of that terminal aesthetic.

Example:

```text
▲

ALPINE PASS

Road
125 km
2400 m
```

The monospace gives it an almost "technical specification" feel.

---

## Option 4 — Engineering drawing

This is actually where I'd look.

Search for:

* engineering blueprint
* technical manual
* aircraft instrument panel
* industrial labels

They have that same

```
everything has a purpose
```

feeling.

---

# I actually have another idea...

Looking at all the conversations we've had, I think your inspiration might not be ASCII art at all.

I think you're attracted to **information density without clutter**.

For example:

```
Road

125 km
2400 m

Sunday
08:30
```

No icons.

No pills.

No rounded badges.

Just information.

That's very reminiscent of:

* control panels
* train departure boards
* field notebooks
* military maps
* randonnée brevet cards

---

# Something I'd definitely experiment with

Instead of cards like this:

```
🟩 Road

125 km

2400 m
```

Try treating every card almost like a printed label.

```
▲

ALPINE PASS


ROAD

125 km
2400 m

SUN 08:30
```

Notice the whitespace.

Very little decoration.

Typography does almost all the work.

---

# The aesthetic I think you're circling

As we've talked, I can almost put a name to it.

It's not really brutalism.

It's something like:

> **Swiss Information Design meets Industrial Wayfinding.**

Think about:

* train station signage
* airport signage
* OS terminal
* CAD drawings
* bicycle component engravings
* vintage cycling route cards

Those all share:

* grids
* alignment
* typography
* reduction

without feeling cold.

---

## If this were my project...

I'd make one rule for the entire UI:

> **Everything should look like it could have been screen-printed onto an aluminum equipment panel.**

That sounds oddly specific, but it captures everything we've discussed:

* square borders
* crisp shadows
* geometric symbols
* bold typography
* almost no decoration
* extremely intentional spacing

Ironically, I think that would make the app feel *more* modern than following current trends like glassmorphism or soft gradients, because it would have such a clear and consistent visual identity.
