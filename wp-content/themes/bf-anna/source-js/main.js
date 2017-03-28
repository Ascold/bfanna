jQuery(document).ready(function () {
    //prevents loading page 'мероприятия'
    jQuery(document).on('click', '#primary-menu>li:nth-child(2)>a', function (event) {
        event.preventDefault();
    });
});
