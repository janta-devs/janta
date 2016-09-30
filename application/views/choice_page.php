<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
</head>
<body>
<!--nav bar -->
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
          
        </div><!--/.navbar-collapse -->
       
        </div>
        </nav>
<!-- End of nav bar -->

<!--container -->
<div class="container-fluid">
   <div id="status" class="col-md-12 alert alert-warning" style="position: relative; padding-top: 4.5%;"><center>Please fill in the required fields</center></div> 
  <div id="choice" class="col-md-12 pull-right" style="position: relative; padding-top: .2%"></div> 
</div>
<!-- end of container -->
</body>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/babel-core.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/choice_page.js"></script>
</html>