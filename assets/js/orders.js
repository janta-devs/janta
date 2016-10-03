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
	id: 1,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '9 Hours',
},
{
	id: 2,
	title: 'Perl HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '9 Hours',
},
{
	id: 3,
	title: 'Java HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '2 Hours',
},
{
	id: 4,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '16 Hours',
},
{
	id: 5,
	title: 'PHP HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '15 Hours',
}, {
	id: 1,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '24 Hours',
},
{
	id: 2,
	title: 'Perl HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '7 Hours',
},
{
	id: 3,
	title: 'Java HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '6 Hours',
},
{
	id: 4,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '24 Hours',
},
{
	id: 5,
	title: 'Multimedia Programming',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	duration: '11 Hours',
}
].reverse();


var TableCell = React.createClass({
	render: function() {
		return (
					<tr id = {this.props.id}>
						<td>{this.props.count}</td>
						<td>{this.props.title}</td>
						<td>{this.props.description}</td>
						<td>{this.props.duration}</td>
						<td>DEFAULT</td>
						<td>MESSAGE</td>
						<td><button className = "btn btn-danger">Discard</button></td>
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
	componentWillMount: function(){
		this.loadData();
	},
	render: function(){
		
		var populate = this.state.data.map( x => 
		<TableCell count = { 1 } title = {x.title} description = {x.description} duration = {x.duration} />);
		

		// var a = 0;
		// var populate = this.state.data.map(function( x ) {
		// 	a = a+=1;
		// 	return(
		// 		<TableCell count = { a } title = {x.title} description = {x.description} duration = {x.duration} />
		// 	)
		// });


		return(
			<table className = "table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<td>Job ID</td>
						<td>Title</td>
						<td>Description</td>
						<td>Job Duration</td>
						<td>Bid/Show Interest</td>
						<td>Message Client</td>
						<td>Delete</td>
					</tr>
				</thead>
				<tbody>
					{populate}
				</tbody>
				<tfoot>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
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

  orders.on('click', function( event ){
    event.preventDefault();
    event.stopPropagation();

    ReactDOM.render(<OrderPage />, document.getElementById('customer_form'));
  });

