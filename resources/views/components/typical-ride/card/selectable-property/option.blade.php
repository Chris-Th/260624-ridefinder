<option {{ $attributes->merge(['class' => 'odd:bg-base-300 even:bg-base-200 flex h-10 w-full cursor-pointer gap-3']) }}>
    {{ $slot }}
</option>
