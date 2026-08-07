@props ([ 'lightingcolor' => '' ])

<div
    x-data="{
        id: Math.random().toString(36).substring(2, 9),
        seed: 1,
        viewBox: '',
        init() {
            this.randomizeSeed();
            /*
            this.$watch('boundingBox', (v) => {
                this.randomizeViewBoxOrigin();
            }); */
        },
        randomizeSeed() {
            this.seed = Math.round(Math.random() * 1000);
            console.log('this.seed', this.seed);
        }
        /* randomizeViewBoxOrigin() {
            this.viewBox = `${Math.round(Math.random() * 100)} ${Math.round(Math.random() * 100)} ${this.boundingBox.width} ${this.boundingBox.height}`;
        } */
    }">
    <svg
        {{ $attributes->merge([
        'class' => 'flacky-texture-4',
        'aria-hidden' => 'true',
        'focusable' => 'false',
        'preserveAspectRatio' => 'xMidYMid slice',
    ]) }}
        :viewBox="viewBox"
        xmlns="http://www.w3.org/2000/svg"
        x-bind:id="`pergament-texture-${id}`">
        <defs>
            <filter x-bind:id="`pergament-filter-${id}`">
                <!-- <filter id="flacky-texture-4"> -->
                <feTurbulence
                    type="turbulence"
                    baseFrequency="0.005"
                    numOctaves="3"
                    x-bind:seed="`${seed}`"
                    stitchTiles="noStitch" />
                <feColorMatrix
                    type="matrix"
                    values="
            2.55 0 0 0 -0.275
            0 2.55 0 0 -0.275
            0 0 2.55 0 -0.275
            0 0 0 1 0" />
                {{-- <feColorMatrix type="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0.33 0.33 0.34 0 0" /> --}}
                <feDiffuseLighting lighting-color="white" surfaceScale="2" result="diffLight">
                    <feDistantLight azimuth="0" elevation="10" />
                </feDiffuseLighting>
            </filter>
        </defs>
        <rect width="100%" height="100%" x-bind:filter="`url(#pergament-filter-${id})`" opacity="0.3" />
    </svg>
</div>
