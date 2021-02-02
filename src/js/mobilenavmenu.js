/* Makes the website/body behind
the mobile nav menu (when acivated)
is fixed and unable to scroll. */
// Used vanilla JS because this is loaded in <head>
// aka no jQuery dependency

// make sure DOM is loaded
document.addEventListener(
  'DOMContentLoaded',
  function() {
    // variable declarations
    const hamburger = document.querySelector('.hamburger');
    const menuTrigger = document.getElementById('openMobileMenu');
    const isMenuToggled = document.getElementById('site-navigation');
    const mobileNavBg = document.getElementById('mobile-nav-bg');
    const mobileMenu = document.getElementById('primary-menu');
    const htmlBody = document.body;
    let offsetY = 0;
    let stillPending = false;

    // mobile menu handling function
    function handleMenu() {
      // Don't run if previous function call hasn't finished!
      if (!stillPending) {
        // flag that this is handleMenu() in progress
        stillPending = true;
        // Toggle class "is-active" for hamburger CSS3 animation
        hamburger.classList.toggle('is-active');
        isMenuToggled.classList.toggle('toggled');

        // wait for DOM update
        setTimeout(() => {
          // if mobile nav toggled
          if (isMenuToggled.classList.contains('toggled')) {
            // make mobile nav elements display: block; before transition in
            mobileNavBg.classList.add('displayed');
            mobileNavBg.classList.remove('not-displayed');
            mobileMenu.classList.add('displayed');
            mobileMenu.classList.remove('not-displayed');
            // set vertical offset (where you were on the page)
            offsetY = window.pageYOffset;
            htmlBody.style.top = '-' + offsetY + 'px';
            // add class for fixed <body> while mobile nav menu is open
            htmlBody.classList.add('noscroll');
            // add/remove classes for entry transition
            mobileNavBg.classList.add('show');
            mobileNavBg.classList.remove('hide');
            // delay show menu items until background appears
            setTimeout(() => {
              mobileMenu.classList.add('show');
              mobileMenu.classList.remove('hide');
            }, 800);
          } else {
            // remove class for fixed <body> while mobile nav menu is open
            htmlBody.classList.remove('noscroll');
            // add/remove classes for exit transition
            mobileMenu.classList.remove('show');
            mobileMenu.classList.add('hide');
            setTimeout(() => {
              mobileNavBg.classList.remove('show');
              mobileNavBg.classList.add('hide');
            }, 800);
            setTimeout(() => {
            // make mobile nav elements display: none; after transition out
            mobileNavBg.classList.remove('displayed');
            mobileNavBg.classList.add('not-displayed');
            mobileMenu.classList.remove('displayed');
            mobileMenu.classList.add('not-displayed');
            // unset vertical offset (where you were on the page)
            htmlBody.style.top = '';
            window.scrollTo(0, offsetY);
            }, 1500);
          }
        }, 100);
        // flag that handleMenu() has completed (with delay for animations also)
        setTimeout(() => {
          stillPending = false;
        }, 2000);
      } // END if (!stillPending)
    } // END handleMenu()

    // listen for click on element
    menuTrigger.addEventListener('click', handleMenu);
  },
  false
);
