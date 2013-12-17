/*
App controls all the JS functionality specifically for E1.com
*/
var Ecobee = {};

/**
 * http://nick-jonas.github.io/windows/
 */
var windows = (function() {

	var config = {
		$windows : $('.js-window')	
	};

	function init($) {
		if (config.$windows.length > 0) { 
		    config.$windows.windows({
	            snapping: true,
	            snapSpeed: 500,
	            snapInterval: 300,
	            onScroll: function(s){

	            },
	            onSnapComplete: function($el){

	            },
	            onWindowEnter: function($el){

	            }
	        });
		}


	}
	
	return { init : init };

})(jQuery);
 



/**
 * POPUPS.JS
 */
var popups = (function($) {
	'use strict';

	var config = {
		videoPop: $( '.video-pop' )
	};

	function init() {
		config.videoPop.magnificPopup();
		
	}

	return { init : init };

})(jQuery);



/**
 * Twitter
 * http://codepen.io/jasonmayes/pen/Ioype
 */
 	

var twitter = (function($) {
	'use strict';

	function handleTweets(tweets){
		var x = tweets.length;
		var n = 0;
		var element = document.getElementById('twitter');
		var html = '<i class="icon-twitter icon"></i>';
		while(n < x) {
		html += tweets[n];
			n++;
	    }
		element.innerHTML = html;
	}

	function init() {

		twitterFetcher.fetch('345690956013633536', 'twitter', 1, true, false, true, '', false, handleTweets, false);
		
	}

	return { init : init };

})(jQuery);



/**
 * FitText
 *
		$("#fittext1").fitText();
		$("#fittext2").fitText(1.2);
		$("#fittext3").fitText(1.1, { minFontSize: '50px', maxFontSize: '75px' });
 */
 	

var fittext = (function($) {
	'use strict';

	var config = {
		headings: $( '.fittext' )
	};

	function init() {
		config.headings.fitText(1.3, { minFontSize: '25px', maxFontSize: '55px' });
	}


	return { init : init };

})(jQuery);





/**
 * Fix the Naviagtion when it scrolls into focus at the bottom.
 */
var headroom = (function($) {

	var config = {
		$navFixed : $( '.js-nav-fixed' )	
	};

	function init() {
		config.$navFixed.headroom({
			// vertical offset in px before element is first unpinned
		    offset : 0,
		    // scroll tolerance in px before state changes
		    tolerance : 3,
		    // css classes to apply
		    classes : {
		        // when element is initialised
		        initial : "headroom",
		        // when scrolling up
		        pinned : "is-pinned",
		        // when scrolling down
		        unpinned : "is-unpinned"
		    }
		});
		config.$navFixed.hover(
			function() {
			    $( this ).addClass('is-hovered' );
			  }, function() {
			  	$( this ).removeClass('is-hovered' );
			}
		);
	}
	
	return { init : init };

})(jQuery);
 


/**
 * Fix the Naviagtion when it scrolls into focus at the bottom.
 */
var fixNavigationBar = (function($) {

	var config = {
		$windowHeight : $(window).height(),
		$docHeight : $(document).height(),
		$html : $('html'),
		$parallaxes : $('.js-parallax')
	};

	function init() {
		scroller();
		$(window).resize( $.throttle( 0, resizer ));
		$(window).scroll( $.throttle( 0, scroller ));
	}

	function scroller() {
		var scrollPos = $(window).scrollTop()

		if(scrollPos >= 5) {
			config.$html.removeClass('state-page-at-top');
		
		} else {
			config.$html.addClass('state-page-at-top');
		}

		if(config.$docHeight - scrollPos <= config.$windowHeight ) {
			config.$html.addClass('state-page-at-bottom');
		} else {
			config.$html.removeClass('state-page-at-bottom');
		}
		if(scrollPos <= config.$windowHeight) {
			config.$parallaxes.css({'background-position' : '50% ' + (-scrollPos/4)+"px"});
		};


	}
 
	function resizer() {
		scroller()
	}

	
	return { init : init };

})(jQuery);




/**
 * Form Elements
 */

var formElements = (function($) {
	'use strict';

	function activatePlaceHolders() {

		/*
			From https://github.com/neojp/gravity-forms-placeholders/blob/master/gf.placeholders.js
			For added placeholders to gravity forms.
			
		*/

		$('.gform_wrapper')
			.find('input, textarea').filter(function(i){
				
				var $field = $(this);

				if (this.nodeName=== 'INPUT') {
					var type = this.type;
					return !(type === 'hidden' || type === 'file' || type === 'radio' || type === 'checkbox');
				}

				return true;
			})
			.each(function(){
				var $field = $(this);

				var id = this.id;
				// var $labels = $('label[for=' + id + ']').hide();
				var $labels = $('label[for=' + id + ']');
				var label = $labels.last().text();

				if (label.length > 0 && label[ label.length-1 ] === '*') {
					label = label.substring(0, label.length-1) + ' *';
				}

				$field[0].setAttribute('placeholder', label);
			});
		//end placholder iterations.
	}



	function init() {
	//	activateDropdowns();
		activatePlaceHolders();
	}

	return { init : init };

})(jQuery);



/**
 * Module
 * 
 


var module = (function() {

	var config = {
		
	};

	function init() {
		
	}

	return { init : init };

})();
 
*/


/*
Initialize all functionality for the page after document is ready.
*/
Ecobee.init = function () {
	'use strict';
	fixNavigationBar.init();
	//scrollbars.init();
	//formElements.init();
	Cartogram.init();
	Tabs.init();
	headroom.init();
	popups.init();
	//windows.init();
	ecobeeMenu.init();
	// ecobeeScroller.init();
	$('#slides').superslides();
	twitter.init();
	fittext.init();


	

	
};

/*
Entry point into the file.
*/ 
jQuery(document).ready(function($) {
	'use strict';
	Ecobee.init();
});



