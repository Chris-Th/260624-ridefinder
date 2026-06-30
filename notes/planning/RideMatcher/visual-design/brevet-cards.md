A typical paper brevet card (or "brevet passport") is a small, pocket-sized document (roughly A6 or 4 × 6 inches when folded) issued by ride organizers. Its purpose is to serve as your official proof of passage during a long-distance cycling event. [1, 2, 3]
The physical or digital card features a consistent, highly structured layout:
## The Front Cover

* Event Details: The name of the event, total distance (e.g., 200 km), date, and location.
* Rider Information: Spaces for your name, club, and contact details.

## The Inside Pages

* Route Itinerary: A detailed list of the predetermined checkpoints (or "controls").
* Time Windows: The exact opening and closing times you are allowed to arrive at each checkpoint (based on minimum and maximum pace rules).
* Validation Grid: Designated rows or boxes where checkpoint officials stamp or sign your card. [4, 5, 6, 7, 8]

## How It Works During the Ride

* At each checkpoint, you must get your card validated. This can be a physical ink stamp from a manned control point, an official sticker, or a local store/gas station receipt with the time and date printed on it. [9, 10, 11]
* Many modern events now use digital alternatives like the [E-Brevet Web App](https://www.ebrevet.org/en/) or [Audax UK E-Brevet App](https://www.audax.uk/media/vesio0v1/ebriders.pdf), though many riders still carry paper cards as a reliable backup. [12, 13, 14]

If you're preparing for an event, I can:

* Detail the time limits for common distances (200 km, 300 km, 400 km, 600 km)
* Explain what "proof of passage" requirements look like for unmanned checkpoints

Let me know what you'd like to know next.

[1] [https://audax.org.au](https://audax.org.au/ride/my-first-ride/)
[2] [https://www.cyclinguk.org](https://www.cyclinguk.org/article/what-audax-and-how-get-involved)
[3] [https://www.wercycling.com](https://www.wercycling.com/brevet-check-list)
[4] [https://www.facebook.com](https://www.facebook.com/groups/touraotearoa/posts/2469196540099040/)
[5] [https://www.wercycling.com](https://www.wercycling.com/brevet-tips)
[6] [https://rusa.org](https://rusa.org/pages/acp-brevet-control-times-calculator)
[7] [https://www.youtube.com](https://www.youtube.com/watch?v=hahnP9dG6GI&t=7)
[8] [https://www.instagram.com](https://www.instagram.com/p/DaDcvTaoU97/)
[9] [https://santacruzrandonneurs.org](https://santacruzrandonneurs.org/pages/ride-format)
[10] [https://www.randonneursontario.ca](https://www.randonneursontario.ca/your-first-brevet)
[11] [https://www.rmccrides.com](https://www.rmccrides.com/brevet2005rules.htm)
[12] [https://www.ebrevet.org](https://www.ebrevet.org/en/)
[13] [https://www.audax.uk](https://www.audax.uk/media/vesio0v1/ebriders.pdf)
[14] [https://www.youtube.com](https://www.youtube.com/watch?v=rRvFFufiQOg&t=18)



Translating the analog, utilitarian aesthetic of a physical brevet card into a digital UI card system is a fantastic concept for a cycling web app. To trigger that instant recognition and nostalgic connection for randonneurs, your UI design should focus on several distinctive visual and structural pillars:
## 1. Structural Layout: The "Checklist Grid"
Physical brevet cards are designed as a clear sequence of progressive tasks.

*
* The "Control" Block: Each UI card should represent a checkpoint or milestone. Use a uniform grid of blocks or boxes rather than a fluid, infinite feed.
* Asymmetrical Split: Use a vertical split on the card. The left 30% acts as a rigid, text-heavy label containing fixed metrics (Distance, Control Name, Open/Close Times). The right 70% is left intentionally empty or sparsely populated, waiting for user action (the "stamp").
* Card Proportions: Stick to a tall, vertical aspect ratio (resembling an A6 passport or index card) when displayed on mobile, or treat the desktop UI like a tri-fold leaflet laid flat.
*

## 2. Micro-Interactions: The Stamp & Validation
The most rewarding part of randonneuring is getting the card physically stamped. You can translate this into unique digital feedback states:

*
* The "Unstamped" State: Present the actionable area of the card with an explicit, empty circular border or a light dotted box.
* The "Stamped" State: When an action is completed, don't just use a generic green checkmark. Overlay a semi-transparent, slightly askew circular or oval "ink stamp" vector graphic. Give it a textured, distressed look to mimic physical ink on cardstock.
* Ink Colors: Stick to a retro validation palette. Use deep violet, indigo, bright red, or dark blue for the stamps, contrasting sharply against the background card.
*

## 3. Typography & Text Hierarchy
Brevet cards are practical documents printed cheaply by regional cycling clubs, meaning they rely on classic, industrial, or typewriter typography.

*
* Headers: Use heavy, high-contrast sans-serif or slab-serif fonts (e.g., Impact, Bebas Neue, Courier, or Roboto Mono) to display the main distance markers (e.g., "200 KM").
* Metadata Labels: Use small, uppercase, muted labels for data fields (e.g., OPEN TIME:, CLOSE TIME:, DISTANCE:).
* The "Handwritten" Contrast: When user data or real-time metrics populate a field (like actual arrival time), render that text in a dark blue or black monospace or subtle handwriting font to contrast against the rigid, printed card text.
*

## 4. Color Palette & Textures
Physical cards are heavily handled and stuffed into jersey pockets, meaning they avoid clean, sterile white backgrounds.

*
* Base Paper Tones: Use textured, warm background colors like manila, cream, soft ivory, light sepia, or light cardstock yellow/orange.
* Zonal Fills: Use solid, high-visibility accent banners (like a stark red, yellow, or blue stripe across the header) to indicate the specific ride category or regional club branding.
* Borders: Frame your UI cards with thin, crisp black or dark gray rules. You can use dotted or dashed lines between fields to mimic perforated tear-away sheets. [1]
*

## 5. Retro Graphic Accents

*
* The "Winged" Iconography: Classic cycling organizations love winged imagery. Incorporate a stylized winged wheel, a bold bicycle silhouette, or a geometric regional crest into the background or header of the card.
* Watermarks: Place a large, faint, low-opacity geometric pattern, a topography map layout, or a bicycle cog graphic directly behind the grid text.
*

If you would like to flesh this out further, I can help you:

*
* Draft the specific CSS properties / Tailwind classes to achieve that textured cardstock look
* Define the exact JSON data schema needed to power a progressive brevet-style UI card
*

Let me know which technical layer you'd like to work on next!

[1] [https://www.instagram.com](https://www.instagram.com/p/CXGT-bWAF_5/)




To help anchor the exact aesthetic you are trying to capture, it is best to look directly at how these physical documents treat space, text, and structure.

[6. Ride an audax | Fourteen cycling resolutions for ...](https://roadcyclinguk.com/sportive/fourteen-cycling-resolutions-for-2014.html/6), Road Cycling UK
[I really did do it, my first ever green #brevet card is back and now my ...](https://x.com/whiteshutters/status/1659168397114892290/photo/1), x.com
[audax-brm300-brevet-card | Old Roots, New Routes](https://alchemyrider.me/2017/01/03/audax-brm300-malaysia-2017/audax-brm300-brevet-card/), Old Roots, New Routes
[Description of a brevet | Club Vélo Randonneurs du Québec](https://randonneursquebec.ca/en/about/description-of-a-brevet/), Club Vélo Randonneurs du Québec
[What is a Randonnée? - kermessesport.com](https://www.kermessesport.com/2020/09/12/what-is-a-randonnee/), Kermesse Sport
[Paris-Brest-Paris on a Fixed Gear | Komoot](https://www.komoot.com/fr-fr/collection/888611/-paris-brest-paris-on-a-fixed-gear), Komoot
[File:20110312 Brevet Card.jpg - Wikimedia Commons](https://commons.wikimedia.org/wiki/File:20110312_Brevet_Card.jpg), Wikimedia Commons - Wikimedia.org
[50 Vintage Cigarette Cards - Cycling. 1939. Full Set. John Player ...](https://www.etsy.com/uk/listing/1105524953/50-vintage-cigarette-cards-cycling-1939), Etsy
[Retro Cycling Art Poster - Classic Rider Trading Cards Print- Gifts fo ...](https://paincaveprints.co.uk/products/retro-cycling-art-poster-classic-rider-trading-cards-print-gifts-for-cyclists), Pain Cave Prints
[Bryan Chapman Memorial // Brevet Randonneur 600K ...](https://diagonaliste.com/bcmperm-2021/), diagonaliste
[John Player & Sons Cycling Cigarette Cards 1939](https://tjsmilitaria.co.uk/products/john-player-sons-cycling-cigarette-cards-1939), Tom & Jerrys Militaria and Collectables
[Your Qs & As on Raid Cycling Challenges - Marmot Tours](https://marmot-tours.co.uk/your-q-and-as-on-raids), Marmot Tours

When translating these visual examples into a digital UI card system, look closely at these specific design details:
## 1. The Tri-Fold Layout & "Passport" Covers
As seen in the iconic Audax UK and Paris-Brest-Paris covers, physical brevet cards are long, tri-folded cardstocks or booklet passports.

*
* UI Translation: For your app's desktop view, consider displaying user dashboards using a side-by-side tri-fold layout. The left column can feature the main "cover style" branding, while the middle and right columns dynamically display the checklist route grids.
*

## 2. High-Contrast, Color-Coded Cardstocks
Randonneuring organizations use cheap, brightly dyed paper stocks to easily differentiate events. A classic lineup of vintage cards displays a striking palette: textured canary yellow, mint green, salmon pink, sky blue, and light manila grey.

*
* UI Translation: Instead of dark-mode neon or flat white cards, use a color-coding system for different route distances or difficulties. A 200 km route might feature a soft mint background, while a grueling 600 km route utilizes an orange or salmon pink card surface.
*

## 3. The Linear, Boxed Validation Grid
When opened up, [a typical inner layout](https://alchemyrider.me/2017/01/03/audax-brm300-malaysia-2017/audax-brm300-brevet-card/) reveals tight, explicitly boxed grids. Every control station gets its own box split cleanly into tiny technical details: the target kilometer distance, open/close windows, and a generous blank space for the stamp.

*
* UI Translation: Keep borders prominent. Avoid modern, borderless "floating" UI cards. Draw thin, crisp, dark borders around your UI cards, and use internal grids to cleanly isolate the meta-text (like arrival time windows) away from the main interactive area.
*

## 4. Overlapping Ink Stamps as State Changes
Looking at [completed brevet cards](https://commons.wikimedia.org/wiki/File:20110312_Brevet_Card.jpg), the stamps are messy, tactile, and completely analog. They feature circular logos of local bike shops, crests, and handwritten ink signatures that often break past the grid lines.

*
* UI Translation: When a user completes a section or logs a ride, have a stamp graphic dramatically "press" onto the UI card. The stamp image should have a slightly rough, distressed texture, be rotated at a random angle (e.g., -5 to +5 degrees), and deliberately bleed slightly over the container lines to feel like authentic ink.
*

Now that you have a visual sense of the cards, I can help you:

*
* Brainstorm creative ideas for digital stamps (e.g., store logos, coffee cups, or regional badges)
* Wireframe the exact text placement for your cards based on these traditional layouts
*

Where would you like to take the design concept next?
