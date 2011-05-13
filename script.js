// $Id: script.js,v 1.1 2009/07/19 18:14:52 garthee Exp $ 

Drupal.behaviors.tntIEFixes = function (context) {
  // IE6 & less-specific functions
  // Add hover class to primary menu li elements on hover
  if ($.browser.msie && ($.browser.version < 7)) {
    $('#primary-menu li').hover(function() {
      $(this).addClass('hover');
      }, function() {
        $(this).removeClass('hover');
    });
  };
};
