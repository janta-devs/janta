/** @jsx React.DOM */
var global_vals = {}, warning = $('div.warning');
FrmField = React.createClass({
	blurHandler: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var field = event.target, $field = $( field ), content = $field.val(), typ = $field.attr('type'), validation = false;
		if( content === "" || content ==='undefined' || content ===" " || content.length < 2 ){
			validation = false;
		}else if( typ ==='text' && content.length >= 3 && validation == false ){
			validation = true;
			( validation === true ) ? global_vals['name'] = content : "";
		}else if( typ === 'number' && parseInt( content ) !== NaN && validation == false ){
			validation = true;
			( validation === true ) ? global_vals['price'] = content : "";
		}else{
			validation = false;
		}
		( validation === true ) ? $field.css('border','1px solid green') : $field.css('border','1px solid red');
	},
	render: function() {
		return (
			<input type = {this.props.type} name = {this.props.name} placeholder = {this.props.placeholder} onBlur = {this.blurHandler} required/>
		);
	}
});
FrmElement = React.createClass({							// form element 
	getInitialState: function(){
		return {count: 30, len: 30}
	},
	handleClick: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var node =  this.getDOMNode(), $node = $( node ), data = $node.serialize();		// getting the form element
		if( global_vals.hasOwnProperty('name') && global_vals.hasOwnProperty('price') && global_vals.hasOwnProperty('desc')){
			global_data['form_data'] = global_vals;
			if( global_data['database'] !== '' || global_data['database'] !== 'undefined'){
				this.sendFormData( data+'&class='+global_data['database'].toUpperCase() );
				// console.log( data+'&database='+global_data['database'] );
			}
			global_vals = {};															// making global_vals empty for re-use
			$node.hide();																// hides the form after clicking action
		}else{
			$(warning).show().text('Select the database to send the data');
		}																				
	},
	handleFocus: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var node =  event.target , $node = $( node );
		if( $node.attr('name') === 'pdt_path'){
			$node.attr('disabled', 'disabled');
		}
	},
	focusoutHandler: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var node =  event.target , $node = $( node );
		if( $node.attr('name') === 'pdt_path'){
			$node.attr('disabled', false);
		}
	},
	keydownhandler: function( event ){
		event.preventDefault();
		event.stopPropagation();
		var node = event.target, $node = $( node ), self = this;
		$node.on('keydown', function( event ){
			var desc = $(this).val(), diff = 0, diff = ( 29 - desc.length);
			( desc.length > self.state.count ) ? $(this).css('border','1px solid red') : $(this).css({'border':'1px #cccccc', 'boxShadow':'inset 0 1px 1px rgba(0, 0, 0, 0.075)'});
			self.setState({ len: diff});
			if( event.keyCode === 8 ){
				--desc.length;
				++diff;
				self.setState({ len: diff});
			}
		}).bind('focusout', function( event ){
			event.preventDefault();
			event.stopPropagation();
			var value = $( this ).val();
			if( value !== " " && value !=="undefined" && value !== "" && value.length < self.state.count){
				global_vals['desc'] = value;
			}	
		});
	},
	sendFormData: function( data ){
		return $.ajax({
			url: 'http://localhost/uchumi/index.php/admin/sendToDb',
			type: 'POST',
			// dataType: 'json',
			data: data,
			success: function( rs ){
				console.log( rs );
			}
		});
	},
	render: function(){
		return(
			<form>
				<img src = {this.props.path} height = "80" width = "70" />&nbsp;&nbsp;
					Path:&nbsp;&nbsp;<input type = "text" name = "pic_path" defaultValue={this.props.path} onFocus={this.handleFocus} onBlur={this.focusoutHandler}/>&nbsp;&nbsp;
					Product Name:&nbsp;&nbsp;<FrmField type = "text" name = "product_name" placeholder = "Product name" />&nbsp;&nbsp;
					Product Price:&nbsp;&nbsp;<FrmField type = "number" name = "product_price" placeholder = "Product price" />&nbsp;&nbsp;
					Desc:&nbsp;&nbsp;<input type = "text" name = "description" placeholder = "Description" onFocus = {this.keydownhandler} />&nbsp;&nbsp;
					<span>{this.state.len}</span>&nbsp;
				<input type = "submit" value = "Add to Db" className = "btn btn-success" onClick = {this.handleClick}/><hr/>
			</form>
		);
	}
});
var Frm = React.createClass({
	getInitialState: function(){
		return { data: []}
	},
	componentDidMount: function(){
		this.setState({ data: this.props.data});
	},
	render: function() {
		var count = Object.keys( this.props.data ).length;			// count number of elements in a json object
		if( count > 1 ){
			var formMaker = this.state.data.map( function( info ){						// it iterates through the array provided making a form at @instance
				return (
						<FrmElement path = {info.path}/> 
					);
			});
		}else{
			var formMaker = $.map( this.state.data, function(item, index) {
				return(
						<FrmElement path = {item}/> 
					);
			});
		}
		return(
			<div>
				<fieldset><legend>Add Products to Database</legend></fieldset>
				{formMaker}															
			</div>
		);
	}
});

var DropZone = React.createClass({
	getInitialState: function(){
		return{ data: ''}
	},
	dragenter: function( event )				// waiting for the drag event to start
	{
		event.preventDefault();
		event.stopPropagation();
	},
	dragover: function( event )					// waiting for the files to be over the DropZone
	{
		event.preventDefault();
		event.stopPropagation();
	},
	drop: function( event )						// waiting for the drop event 
	{
		event.preventDefault();
		event.stopPropagation();
		var files = event.dataTransfer.files, formData = new FormData();	// capturing filess dropped
		$.each(files, function(key, value) {
			formData.append(key, value);		// making the form data captured to be uploadable to the php server
		});
		this.send( formData );			// sending the encoded files and the DropZone node to the sending function
	},
	send: function( data ){
		$.ajax({
			url: 'http://localhost/uchumi/index.php/admin/dragdrop',
			type: 'POST',
			dataType: 'json',
			data: data, cache: false, contentType: false, processData: false,
			success: function( rs ){
				this.setState({ data: rs });	// setting the data captured from php to the data object
				React.renderComponent(<Frm data ={this.state.data}/>, document.getElementById('component'));	// rendering the form element
			}.bind( this )
		});
	},
	render: function() {
		return (
			<div draggable = "true"  className = "drag" id = "drag" onDragEnter ={this.dragenter}  onDragOver = {this.dragover} onDrop = {this.drop}>
				<div className = "textArea">Drop Picture(s) Here!!</div>
			</div>
		);
	}
});
var MainCompo = React.createClass({
	render: function() {
		return (
			<DropZone />
		);
	}
});

React.renderComponent(<MainCompo />, document.getElementById('component'));
