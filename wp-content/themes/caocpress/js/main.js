jQuery(document).ready(function($){

	$('.nav li:not(:first)').addClass('hidden');

	// Insert hamburger menu into nav. Draws with SVG if Modernizr detects support; falls back to the old icon font thing if no SVG support.
	if (Modernizr.inlinesvg){
	  $('<a class="nav-button btn" href="#primary-nav"><svg width="15" height="15"><path d="M0,5 15,5" stroke="#FDFFE3" stroke-width="2"/><path d="M0,9 15,9" stroke="#FDFFE3" stroke-width="2"/><path d="M0,13 15,13" stroke="#FDFFE3" stroke-width="2"/></svg></a>').insertBefore('#primary-nav');
	} else {
	  $('<a class="nav-button btn" href="#primary-nav"><i class="icon-reorder"></i></a>').insertBefore('#primary-nav');
	}

	// Toggle primary nav with menu button
	$('.nav-button').on('click', function(){
	  var target = $(this).attr('href');
	  $(target + ' li:not(:first)').toggleClass('hidden');
	});

});

if (!Modernizr.touch){
	$(window).scroll(function(){
		s = $(window).scrollTop();
		if (s > 16){
			$('header[role=banner]').addClass('fixed');
		} else {
			$('header[role=banner]').removeClass('fixed');
		}
		$('.home-hero').css('transform','translateY(-' + (s/3) + 'px)');
		$('.home-hero h1').css('-webkit-filter','blur(' + (s/100) + 'px)');
	});
};
