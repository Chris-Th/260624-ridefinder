@props (['id', 'value'])

<label
    for="{{ $id }}"
    {{ $attributes->only(['class'])->merge(['class' => 'odd:bg-base-300 even:bg-base-200 flex h-10 w-16 cursor-pointer gap-3 has-checked:bg-cyan-900/50 relative']) }}>
    {{ $slot }}
    <input
        value="{{ $value }}"
        type="checkbox"
        id="{{ $id }}"
        name="{{ $id }}"
        class="form-checkbox absolute z-50 size-full opacity-0"
        {{ $attributes->except(['class']) }} />
</label>
