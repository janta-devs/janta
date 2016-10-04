var data = {};
var status = $('div#status');
var ProfilePic = React.createClass({
	getInitialState: function(){
		return{placeholder: '/janta/assets/pics/anony.jpg'}
	},
	_send: function( data ){
		var self = this;
		$.ajax({
			url: '/janta/index.php/Photo/upload',
			type: 'POST',
			dataType: 'json',
			cache: false, 
			contentType: false, 
			processData: false,
			data: data,
		})
		.done(function( rs ) {
			self.setState({placeholder: rs.name});
		});		
	},
	componentWillMount: function(){
		var self = this;
		$.ajax({
			url: '/janta/index.php/Photo/getProfilePic',
			type: 'POST',
			dataType: 'json'
		})
		.done(function( res ) {
			var new_path = res.placeholder.replace(/http:\/\/localhost\/janta\/index.php\/Employee_registration/g, "");
			new_path = "/janta"+new_path;
			self.setState({placeholder: new_path});
		});
		
	},
	componentWillUpdate: function( nextProp, nextState ){
		nextState;
	},
	_upload: function( event ){
		event.preventDefault();
		event.stopPropagation();

		var files = event.target.files;
		var container = new FormData();

		$.each(files, function(key, val) {
			 container.append(key, val );
		});	

		this._send( container );
		
	},
	render: function() {
		return (
			<div>
				<img src = {this.state.placeholder} width = "250" height = "230"/><br />
				<input type = "file" name = "file"  onChange = {this._upload}/><br />
			</div>
		);
	}
});


var Settings = React.createClass({
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
		formData = formData+"&employee_type="+this.props.employee_type;
		console.log( formData );
		this._submit( formData );
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
		<div className = "panel panel-default">
		<div className = "panel-heading">
			<h3>Registering as {this.state.header} user</h3>
		</div>
		<div className = "panel-body">
		<form className = "form-inline" encType = "multipart-form/data">
				ID/Passport Number: <br /><input type = "number" name = "id_passport" className = "form-control" placeholder = "ID/Passport Number"/><br />
				Email: <br /><input type = "email" name = "email" className = "form-control" placeholder = "Email"/><br />
				Phone number: <br /><input type = "number" name = "phone1" className = "form-control" placeholder = "Phone number 1"/><br />
				Phone number: <br /><input type = "number" name = "phone2" className = "form-control" placeholder = "Phone number 2"/><br />
				Address: <br /><input type = "text" name = "address" className = "form-control" placeholder = "Address"/><br />
				Highest Education Level: <br />
					<select className = "form-control" name = "education_level">
						<option>Ph.D</option>
						<option>Masters Degree</option>
						<option>Undergraduate Degree</option>
						<option>Diploma</option>
						<option>High school</option>
						<option>Primary School</option>
					</select>
				<br />
				City/Town: <br />
					<select className = "form-control" name = "city_town">
						<option>Nairobi</option>
						<option>Nakuru</option>
						<option>Mombasa</option>
						<option>Kisumu</option>
						<option>Eldoret</option>
						<option>Nyeri</option>
					</select>
				<br />
				Estate Locality: <br /><input type = "email" name = "estate_locality" className = "form-control" placeholder = "Estate Locality"/><br />
				Certificate: <br /><input type = "email" name = "certificate" className = "form-control" placeholder = "Certificate"/><br />
				Institution Name: <br /><input type = "email" name = "school" className = "form-control" placeholder = "Institution Name"/><br /><br /><br />
				<button type="button" className="btn btn-success" onClick={this._handleClick}>Submit</button>			
				<button type="button" className="btn btn-primary pull-right" onClick = {this._back}>Back</button>
		</form>
		</div>
		</div>

		);
	}
})

