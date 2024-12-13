import './bootstrap';

import '@fortawesome/fontawesome-free/scss/fontawesome.scss';
import '@fortawesome/fontawesome-free/scss/solid.scss';

const sessionMessage = document.getElementById('session-data');
const seconds = 3
const hideMessage = setTimeout(() => {
    sessionMessage.classList.add("d-none");
}, seconds * 1000);
