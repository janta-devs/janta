
document.body.scrollTop = document.documentElement.scrollTop = 0;
$(window).scrollTop(0);

var PreferenceForm = React.createClass({
render: function() {
	return (
		<div className = "mdl-layout__content">
			<div className = "mdl-grid">
			<form className = "form">
				<h5>Your Interests</h5>
				   <table>
				   <tr className = "mdl-cell mdl-cell--12-col">Design</tr>
				      <tr className = "mdl-cell mdl-cell--12-col">
					      <td> 
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox1">
					            <input type="checkbox" id="checkbox1" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Building design</span>
					         </label>
						  </td>
					      <td>
					         <label className="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox2">
					            <input type="checkbox" id="checkbox2" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Interior Design</span>
					         </label>	  
						  </td>
					       <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Graphic Design</span>
					         </label>   
						   </td>
						    <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Product Design</span>
					         </label>   
						   </td>
				      </tr>

				      <tr className = "mdl-cell mdl-cell--12-col">Technology</tr>
				      <tr className = "mdl-cell mdl-cell--12-col">
					      <td> 
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox1">
					            <input type="checkbox" id="checkbox1" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Computer Science</span>
					         </label>
						  </td>
					      <td>
					         <label className="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox2">
					            <input type="checkbox" id="checkbox2" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Programming</span>
					         </label>	  
						  </td>
					       <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Artificial Intelligence </span>
					         </label>   
						   </td>
						    <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Aero Dynamics</span>
					         </label>   
						   </td>
				      </tr>

				     <tr className = "mdl-cell mdl-cell--12-col">Arts</tr>
				      <tr className = "mdl-cell mdl-cell--12-col">
					      <td> 
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox1">
					            <input type="checkbox" id="checkbox1" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Painting</span>
					         </label>
						  </td>
					      <td>
					         <label className="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox2">
					            <input type="checkbox" id="checkbox2" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Mural Painting</span>
					         </label>	  
						  </td>
					       <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Mise En Scène</span>
					         </label>   
						   </td>
						    <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Product Design</span>
					         </label>   
						   </td>
				      </tr>

				      <tr className = "mdl-cell mdl-cell--12-col">Technology</tr>
				      <tr className = "mdl-cell mdl-cell--12-col">
					      <td> 
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox1">
					            <input type="checkbox" id="checkbox1" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Computer Science</span>
					         </label>
						  </td>
					      <td>
					         <label className="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox2">
					            <input type="checkbox" id="checkbox2" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Programming</span>
					         </label>	  
						  </td>
					       <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Artificial Intelligence </span>
					         </label>   
						   </td>
						    <td>
					         <label className="mdl-checkbox mdl-js-checkbox" for="checkbox3">
					            <input type="checkbox" id="checkbox3" className="mdl-checkbox__input"/>
					            <span className="mdl-checkbox__label">Aero Dynamics</span>
					         </label>   
						   </td>
				      </tr>

				   </table>


				  <div className="mdl-textfield mdl-js-textfield">
		               <input className="mdl-textfield__input" type="text" id="text1"/>
		               <label className="mdl-textfield__label">Area of interest</label>
		          </div><br />
		          <h5>Prefered Method of Payment</h5>
	               <label className="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox2">
			            <input type="checkbox" id="checkbox2" className="mdl-checkbox__input" name = "mpesa"/>
			            <span className="mdl-checkbox__label">MPesa</span>
			        </label>
			          <label className="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox2">
			            <input type="checkbox" id="checkbox2" className="mdl-checkbox__input" name = "paypal"/>
			            <span className="mdl-checkbox__label">PayPal</span>
			        </label>
			          <label className="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox2">
			            <input type="checkbox" id="checkbox2" className="mdl-checkbox__input" name = "bank_transfer"/>
			            <span className="mdl-checkbox__label">Bank Transfer</span>
			        </label>


			     <button className="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect pull-right" onClick = {this.props.clk}>Save and Continue</button>
			</form>
			</div>
		</div>
	);
}
});
var Preference = React.createClass({
	getInitialState: function(){
		return {}
	},
	_clickHandler: function( event ){
		event.preventDefault();
		event.stopPropagation();


		var node = event.target, $node = $( node );
		console.log( $node.parent().parent().serialize() );
	},
	render: function() {
		return (
			<div>
			         <PreferenceForm clk = {this._clickHandler}/>       
			</div>
			);
	}
});

ReactDOM.render(<Preference />, document.getElementById('preferences'));