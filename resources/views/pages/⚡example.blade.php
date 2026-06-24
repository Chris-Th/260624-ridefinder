<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div x-data="carousel">
    <div x-show="hasImages">
        <!-- ... -->
    </div>
</div>

<script>
    Alpine.data('carousel', () => ({
        images:...,

        get hasImages() {
            // ...
        },
    }));
</script>
