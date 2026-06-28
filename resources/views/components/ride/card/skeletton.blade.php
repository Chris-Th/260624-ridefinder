@props([ 'rootclass' => $attributes->has('rootclass') ? $attributes->get('rootclass') : '' ])


<div  class="ridecard py-1 relative {{ $rootclass }}">
    {{--
    Whenever inserting new rows to subgrid passed to {{ $slot }}:
        - add a grid item (brick) to each l + R brickwall grid Track
        - increase row-span-* of content space grid area {{ $slot }}
        - increase grid-template-rows number n: 16px repeat(n, 1fr) 16px; of .ridecard selector.
    --}}
    {{-- Top Thin Full Width Ceiling Grid item --}}
    <div class="border-x-2 border-t-2 col-span-12"></div>

    {{-- Left Grid Track 'Wall of Bricks' --}}

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
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>
    <div class="border-l-2"></div>

    {{-- Bottom Full Width Floor Grid Item --}}
    <div class="border-x-2 border-b-2 col-span-12"></div>

    {{-- Content Space Grid Area --}}
    <div {{ $attributes->merge([ 'class' => 'translate-y-1.5 row-span-19 col-span-10' ]) }}>{{ $slot }}</div>

    {{-- Far Right Grid Track --}}
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
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
    <div class="border-r-2"></div>
</div>

<style>
    .ridecard {
    display: grid;
    grid-template-rows: 16px repeat(19, 1fr) 16px;
    grid-template-columns: repeat(12, 1fr);
    grid-auto-flow: column;
    row-gap: 4px;
}
.brickwall {
    display: grid;
    grid-template-rows: subgrid;
    grid-template-columns: subgrid;
}

.ridecard > div {


    vertical-align: bottom;
    padding-top: 6px;

}
</style>
