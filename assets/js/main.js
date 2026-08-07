$(document).ready(function(){

    // Initialize Hero Image Slider (1 item layout loop)
    $('#hero-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 800,
        items: 1
    });

    // Initialize Tour Packages Slider (Responsive 4-column layout layout)
    $('#packages-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive:{
            0:{
                items: 1 // Single column on small smartphones
            },
            576:{
                items: 2 // Two columns on wider screens
            },
            768:{
                items: 3 // Three columns on tablets
            },
            992:{
                items: 4 // Exact 4 columns layout specified in wireframe
            }
        }
    });

});

