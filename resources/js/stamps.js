export default (config = {}) => ({
    // Generate a unique ID instance suffix so multiple stamps don't collide
    id: 'stamp-' + Math.random().toString(36).substring(2, 9),

    radius: config.radius || 60,
    upperText: config.upperText || "CONTROL REGIONAL",
    middleText: config.middleText || "29 JUN 2026",
    bottomText: config.bottomText || "* BREVET *",
    maxJitter: config.maxJitter !== undefined ? config.maxJitter : 0.6,

    get padding() { return Math.max(4, this.maxJitter * 3); },
    get size() { return (this.radius * 2) + (this.padding * 2); },
    get center() { return this.radius + this.padding; },
    get viewBox() { return `0 0 ${this.size} ${this.size}`; },

    get outerRadius() { return this.radius; },
    get innerRadius() { return this.radius - 6; },
    get textRadius() { return this.radius - (this.radius * 0.22); }, // Scales comfortably with radius sizes

    // DYNAMIC FONT SCALING FORMULAS
    get borderFontSize() { return Math.max(8, Math.round(this.radius * 0.14)); },
    get centerFontSize() { return Math.max(9, Math.round(this.radius * 0.16)); },

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
      const r = this.textRadius;
      return `M ${cx - r} ${cy} A ${r} ${r} 0 0 1 ${cx + r} ${cy}`;
    },

    // FIXED: Clockwise bottom path (Left-to-Right under the belly)
    // Changing the sweep-flag from '1' to '0' flips the text right-side up
    get bottomTextPath() {
      const cx = this.center;
      const cy = this.center;
      const r = this.textRadius;
      return `M ${cx - r} ${cy} A ${r} ${r} 0 0 0 ${cx + r} ${cy}`;
    }
  });
