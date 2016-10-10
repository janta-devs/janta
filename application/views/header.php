<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!--<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">-->
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/all.css">
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
  <link href = "<?php print base_url();?>assets/bower_components/bootstrap/dist/css/fileinput.css"rel="stylesheet" media="all" text="text/css" /> 
  <link href = "<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrapValidator.min.css"rel="stylesheet" media="all" text="text/css" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/jumbotron.css"> -->
  <!--<script type="text/javascript">
  $(document).ready(function()
  {
    $("#navbar input:first").focus();
  });
  </script>-->
 
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<?php
            $arr = $this->session->flashdata(); 
            if(!empty($arr['flash_message'])){
                $html = '<div class="bg-warning container flash-message">';
                $html .= $arr['flash_message']; 
                $html .= '</div>';
                echo $html;
            }
        ?>
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