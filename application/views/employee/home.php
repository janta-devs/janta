<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/jumbotron.css"> -->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
	<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div class="logo-home" ></div>
        </div>
         <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
       
        </div>
        </nav>
<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Looking for Work?</h1>
        <p class='jumbotron-text'>Join the #1 global workplace to get access to millions of gigs and job opportunities from thousands of employers near you.</p>
        <p><a class="btn btn-primary btn-lg" href="" role="button" id = "signup" data-toggle = "modal" data-target = "#register">Sign Up now &raquo;</a></p>
      </div>
    </div>
     
 <!--Creating the modal for registration-->
 <div class="modal" id = "register">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
      <h4>Register</h4>
      </div>

 			<div class="modal-body">
      <div class="alert alert-success" style="display: none;">Please fill all the fields</div>
 				<form class="form-inline" id="registration">
 					Username<br /><input type="text" name="username" placeholder="Username"  class="form-control"/><br />
 					Password<br /><input type="password" name="password" placeholder="Password"  class="form-control"/><br />
 					Re-enter password<br /><input type="password" name="re_password" placeholder="Reenter Password"  class="form-control"/><br />
          Email:<br /><input type="email" name="email" placeholder="Email"  class="form-control"/><br/> 
 			</div>
 			<div class="modal-footer">
 				<button class="btn btn-primary pull-right" id="register">Submit</button>
        <button class="btn btn-warning pull-left" data-dismiss = "modal">Close</button>
 				</form>
 			</div>

 		</div>
 	</div>
 </div>
 <!--End of Modal-->

</div>

</body>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/babel-core.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/registration.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/js/login.js"></script>
</html>
=======
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/jumbotron.css"> -->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
	<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div class="logo-home" ></div>
        </div>
         <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
       
        </div>
        </nav>
<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Looking for Work?</h1>
        <p class='jumbotron-text'>Join the #1 global workplace to get access to millions of gigs and job opportunities from thousands of employers near you.</p>
        <p><a class="btn btn-primary btn-lg" href="" role="button" id = "signup" data-toggle = "modal" data-target = "#register">Sign Up now &raquo;</a></p>
      </div>
    </div>
     
 <!--Creating the modal for registration-->
 <div class="modal" id = "register">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
      <h4>Register</h4>
      </div>

 			<div class="modal-body">
      <div class="alert alert-success" style="display: none;">Please fill all the fields</div>
 				<form class="form-inline" id="registration">
 					Username<br /><input type="text" name="username" placeholder="Username"  class="form-control"/><br />
 					Password<br /><input type="password" name="password" placeholder="Password"  class="form-control"/><br />
 					Re-enter password<br /><input type="password" name="re_password" placeholder="Reenter Password"  class="form-control"/><br />
          Email:<br /><input type="email" name="email" placeholder="Email"  class="form-control"/><br/> 
 			</div>
 			<div class="modal-footer">
 				<button class="btn btn-primary pull-right" id="register">Submit</button>
        <button class="btn btn-warning pull-left" data-dismiss = "modal">Close</button>
 				</form>
 			</div>

 		</div>
 	</div>
 </div>
 <!--End of Modal-->

</div>

</body>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/babel-core.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/registration.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/js/login.js"></script>
</html>
>>>>>>> origin/master
