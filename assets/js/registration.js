// define a way to auto-generate forms on the fly (reduces code base and encourages reusability)
var getData = {};
var choiceStyle = {
	height: 300,
	paddingTop: 100,
};

var Refresh = React.createClass({
  _clickHandle: function( event ){
    event.preventDefault();
    event.stopPropagation();
    
    var node = event.target, $node = $(node);
    $node.on('click', function( e ){
      window.location.href = "";
    });
  },
  render: function(){
    return(
		<button className = "btn btn-primary"><span className = "badge">Refresh</span></button>
  	);
 }
});
var StartPage = React.createClass({
	getInitialState: function(){
		return{ val: false}
	},
	_redirect: function( e ){
		e.preventDefault();
		e.stopPropagation();
		var TargetButton = e.target;
		if( $(TargetButton).attr('name') === 'job_seeker' ){
			ReactDOM.render(<MyForm />, document.getElementById('start'));
		}
	},
	render: function() {
		return (
		<div className = "panel panel-default">
			<div className = "panel-heading">
				<h4>How would you like to register?</h4>
			</div>
			<div className = "panel-body" style = {choiceStyle}>
				<button className = "btn btn-success pull-left col-md-4" name = "employer" onClick = {this._redirect}><span className="badge" name = "employer">Employer</span></button>
				<center className = "col-md-4">OR</center>
				<button className = "btn btn-primary pull-right col-md-4" name = "job_seeker" onClick = {this._redirect}><span className="badge" name = "job_seeker">Job Seeker</span></button>
			</div>
		</div>
		);
	}
});

var StepTwo  =  React.createClass({
	getInitialState: function()
	{
		return{ verification: false, step_two_data: {}}
	},
	_redirect: function( e ){
		e.preventDefault();
		e.stopPropagation();
		var TargetButton = e.target;
		if( $(TargetButton).attr('name') === 'back' ){
			ReactDOM.render(<MyForm />, document.getElementById('start'));
		}
	},
	_handleSubmit: function( e )
	{
		e.preventDefault();
		e.stopPropagation();
		if(this.state.step_two_data.hasOwnProperty("country") 
			&& this.state.step_two_data.hasOwnProperty("city")
			&& this.state.step_two_data.hasOwnProperty("locality"))
			{
				window.location.href = 'home.php';
			}
	},
	verifier: function( e )
	{
		e.preventDefault();
		e.stopPropagation();
		var node = e.target, HTMLTag = $(node);
		if (HTMLTag.attr('type') == 'text' && typeof(HTMLTag.val()) == 'string' ){ 
			getData[HTMLTag.attr('name')] = HTMLTag.val();
			this.setState({step_two_data: getData});
		}
	},
	render: function() 
	{
		return (
			<div className = "panel panel-default">
			<div className = "panel-heading">
				<h4>Step Two</h4>
			</div>
				<div className = "panel-body">
					<form className = "form">
						Country: <br/><input type = "text" name = "country" onBlur = {this.verifier} required={true}/><br />
						City/Town: <br/><input type = "text" name = "city" onBlur = {this.verifier} required={true}/><br />
						Locality: <br/><input type = "text" name = "locality" onBlur = {this.verifier} required={true}/><br /><br/>
						<button className = "btn btn-default" onClick = {this._handleSubmit}><span className="badge">Submit</span></button>
					</form>
				</div>
			<div className = "panel-footer">
				<button className = "btn btn-warning" name ="back" onClick = {this._redirect}><span className = "badge" name ="back">Back</span></button>
			<br />	
          <Refresh />	
          </div>
			</div>
		);
	}
});

var MyForm  =  React.createClass({
	getInitialState: function()
	{
		return{ verification: false, dt: {}}
	},
	_redirect: function( e ){
		e.preventDefault();
		e.stopPropagation();
		var TargetButton = e.target;
		if( $(TargetButton).attr('name') === 'back' ){
			ReactDOM.render(<StartPage />, document.getElementById('start'));
		}
	},
	_handleSubmit: function( e )
	{
		e.preventDefault();
		e.stopPropagation();
		if(this.state.dt.hasOwnProperty("fname") 
			&& this.state.dt.hasOwnProperty("surname")
			&& this.state.dt.hasOwnProperty("lname") 
			&& this.state.dt.hasOwnProperty("email") 
			&& this.state.dt.hasOwnProperty("username") 
			&& this.state.dt.hasOwnProperty("password") 
			&& this.state.dt.hasOwnProperty("re_password")
			&& this.state.dt.hasOwnProperty("phone_number"))
			{
				if(this.state.dt.password === this.state.dt.re_password)
				{
					ReactDOM.render(<StepTwo />, document.getElementById('start'));
				}
				else
				{
					window.alert("The passwords did not match, please try again");
				}
			}
			else{
				window.alert("The form has to be filled");
			}
	},
	verifier: function( e )
	{
		e.preventDefault();
		e.stopPropagation();
		var node = e.target, HTMLTag = $(node);
		if (HTMLTag.attr('type') == 'text' && typeof(HTMLTag.val()) == 'string' ){ 
			getData[HTMLTag.attr('name')] = HTMLTag.val();
			this.setState({dt: getData});
		}
		if(HTMLTag.attr('type') == 'email' && typeof(HTMLTag.val()) == 'string' ){
			getData[HTMLTag.attr('name')] = HTMLTag.val();
			this.setState({dt: getData});
		}
		if(HTMLTag.attr('type') == 'password' && typeof(HTMLTag.val()) == 'string' ){
			getData[HTMLTag.attr('name')] = HTMLTag.val();
			this.setState({dt: getData});
		}
		if(HTMLTag.attr('type') == 'number' && typeof(HTMLTag.val()) == 'string' ){
			getData[HTMLTag.attr('name')] = HTMLTag.val();
			this.setState({dt: getData});
		}
	},
	render: function() 
	{
		return (
			<div className = "panel panel-default">
			<div className = "panel-heading">
				<h4>Job Seeker Registration</h4>
			</div>
				<div className = "panel-body">
					<form className = "form">
						First name: <br/><input type = "text" name = "fname" onBlur = {this.verifier} required={true}/><br />
						Last name: <br/><input type = "text" name = "lname" onBlur = {this.verifier} required={true}/><br />
						Surname name: <br/><input type = "text" name = "surname" onBlur = {this.verifier} required={true}/><br />
						Email: <br/><input type = "email" name = "email" onBlur = {this.verifier} required={true}/><br />
						Username: <br/><input type = "text" name = "username" onBlur = {this.verifier} required={true}/><br />
						Password: <br/><input type = "password" name = "password" onBlur = {this.verifier} required={true}/><br />
						Re-enter Password: <br/><input type = "password" name = "re_password" onBlur = {this.verifier} required={true}/><br />
						Phone number: <br/><input type = "number" name = "phone_number" onBlur = {this.verifier} required={true}/><br /><br />
						<button className = "btn btn-default" onClick = {this._handleSubmit}><span className="badge">Submit</span></button>
					</form>
				</div>
			<div className = "panel-footer">
				<button className = "btn btn-warning" name ="back" onClick = {this._redirect}><span className = "badge" name ="back">Back</span></button>
			</div>
			</div>
		);
	}
});

ReactDOM.render(<StartPage />, document.getElementById('start'));

