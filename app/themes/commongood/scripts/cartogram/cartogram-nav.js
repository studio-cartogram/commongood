var CartogramMenu = {
	$trigger: $( '.js-nav-trigger' ),
	$menu:  $( 'js-nav' ),
	$html: $("html"),
	//$site: $('.js-site'),

	init: function() {

		this.bindUIActions();

	},

	bindUIActions: function() {

		var self = this;
		this.$trigger.on(Cartogram.buttonPressedEvent, function() {
			self.toggleNav(this);
		});

	},

	toggleNav: function(el) {
        	var self = this;

        if(!this.$html.hasClass("state-nav-is-shown")) {
        	this.$html.addClass("state-nav-is-shown");
        //	this.$site.on(Cartogram.buttonPressedEvent, function() {
		//		self.toggleNav(this);
		//	});
        } else {
        	this.$html.removeClass("state-nav-is-shown");
        	//this.$site.off(Cartogram.buttonPressedEvent);
        }

	}

};




