<?php

use Livewire\Component;

new class extends Component
{
    public function render()
    {
        // INTENTIONALLY BADLY FORMATTED MULTILINE ARRAY
        $data = [
            'name' => 'Test Code',
            'status' => 'active',
        ];

        return view('livewire.test-component');
    }
};
?>

<div>
    {{-- Do what you can, with what you have, where you are. - Theodore Roosevelt --}}
</div>
