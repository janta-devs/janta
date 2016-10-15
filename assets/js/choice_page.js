var global_data = {};
var status = $('div#status');

var tabs  = $(document).find('body').find('div.container-fluid').children('section')
.find('div.container').find('div.row').children('div.board').find('ul#myTab').find('li.active');

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
		.done(function( res ){
			var new_path;
			new_path = ( res.placeholder === null || res.placeholder === undefined || res.placeholder === "" ) ? self.state.placeholder : 
			res.placeholder.replace(/http:\/\/localhost\/janta\/index.php\/Employee_registration\/janta\//gi, "");
			(new_path === self.state.placeholder) ? "" : self.setState({placeholder: new_path});
			global_data['path'] = new_path;
		})
		.fail(function( res ){
			global_data['path'] = self.state.placeholder;
		});	
	},
	componentWillUpdate: function( nextProp, nextState ){
		global_data['path'] = nextState.placeholder;
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
				<div className = "UploadBtn"><input type = "file" name = "file"  onChange = {this._upload}/></div><br />
			</div>
		);
	}
});


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
		.done(function( response ) 
		{
			if( response['status'] == 'registered'){	
				status.show('slideDown').removeClass('warning').addClass('success').html("User is Registered");

				tabs.next().find('a[data-toggle="tab"]').click();
				
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
		return (
		<fieldset>
		<div className = "panel-body">
			<form className = "form-inline">
				Country: <br /><input type = "text" name = "country" className = "mdl-textfield__input" placeholder = "Country"/><br />
				Locality: <br /><input type = "text" name = "estate_locality" className = "mdl-textfield__input" placeholder = "Locality"/><br />
				Company Name: <br /><input type = "text" name = "company_name" className = "mdl-textfield__input" placeholder = "Company Name"/><br />
				Phone Number 1: <br /><input type = "number" name = "phone1" className = "mdl-textfield__input" placeholder = "Phone number 1"/><br />
				Phone Number 2: <br /><input type = "number" name = "phone2" className = "mdl-textfield__input" placeholder = "Phone number 2"/><br />
				Email: <br /><input type = "email" name = "email" className = "mdl-textfield__input" placeholder = "Email"/><br /><br />
				<button type="button" className="btn btn-success" onClick={this._handleClick}>Submit</button>			
				<button type="button" className="btn btn-primary pull-right" onClick = {this._back}>Back</button>
			</form>
		</div>
		</fieldset>
		);
	}
});

var Individual = React.createClass({
	getInitialState: function(){
		return { 
			header: this.props.employee_type,
			placeholder: '/janta/assets/pics/anony.jpg'
		}
	},
	_back: function( event ){
		event.preventDefault();
		event.stopPropagation();
		location.href = "";
	},
	_handleClick: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var $node = $( event.target );
		var formData = $node.parent().parent().serialize();
		formData = formData+"&employee_type="+this.props.employee_type+"&profile_photo="+global_data.path;
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
			if( response['status'] == 'registered' || response['status'] == 'true'){

				tabs.next().find('a[data-toggle="tab"]').click();

			}else if( response['exists'] == true || response['status'] == false){
				console.log( response );
			}
		})
		.fail(function( response ) {
			console.log( response );
		})	
	},
	render: function() {
		return (
		<div className = "profile_form">
					<div className = "col-lg-6">
							<ProfilePic />
						</div>
					<form className = "form-inline">
						<div className = "col-lg-6">
								First Name: <br /><input type = "text" name = "first_name" className = "mdl-textfield__input" placeholder = "First Name"/><br />
								Last Name: <br /><input type = "text" name = "last_name" className = "mdl-textfield__input" placeholder = "Last Name"/><br />
								Surname Name: <br /><input type = "text" name = "surname" className = "mdl-textfield__input" placeholder = "Surname"/><br />
								Password:<br /><input type = "password" name = "password" className = "mdl-textfield__input" placeholder = "Password"/><br />
								Password:<br /><input type = "password" name = "re_password" className = "mdl-textfield__input" placeholder = "Re enter Password"/><br />
								Gender: <br />
									<select className = "form-control" name = "gender">
										<option>Male</option>
										<option>Female</option>
									</select>
								<br />
								Date of birth: <br /><input type = "date" name = "dob" className = "mdl-textfield__input" placeholder = "Date of birth"/><br /><br />		
								<button type="button" className="btn btn-success pull-left" onClick={this._handleClick}>Submit</button>	
						</div>
					</form>
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
		this.setState({ employee_type: $node.attr('name') });
		if( $node.attr('name') == 'individual')
		{
			ReactDOM.render(<Individual employee_type = {$node.attr('name')}/>, document.getElementById('choice'));
		}
		else if( $node.attr('name')== 'corporate' ){
			ReactDOM.render(<Corporate employee_type = {$node.attr('name')} />, document.getElementById('choice'));
		}
	},
	render: function() {
		return (	
		<fieldset>
			<div className = "panel-body">
				<button className="btn btn-primary pull-left" name = "corporate" onClick = {this._HandleChange}>Corporate</button>
				<button className="btn btn-success pull-right" name = "individual" onClick = {this._HandleChange}>Individual</button>
			</div>
		</fieldset>
		);
	}
});

ReactDOM.render(<ComboBox />, document.getElementById('choice'));