<!DOCTYPE html>
<html>
<head>
  <title>Personal Details</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.css">
   <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/node_modules/bootstrap-material-design/dist/css/ripples.css">
   <!--Material design-->
   <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/node_modules/material-design-lite/material.css">

<style type="text/css">
.demo-card-wide.mdl-card {
  width: 512px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('/janta/assets/pics/welcome.jpg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
  
}
.mdl-card__supporting-text{
  font-weight: 20px;
}
</style>
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


<!-- Making rounded tabs-->


<section style="background:#efefe9;" style="top: 30%; position: relative;">
        <div class="container cols-lg-12">
            <div class="row">
                <div class="board">

                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    

                     <li class="active">
                         <a href="#home" data-toggle="tab" arial-controls="step1" title="User Profile">
                          <span class="round-tabs one">
                                  <i class="glyphicon glyphicon-user"></i>
                          </span> 
                        </a>
                    </li>

                    <li>
                      <a href="#profile" data-toggle="tab" arial-controls="step2" title="Personal Information">
                         <span class="round-tabs two">
                             <i class="glyphicon glyphicon-home"></i>
                         </span> 
                      </a>
                   </li>

                   <li class = "messages">
                      <a href="#messages" data-toggle="tab" arial-controls="step3" title="Settings">
                         <span class="round-tabs three">
                              <i class="glyphicon glyphicon-asterisk"></i>
                         </span>
                      </a>
                    </li>

                     <li class='documents'>
                       <a href="#settings" data-toggle="tab" arial-controls="step4" title="Documents upload">
                           <span class="round-tabs four">
                                <i class="glyphicon glyphicon-book"></i>
                           </span> 
                       </a>
                     </li>

                     <li class = "doner">
                        <a href="#doner" data-toggle="tab" title="completed">
                           <span class="round-tabs five">
                                <i class="glyphicon glyphicon-ok"></i>
                           </span>
                        </a>
                     </li>
                     
                     </ul>

                     </div>
  <!--Tab Content-->
                       <div class="tab-content">

                        <div class="tab-pane fade in active" id="home">
                              <div id="choice"></div>   
                        </div>

                        <div class="tab-pane fade" id="profile">
                          <div id="form"></div>                             
                        </div>

                        <div class="tab-pane fade" id="messages">
                            <div id="preferences"></div>
                        </div>

                        <div class="tab-pane fade" id="settings">
                              <div id="component" style ="height: 500px;"></div>
                        </div>


                        <div class="tab-pane fade" id="doner">
                            <div id="doner" style ="height: 500px;">
                              <?php
                                $sess = $this->session->userdata();
                                $data = $sess['userInfo'];
                              ?>
                              <!--Start of MDL card-->
                              <center>
                                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                                      <div class="mdl-card__title">
                                        <h2 class="mdl-card__title-text">Welcome, <?php print $data->first_name?></h2>
                                      </div>
                                      <div class="mdl-card__supporting-text">
                                        Registration successful, please get started.
                                      </div>
                                      <div class="mdl-card__actions mdl-card--border">
                                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect start">
                                          Get Started
                                        </a>
                                      </div>
                                      <div class="mdl-card__menu">
                                        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                          <i class="material-icons">share</i>
                                        </button>
                                      </div>
                                    </div>
                              </center>
                          <!--End of MDL card-->
                            </div>
                        </div>

                  <div class="clearfix"></div>
                  </div>
  <!--End of Tab Content-->
</div>
</div>
</div>
</section>

<!-- End of rounded Tabs-->
 
</div>
<!-- end of container -->
</body>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/babel-core.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/node_modules/bootstrap-material-design/dist/js/ripples.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/node_modules/bootstrap-material-design/dist/js/material.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/node_modules/material-design-lite/material.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/profile_info_form.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/choice_page.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/preferences.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/drag_drop.js"></script>

<script type="text/javascript">
$(function()
{
  $('a[title]').tooltip();
});

$('a.start').on('click', function( event ){
  event.preventDefault();
  event.stopPropagation();
  location.href = "/janta/index.php/Employee_registration/profile";
});


</script>
</html>