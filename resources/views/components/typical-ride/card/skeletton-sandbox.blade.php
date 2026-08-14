@props ([
    'rootclass' => $attributes->has('rootclass') ? $attributes->get('rootclass') : '',
    'rowHeight' => 20,
    'minColWidth' => 20,
    'rows' => 12,
    'cols' => 12,
    'wallThickness' => 16,
    'rowGap' => 4
])

@php
    $colsContent = $cols - 2;
@endphp

<div
    {{ $attributes->merge(['class' => 'typicalride-card relative']) }}
    style="
        --rows: {{ $rows }};
        --cols: {{ $cols }};
        --row-height: {{ $rowHeight }}px;
        --col-width: minmax({{ $minColWidth }}px, 1fr);
        --wall-thickness: {{ $wallThickness }}px;
        --row-gap: {{ $rowGap }}px;">
    {{-- ceiling --}}
    <div class="ceiling rounded-t-xl border-x-2 border-t-2 border-mist-700"></div>

    {{-- Left Grid Track 'Wall of Bricks' --}}
    @for ($i = 0; $i < $rows; $i++)
        <div class="left-brick border-l-2 border-mist-700"></div>
    @endfor

    {{-- Content Area --}}
    <div class="content-area border-mist-700/70">{{ $slot }}</div>

    {{-- Far Right Grid Track --}}
    @for ($i = 0; $i < $rows; $i++)
        <div class="right-brick border-r-2 border-mist-700"></div>
    @endfor

    {{-- floor --}}
    <div class="floor rounded-b-xl border-x-2 border-b-2 border-mist-700"></div>

    <x-screw-head class="top-2 left-1.5" />
    <x-screw-head class="top-2 right-1.5" />
    <x-screw-head class="bottom-2 left-1.5" />
    <x-screw-head class="right-1.5 bottom-2" />
</div>
