require('./bootstrap');
import Swal from 'sweetalert2';
import Sortable from 'sortablejs';

import Sortable from 'sortablejs';
window.Sortable = Sortable;

document.addEventListener('livewire:load', function () {
    if (Livewire.components.has('dash-wire')) {
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue.find(e => e.method.startsWith('updateAlumniOrder'))) {
                // Re-initialize the sortable functionality after Livewire updates the DOM
                window.Sortable.create(document.querySelector('tbody[wire:sortable]'), {
                    handle: '.sortable-handle',
                });
            }
        });
    }
});


