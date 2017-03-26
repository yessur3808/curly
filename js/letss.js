
 $(document).ready(function(){
  
  $(".input").focus(function() {
    $(this).parent(".field-container").addClass("is-focused");
  });
  
  $(".input").blur(function() {
    $(this).parent(".field-container").removeClass("is-focused");
  });
  
 $('.field-container').on( 'keyup', '.text-area', function () {
    $(this).height(0);
    $(this).height(this.scrollHeight);
  });

});

 
 
	$.fn.jQuerySimpleCounter = function( options ) {
	    var settings = $.extend({
	        start:  0,
	        end:    100,
	        easing: 'swing',
	        duration: 400,
	        complete: ''
	    }, options );

	    var thisElement = $(this);

	    $({count: settings.start}).animate({count: settings.end}, {
			duration: settings.duration,
			easing: settings.easing,
			step: function() {
				var mathCount = Math.ceil(this.count);
				thisElement.text(mathCount);
			},
			complete: settings.complete
		});
	};


$('#number1').jQuerySimpleCounter({end: 5,duration: 350});
$('#number3').jQuerySimpleCounter({end: 62,duration: 230});




  	/* AUTHOR LINK */
     $('.about-me-img img, .authorWindowWrapper').hover(function(){
            $('.authorWindowWrapper').stop().fadeIn('fast').find('p').addClass('trans');
        }, function(){
            //$('.authorWindowWrapper').stop().css('display', 'none').find('p').removeClass('trans');
        });