var Corporate = React.createClass({
	getInitialState: function()
	{
		return { header: this.props.employee_type }
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
		formData = formData+"&employee_type="+this.props.employee_type;
		console.log( formData );
		this._submit( formData );
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
				location.href = "/janta/index.php/Employee_registration/profile";
			}else if( response['exists'] == true ){
				status.show('slideDown').removeClass('success').addClass('warning').html("User is already Registered!!");
			}
		})
		.fail(function( response ) {
			console.log( response );
		})	
	},
	render: function()
	{
		console.log( this.props );
		return (
		<div className = "panel panel-default">
		<div className = "panel-heading">
			<h3>Registering as {this.state.header} user</h3>
		</div>
		<div className = "panel-body">
			<form className = "form-inline">
				Country: <br /><input type = "text" name = "country" className = "form-control" placeholder = "Country"/><br />
				Locality: <br /><input type = "text" name = "estate_locality" className = "form-control" placeholder = "Locality"/><br />
				Company Name: <br /><input type = "text" name = "company_name" className = "form-control" placeholder = "Company Name"/><br />
				Phone Number 1: <br /><input type = "number" name = "phone1" className = "form-control" placeholder = "Phone number 1"/><br />
				Phone Number 2: <br /><input type = "number" name = "phone2" className = "form-control" placeholder = "Phone number 2"/><br />
				Email: <br /><input type = "email" name = "email" className = "form-control" placeholder = "Email"/><br /><br />
				<button type="button" className="btn btn-success" onClick={this._handleClick}>Submit</button>			
				<button type="button" className="btn btn-primary pull-right" onClick = {this._back}>Back</button>
			</form>
		</div>
		</div>
		);
	}
});

var Individual = React.createClass({
	getInitialState: function(){
		return { header: this.props.employee_type }
	},
	_back: function( event ){
		event.preventDefault();
		event.stopPropagation();
		location.href = "";
	},
	_handleClick: function( event ){
		event.preventDefault();
		event.stopPropagation();

		console.log( event.target );
	},
	_handleClick: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var $node = $( event.target );
		var formData = $node.parent().serialize();
		formData = formData+"&employee_type="+this.props.employee_type;
		console.log( formData );
		this._submit( formData );
	},
	_submit: function( data ){
		$.ajax({
			url: '/janta/index.php/Employee_registration/employeeData',
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function( response ) {
			if( response['status'] == 'registered'){
				status.show().removeClass('warning').addClass('success').html("User is Registered");
				location.href = "/janta/index.php/Employee_registration/profile";
			}else if( response['exists'] == true ){
				status.show().removeClass('success').addClass('warning').html("User is already Registered!!");
			}
		})
		.fail(function( response ) {
			console.log( response );
		})	
	},
	render: function() {
		return (
	
		<div className = "panel panel-default">
		<div className = "panel-heading">
			<h3>Registering as {this.state.header} user</h3>
		</div>
		<div className = "panel-body">
			<form className = "form-inline">
				<div className = "col-sm-6">
					<ProfilePic />
				</div>
				<div className = "col-sm-6">
				First Name: <br /><input type = "text" name = "first_name" className = "form-control" placeholder = "First Name"/><br />
				Last Name: <br /><input type = "text" name = "last_name" className = "form-control" placeholder = "Last Name"/><br />
				Surname Name: <br /><input type = "text" name = "surname" className = "form-control" placeholder = "Surname"/><br />
				Gender: <br />
					<select className = "form-control" name = "gender">
						<option>Male</option>
						<option>Female</option>
					</select>
				<br />
				Date of birth: <br /><input type = "date" name = "dob" className = "form-control" placeholder = "Date of birth"/><br /><br />
				</div>
				<button type="button" className="btn btn-success pull-right" onClick={this._handleClick}>Submit</button>			
				<button type="button" className="btn btn-primary pull-left" onClick = {this._back}>Back</button>
			</form>
			</div>	
			</div>
	
		);
	}
});
var ComboBox = React.createClass({
	getInitialState: function(){
		return { employee_type: {} }
	},
	_HandleChange: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var node = event.target, $node = $(node);
		this.setState({ employee_type: $node.val() });
		if( $node.attr('name') == 'individual')
		{
			ReactDOM.render(<Individual employee_type = {$node.val()}/>, document.getElementById('choice'));
		}
		else if( $node.attr('name')== 'corporate' ){
			//console.log( ReactDOM.findDOMNode( this ) );
			ReactDOM.render(<Corporate employee_type = {$node.val()} />, document.getElementById('choice'));
		}
	},
	render: function() {
		return (	
		<div className = "panel panel-default">
		<div className = "panel-heading">
			<h3>What kind of employee would you like to register as?</h3>
		</div>
			<div className = "panel-body">
			<button className="btn btn-primary pull-left" name = "corporate" onClick = {this._HandleChange}>Corporate</button>
			<button className="btn btn-success pull-right" name = "individual" onClick = {this._HandleChange}>Individual</button>

		</div>
		</div>
		);
	}
});

ReactDOM.render(<ComboBox />, document.getElementById('choice'));