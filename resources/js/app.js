import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import stamp from './stamp.js';
import stampRect from './stampRect.js';
import stampTransforms from './stampTransforms.js';
Alpine.data('stamp', stamp);
Alpine.data('stampRect', stampRect);
Alpine.data('stampTransforms', stampTransforms);


Livewire.start()
