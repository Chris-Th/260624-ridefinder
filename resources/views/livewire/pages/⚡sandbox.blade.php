<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="flex flex-col gap-5">

    <x-vectors.stamps.stamp x-data="stamp({ radius: 120, upperText: 'BOULANGERIE DU PARC', middleText: '29 JUN 2026', bottomText: '* 200 KM *' })" />

    <x-vectors.stamps.stamp x-data="stamp({ radius: 160,  maxJitter: 2, upperText: 'BOULANGERIE DU PARC', middleText: '29 JUN 2026', bottomText: '* 200 KM *' })" />

    <x-vectors.stamps.stamp x-data="stamp({ radius: 80, maxJitter: 2, upperText: 'BOULANGERIE DU PARC', middleText: '29 JUN 2026', bottomText: '* 200 KM *' })" />

    <!-- Standard 24h Night-Control Petrol Station Stamp -->
    <x-vectors.stamps.stamp-rect x-data="stampRect({ width: 180, height: 100, upperText: 'BP EXPRESS SERVICE', middleText: '30 JUN 2026 - 01:14 AM', bottomText: 'CONTROL 04 - KM 210' })" />

    <!-- Slimmer, High-Jitter Variant (Simulating a worn out hand ink stamp) -->
    <x-vectors.stamps.stamp-rect x-data="stampRect({ width: 150, height: 75, maxJitter: 2.5, upperText: '* CAFE DES SPORTS *', middleText: '11:42 AM', bottomText: 'VALOGNES, FR' })" style="color: #a01a1a;" />

</div>
