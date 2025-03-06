// JavaScript Document


(function ($) {
  "use strict";
  

  var wind = $(window);
    var sticky = $('.header');
    wind.on('scroll', function() {
        var scroll = wind.scrollTop();
        if (scroll < 100) {
            sticky.removeClass('sticky');
        } else {
            sticky.addClass('sticky');
        }
    });

  //Scroll event
  $(window).scroll(function(){
    var scrolled = $(window).scrollTop();
    if (scrolled > 200) $('.go-top').fadeIn('slow');
    if (scrolled < 200) $('.go-top').fadeOut('slow');
  });
  
  //Click event
  $('.go-top').click(function () {
    $("html, body").animate({ scrollTop: "0" },  1000);
  });
  

  
  
  //counter home page
	
	$('.count').each(function () {
        $(this).prop('key-figures',0).animate({
            Counter: $(this).text()
        }, {
          
          //chnage count up speed here
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });	

    

    $('.rudraksha-collection-slider').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      prevArrow:'<button class="prev-arrow"></button>',
      nextArrow:'<button class="next-arrow"></button>',
      responsive: [
          {
              breakpoint: 768,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
          }
      ]
  });

    $('.combination-slider').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      prevArrow:'<button class="prev-arrow"></button>',
      nextArrow:'<button class="next-arrow"></button>',
      responsive: [
          {
              breakpoint: 768,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
          }
      ]
  });


	$('.testimonials-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        prevArrow:'<button class="prev-arrow"></button>',
        nextArrow:'<button class="next-arrow"></button>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


$('[data-fancybox]').fancybox({
        loop: true,
        keyboard: true,
        buttons: [
          "zoom",
          "share",
          "slideShow",
          "fullScreen",
          "download",
          "thumbs",
          "close"
        ],
        });


        
  

})(jQuery);



