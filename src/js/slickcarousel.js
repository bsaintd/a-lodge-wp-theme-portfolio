jQuery(document).ready(function($) {
  // General Slick Carousel gallery configuration
  $('.carousel-gallery').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    pauseOnHover: true,
    prevArrow: '<i class="material-icons prev-arrow">keyboard_arrow_left</i >',
    nextArrow: '<i class="material-icons next-arrow">keyboard_arrow_right</i >',
  });

  // Testimonials Slick Carousel configuration
  $('.testimonials-carousel').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 6000,
    pauseOnHover: true,
    dots: true,
    prevArrow: '<i class="material-icons prev-arrow">keyboard_arrow_left</i >',
    nextArrow: '<i class="material-icons next-arrow">keyboard_arrow_right</i >',
  });

  // Multiple Slick Carousels on same page configuration
  var numSlick = 0;
  $('.multi-carousel').each(function(){
    numSlick++;
    $(this).addClass('multislider-' + numSlick).slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
      pauseOnHover: true,
      prevArrow: '<i class="material-icons prev-arrow">keyboard_arrow_left</i >',
      nextArrow: '<i class="material-icons next-arrow">keyboard_arrow_right</i >',
    });
  });
});
