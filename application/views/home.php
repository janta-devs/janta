<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/jumbotron.css">
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
        <p>Join the #1 global workplace to get access to millions of gigs and job opportunities from thousands of employers near you.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Sign Up now &raquo;</a></p>
      </div>
    </div>
	<!-- <div id="start" class="col-md-12 pull-right"></div> -->

	<div id="start" class="col-md-12 pull-right"></div> 

</div>

</body>

<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://unpkg.com/babel-core@5.8.38/browser.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type = "text/babel" src = "janta/assets/js/registration.js"></script>
</html>
