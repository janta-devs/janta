<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/all.css">
  <link href = "<?php print base_url();?>assets/bower_components/bootstrap/dist/css/fileinput.css"rel="stylesheet" media="all" text="text/css" /> 
  <link href = "<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrapValidator.min.css"rel="stylesheet" media="all" text="text/css" />   
</head>
<body>
<?php
            $arr = $this->session->flashdata(); 
            if(!empty($arr['flash_message'])){
                $html = '<div class="bg-warning container flash-message">';
                $html .= $arr['flash_message']; 
                $html .= '</div>';
                echo $html;
            }
        ?>
<!--<div class="modal fade hidden-print" id="myModal" tabindex="-1" role="dialog" aria-hidden="true"></div>
  <div class="modal fade hidden-print" id="myModalDisableClose" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static"></div>-->
  
  <!--<div class="wrapper ">-->
   <!-- <div tabindex="0" style="overflow: hidden;" class="left-bar">-->
      
        <!-- logo-holder -->
              
      <!--</div>-->
      <!-- admin-logo -->
  <!-- beginning of side-bar menu -->
  <!--<ul class="list-unstyled menu-parent" id="mainMenu">
      
        
        <li class="active">
          <a marked="1" tabindex="-1" href="../home" class="waves-effect waves-light">
            <i class="icon ti-user"></i>
            <span class="text">Personal Details</span>
          </a></li>
                  <li>
            <a marked="1" tabindex="-1" href="#" class="waves-effect waves-light">
              <i class="icon ti-agenda"></i>
              <span class="text">My Jobs</span>
            </a>
          </li>
                  <li>
            <a marked="1" tabindex="-1" href="#" class="waves-effect waves-light">
              <i class="icon ti-harddrive"></i>
              <span class="text">Employees</span>
            </a>
          </li>
                  <li>
            <a marked="1" tabindex="-1" href="#" class="waves-effect waves-light">
              <i class="icon ti-wallet"></i>
              <span class="text">My Payments</span>
            </a>
          </li>
                  <li>
            <a marked="1" tabindex="-1" href="#" class="waves-effect waves-light">
              <i class="icon ti-settings"></i>
              <span class="text">Settings</span>
            </a>
          </li>
                  <li>
            <a marked="1" tabindex="-1" href="#" class="waves-effect waves-light">
              <i class="icon ti-email"></i>
              <span class="text">Notifications</span>
            </a>
          </li>
                
                <li>
          <a marked="1" href="#" tabindex="-1"><i class="icon ti-power-off"></i><span class="text">Logout</span></a>
                </li>
      </ul>-->
      <!-- End of Side bar menu -->
      <!--</div>-->
      <div class="content"></div>
    <div class="overlay hidden-print"></div>      
      <!--<div class="top-bar hidden-print"> -->       
        <nav class="navbar navbar-default top-bar" style="position: fixed;">
        <div class="admin-logo" style="">
        <div class="logo-holder pull-left" style="margin-left: 120px;">
          <img src="<?php print base_url();?>assets/bower_components/bootstrap/dist/images/logo2.png" class="hidden-print logo" id="header-logo" alt="">        </div>
        </div>
        	
        </nav>
          <!--<div class="menu-bar-mobile" id="open-left"><i class="ti-menu"></i></div></div>-->
          <!--<div class="nav navbar-nav top-elements navbar-breadcrumb hidden-xs">
             <a marked="1" tabindex="-1" href="/home">Profile</a><a marked="1" tabindex="-1" href="#">Employer</a><a marked="1" tabindex="-1" class="current" href="#">Edit Profile</a>         </div> --> 
            <!-- <ul class="nav navbar-nav navbar-right top-elements">                              
                                          
            <li class="dropdown">
              <a marked="1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="ion-ios-bell-outline  icon-notification"></i><span class="badge info-number count " id="unread_message_count">0</span></a>
                <ul style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;" class="dropdown-menu animated fadeInUp wow message_drop neat_drop animated" data-wow-duration="1500ms" role="menu">
                                 <li class="bottom-links">
                    <a marked="1" href="#" class="last_info">View all Interests</a>
                  </li> 
                                  <li class="bottom-links">
                    <a marked="1" href="#" class="last_info">View all messages</a>
                  </li>
                                    
                  
                    <li class="bottom-links">
                      <a marked="1" href="#" class="last_info">View Sent Messages</a>
                    </li>
                  
                    <li class="bottom-links">
                      <a marked="1" href="#" class="last_info">Send Message</a>
                    </li>
                                  </ul>
            </li>
                                  <li class="dropdown">
              <a marked="1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Post a Job <span class="drop-icon"></span></a>
                
              </li> 

            
            <li class="dropdown">
              <a marked="1" tabindex="-1" href="#" class="dropdown-toggle avatar_width" data-toggle="dropdown" role="button" aria-expanded="false"><span class="avatar-holder">

              <img src="<?php print base_url();?>assets/bower_components/bootstrap/dist/images/avatar-default.jpg" alt=""></span>

              <span class="avatar_info hidden-sm">Dante Dexter</span></a>
              <ul style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;" class="dropdown-menu user-dropdown animated fadeInUp wow avatar_drop neat_drop animated" data-wow-duration="1500ms" role="menu">
                                
                  <li><a marked="1" href="#" tabindex="-1"><i class="ion-android-settings"></i><span class="text">Settings</span></a></li>
                                
                                <li>
                  <a marked="1" tabindex="-1" id="switch_user" href="#" data-toggle="modal" data-target="#myModalDisableClose"><i class="ion-ios-toggle-outline"></i><span class="text">Switch Account</span></a>
                </li>
                <li>
                  <a marked="1" tabindex="-1" title="" href="#" data-toggle="modal" data-target="#myModal"><i class="ion-edit"></i><span class="text">Edit profile</span></a>
                </li>
                                      <li>
                  <a marked="1" href="#" tabindex="-1"><i class="ion-android-calendar"></i>Calender</a>                 </li>
                                
                <li>
                <a marked="1" href="#" class="logout_button" tabindex="-1"><i class="ion-power"></i><span class="text">Logout</span></a>                </li>     
              </ul>
            </li>             
          </ul>-->
        </nav>
      </div>
      <!-- top-bar -->
      <div class="main-content">

