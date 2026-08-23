<select x-show="showOptions" {{ $attributes->merge([ 'class' => 'absolute w-full z-50 p-0' ]) }}>
    {{ $slot }}
</select>
