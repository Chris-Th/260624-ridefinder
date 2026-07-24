export default (config = {}) => ({
    // Generate a unique ID instance suffix so multiple stamps don't collide
    id: 'stamp-' + Math.random().toString(36).substring(2, 9),
    opacity: config.opacity || 1,
    radius: config.radius || 60,
    outerBorder: config.outerBorder ?? 4.5,
    innerBorder: config.innerBorder || 0,
    padding: config.padding -2  || -2,
    topText: config.topText || null,
    centerText: config.centerText || null,
    bottomText: config.bottomText || null,
    iconFilter: config.iconFilter || false,
    gradientStopRanges: [],
    stops: [],
    fontSize: {
        top: config.font?.top?.size || 0,
        center: config.font?.center?.size || 0,
        bottom: config.font?.bottom?.size || 0
    },
    fontWeight: {
        top: config.font?.top?.weight || 'normal',
        center: config.font?.center?.weight || 'normal',
        bottom: config.font?.bottom?.weight || 'normal'
    },
    maxJitter: config.maxJitter !== undefined ? config.maxJitter : 0.6,
    maxTransform: {
        tx: config.maxTransform?.tx || 0,
        ty: config.maxTransform?.ty || 0,
        rot: config.maxTransform?.rot || 0
    },
    icon: {
        ['x-bind:y']() {
            return this.iconRect.y
        },
        ['x-bind:x']() {
            return this.iconRect.x
        },
        ['x-bind:width']() {
            return this.iconRect.width
        },
        ['x-bind:height']() {
            return this.iconRect.height
        }
    },

    get iconFilterUrl() {
        if(config.iconFilter === 'soft') {
            return 'url(#soft-ink-grit-filter)';
        } else if (config.iconFilter === 'softer') {
            return 'url(#softer-ink-grit-filter)';
        } else if (config.iconFilter === 'none') {
            return '';
        } else {
            return 'url(#ink-grit-filter)';
        }
    },
    get iconPadding() { return Math.max(5, this.maxJitter * 3); },
    get size() { return (this.radius * 2) + (this.iconPadding * 2); },
    get center() { return this.radius + this.iconPadding; },
    get viewBox() { console.log('size', this.size); return `0 0 ${this.size} ${this.size}`; },

    get outerRadius() { return this.radius; },
    get innerRadius() { return this.outerBorder === 'none' ? this.radius : this.radius - (this.outerBorder + 1.5); },
    get textRadius() {
        const inner = this.innerBorder === 'none' ? 0 : this.innerBorder;
        const outer = this.outerBorder === 'none' ? 0 : this.outerBorder;
        return this.innerRadius - this.topFontSize - this.padding;
    },
    get topTextRadius() {
        return this.innerRadius - this.topFontSize - this.padding;
    },
    get bottomTextRadius() {
        return this.innerRadius - this.padding;
    },

    // DYNAMIC FONT SCALING FORMULAS

    get topFontSize() {
        if (typeof this.fontSize.top === 'number') return this.fontSize.top;

        const factor = this.fontSize.top === 'lg'
            ? 1.3 : this.fontSize.top === 'sm'
                ? 0.7 : 1;
        return Math.max(10, Math.round(this.radius * 0.20 * factor));
    },
    get centerFontSize() {
        if (typeof this.fontSize.center === 'number') return this.fontSize.center;

        const factor = this.fontSize.center === 'lg'
            ? 1.3 : this.fontSize.center === 'sm'
                ? 0.7 : 1;
        return Math.max(12, Math.round(this.radius * 0.24 * factor));
    },
    get bottomFontSize() {
        if (typeof this.fontSize.bottom === 'number') return this.fontSize.bottom;

        const factor = this.fontSize.bottom === 'lg'
            ? 1.3 : this.fontSize.bottom === 'sm'
                ? 0.7 : 1;
        return Math.max(10, Math.round(this.radius * 0.20 * factor));
    },
    // available space for center icon
    get iconRect() {
        const margin = this.topFontSize > this.bottomFontSize ? this.topFontSize : this.bottomFontSize;
        const iconSize = config.iconSize || (this.radius - margin) * 1.4;
        return {
            width: iconSize,
            height: iconSize,
            x: this.center - iconSize / 2,
            y: this.center - iconSize / 2
        }
    },

    get iconTranslate () {
        return '0 ' + ((this.topFontSize - this.bottomFontSize) / 2);
    },

    get transform() {
        return {
            tx: Math.floor((Math.random() * 2 - 1) * this.maxTransform.tx),
            ty: Math.floor((Math.random() * 2 - 1) * this.maxTransform.ty),
            rot: Math.floor((Math.random() * 2 - 1) * this.maxTransform.rot)
        };
    },

    generateStopAttrValues (stopsAttrRanges = []) {
        let stops = [];

        stopsAttrRanges.forEach((stop, index) => {

            /*
                [
                    [0, 1], // [max-offset, min-opacity]
                    [70, 0.8],
                    [90, 0.5],
                    [97, 0.1],
                    [100, 0]
                ];

            */
            // if (!typeof stop === 'Array') return;
            const minOff = index === 0 ? 0 : (index === stopsAttrRanges.length - 1 ? 100 : stops[index - 1].offset);
            const maxOff = index === stopsAttrRanges.length - 1 ? 100 : stop[0];
            const off = minOff + (Math.random() * (maxOff - minOff));
            // stopEl.setAttribute('offset', off);

            const maxOpac = index === 0 ? stop[1] :  stops[index - 1].opacity;
            const minOpac = stop[1];
            const opacity = maxOpac - (Math.random() * (maxOpac - minOpac));
            // stopEl.setAttribute('stop-opacity', opacity);
            // stopEl.setAttribute('stop-color', 'currentColor');

            // gradientEl.appendChild(stopEl);
            stops.push({
                opacity: opacity,
                offset: off
            })
        })
        const rotate = Math.random() * 360;


        // <stop :stop-opacity="stop.opacity" :stop-offset="stop.offset" ... />
        return stops;
     },
     appendGradientStops(stops) {
        const linearGradientEl = document.querySelector('#uneven-stamp-pressure-' + this.id);
        console.log('linearGradientEl', linearGradientEl);
        stops.forEach((stop) => {
            let stopEl = document.createElementNS('http://www.w3.org/2000/svg', 'stop');
            stopEl.setAttributeNS('http://www.w3.org/2000/svg', 'stop-opacity', stop.opacity);
            stopEl.setAttributeNS('http://www.w3.org/2000/svg', 'offset', stop.offset);
            stopEl.setAttributeNS('http://www.w3.org/2000/svg', 'stop-color', 'currentColor');
            linearGradientEl.appendChild(stopEl);
        })
     },
    /*
        gradientStopRanges = [
            [
                [0, 0],
                [0.8, 1]
            ],
            [
                [30, 50], // stop-offset-range
                [0.5, 0.8] // stop-opacity-range
            ],
            ...
            [
                [100, 100],
                [0, 0.1]
            ]
        ]
    */


    generateJitteredCircle(r) {
      const k = 0.55228474983;
      const kr = k * r;
      const cx = this.center;
      const cy = this.center;
      const mj = this.maxJitter;
      const j = (v) => v + (Math.random() * 2 - 1) * mj;

      const p0_x = j(cx + r),      p0_y = j(cy);
      const c1x  = j(cx + r),      c1y  = j(cy + kr);
      const c2x  = j(cx + kr),     c2y  = j(cy + r);
      const p1_x = j(cx),          p1_y = j(cy + r);
      const c3x  = j(cx - kr),     c3y  = j(cy + r);
      const c4x  = j(cx - r),      c4y  = j(cy + kr);
      const p2_x = j(cx - r),      p2_y = j(cy);
      const c5x  = j(cx - r),      c5y  = j(cy - kr);
      const c6x  = j(cx - kr),     c6y  = j(cy - r);
      const p3_x = j(cx),          p3_y = j(cy - r);
      const c7x  = j(cx + kr),     c7y  = j(cy - r);
      const c8x  = j(cx + r),      c8y  = j(cy - kr);

      return `M ${p0_x} ${p0_y} ` +
             `C ${c1x} ${c1y}, ${c2x} ${c2y}, ${p1_x} ${p1_y} ` +
             `C ${c3x} ${c3y}, ${c4x} ${c4y}, ${p2_x} ${p2_y} ` +
             `C ${c5x} ${c5y}, ${c6x} ${c6y}, ${p3_x} ${p3_y} ` +
             `C ${c7x} ${c7y}, ${c8x} ${c8y}, ${p0_x} ${p0_y} Z`;
    },

    // Clockwise top path (Left-to-Right over the peak)
    get topTextPath() {
      const cx = this.center;
      const cy = this.center;
      const r = this.topTextRadius;
      return `M ${cx - r} ${cy} A ${r} ${r} 0 0 1 ${cx + r} ${cy}`;
    },

    // FIXED: Clockwise bottom path (Left-to-Right under the belly)
    // Changing the sweep-flag from '1' to '0' flips the text right-side up
    get bottomTextPath() {
        const cx = this.center;
        const cy = this.center;
        const r = this.bottomTextRadius;
        return `M ${cx - r} ${cy} A ${r} ${r} 0 0 0 ${cx + r} ${cy}`;
    },

  });
