var form_data = {};
var information = $('.alert');


var Settings = React.createClass({
	getInitialState: function(){
		return {
			user_info: {},
			employee_type: 'individual'
		}
	},
	_back: function( event ){
		event.preventDefault();
		event.stopPropagation();
		location.href = "";
	},
	_handleClick: function( event )
	{
		event.preventDefault();
		event.stopPropagation();
		var $node = $( event.target );
		var formData = $node.parent().serialize();
		formData = formData+"&employee_type="+this.state.employee_type;
		
		if( this.state.user_info.hasOwnProperty('id_passport')
			&& this.state.user_info.hasOwnProperty('email')
			&& this.state.user_info.hasOwnProperty('phone1')
			&& this.state.user_info.hasOwnProperty('phone2')
			&& this.state.user_info.hasOwnProperty('address')
			&& this.state.user_info.hasOwnProperty('education_level')
			&& this.state.user_info.hasOwnProperty('certificate')
			&& this.state.user_info.hasOwnProperty('city_town')
			&& this.state.user_info.hasOwnProperty('estate_locality')
			&& this.state.user_info.hasOwnProperty('school'))
			{
					this._submit( formData );
			}
			else
			{
				var node = $(ReactDOM.findDOMNode(this));
				var info_div = node.find('div.alert');
				info_div.removeClass('alert-info').addClass('alert-danger').html('<center>Fill in all the required fields</center>').toggle(700);
			}
	
	},
	_validate: function( event )
	{
		event.preventDefault();
		event.stopPropagation();

		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		var node = event.target, $node = $( node ), $type = $node.attr('type');
		
		if($type == 'text' && typeof($node.val()) == 'string' && $node.val() !== "")
		{
			$node.parent().children('i').removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
			form_data[$node.attr('name')] = $node.val();
			this.setState({user_info: form_data});
		}
		else if( $type == 'email' && typeof($node.val()) == 'string' && re.test($node.val()) && $node.val() !== "")
		{
			$node.parent().children('i').removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
			form_data[$node.attr('name')] = $node.val();
			this.setState({user_info: form_data});
		}
		else if( $type == 'number' && isNaN( $node.val() ) == false && $node.val() !== "")
		{
			$node.parent().children('i').removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
			form_data[$node.attr('name')] = $node.val();
			this.setState({user_info: form_data});
		}
		else if( $type == 'password' && typeof($node.val()) == 'string' && $node.val() !== "")
		{
			$node.parent().children('i').removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
			form_data[$node.attr('name')] = $node.val();
			this.setState({user_info: form_data});
		}
		else if( event.type === "change" && $node.val() !== '--SELECT--' )
		{
			$node.parent().children('i').removeClass('glyphicon-warning-sign').addClass('glyphicon-ok');
			form_data[$node.attr('name')] = $node.val();
			this.setState({user_info: form_data});
		}
		else
		{
			$node.parent().children('i').removeClass('glyphicon-ok').addClass('glyphicon-warning-sign');
		}
	},
	_submit: function( data )
	{
		$.ajax({
			url: '/janta/index.php/Employee_registration/employeeData',
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function( response ) {
			if( response['status'] == 'registered'){	
				status.show('slideDown').removeClass('warning').addClass('success').html("User is Registered");
				ReactDOM.render(<Settings />, document.getElementById('choice'));
			}else if( response['exists'] == true ){
				status.show('slideDown').removeClass('success').addClass('warning').html("User is already Registered!!");
			}
		})
		.fail(function( response ) {
			console.log( response );
		})	
	},
	render: function() {
		return (
		<div className = "panel panel-default col-sm-8">
		<div className = "panel-heading">
			<h3>Registering</h3>
		</div>
		<div className = "panel-body">
		<div className = "alert alert-info"><center>Please fill in all the blanks</center></div>
		<form className = "form-inline" encType = "multipart-form/data">

				<div className = "col-sm-6">

				<div className="inner-addon right-addon">
				<i className = "glyphicon "></i>
					ID/Passport Number: <br /><input type = "number" name = "id_passport" className = "form-control" placeholder = "ID/Passport Number" onBlur={this._validate}/>
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Email: <br /><input type = "email" name = "email" className = "form-control" placeholder = "Email" onBlur={this._validate}/><br />
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Phone number: <br /><input type = "number" name = "phone1" className = "form-control" placeholder = "Phone number 1" onBlur={this._validate}/><br />
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Phone number: <br /><input type = "number" name = "phone2" className = "form-control" placeholder = "Phone number 2" onBlur={this._validate}/><br />
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Address: <br /><input type = "text" name = "address" className = "form-control" placeholder = "Address" onBlur={this._validate}/><br />
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Highest Education Level: <br />
					<select className = "form-control" name = "education_level" onChange ={this._validate}>
						<option>--SELECT--</option>
						<option>Ph.D</option>
						<option>Masters Degree</option>
						<option>Undergraduate Degree</option>
						<option>Diploma</option>
						<option>High school</option>
						<option>Primary School</option>
					</select>
				</div>

				</div>

				<div className = "col-sm-6">
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				City/Town: <br />
					<select className = "form-control" name = "city_town" type = "select" onChange ={this._validate}>
						<option>--SELECT--</option>
						<option>Nairobi</option>
						<option>Nakuru</option>
						<option>Mombasa</option>
						<option>Kisumu</option>
						<option>Eldoret</option>
						<option>Nyeri</option>
					</select>
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Estate Locality: <br /><input type = "text" name = "estate_locality" className = "form-control" placeholder = "Estate Locality" onBlur={this._validate}/><br />
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Certificate: <br /><input type = "text" name = "certificate" className = "form-control" placeholder = "Certificate" onBlur={this._validate}/><br />
				</div>
				<div className="inner-addon right-addon"><i className = "glyphicon "></i>
				Institution Name: <br /><input type = "text" name = "school" className = "form-control" placeholder = "Institution Name" onBlur={this._validate}/><br /><br /><br />
				</div>
				</div>
				<button type="button" className="btn btn-success" onClick={this._handleClick}>Submit</button>
		</form>
		</div>
		</div>

		);
	}
});

ReactDOM.render(<Settings />, document.getElementById('form'));