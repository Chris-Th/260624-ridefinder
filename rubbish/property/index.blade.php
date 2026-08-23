@props ([ 'options' => '' ])

<div
    x-data="{
        options: [],
        showOptions: false,
        init() {
            // this.options = [];
            this.$watch('showOptions', (show) => {
                if (show && (!Array.isArray(this.options) || this.options.length === 0)) {
                    $wire.{{ $options }}.then(data => this.options = data)
                }
            })
        },
        select($column, $foreignId) {

        }
    }"
    {{ $attributes->merge([ 'class' => 'relative' ]) }}
    x-on:click="showOptions = !showOptions"
    x-on:click.outside="showOptions = false">
    {{ $slot }}
</div>
