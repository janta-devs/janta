(function($, document,window,undefined){

var signup_button = $('#register');
var form = $('#registration');

signup_button.on('click', (function(event) {
	event.preventDefault();
	event.stopPropagation();

	console.log( event );
}));

})(jQuery, document, undefined);