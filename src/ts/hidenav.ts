jQuery(document).ready(function($) {
  const $window = $(window);
  const screenWidth = $window.width();
  const body = $('body');
  const mh = $('#masthead');
  let scrollPrev = 0;

  /*
  * only animate the top nav on desktop
  */
  if (screenWidth > 768) {

    /*
    * hiding and showing top nav on scroll
    */

    // hide top nav on homepage only (init)
    /*
    $window.on('load', () => {
      if (body.hasClass('home')) {
        mh.addClass('hide-nav');
        // wait for transition animation for .hide-nav
        setTimeout(() => {
          mh.css('visibility', 'visible');
        }, 1000);
      }
    });
    */
    // show and hide top nav logic on scroll
    $window.on('scroll', () => {
      // current scroll position from top of page
      let scrollTop = $window.scrollTop();
      // if at top of page on scroll
      if (scrollTop <= mh.height() * 2) {
        // position absolute _univeral.scss
        mh.removeClass('locked');
        // if homepage
        //if (body.hasClass('home')) {
        //  mh.addClass('hide-nav');
        // } else {
        mh.removeClass('hide-nav');
        // }
        // the "in between" top of page and below (transitional zone for absolute to fixed top nav)
      } else if (scrollTop > mh.height() * 2 && scrollTop <= mh.height() * 4) {
        mh.addClass('hide-nav');
        setTimeout(() => {
          mh.removeClass('locked');
          // if NOT homepage
          //if (!body.hasClass('home')) {
          mh.removeClass('hide-nav');
          //}
        }, 1000);
        // if NOT at top of page or "in between"
      } else {
        mh.addClass('hide-nav');
        // wait for transition animation for .hide-nav
        setTimeout(() => {
          mh.addClass('locked');
        }, 1000);
        // if scrolling up
        if (scrollTop < scrollPrev) {
          mh.removeClass('hide-nav');
        }
      }
      scrollPrev = scrollTop;
    });

  } // END of desktop only conditional

});
