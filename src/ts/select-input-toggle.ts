// This styles select form input to change color
// of selection after a selection is made by adding class.
// This is not typical behaviour for modern browsers so
// this JS is required to meet design spec

jQuery(document).ready(function ($) {
  // Select dropdowns
  if ($('select').length) {
    // Traverse through all dropdowns
    $.each($('select'), function (i, val) {
      var $el = $(val);
      // Add change event handler to add/remove class for proper
      // styling. Basically emulating placeholder
      // behavior on select dropdowns input fields.
      $el.on('change', function () {
        if ($el.val()) {
          $el.addClass('item_selected');
        } else {
          $el.removeClass('item_selected');
        }
      });
    });
  }
});