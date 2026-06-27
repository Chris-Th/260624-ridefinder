Based on everything we've discussed about RideMatch—minimalist, geometric, icon-centric, and developer-friendly—I think there's a clear winner.

## 🥇 First Choice: [Boxy SVG](https://boxy-svg.com?utm_source=chatgpt.com)

This is what I would use for your project.

Why I think it fits:

* Clean, distraction-free interface
* SVG-native (doesn't treat SVG as an export format)
* Excellent for icons
* Produces clean SVG output
* Supports snapping, boolean operations, layers, symbols, etc. ([Colorlib][1])

It also has the same kind of restrained aesthetic you seem to appreciate.

---

## 🥈 Second Choice: [SVG-Edit](https://svgedit.netlify.app/editor/index.html?utm_source=chatgpt.com)

A classic open-source SVG editor.

Pros:

* Completely free
* Browser-based
* Very lightweight
* Great for simple icon work ([TechRadar][2])

It isn't as polished as Boxy SVG, but it's surprisingly capable.

---

## 🥉 Third Choice: [Vectr](https://vectr.com?utm_source=chatgpt.com)

If you find Boxy a bit too technical, Vectr is extremely approachable.

It's more of a general vector editor than an SVG specialist, but it's free and very easy to learn. ([SitePoint][3])

---

## My workflow for RideMatch

I'd actually use **three** tools:

1. **Boxy SVG** → draw icons.
2. **[SVGOMG](https://jakearchibald.github.io/svgomg/?utm_source=chatgpt.com)** → optimize every exported SVG.
3. Your editor (VS Code or PhpStorm) → make tiny manual adjustments if necessary.

SVGOMG is almost an industry standard for stripping unnecessary metadata and producing lean SVGs.

---

## Since your icons are becoming a core design language...

I'd establish a strict design system from day one:

* 24×24 viewBox
* 2 px stroke (or consistent filled style)
* 90° and 45° angles where possible
* Square line caps unless there's a strong reason otherwise
* Consistent visual weight
* No gradients
* No shadows inside the SVG
* Monochrome (color comes from CSS)

Treat the icon set almost like a typeface rather than a collection of illustrations.

---

## One more resource I think you'll love

Have a look at [SVG Repo](https://www.svgrepo.com?utm_source=chatgpt.com).

Not because you should download icons and use them directly, but because you can:

* inspect thousands of well-made SVGs,
* see how experienced designers construct paths,
* remix ideas,
* and build your own coherent icon family. It's one of the largest free SVG icon libraries available. ([Reddit][4])

---

### One design thought

The more we talk about this project, the more I think your **icon system should become your brand**.

If someone sees one of your sharp, geometric ride-type icons on a sticker, a social media post, or in the app, they should immediately think:

> "That's RideMatch."

That's a much stronger identity than relying on a logo alone, and it's a rare opportunity because your application's core concepts (coffee ride, alpine pass, paceline, gravel, bikepacking, etc.) naturally lend themselves to a memorable, consistent visual language.

[1]: https://colorlib.com/wp/free-svg-editor-tools/?utm_source=chatgpt.com "11 Best Free SVG Editors Online (Tested & Compared) 2026 - Colorlib"
[2]: https://www.techradar.com/news/the-best-free-adobe-illustrator-alternatives?utm_source=chatgpt.com "Best free Adobe Illustrator alternative of 2025"
[3]: https://www.sitepoint.com/6-free-web-based-svg-editors-compared/?utm_source=chatgpt.com "6 Free Web-Based SVG Editors Compared — SitePoint"
[4]: https://www.reddit.com/r/designfreebie/comments/1tr8a8t/svg_repo_free_svg_icons_and_vectors_huge/?utm_source=chatgpt.com "SVG Repo - Free SVG Icons and Vectors (Huge Repository)"
