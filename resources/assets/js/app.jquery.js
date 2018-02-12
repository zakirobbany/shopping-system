$(document).ready(function () {
    /* hide flash messages */
    $('.flash-notification .alert')
        .not('.alert-important')
        .delay(3000)
        .fadeOut(350);

});