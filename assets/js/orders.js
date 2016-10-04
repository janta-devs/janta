var dummiedata = [
{
	id: 1,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '24 Hours',
},
{
	id: 2,
	title: 'GO Language HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '12 Hours',
},
{
	id: 3,
	title: 'C# HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '3 Hours',
},
{
	id: 4,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '4 Hours',
},
{
	id: 5,
	title: 'PHP HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '7 Hours',
},
{
	id: 6,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '9 Hours',
},
{
	id: 7,
	title: 'Perl HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '9 Hours',
},
{
	id: 8,
	title: 'Java HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '2 Hours',
},
{
	id: 9,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '16 Hours',
},
{
	id: 10,
	title: 'PHP HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '15 Hours',
}, {
	id: 11,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '24 Hours',
},
{
	id: 12,
	title: 'Perl HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '7 Hours',
},
{
	id: 13,
	title: 'Java HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '6 Hours',
},
{
	id: 14,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '24 Hours',
},
{
	id: 15,
	title: 'Multimedia Programming',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '11 Hours',
}
].reverse();


var TableCell = React.createClass({
	render: function() {
		return (
					<tr id = {this.props.id}>
						<td>{this.props.id}</td>
						<td>{this.props.title}</td>
						<td>{this.props.description}</td>
						<td>{this.props.duration}</td>
						<td>DEFAULT</td>
						<td><span className = "chat glyphicon glyphicon-envelope"></span></td>
						<td><button className = "btn btn-default"><span className = "glyphicon glyphicon-trash"></span></button></td>
					</tr>
		);
	}
});
var TableCreator = React.createClass({
	getInitialState: function(){
		return { data: [] }
	},
	loadData: function(){
		this.setState({data: dummiedata});
	},
	_delete: function( event ){
		//popping out the data section in incoming data
	},
	componentWillMount: function(){
		this.loadData();
	},
	render: function(){
		var populate = this.state.data.map( x => 
		<TableCell id = { x.id } title = {x.title} description = {x.description} duration = {x.duration} />);
		return(
			<table className = "table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<td>Job ID</td>
						<td>Title</td>
						<td>Description</td>
						<td>Job Duration</td>
						<td>Bid/Show Interest</td>
						<td>Chat</td>
						<td>Delete</td>
					</tr>
				</thead>
				<tbody>
					{populate}
				</tbody>
				<tfoot>
						<tr>
							<td>_</td>
							<td>_</td>
							<td>_</td>
							<td>_</td>
							<td>_</td>
							<td>_</td>
							<td>_</td>
						</tr>
				</tfoot>

			</table>
		)	
	}
});

var OrderPage = React.createClass({
	render: function() {
		return (
			<div>
				<TableCreator />
			</div>
		);
	}
});

//This is the area where we listen if the client has clicked on the orders__available tab so as to load the requisite page


var orders = $('a#orders-tab');

orders.on('click', function( event )
{
	event.preventDefault();
	event.stopPropagation();
	ReactDOM.render(<OrderPage />, document.getElementById('customer_form'));
});

