(function($, document,window,undefined){

var signup_button = $('#signup');
signup_button.on('click', function( event ){
	event.preventDefault();
	event.stopPropagation();

	console.log('clicked');
});

})(jQuery, document, undefined);