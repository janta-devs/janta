<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
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
        <!--Login form starts-->
         <div id="navbar" class="navbar-collapse collapse">
         <?php $fattr = array('class' => 'navbar-form navbar-right');
                echo form_open(site_url().'/home/login', $fattr);
         ?>
           <div class="row">
            <div id="email" class="form-group">
            <?php echo form_input(array(
                'name' => 'email',
                'id' => 'email',
                'placeholder' => 'Email',
                'class' => 'form-control',
                'value' => set_value('email')
            ));?>
            <?php echo form_error('email') ?>
            </div>
           <!-- -->
            <div class="form-group">
            <?php echo form_password(array(
                'name' => 'password',
                'id' => 'password',
                'placeholder' => 'Password',
                'class' => 'form-control',
                'value' => set_value('password')
            ));?>
            <?php echo form_error('password') ?>
            </div>
            <?php echo form_submit(array(
                'value' => 'Log In',
                'class' => 'btn btn-success',
            )); ?>
            </div>
            <div class="row">
              <!--<div class="form-group"><p><a href="<?php echo site_url();?>/home/register" style="color: #9cb4d8;">No account?Sign Up</a></p></div>-->
              <div class="form-group"><p><a href="<?php echo site_url();?>/home/forgot" style="color: #9cb4d8;">Forgot your password?</a></p></div>
            </div>
            <?php echo form_close(); ?>
            <div class=row>
            </div>
        </div><!--End of login form--><!--/.navbar-collapse -->
       
        </div>
        </nav>
<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
    <div class="homep"></div>
      <div class="container">
        <h1>Sign Up!</h1>
        <p class='jumbotron-text'>Join the #1 global workplace.</p>
       <!-- <p><a class="btn btn-primary btn-lg" href="" role="button" id = "signup" data-toggle = "modal" data-target = "#register">Sign Up now &raquo;</a></p>-->
       <div class="col-md-4">    
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open('/home/register/', $fattr); ?>
    <div class="form-group">
      <?php echo form_input(array('name'=>'email_add', 'id'=> 'email_add', 'placeholder'=>'Your Email Address', 'class'=>'form-control', 'value' => set_value('email_add'))); ?>
      <?php echo form_error('email_add');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'phone', 'id'=> 'phone', 'placeholder'=>'Mobile Phone', 'class'=>'form-control', 'value' => set_value('phone'))); ?>
      <?php echo form_error('phone');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'industry', 'id'=> 'industry', 'placeholder'=>'Industry or Sector', 'class'=>'form-control', 'value'=> set_value('industry'))); ?>
      <?php echo form_error('industry');?>
    </div>
    <div class="form-group">
      <?php echo form_input(array('name'=>'specialization', 'id'=> 'specialization', 'placeholder'=>'Specilization or Profession', 'class'=>'form-control', 'value'=> set_value('specialization'))); ?>
      <?php echo form_error('specialization');?>
    </div>
    <?php echo form_submit(array('value'=>'Sign up', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
    </div>
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
<!--<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/babel-core.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/registration.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/js/login.js"></script>-->
</html>
