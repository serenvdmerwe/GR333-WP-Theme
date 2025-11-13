(function($) {
    'use strict';
    
    // Mobile menu toggle
    $('.menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('toggled');
    });
    
    // Smooth scroll
    $('a[href*="#"]').on('click', function(e) {
        // Your smooth scroll code here
    });
    
})(jQuery);
