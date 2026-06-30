export default (config = {}) => ({
    // Unique ID to avoid any potential filter or canvas scope leakage
    id: 'stamp-rect-' + Math.random().toString(36).substring(2, 9),

    w: config.width || 160,
    h: config.height || 90,
    upperText: config.upperText || "SHELL STATION #408",
    middleText: config.middleText || "29 JUN 2026 - 03:41 AM",
    bottomText: config.bottomText || "ROADSIDE SERVICES",
    maxJitter: config.maxJitter !== undefined ? config.maxJitter : 0.6,

    // Padding prevents heavy edge jitter from clipping against the SVG canvas edge
    get padding() { return Math.max(16, this.maxJitter * 6); },
    get viewWidth() { return this.w + (this.padding * 2); },
    get viewHeight() { return this.h + (this.padding * 2); },
    get viewBox() { return `0 0 ${this.viewWidth} ${this.viewHeight}`; },

    // Dynamic coordinate centers
    get centerX() { return this.viewWidth / 2; },
    get centerY() { return this.viewHeight / 2; },

    // Font Scaling Formulas based on component height
    get fontSize() { return Math.max(8, Math.round(this.h * 0.13)); },

    // Generates a hand-drawn rectangle by adding unique sub-pixel jitter to every point
    generateJitteredRect(boxW, boxH) {
      const pad = this.padding;
      const mj = this.maxJitter;

      // Target bounding coordinates for the clean geometry
      const x1 = pad + ((this.w - boxW) / 2);
      const y1 = pad + ((this.h - boxH) / 2);
      const x2 = x1 + boxW;
      const y2 = y1 + boxH;

      // Inline sub-pixel random offset calculator
      const j = (v) => v + (Math.random() * 2 - 1) * mj;

      // Generate the rectangle using interconnected path nodes (with random anchor drift)
      return `M ${j(x1)} ${j(y1)} ` +
             `L ${j(x2)} ${j(y1)} ` +
             `L ${j(x2)} ${j(y2)} ` +
             `L ${j(x1)} ${j(y2)} ` +
             `Z`;
    }
  });
