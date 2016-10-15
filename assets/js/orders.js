$('html, body').scrollTop(0);
var dummiedata = [
{
	id: 1,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Mombasa',
	budget: '25,000',
},
{
	id: 2,
	title: 'GO Language HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nakuru',
	budget: '25,000',
},
{
	id: 3,
	title: 'C# HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nyeri',
	budget: '25,000',
},
{
	id: 4,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nanyuki',
	budget: '25,000',
},
{
	id: 5,
	title: 'PHP HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 6,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 7,
	title: 'Perl HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 8,
	title: 'Java HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 9,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 10,
	title: 'PHP HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
}, {
	id: 11,
	title: 'C++ HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 12,
	title: 'Perl HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 13,
	title: 'Java HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 14,
	title: 'Python HTTP Module',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000',
},
{
	id: 15,
	title: 'Multimedia Programming',
	description: 'Implementing HTTP module for c++ so as to ultimately create an API',
	start_date: '25/05/2017',
	location: 'Nairobi',
	budget: '25,000.',
}
].reverse();


var TableCell = React.createClass({
	render: function() {
		return (
					<tr id = {this.props.id}>
						<td>{this.props.id}</td>
						<td>{this.props.title}</td>
						<td>{this.props.description}</td>
						<td>{this.props.location}</td>
						<td>{this.props.budget}</td>
						<td>{this.props.start_date}</td>
						<td>DEFAULT</td>
						<td><span className = "chat glyphicon glyphicon-envelope"></span></td>
						<td>*</td>
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
		<TableCell id = { x.id } title = {x.title} description = {x.description} start_date = {x.start_date} 
		budget = {x.budget} location = {x.location}/>);
		return(
			<table className = "mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
				<thead className = "mdl-data-table__cell--non-numeric">
					<tr>
						<td>Job ID</td>
						<td>Title</td>
						<td>Description</td>
						<td>Location</td>
						<td>Budget (Ksh.)</td>
						<td>Start Date</td>
						<td>Bid</td>
						<td>Chat</td>
						<td>Rec.</td>
						<td>Discard</td>
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
							<td>&copy; 2016</td>
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

ReactDOM.render(<OrderPage />, document.getElementById('customer_form'));


