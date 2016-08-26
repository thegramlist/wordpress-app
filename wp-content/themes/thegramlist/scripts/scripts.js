
jQuery(function() {
	
	/* RETURN BROWSER DIMENSIONS */
	function getBrowserDimensions (reqDimension) {
	  switch(reqDimension)
	  {
	  case 'height':
		return window.innerHeight || document.documentElement.clientHeight;
		break;
	  case 'width':
		return window.innerWidth || document.documentElement.clientWidth;
		break;
	  default:
	  }	
	}
	



	/* UPDATE DIMENSIONS */
	function updateDimensions (){
		browserHeight = getBrowserDimensions('height');
		browserWidth = getBrowserDimensions('width');
	}
	



	/* SCROLLS TO TOP OF PAGE */
	function scrollToTop(){
		// jQuery("html, body").animate({ scrollTop: 0 }, homeSectionsSlideSpeed);
		TweenMax.to( window, homeSectionsSlideSpeed, {scrollTo:{y: 0}, ease:Power4.easeInOut});
	}




	/* SCROLLS TO REQUIRED SECTION */
	function getHeaderHeight(){
		return jQuery('#header').height();
	}
	function scrollToSection(id){
		// animate scroll to the required ID offset position, adjusted for the fixed header	
		jQuery("html, body").animate({ scrollTop: jQuery(id).offset().top-getHeaderHeight() }, 750, function(){});
		// close mobile menu if open
		jQuery("#top-nav").removeClass('active');
	}
	/* scroll link */
	jQuery(document).on('click','.scroll-link',function(event){
		event.preventDefault();
		// get required id
		var reqId = jQuery( this ).attr('href');
		scrollToSection(reqId);
	})




	/* EXPLORE ARROW */
	// setup explore arrow
	var exploreIndex = -1;
	var sectionsArray = [];
	if ( jQuery('.nav-arrow.explore').length > 0 ) {
		// get all section id's
		jQuery('body > section.explore').each( function(){
			sectionsArray.push(jQuery(this).attr('id'));
		});
	}

    // get explore index from label
	function getIndexLabel(reqAttr) {
		for( var x = 0; x < sectionsArray.length ; x++){
			if ( sectionsArray[x] == reqAttr ) {
				return x;
			}
		}
	}

	// sets index from waypoints
	function setExploreIndex( reqAttr , direction ) {
		if( direction == 'down' ){
			exploreIndex = getIndexLabel(reqAttr);
		} else {
			exploreIndex = getIndexLabel(reqAttr)-1;
		}
		exploreVisibility();
		console.log(reqAttr+' - '+direction+': current exploreIndex: '+exploreIndex);
	}

	// sets explore button visibility
	function exploreVisibility(){
		if( exploreIndex == sectionsArray.length-1 ){
			jQuery('.explore-wrapper').removeClass('active');
		} else {
			jQuery('.explore-wrapper').addClass('active');
		}
	}

	// explore arrow click
	jQuery(document).on('click','.nav-arrow.explore',function(event){
		event.preventDefault();

		// get next section index
		var nextIndex = exploreIndex+1;
		// limit to array length - 1
		if( nextIndex > sectionsArray.length - 1 ){
			nextIndex = sectionsArray.length - 1;
		}
		// get next section ID
		var reqId = '#'+sectionsArray[nextIndex];
		// scroll to section
		scrollToSection(reqId);
	})
	



	/* SCROLLED MORE THAN 100PX */
	// Add classes for fixed elements to body
	function setHeaderStyle() {
		// set body to fixed when scrolling beyond header height
		if( scrollTopPosition >= 100 ){
			jQuery('body').addClass('compact');
		} else {
			jQuery('body').removeClass('compact');
		}
	}	




	/* MOBILE MENU */
	jQuery(document).on('click','.mobile-menu-toggle', function(event){
		event.preventDefault();
		var overlay = jQuery('.mobile-navigation-wrapper-outer');
		var overlayInner = jQuery('.mobile-navigation-wrapper-inner');

		// setup body
		jQuery('body').toggleClass('mobile-navigation');
		// show overlay & inner
		overlay.addClass('active');
		overlayInner.addClass('active');

	});

	jQuery(document).on('click','.tray-close', function(event){
		event.preventDefault();
		var overlay = jQuery('.mobile-navigation-wrapper-outer');
		var overlayInner = jQuery('.mobile-navigation-wrapper-inner');

		// close tray
		overlayInner.removeClass('active');
		// when overlay inner closed, hide overlay
		overlayInner.one('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
			overlay.removeClass('active');
		});
		// when overlay closed, setup body
		overlay.one('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
			jQuery('body').removeClass('mobile-navigation');
		});

	});




	/* SEARCH */
	jQuery(document).on('click','.search-close , .search-toggle', function(event){
		event.preventDefault();
		jQuery('#search-wrapper').toggleClass('active');
		if( jQuery('#search-wrapper').hasClass('active') ){
			jQuery('#search-wrapper input[type="text"]').focus();
		}
	});




	/* SUB MENU */
	jQuery(document).on('click','.has-sub-menu', function(event){

		jQuery(this).toggleClass('active');

	});




	/* OWL CAROUSEL */
	var heroItemCount = $('#hero-carousel').find('.slide').length;
	var multipleSlides = false;
	if( heroItemCount > 1 ){
		multipleSlides = true;
	}

	$('#hero-carousel').owlCarousel({
	    nav:multipleSlides,
	    dots: multipleSlides,
	    items:1,
	    loop: multipleSlides,
	    autoplay: false,
	    autoplayTimeout: 8000,
	    autoplaySpeed: 750,
	    navSpeed: 500,
	    dotsSpeed: 500,
	    navText: ['<span class="nav-arrow"><img src="'+templateUrl +'images/slider-left-arrow.png"></span>','<span class="nav-arrow"><img src="'+templateUrl +'images/slider-right-arrow.png"></span>'],
	})




	/* WAYPOINTS */
	/* the-effect */
	if( jQuery('#the-effect').length > 0 ){
		// animation classes
		var waypoint = new Waypoint({
			element: document.getElementById('the-effect'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#the-effect').addClass('animate');
				} else {
					jQuery('#the-effect').removeClass('animate');
				}
			},
			offset: '75%'
		})
		// explore index
		var waypoint = new Waypoint({
			element: document.getElementById('the-effect'),
			handler: function(direction) {
				if( direction == 'down' ){
					setExploreIndex('the-effect',direction);
				} 
			},
			offset: '40%'
		})
		var waypoint = new Waypoint({
			element: document.getElementById('the-effect'),
			handler: function(direction) {
				if( direction == 'up' ){
					setExploreIndex('the-effect',direction);
				} 
			},
			offset: '80%'
		})
	}

	/* archive */
	if( jQuery('#archive').length > 0 ){
		// animation classes
		var waypoint = new Waypoint({
			element: document.getElementById('archive'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#archive').addClass('animate');
				} else {
					jQuery('#archive').removeClass('animate');
				}
			},
			offset: '70%'
		})
		// explore index
		var waypoint = new Waypoint({
			element: document.getElementById('archive'),
			handler: function(direction) {
				if( direction == 'down' ){
					setExploreIndex('archive',direction);
				} 
			},
			offset: '40%'
		})
		var waypoint = new Waypoint({
			element: document.getElementById('archive'),
			handler: function(direction) {
				if( direction == 'up' ){
					setExploreIndex('archive',direction);
				} 
			},
			offset: '80%'
		})
	}

	/* posts */
	if( jQuery('#posts-wrapper').length > 0 ){
		var waypoint = new Waypoint({
			element: document.getElementById('posts-wrapper'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#posts-wrapper').addClass('animate');
				} 
			},
			offset: '65%'
		})
		var waypoint = new Waypoint({
			element: document.getElementById('posts-wrapper'),
			handler: function(direction) {
				if( direction == 'up' ){
					jQuery('#posts-wrapper').removeClass('animate');
				}
			},
			offset: '100%'
		})
	}
	/* case studies */
	if( jQuery('#case-studies-wrapper').length > 0 ){
		var waypoint = new Waypoint({
			element: document.getElementById('case-studies-wrapper'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#case-studies-wrapper').addClass('animate');
				} else {
					jQuery('#case-studies-wrapper').removeClass('animate');
				}
			},
			offset: '75%'
		})
	}

	/* subscribe-suggest */
	if( jQuery('#subscribe-suggest').length > 0 ){
		// animation classes
		var waypoint = new Waypoint({
			element: document.getElementById('subscribe-suggest'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#subscribe-suggest').addClass('animate');
				} else {
					jQuery('#subscribe-suggest').removeClass('animate');
				}
				
			},
			offset: '75%'
		})
		// explore index
		var waypoint = new Waypoint({
			element: document.getElementById('subscribe-suggest'),
			handler: function(direction) {
				if( direction == 'down' ){
					setExploreIndex('subscribe-suggest',direction);
				} 
			},
			offset: '40%'
		})
		var waypoint = new Waypoint({
			element: document.getElementById('subscribe-suggest'),
			handler: function(direction) {
				if( direction == 'up' ){
					setExploreIndex('subscribe-suggest',direction);
				} 
			},
			offset: '80%'
		})
	}

	/* contact */
	if( jQuery('#contact').length > 0 ){
		// animation classes
		var waypoint = new Waypoint({
			element: document.getElementById('contact'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#contact').addClass('animate');
				} else {
					jQuery('#contact').removeClass('animate');
				}
			},
			offset: '75%'
		})
		// explore index
		var waypoint = new Waypoint({
			element: document.getElementById('contact'),
			handler: function(direction) {
				if( direction == 'down' ){
					setExploreIndex('contact',direction);
				} 
			},
			offset: '40%'
		})
		var waypoint = new Waypoint({
			element: document.getElementById('contact'),
			handler: function(direction) {
				if( direction == 'up' ){
					setExploreIndex('contact',direction);
				} 
			},
			offset: '80%'
		})
	}

	/* clients */
	if( jQuery('#clients').length > 0 ){
		// animation classes
		var waypoint = new Waypoint({
			element: document.getElementById('clients'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#clients').addClass('animate');
				} else {
					jQuery('#clients').removeClass('animate');
				}
			},
			offset: '75%'
		})
		// explore index
		var waypoint = new Waypoint({
			element: document.getElementById('clients'),
			handler: function(direction) {
				if( direction == 'down' ){
					setExploreIndex('clients',direction);
				} 
			},
			offset: '40%'
		})
		var waypoint = new Waypoint({
			element: document.getElementById('clients'),
			handler: function(direction) {
				if( direction == 'up' ){
					setExploreIndex('clients',direction);
				} 
			},
			offset: '80%'
		})
	}


	/* feed */
	if( jQuery('#feed').length > 0 ){
		var waypoint = new Waypoint({
			element: document.getElementById('feed'),
			handler: function(direction) {
				if( direction == 'down' ){
					jQuery('#feed').addClass('animate');
				} else {
					jQuery('#feed').removeClass('animate');
				}
			},
			offset: '75%'
		})
	}




	/* SCROLLMAGIC */
	if( jQuery('#hero-carousel').length > 0 ){
		var heroTween = new TimelineMax().fromTo('#hero-carousel .slide-image', 1, { y: '-17%'}, {y: '0%'}).fromTo('#hero-carousel .max-width-container', 1, { y: '0', opacity: 1 }, {y: '90%' , opacity: .1 });

		// init ScrollMagic Parallax Scenes
		var controller = new ScrollMagic.Controller();
		new ScrollMagic.Scene({
			duration: '100%',
			triggerElement: '#hero-carousel',
			// triggerHook: 0,
			// offset: '-70px',
		})
		.setTween(heroTween)
		.addTo(controller);
	}

	if( jQuery('#page-hero').length > 0 ){
		var pageHeroTween = new TimelineMax().fromTo('#page-hero .page-hero-image', 1, { y: '-40%'}, {y: '30%'})

		// init ScrollMagic Parallax Scenes
		var controller = new ScrollMagic.Controller();
		new ScrollMagic.Scene({
			duration: '100%',
			triggerElement: '#page-hero',
			
		})
		.setTween(pageHeroTween)
		.addTo(controller);

		var pageHeroTween2 = new TimelineMax().fromTo('#page-hero .max-width-container', 1, { y: '0', opacity: 1 }, {y: '250%' , opacity: .1 });

		// init ScrollMagic Parallax Scenes
		var controller = new ScrollMagic.Controller();
		new ScrollMagic.Scene({
			duration: '100%',
			triggerElement: '#page-hero',
			triggerHook: 0,
			// offset: '250px',
		})
		.setTween(pageHeroTween2)
		.addTo(controller);
	}




	/* INSTAGRAM FEED */
	var instagramFeedData ;
	if( jQuery('#feed').length > 0 ){

		// TEMP CODE, SHOULD BE REPLACED WITH PROPER CALL TO API FROM APPROVED APP
		$.getJSON('http://whateverorigin.org/get?url=' + encodeURIComponent('https://www.instagram.com/thegramlist/media/') + '&callback=?', function(data){
			instagramFeedData = data.contents;
			loadInstagramFeed();
		});

	}

	function initFeedCarousel() {
		$('#feed-list').owlCarousel({
		    // nav:true,
		    // items:6,
		    loop: true,
		    autoplay: true,
		    autoplayTimeout: 4000,
		    autoplaySpeed: 750,
		    navText: ['<span class="nav-arrow"><img src="'+templateUrl +'images/slider-left-arrow.png"></span>','<span class="nav-arrow"><img src="'+templateUrl +'images/slider-right-arrow.png"></span>'],
		    responsive: {
		    	0 : {
		    		items : 2
		    	},
		    	480 : {
		    		items : 3
		    	},
		    	768 : {
		    		items : 6
		    	}
		    }
		})
	}

	function loadInstagramFeed() {
		var delay = 0;
		for( var x = 0 ; x < instagramFeedData.items.length ; x++ ){

			var thisHtml = '<li style="-webkit-transition: opacity 2s ease '+delay+'s ;-moz-transition: opacity 2s ease '+delay+'s; transition: opacity 2s ease '+delay+'s;">';
			thisHtml += '<a target="_blank" href="'+instagramFeedData.items[x].link+'">';
			thisHtml += '<span class="social center-vertically">';
			thisHtml += '<span class="likes"><span class="icon"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"><path d="M499.543,974.794c270.678-194.608,406.095-372.616,469.773-508.396c74.396-158.645,9.682-355.307-152.639-421.299C625.883-32.437,499.543,146.451,499.543,146.451S374.101-32.902,183.323,44.668C21.002,110.66-43.712,307.322,30.683,465.967C94.362,601.729,228.864,780.202,499.543,974.794z"/></svg></span><span class="text">'+instagramFeedData.items[x].likes.count+'</span></span>';
			thisHtml += '<span class="comments"><span class="icon"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"><path fill-rule="evenodd" clip-rule="evenodd" d="M1000,973.684l-91.951-321.777c25.186-54.635,39.319-114.848,39.319-178.222c0-247.07-212.068-447.369-473.684-447.369S0,226.614,0,473.685c0,247.069,212.068,447.368,473.684,447.368c63.939,0,124.846-12.129,180.51-33.82L1000,973.684z"/></svg></span><span class="text">'+instagramFeedData.items[x].comments.count+'</span></span>';
			thisHtml += '</span>';
			thisHtml += '<img src="'+instagramFeedData.items[x].images.standard_resolution.url+'"/>';
			thisHtml += '</a>';
			thisHtml += '</li>';
			jQuery('.feed-list').append(thisHtml);
			delay += .05;
		}

		initFeedCarousel();
	}




	/* LOADER */
	jQuery('#loading').one('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
		jQuery('#loading').addClass('inactive');
	});




	/* SETUP AJAX MAILCHIMP FORM */
	function setupMailChimpForm(){
		var mailChimpForm = jQuery('#mc-embedded-subscribe-form');
		// if mailchimp form exists
		if( mailChimpForm.length > 0 ){

			jQuery('#mc-embedded-subscribe').bind('click', function ( event ) {
				event.preventDefault();
				// clear errors
				jQuery('#mce-status').removeClass('active error success');

				// validate email
				if ( validateEmail( jQuery('#mce-EMAIL').val() ) ) {
					subscribe( mailChimpForm );
				} else {
					jQuery('#mce-status').addClass('active error');
				}
			
			});

		}		
	}

	setupMailChimpForm();


	function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

	function subscribe(mailChimpForm) {
		jQuery('#mc-embedded-subscribe-form').addClass('submitting');

	    jQuery.ajax({
	        type: mailChimpForm.attr('method'),
	        url: mailChimpForm.attr('action'),
	        data: mailChimpForm.serialize(),
	        cache       : false,
	        dataType    : 'json',
	        contentType: "application/json; charset=utf-8",
	        error       : function( xhr, status, errorThrown ) { 
	        	jQuery('#mc-embedded-subscribe-form').removeClass('submitting');
	        	jQuery('#mce-status').removeClass('success').addClass('active error').html('Could not connect to the subscription server. Please try again later. <br>xhr Status: '+ xhr.responseText + '<br>Text status: '+status+'<br>Error thrown: '+errorThrown);
	        },
	        success     : function(data) {
	        	jQuery('#mc-embedded-subscribe-form').removeClass('submitting');
	            if (data.result != "success") {
	                // Something went wrong, do something to notify the user. maybe alert(data.msg);

	                if( data.msg.search('is already subscribed to list') !== -1 ){
	                	// user already subscribed error
	                	console.log('Existing email, create cookie');
	                	completeSubscription();
	                } else {
	                	// any other error
	                	jQuery('#mce-status').removeClass('success').addClass('active error').html(data.msg);
	                }	                

	            } else {
	                // New email, subscribe
	                console.log('New email, create cookie');
					completeSubscription();
	            }
	        }
	    });
	}


	function completeSubscription (){
		// set form as submitted, set & show success message
		jQuery('#mc-embedded-subscribe-form').addClass('submitted');
        jQuery('#mce-status').removeClass('error').addClass('active success').text(unlockSuccessMessage);

        // create storiesViewedCookie cookie, close overlay 5s later
        createCookie('storiesViewedCookie','subscribed',3650);
        if( jQuery('body').hasClass('overlay-open') ){
        	setTimeout( function(){
        		jQuery('body').removeClass('overlay-open');
        	} , 5000 );
        }
	}




	/* EMAIL CAPTURE */

	

	function subscribeHtml(){
		return '<h2>'+( ( unlockHeading ) ? unlockHeading : "Want More Inspiration?" )+'</h2><p>'+( ( unlockSubHeading ) ? unlockSubHeading : "Share your email and unlock The Gramlist archives." )+'</p><div id="mc_embed_signup"><form action="//thegramlist.us11.list-manage.com/subscribe/post-json?u=a2c8529ce898b34a787d2c547&amp;id=4a4443980c&amp;c=?" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate><div id="mce-status" class="error">A valid email address is required</div><table class="mce-table"><td class="input"><input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter Email" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Enter Email\'"></td><td class="submit"><span class="loader"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"><circle cx="500" cy="500" r="150"/><path d="M500,150c96.56,0,183.984,39.103,247.308,102.335l106.142-105.991C762.976,55.922,638.019,0,500,0S237.024,55.922,146.551,146.344l106.141,105.991C316.016,189.103,403.441,150,500,150z"/><path d="M747.308,747.665C683.984,810.897,596.559,850,500,850s-183.984-39.103-247.308-102.336L146.551,853.656C237.025,944.077,361.981,1000,500,1000s262.976-55.923,353.449-146.344L747.308,747.665z"/></svg></span><input type="submit" value="Unlock" name="subscribe" id="mc-embedded-subscribe" class="square-button"></td></table><div id="mc_embed_signup_scroll"><div class="mc-field-group"></div><div id="mce-responses" class="clear"><div class="response" id="mce-error-response" style="display:none"></div><div class="response" id="mce-success-response" style="display:none"></div></div><!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups--><div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a2c8529ce898b34a787d2c547_4a4443980c" tabindex="-1" value=""></div></div><p class="directions">'+( ( unlockSmallText ) ? unlockSmallText : "The Gramlist arrives every Monday, Wednesday, and Friday." )+'</p></form></div>';
	}

	var storyLimit = 2;
	function emailCapture() {
		// check stories viewed
		var storiesViewedCookie = readCookie('storiesViewedCookie');
		// cookie not set
		if( !storiesViewedCookie ){
			// create cookie, set to 1
			createCookie('storiesViewedCookie','1',3650);	
		} else {
			// if cookie value is NOT "subscribed"
			if( storiesViewedCookie != 'subscribed' ){
				// get viewed times
				var viewedTimes = Number(storiesViewedCookie);
				// increase it
				viewedTimes ++;
				// reset cookie with new views
				createCookie('storiesViewedCookie',viewedTimes,3650);
				// if over view limit, show subsciption overlay.
				if( viewedTimes >= storyLimit ){
					openOverlay('subscribe');
					setupMailChimpForm();
				}
			}
		}
	}
	// if captureEmail variable is true? ( lists posts )
	if(captureEmail){
		emailCapture();
	}





	/* OVERLAY */
	/* close overlay */
	jQuery(document).on('click','.overlay-close',function(event){
		event.preventDefault();
		jQuery('body').removeClass('overlay-open');
	});


	/* open overlay */
	function openOverlay(type){
		// clear overlay
		jQuery('.overlay-content').html('');
		jQuery('#overlay').removeClass('unclosable');
		var overlayHTML = '';

		switch ( type ){
			case 'subscribe':
			jQuery('#overlay').addClass('unclosable');
			overlayHTML = subscribeHtml();
			break;
		}


		// insert html
		jQuery('.overlay-content').html(overlayHTML);
		jQuery('body').addClass('overlay-open');

	}








	/* ON INIT */
	scrollTopPosition = jQuery(this).scrollTop();
	setHeaderStyle();




	


	/* ON SCROLL */
	jQuery(window).scroll(function(){
		scrollTopPosition = jQuery(this).scrollTop();
		setHeaderStyle();

	});	

	
	/* ON RESIZE */
	jQuery(window).bind('resize', function () {
		setHeaderStyle();

	});	
	
	

	
});





var everythingLoaded = setInterval(function() {
  if (/loaded|complete/.test(document.readyState)) {
    clearInterval(everythingLoaded);
    jQuery('body').addClass('loaded');
  }
}, 10);



// COOKIE CODE
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    createCookie(name,"",-1);
}



/* SUBMIT TO GOOGLE SHEETS */
function saveToGoogleSheets(){

	// get array of all selected categories
	var checkedValues = $('input:checkbox:checked').map(function() {
	    return this.value;
	}).get();
	
	// gather form data
	var submittedData = {
        instagram: jQuery('input[name="instagram-handle"]').val(),
        email: jQuery('input[name="email"]').val(),
        location: jQuery('input[name="location"]').val(),
        category: checkedValues.join(', ') 
    }

    // submit data to google script
    $.ajax({
        url: "https://script.google.com/macros/s/AKfycbw145RMVk8gv7f8pBnDFpmN2NKSFRTfiO6JTIi8UASrj6pw0EYq/exec",
        type: "post",
        data: submittedData
    });

}
