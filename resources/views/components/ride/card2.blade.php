@props([ 'rootclass' => $attributes->has('rootclass') ? $attributes->get('rootclass') : '' ])


<div  class="ridecard py-1 relative {{ $rootclass }}">

    <div class="border-x-2 border-t-2 col-span-12"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>

    <div class="border-x-2 border-b-2 col-span-12"></div> <div {{ $attributes->merge([ 'class' => 'translate-y-1.5 row-span-13 col-span-10' ]) }}>{{ $slot }}</div>

    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>

</div>

{{-- <div  class="ridecard py-1 {{ $rootclass }}">

    <div class="border-x-2 border-t-2 col-span-12"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>

    <div class="border-x-2 border-b-2 col-span-12"></div> <div {{ $attributes->merge([ 'class' => 'row-span-12 col-span-10' ]) }}>{{ $slot }}</div>

    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>

</div> --}}

<style>
    .ridecard {
    display: grid;
    /* aspect-ratio: 1.62; */
    /* height: 160px; */
    /* display: inline-grid; */
    /* grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); */
    /* grid-template-columns: repeat(auto-fill, minmax(min(10rem, 100%), 1fr)); */
    grid-template-rows: 16px repeat(13, 1fr) 16px;
    grid-template-columns: repeat(12, 1fr);
    grid-auto-flow: column;
    row-gap: 4px;
}

/* .ridecard > .i7 {
    grid-row: 3 / 4;
    grid-column: 1 / 2;
} */

.ridecard > div {


    vertical-align: bottom;
    padding-top: 6px;

}
</style>

{{-- <div class="ridecard">

    <div class="border-x-2 border-t-2 col-span-12"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-x-2 border-b-2 col-span-12"></div>

    <div {{ $attributes->merge([ 'class' => 'row-span-10 col-span-10' ]) }}>{{ $slot }}</div>

    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>

</div> --}}


{{-- Uncomment to visualise --}}
{{-- <div class="ridecard w-2/3 text-xs">
    <div class="border-x-2 border-t-2 col-span-12">1</div>
    <div class="border-l-2">2</div>
    <div class="border-l-2">3</div>
    <div class="border-l-2">4</div>
    <div class="border-l-2">5</div>
    <div class="border-l-2">6</div>
    <div class="border-l-2">7</div>
    <div class="border-l-2">8</div>
    <div class="border-l-2">9</div>
    <div class="border-l-2">10</div>
    <div class="border-l-2">11</div>
    <div class="border-x-2 border-b-2 col-span-12">12</div>

    <div class="border-2 row-span-10 col-span-10">13</div>

    <div class="border-r-2">14</div>
    <div class="border-r-2">15</div>
    <div class="border-r-2">16</div>
    <div class="border-r-2">17</div>
    <div class="border-r-2">18</div>
    <div class="border-r-2">19</div>
    <div class="border-r-2">12</div>
    <div class="border-r-2">13</div>
    <div class="border-r-2">14</div>
    <div class="border-r-2">15</div>
</div> --}}
