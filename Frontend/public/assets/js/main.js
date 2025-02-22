(function ($) {
    "use strict";


    jQuery(document).ready(function ($) {

      function setMainMinHeight() {
         var headerHeight = $('header').outerHeight();
         var footerHeight = $('footer').outerHeight();
         var windowHeight = $(window).height();
         
         var mainMinHeight = windowHeight - headerHeight - footerHeight;
         $('main').css('min-height', mainMinHeight + 'px');
      }
     
      // Run the function on load and on window resize
      setMainMinHeight();
      $(window).resize(setMainMinHeight);
      

      // sidebar toggle
      $('.sidebar-toggle-btn').click(function() {
         var $icon = $(this).find('.btn-icon i');  // Find the icon inside .menu-icon
         var $text = $(this).find('.btn-text');     // Find the text inside .btn-text
     
         // Toggle between Menu and Close menu text
         if ($text.text() === 'Menu') {
           $text.text('Close menu');
           $icon.removeClass('fa-bars').addClass('fa-xmark');  // Change icon to fa-xmark
         } else {
           $text.text('Menu');
           $icon.removeClass('fa-xmark').addClass('fa-bars');  // Change icon back to fa-bars
         }

         // toggle active class on sidebar, dashboard-area and overlay
         $('.sidebar, .dashboard-area, .overlay').toggleClass('active');
      });

      $('.overlay').click(function() {
         var $icon = $('.sidebar-toggle-btn .btn-icon i')
         var $text = $('.sidebar-toggle-btn .btn-text');

         $text.text('Menu');
         $icon.removeClass('fa-xmark').addClass('fa-bars');


         $('.sidebar, .dashboard-area, .overlay').removeClass('active');
      });



      $('.dot-btn').on('click', function() {
         $($(this).data('target')).toggleClass('active');
      });

      // plan card active
      $('.plan-card').click(function() {
         $(this).addClass('active').siblings().removeClass('active');
      })
      
      

      // testimonial slider active
      var testimonialSlider = new Swiper('.testimonial-slider', {
         loop: true,
         spaceBetween: 20,
         speed: 1000,
         autoplay: {
            delay: 3500
         }
      });
      
    }); //---document-ready-----

}(jQuery));


   
