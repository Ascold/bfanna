<<<<<<< HEAD
jQuery(window).load(function() {
    // The slider being synced must be initialized first
    jQuery('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    jQuery('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
    });
});
=======
jQuery(document).ready(function () {
    //prevents loading page 'мероприятия'
    jQuery(document).on('click', '#primary-menu>li:nth-child(2)>a', function (event) {
        event.preventDefault();
    });
});
>>>>>>> cbbf331d9496e3eb5996f80d4e7b07c7fbccceb8
