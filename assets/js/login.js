(function($, document,window,undefined){

var signup_button = $('#register');
var form = $('#registration');
var modal = $('.modal-body');
var header = $('.modal-header');
var footer = $('.modal-footer');
var alert_div = $('div.alert');

modal.on('click', function(event){
	event.preventDefault();
	event.stopPropagation();
});
header.on('click', function(event){
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
			alert_div.show('slow').removeClass('alert-danger').addClass('alert-success').html('Successfully registered');
		}else if( res['exists'] == true ){
			alert_div.show('slow').removeClass('alert-success').addClass('alert-danger').html('User is already register');
		}
	})
	.fail(function() {
		alert_div.show('slow').addClass('alert-danger').html('User is already register');
	});
}));

})(jQuery, document, undefined);