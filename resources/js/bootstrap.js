window._ = require('lodash');
import Sortable from 'sortablejs';
window.Sortable = Sortable;

try {
    require('bootstrap');
} catch (e) {}

import Swal from 'sweetalert2';
import Sortable from 'sortablejs';

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




/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