<div class="row" id="form">
  <div class="spinner" id="grid-loader" style="display:none">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
  </div>
        <div style="margin-top: 60px;" id="user_choice1">
        <div class="col-md-4 col-md-offset-4" style="background-color: #ffffff;">
        <h2 style="text-align: center;;">You Are Almost Done!</h2>
    <h5>Hello<!--<span><?php echo $email; ?></span>-->. Your username is <span><?php echo $email;?></span></h5>
    <p style="text-align: center;"><small >Please complete your profile to begin using the site.</small></p>
    <div id="choice">
    	<form class="form-choice">
    	<div class="form-group">
    		<input type="button" value="Continue as Job Seeker" id="choice_employee" name="employee" class="bt btn-lg btn-success btn-block">
    	</div>
    	<p><h4 style="background-color: #fff">OR</h4></p>
    	<div class="form-group">
    		<input type="button" value="Continue as an Employer" id="choice_employer" name="employer" class="bt btn-lg btn-primary-employer btn-block">
    	</div>
    		
    	</form>
    </div>
    </div>
    </div>
    <div class="col-md-12">
      <div class="panel panel-piluku" style="display: none;" id="employerstep_2" >
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="ion-edit">
              
            </i>
            Registration - Step 2
            <small>(Fields in red are required)</small>
          </h3>
        </div>
        <div class="panel-body">
        <div class="form-group override-taxes-container">
        <ul id="error_message_box"></ul>
          
          <label class="required col-sm-3 col-md-3 col-lg-2 control-label wide">Choose type :</label>
          <div class="col-sm-9 col-md-9 col-lg-10">
            <select name="employer_type" id="employer_type" class="form-control">
              <option>(Choose type)</option>
              <option value="individual">Individual</option>
              <option value="corporate">Corporate</option>
            </select>
          </div>
        </div>
        </div>
        </div>
        <!--end the employer type choice drwopdown div-->
  <!-- beginning of the form for corporate employer type -->
 <div style="margin-top: 0px;">
        <div class="col-md-10 col-md-offset-1" style="background-color: #ffffff;">
 <section style="display: none" id="employer_corporate">
  <div class="wizard">
    <div class="wizard-inner">
      <div class="connecting-line"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#step1" data-toggle="tab" arial-controls="step1" role="tab" title="Personal Details">
              <span class="round-tab">
                <i class="glyphicon glyphicon-user"></i>
              </span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Location Details">
              <span class="round-tab">
                <i class=" glyphicon glyphicon-map-marker"></i>
              </span>
            </a>
          </li>  
          <li role="presentation" class="disabled">
              <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Interests">
                 <span class="round-tab">
                     <i class="glyphicon glyphicon-education"></i>
                 </span>
              </a>
          </li>
           <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
        </div>
 <?php 
  $user_info;
  echo form_open ('employers/save', array('id'=>'employer_form_corporate', 'class'=>'form-horizontal','novalidate'=>'novalidate','enctype'=>'multipart/form-data','accept-charset'=>'utf-8'));
  ?>
        <div class="tab-content">
          <div class="tab-pane active" role="tabpanel" id="step1">
            <div class="panel-body">
            <div class="step1">
              <div class="row">
                <div class="col-md-6">
                  <label class="required">
                    Registering as :
                  </label>
                    <select name="employer_type" disabled="disabled" id="employer_type" class="form-control">
                      <option value="individual">Corporate</option>
                    </select>
                </div>
                <div class="col-md-6">                
                  <label class="required" for="company_name">Company Name:
                  </label>
                    <input id="company_name" name="company_name" class="form-control">
                </div>
              </div>  
              <div class="row">
                <div class="col-md-6">
                  <label class="required" for="phone_number">
                  Mobile Number :
                  </label>
                    <input id="phone_number" type="text" name="phone_number" class="form-control" value="">
                </div>
                <div class="col-md-6">
                  <label class="required" for="username">
                    Username :
                  </label>
                  <input type="tex" name="username" id="username" class="form-control" value="">
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="required" for="password">
                      Password :
                    </label>
                    <input type="password" name="password" id="password" class="form-control" value="">
                  </div>                  
                  <div class="col-md-6">
                    <label class="required" for="confirm_password">
                      Confirm Password :
                    </label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="">
                  </div>                  
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label for="email" class="required">Email :</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                  <div class="col-md-6">
                    <label for="confrim_email" class="required">Confirm Email :</label>
                    <input type="confirm_email" name="confirm_email" class="form-control" id="confirm_email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="logo">Upload Logo :</label>
                    <input id="input-21" type="file" accept="image/*" class="file-loading"> 
                 </div>        
                </div>
                  
                </div>
                <ul class="list-inline pull-right">
                  <li><button type="button" class="btn btn-primary next-step">Save and continue</button>
                  </li>
                </ul>
                </div>
                </div>

                <!--                
                
                <div class="form-actions pull-right">
                  <button id="cancel" class="submit_button btn btn-danger" name="cancel" type="button" value="true">Cancel</button>
                  <input id="submitf" class="submit_button btn btn-primary" type="submit" name="submitf" value="Submit">
                </div>-->
                <div class="tab-pane" role="tabpanel" id="step2">
                  <div class="panel-body">
                  <div class="step2">
                      <div class="row">
                      <div class="col-md-6">
                    <label class="required" for="country">Country :
                    </label>
                    <input id="country" type="text" value="" name="country" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-4 col-xs-4 wdth">
                      <label class="" for="country">County/Province :
                    </label>
                    <Select id="county" type="text" value="" name="county" class="form-control dropselectsec1">
                            <option value="">(Choose County)</option>
                            <option value="2">Mombasa</option>
                            <option value="1">Nairobi</option>
                            <option value="4">Kisumu</option>
                            <option value="5">Nakuru</option>
                            <option value="6">Kakamega</option>
                            <option value="3">Machakos</option>
                            <option value="7">Kiambu</option>
                            <option value="8">Siaya</option>
                            <option value="9">Nyeri</option>
                    </Select>
                    </div>
                    
                  </div>                        
                      </div>
                      <div class="row">
                <div class="col-md-6">
                  
                  <label class="required" for="city">City/Town :</label>
                  <input id="city" type="text" value="" name="city" class="form-control">                  
                </div> 
                <div class="col-md-6">
                
                <label class="required" for="suburb">Locality/Estate :</label>
                  <input id="suburb" type="text" value="" name="suburb" class="form-control">
                </div>                       
                      </div>
                      <div class="row">                 
                  <div class="col-md-6">
                  <label class="required" for="address_1">Address 1 :</label>
                    <input id="address_1" type="text" value="" name="address_1" class="form-control">                  
                </div>
                <div class="col-md-6">
                  <label class="" for="address_2">Address 2 :</label>
                    <input id="address_2" type="text" value="" name="address_2" class="form-control">
                  </div>
                 </div>
                    </div>
                    <div class="step-22">
                            
                            </div>
                            <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                        </div>
                           </div>
                  <div class="tab-pane" role="tabpanel" id="step3">
                    <div class="panel-body">
                      <div class="step33">
                        <h5><strong>Specialization and Interests</strong></h5>
                          <div class="row mar">
                            <div class="col-md-4 col-xs-3">
                              <p align="right"><stong>Industry</stong>
                            </div>
                            <div class="col-mod-8 col-xs-9">
                              <select name="industry" id="industry" class="dropselected" >
                                <option value="">Select your Industry</option>
                                <option value="mechanical">Mechanical Engineering</option>
                                <option value="building">Building and construciton</option>
                              </select>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>

      </div>
        </div>
           </div>
            </div>

            
  <?php
  echo form_close();
  ?>
  </div>
  </section>
  </div>
  </div>
           <!--end of employer_corporate form-->

           <!--beggining of employer_individual form-->
           <?php 
  echo form_open ('employers/saveIndividual/', array('id'=>'employer_form_individual', 'style'=>'display:none;','class'=>'form-horizontal','novalidate'=>'novalidate','enctype'=>'multipart/form-data','accept-charset'=>'utf-8'));
  ?>

      <div class="panel panel-piluku">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="ion-edit">
              
            </i>
          Complete your Registration
            <small>(Fields in red are required)</small>
          </h3>
        </div>
        <div class="panel-body">
        <div class="form-group override-taxes-container">
        <ul id="error_message_box"></ul>
          
          <label class="required col-sm-3 col-md-3 col-lg-2 control-label wide">Registering as :</label>
          <div class="col-sm-9 col-md-9 col-lg-10">
            <select name="employer_type" id="employer_type" class="form-control">
              <option value="individual">Individual</option>
            </select>
          </div>
        </div>
            <div class="row">
                          <div class="col-md-12">
                          <div class="individual">
                <div class="form-group">
                
                <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="first_name">First Name :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="first_name" type="text" name="first_name" class="form-control">
                </div>
                
                </div>
                <div class="form-group">
                
                <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="last_name">Last Name :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="last_name" type="text" name="last_name" class="form-control" value="">
                </div>
                
                </div>
                <div class="form-group">
                
                <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="surname">Surname :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="surname" type="text" name="surname" class="form-control" value="">
                </div>
                
                </div>
                <div class="form-group">
                 
                  <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="country">Country :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="country" type="text" value="" name="country" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                 
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="id_passort">National Id/Passport :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="id_passort" type="text" value="" name="id_passort" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label not_required" for="email">E-mail :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="email" type="text" value="" name="email" class="form-control">
                </div>
                
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="phone_number">Mobile No. 1 :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="phone_number1" type="text" value="" name="phone_number1" class="form-control">
                </div>
                
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="phone_number">Mobile No. 2 :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="phone_number2" type="text" value="" name="phone_number2" class="form-control">
                </div>
                
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="image_id">Profile Photo :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <ul class="list-unstyled avatar-list">
                    <li>
                      <input type="image_id" name="filestyle" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" name="image_id" type="file">
                      <div class="bootstrap-filestyle input-group">
                        <input type="text" name="" class="form-control" disabled="disabled" type="text"><span class="group-span-filestyle input-group-btn" tabindex="0">
                          <label for="image_id" class="btn btn-file-upload">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            <span class="buttonText">Choose File</span>
                          </label>
                        </span>
                      </div>
                    </li>
                    <li>
                      <div id="avatar">
                        <img id="image_empty" class="image-polaroid" src="<?php print base_url();?>assets/bower_components/bootstrap/dist/images/avatar.png" alt="">
                      </div>
                    </li>
                  </ul>
                </div>
                
                </div>
                  <div class="form-group">
                  
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="address_1">Address 1 :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="address_1" type="text" value="" name="address_1" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                  
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="address_2">Address 2 :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="address_2" type="text" value="" name="address_2" class="form-control">
                  </div>
                 
                </div>
                <div class="form-group">
                 
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="county">County/Province :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="county" type="text" value="" name="county" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                  
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="city">City/Town :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="city" type="text" value="" name="city" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="suburb">Suburb/Estate :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="suburb" type="text" value="" name="suburb" class="form-control">
                </div>
              
                </div>
                
                <div class="form-actions pull-right">
                  <button id="cancel" class="submit_button btn btn-danger" name="cancel" type="button" value="true">Cancel</button>
                  <input id="submitf" class="submit_button btn btn-primary" type="submit" name="submitf" value="Submit">
                </div>
                
              </div>
              </div>
              </div>
              </div>
            
            </div>
  <?php
  echo form_close();
  ?>
   <!-- End of Individual Employer form -->

  </div> 
  </div>
