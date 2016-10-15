var tabs  = $(document).find('body').find('div.container-fluid').children('section')
.find('div.container').find('div.row').children('div.board').find('ul#myTab').find('li');

var global_vals = {}, warning = $('div.warning');

var Btn = React.createClass({
	render: function() {
		return (
			<div>
				<button className = "mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent pull-right" onClick = {this.props.click}>Save and Continue</button>
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

		var node = this.getDOMNode();
	},
	drop: function( event )						// waiting for the drop event 
	{
		event.preventDefault();
		event.stopPropagation();
		var files = event.dataTransfer.files, formData = new FormData();	// capturing filess dropped
		$.each(files, function(key, value) {
			formData.append(key, value);		// making the form data captured to be uploadable to the php server
		});
		// this.send( formData );			// sending the encoded files and the DropZone node to the sending function

		console.log( files )
	},
	_handleClick: function( event )
	{
		event.preventDefault();
		event.stopPropagation();
		tabs.next('.doner').find('a[data-toggle="tab"]').click();
	},
	send: function( data ){
		var self = this;
		$.ajax({
			url: 'http://localhost/uchumi/index.php/admin/dragdrop',
			type: 'POST',
			dataType: 'json',
			data: data, 
			cache: false, 
			contentType: false, 
			processData: false,
		}).done( rs )
		{
			console.log( rs );
			// this.setState({ data: rs });	// setting the data captured from php to the data object
			// ReactDOM.render(<Frm data ={this.state.data}/>, document.getElementById('component'));	// rendering the form element
		};
	},
	render: function() {
		return (
			<div>
				<div draggable = "true"  className = "drag" id = "drag" onDragEnter ={this.dragenter}  onDragOver = {this.dragover} onDrop = {this.drop}>
					<div className = "textArea">Drop Picture(s) Here!!</div>
				</div>
				<Btn click = {this._handleClick}/>
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

ReactDOM.render(<MainCompo />, document.getElementById('component'));
