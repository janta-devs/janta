<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap-theme.min.css">
</head>
<body>

<div class="container-fluid">
	<header class="jumbotron">
		<h1 style="font-style: cursive;">Janta</h1>
	</header>
	<div id="start" class="col-md-12 pull-right"></div>
  <button class = "btn btn-primary">Click Me</button>
</div>

</body>

<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://unpkg.com/babel-core@5.8.38/browser.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/registration.js"></script>
  
  <script>
	(function($, document, window, undefined){
      
      var btn = $('.btn');
      btn.on('click', function( event ){
       	alert('Clicked');
      });
    })(jQuery, document, window);
  </script>
</html>