</div>
<!-- end of container -->
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery-3.1.1.min.js"></script>
  <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
  <script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery-migrate-3.0.0.min.js"></script>
  <script type = "text/javascript" src = "<?php print base_url();?>assets/js/plugins/canvas-to-blob.min.js"></script>
  <script type = "text/javascript" src = "<?php print base_url();?>assets/js/plugins/sortable.min.js"></script>
  <script type = "text/javascript" src = "<?php print base_url();?>assets/js/plugins/purify.min.js"></script>
  <script type = "text/javascript" src = "<?php print base_url();?>assets/js/fileinput.min.js"></script>
  <script type = "text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type = "text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrapValidator.min.js"></script>
  <!--<script type="text/javascript" src = "<?php print base_url();?>assets/js/jquery.validate-1.13.1-min.js"></script>-->
<script type = "text/javascript" src = "<?php print base_url();?>assets/js/employer.js"></script>
<script>

  $(document).on('ready', function(){
    $("#input-21").fileinput({
      previewFileType: "image",
      browseClass: "btn btn-file-upload",
      browseLabel: "Choose File",
      browseIcon: "<i class=\"glyphicon glyphicon-folder-open\"></i> ",
      removeClass: "btn btn-danger",
      removeLabel: "Delete",
      removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i>"
    });
  });
    $(document).ready(function(){
    $('form#employer_form_individual').on('submit', function(form){
       //form.preventDefault();
        $.post('/index.php/employers/save', $('form#employer_form_individual').serialize(), function(data){
          console.log(data);
        });
    });
  });
    
  </script>
</body>

</html>