{{-- resources/views/components/select.blade.php --}}
@props ([
    'options' => [],          // [value => label] or [['value' => ..., 'label' => ...]]
    'placeholder' => 'Select…',
    'searchable' => false,
])

@php
    // Normalize options to [{value, label}]
    $normalizedOptions = collect($options)->map(function ($label, $value) {
        return is_array($label)
            ? ['value' => $label['value'] ?? $label['id'] ?? null, 'label' => $label['label'] ?? $label['name'] ?? '']
            : ['value' => $value, 'label' => $label];
    })->values()->all();
@endphp

<div
    {{ $attributes->merge([ 'class' => '' ]) }}
    wire:ignore
    x-data="{
        open: false,
        search: '',
        highlighted: 0,
        options: @js($normalizedOptions),
        get selected() {
            return $wire.{{ $attributes->wire('model')->value() }};
        },

        get filtered() {
            if (!this.search) return this.options;
            if (!this.search) return this.options;
            const q = this.search.toLowerCase();
            return this.options.filter(o => o.label.toLowerCase().includes(q));
        },

        get selectedLabel() {
            const opt = this.options.find(o => o.value == this.selected);
            return opt ? opt.label : '{{ $placeholder }}';
        },

        select(option) {
            // Optimistic update – feels instant
            $wire.{{ $attributes->wire('model')->value() }} = option.value;
            this.open = false;
            this.search = '';
        },

        next() {
            this.highlighted = Math.min(this.highlighted + 1, this.filtered.length - 1);
        },
        prev() {
            this.highlighted = Math.max(this.highlighted - 1, 0);
        },
        chooseHighlighted() {
            if (this.filtered[this.highlighted]) {
                this.select(this.filtered[this.highlighted]);
            }
        }
    }"
    @click.outside="open = false"
    @keydown.escape.window="open = false"
    class="relative">
    {{-- Trigger --}}
    <button
        type="button"
        @click="
            open = !open;
            if (open) $nextTick(() => $refs.search?.focus());
        "
        class="flex w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-left shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        <span x-text="selectedLabel" :class="{ 'text-gray-400': !selected }"></span>
    </button>

    {{-- Dropdown --}}
    <div
        x-show="open"
        x-transition
        class="ring-opacity-5 absolute z-50 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white shadow-lg ring-1 ring-black"
        style="display: none">
        <template x-if="searchable">
            <div class="sticky top-0 bg-white p-2">
                <input
                    x-ref="search"
                    x-model="search"
                    @keydown.arrow-down.prevent="next()"
                    @keydown.arrow-up.prevent="prev()"
                    @keydown.enter.prevent="chooseHighlighted()"
                    type="text"
                    placeholder="Search…"
                    class="w-full rounded border-gray-300 text-sm" />
            </div>
        </template>

        <ul role="listbox">
            <template x-for="(option, index) in filtered" :key="option.value">
                <li
                    @click="select(option)"
                    @mouseenter="highlighted = index"
                    :class="{ 'bg-indigo-600 text-white': highlighted === index }"
                    class="cursor-pointer px-3 py-2 text-sm select-none"
                    x-text="option.label"></li>
            </template>
            <li x-show="filtered.length === 0" class="px-3 py-2 text-sm text-gray-500">No results</li>
        </ul>
    </div>
</div>
