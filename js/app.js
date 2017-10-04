jQuery(document).ready(function($) {
  $('.parallax').parallax();
  $('.scrollspy').scrollSpy();
  $('.button-collapse').sideNav();
  $('.chips').material_chip();
  $('select').material_select();
  setTimeout(function() {
    var tocHeight = $('.table-of-contents').length ? $('.section .table-of-contents').height() : 0;
    var socialHeight = 40;
    var footerOffset = $('body > footer').first().length ? $('body > footer').first().offset().top : 0;
    var bottomOffset = footerOffset - socialHeight - tocHeight;
    if ( $('.parallax-container').length ) {
      $('.table-of-contents').pushpin({
        top: $('.parallax-container').height(),
        bottom: bottomOffset,
        offset: tocHeight + $('nav').length
      });
    } else if ( $('nav').length ) {
      $('.table-of-contents').pushpin({
        top: $('nav').height(),
        bottom: bottomOffset,
        offset: tocHeight + $('nav').length
      });
    } else {
      $('.table-of-contents').pushpin({
      top: 0,
      bottom: bottomOffset,
      offset: tocHeight
    });
  }
  });
});