@props ([ 'lightingcolor' => '' ])

<div
    x-data="{
        id: Math.random().toString(36).substring(2, 9),
        seed: 1,
        // viewBox: '',
        azimuth: Math.round(Math.random() * 360),
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
        viewBox="0 0 10 10"
        xmlns="http://www.w3.org/2000/svg"
        x-bind:id="`pergament-texture-${id}`">
        <defs>
            <filter x-bind:id="`pergament-filter-${id}`">
                <feTurbulence
                    type="turbulence"
                    baseFrequency="0.004"
                    numOctaves="3"
                    x-bind:seed="`${seed}`"
                    stitchTiles="stitch" />
                <feColorMatrix
                    type="matrix"
                    values="
            2.55 0 0 0 -0.275
            0 2.55 0 0 -0.275
            0 0 2.55 0 -0.275
            0 0 0 1 0" />

                <feDiffuseLighting
                    lighting-color="white"
                    surfaceScale="3"
                    result="diffLight"
                    diffuseConstant="6"
                    kernelUnitLength="0.5">
                    <feDistantLight :azimuth="azimuth" elevation="2" />
                    {{-- <fePointLight x="100" y="100" z="50" /> --}}
                </feDiffuseLighting>
            </filter>
        </defs>
        <rect width="100%" height="100%" x-bind:filter="`url(#pergament-filter-${id})`" opacity="0.11" />
    </svg>
</div>
