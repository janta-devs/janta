(function($, document,window,undefined){

var signup_button = $('#register');
var form = $('#registration');
var modal = $('.modal-body');

modal.on('click', function(event){
	event.preventDefault();
	event.stopPropagation();
});
signup_button.on('click', (function(event) {
	event.preventDefault();
	event.stopPropagation();
	$data = form.serialize();			//capturing form data
	$.ajax({
		url: 'http://localhost/janta/index.php/home/register',
		type: 'POST',
		dataType: 'json',
		data: $data,
	})
	.done(function( res ) {
		console.log( res );
		if( res['status'] == 'registered'){
			alert('Successfully registered');
		}
	});
}));

})(jQuery, document, undefined);