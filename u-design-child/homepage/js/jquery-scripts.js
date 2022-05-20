jQuery(document).ready( function(){

	// Film Finder Button
	//jQuery('body').css('min-width', '1070px');
	//jQuery('#faux').css('margin-left', '-320px');
	jQuery('.ffbutton').toggle(function () {
			jQuery('body').css('min-width', '1390px');
			jQuery('#faux').animate({
				'margin-left':'0'
			}, 400 );
			jQuery(this).addClass('open');
	}, function () {
			jQuery('#faux').animate({
				'margin-left':'-320px'
			}, 200 , function(){
				jQuery('body').css('min-width', '1070px');
			});
			jQuery(this).removeClass('open');
	});

	// Read a page's GET URL variables and return them as an associative array.
	var querystring = location.search.replace( '?', '' ).split( '&' );
	var queryObj = {};
	// loop through each name-value pair and populate object
	for ( var i=0; i<querystring.length; i++ ) {
		  // get name and value
		  var name = querystring[i].split('=')[0];
		  var value = querystring[i].split('=')[1];
		  // populate object
		  queryObj[name] = value;
	}
	var day = queryObj["day"] + "";
	var month = queryObj["month"] + "";
	var year = queryObj["year"] + "";

	// Give input a value
	jQuery('input[name|="q"]').val('Search SIFF');
	// Remove the value on focus
	jQuery('input[name|="q"]').focus(function() {
			if (jQuery(this).val() == 'Search SIFF') { jQuery(this).val(''); }
	});
	// Remove the value on blur
	jQuery('input[name|="q"]').blur(function() {
			if (jQuery(this).val() == '') { jQuery(this).val('Search SIFF'); }
	});
	// Give input a value
	jQuery('input[name|="email"]').val('Email Address');
	// Remove the value on focus
	jQuery('input[name|="email"]').focus(function() {
			if (jQuery(this).val() == 'Email Address') { jQuery(this).val(''); }
	});
	// Remove the value on blur
	jQuery('input[name|="email"]').blur(function() {
			if (jQuery(this).val() == '') { jQuery(this).val('Email Address'); }
	});
	// For the Search Results
	jQuery('input[name|="sr"]').focus(function() {
		if (this.value === this.defaultValue) {
			this.value = '';
		}
	}).blur(function() {
		if (this.value === '') {
			this.value = this.defaultValue;
		}
	});

	// Film Finder Browser Filter
	jQuery('.browse li.toggle > a').click(function(e) {
		e.preventDefault();
		jQuery(this).parent().siblings().removeClass('open');
		jQuery(this).parent().toggleClass('open');
		jQuery('ul.browse div.scroll').not(jQuery(this).next()).hide();

		var scrollDiv = jQuery(this).parent().find('div.scroll');
		scrollDiv.fadeToggle('fast',function(){
			var customScrollbar=scrollDiv.find('.mCSB_scrollTools');
			customScrollbar.css({'opacity':0});
			scrollDiv.mCustomScrollbar('update');
			customScrollbar.animate({opacity:1},'slow');
		});
		return false;
	});

	// Browse Film Filter
	jQuery('.filter li.toggle > a').click(function(e) {
		e.preventDefault();
		jQuery(this).parent().siblings().removeClass('open');
		jQuery(this).parent().toggleClass('open');
		jQuery('.filter div.scroll').not(jQuery(this).next()).hide();

		var scrollDiv = jQuery(this).parent().find('div.scroll');
		scrollDiv.fadeToggle('fast',function(){
			var customScrollbar=scrollDiv.find('.mCSB_scrollTools');
			customScrollbar.css({'opacity':0});
			scrollDiv.mCustomScrollbar('update');
			customScrollbar.animate({opacity:1},'slow');
		});
		return false;
	});

	jQuery('.filter li.reload > a').click(function() {
		location.reload();
	});

	jQuery('.mysiff').click(function(e){
		e.preventDefault();
		var url = jQuery(this).attr('href');
		var mylink = jQuery(this);
		jQuery.ajax({
		url: url,
		type: "GET",//type of posting the data
		success: function (data) {
			mylink.parent().toggleClass('selected');
		},
		error: function(xhr, ajaxOptions, thrownError){
			//alert('error');
			//what to do in error
			window.location = "https://myaccount.siff.net/account/login.aspx?next=http://www.siff.net/";
		},
		timeout : 15000//timeout of the ajax call
	});

});


	//jQuery('ul.asideMenu li ul').hover(function(){
	jQuery('ul.asideMenu2 li span.expand').click(function(){
		var t_index = jQuery("ul.asideMenu2").index(jQuery(this).parent().parent());
		 jQuery("ul.asideMenu2").each(function(index,element){
			 if(index != t_index)
		     {
				 jQuery(element).children('.submenu').eq(0).slideUp();
				 jQuery(element).children('li').eq(0).children('span').eq(0).removeClass('collapsed');
		     }
		 })
		var submenu = jQuery(this).parent().siblings(".submenu").eq(0);
		submenu.slideToggle();
		jQuery(this).toggleClass('collapsed');
		return false;
	});




});