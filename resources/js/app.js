import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import stamp from './stamps.js';
import stampRect from './stampRect.js';
Alpine.data('stamp', stamp);
Alpine.data('stampRect', stampRect);


Livewire.start()
