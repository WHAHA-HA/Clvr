jQuery(document).ready(function(){

  jQuery('#faq-dd > ul > li:has(ul)').addClass("has-sub");

  jQuery('#faq-dd > ul > li > a').click(function() {
    var checkElement = jQuery(this).next();

    jQuery('#faq-dd li').removeClass('active');
    jQuery(this).closest('li').addClass('active');


    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
      jQuery(this).closest('li').removeClass('active');
      checkElement.slideUp('normal');
    }

    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      jQuery('#faq-dd ul ul:visible').slideUp('normal');
      checkElement.slideDown('normal');
    }

    if (checkElement.is('ul')) {
      return false;
    } else {
      return true;
    }
  });

  //moive hover
  jQuery('a.hover_source').hover(function(){

	  var div = jQuery(this).parent().parent().find('.hover_thumbnail');
	  div.css('left',jQuery(this).width());
	  div.show();
  },function(){

	  var div = jQuery(this).parent().parent().find('.hover_thumbnail');
	  div.hide();
  } );

  //moive  entry hover
  jQuery('a.entry_hover_source').hover(function(){

	  var div = jQuery(this).parent().parent().find('.entry_hover_thumbnail');
	  div.css('left',jQuery(this).width());
	  div.show();
  },function(){

	  var div = jQuery(this).parent().parent().find('.entry_hover_thumbnail');
	  div.hide();
  } );

  //showtime bar hover
  jQuery('a.li_hover_source').hover(function(){

	  var div = jQuery(this).parent().find('.li_hover_thumbnail');
	  div.css('left',jQuery(this).width());
	  div.show();
  },function(){

	  var div = jQuery(this).parent().find('.li_hover_thumbnail');
	  div.hide();
  } );

});