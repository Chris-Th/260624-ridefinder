export default () => ({
    tX: 0 /* translate-x-* */,
    tY: 0,
    r: 0 /* rotate-* */,
    sX: 0 /* skew-x-* */,
    sY: 0 /* skew-y-* */,
    randomizeTransforms() {
        this.tX = Math.floor((Math.random() * 2 - 1) * 20);
        this.tY = Math.floor((Math.random() * 2 - 1) * 20);
        this.r = Math.floor((Math.random() * 2 - 1) * 45);
    },
});
