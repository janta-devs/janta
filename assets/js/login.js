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
		url: '/janta/index.php/Home/register',
		type: 'POST',
		dataType: 'json',
		data: $data,
	})
	.done(function( res ) {
		console.log( res );
		if( res['status'] == 'registered')
		{
			alert_div.show('slow').removeClass('alert-danger').addClass('alert-success').html('Successfully registered');
			location.href = "/janta/index.php/Employee_registration/step_two";
		}else if( res['exists'] == true )
		{
			alert_div.show('slow').removeClass('alert-success').addClass('alert-danger').html('User is already register');
			console.log( res );
		}
		else if( res['status'] == 'error' )
		{
			alert_div.show('slow').removeClass('alert-success').addClass('alert-danger').html('Please fill the form');
			console.log( res );
		}
	})
	.fail(function( res ) 
	{
		alert_div.show('slow').addClass('alert-danger').html('The server has an internal error, sorry!');
		console.log( res );
	});
}));

})(jQuery, document, undefined);