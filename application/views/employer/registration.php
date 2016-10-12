<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
  <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
  <!--<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap-responsive.css">-->
  <link href = "<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap-select.min.css" rel="stylesheet" media="all" text="text/css" /> 
  <link href = "<?php print base_url();?>assets/bower_components/bootstrap/dist/css/fileinput.css" rel="stylesheet" media="all" text="text/css" /> 
  <link href = "<?php print base_url();?>assets/bower_components/bootstrap/dist/css/bootstrapValidator.min.css" rel="stylesheet" media="all" text="text/css" />
  <link rel="stylesheet" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/intlTelInput.css">   
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
     <!--beggining  of top nav-bar-->  
<div class="container">
 <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
            <div class="logo-home"></div>
       <!-- <div class="logo-holder pull-left" style="margin-left: 120px;">
          <img src="<?php print base_url();?>assets/bower_components/bootstrap/dist/images/logo2.png" class="hidden-print logo" id="header-logo" alt="">        </div>
        </div>-->
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          </div>
        </div>
        <!--end ot top nav-bar-->
  </nav>
      <!-- top-bar -->
      <div class="container-fluid">
<div class="row" id="form" style="margin-top: 90px;">
        <div id="user_choice1">
        <div class="col-md-4 col-md-offset-4" style="background-color: #ffffff;">
        <h2 style="text-align: center;;">You Are Almost Done!</h2>
    <div class="well well-sm" style="text-align: center;">Welcome<!--<span><?php echo $email; ?></span>-->. Your username is <span><?php echo $email;?></span></div>
    <p style="text-align: center;"><small >Please complete your profile to begin using the site.</small></p>
    <div id="choice">
    	<form class="form-choice">
    	<div class="form-group">
    		<input type="button" value="Continue as Job Seeker" id="choice_employee" name="employee" class="bt btn-lg btn-warning btn-block">
    	</div>
    	<p><h4 style="background-color: #fff">OR</h4></p>
    	<div class="form-group">
    		<input type="button" value="Continue as an Employer" id="choice_employer" name="employer" class="bt btn-lg btn-info btn-block">
    	</div>
    		
    	</form>
    </div>
    </div>
    </div>
    </div>
    </div>
<!--Employer registration type choice-->
<div class="container-fluid">
    <div class="col-md-4 col-md-offset-4">
      <div class="well well-lg" style="display: none;" id="employerstep_2" >
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="ion-edit">
            </i>
          What type of employer are you registering as:
          </h3>
        </div>
        
          <div class="form-group
          ">
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

 <div class="container-fluid">
        <div class="col-md-6 col-md-offset-3" style="background-color: #ffffff;">
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
                  Mobile Number 1:
                  </label>
                    <input id="phone_number" type="text" placeholder="e.g. 0721001001" name="phone_number" class="form-control" value="">
                </div>
                <div class="col-md-6">
                  <label class="required" for="username">
                    Mobile Number 2(Optional) :
                  </label>
                  <input type="tex" name="phone_number_2" placeholder="e.g. 0721001001" id="phone_number2" class="form-control" value="">
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
                    <input type="email" name="email" value="<?php echo $email;?>" class="form-control" id="email">
                  </div>
                  <div class="col-md-6">
                    <label for="confrim_email" class="required">Confirm Email :</label>
                    <input type="confirm_email" name="confirm_email" value="<?php echo $email;?>" class="form-control" id="confirm_email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="logo">Upload Logo :</label>
                    <input id="input-21" type="file" accept="image/*" class="file-loading"> 
                 </div>        
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <ul class="list-inline pull-right">
                      <li>
                        <button type="button" class="btn btn-primary next-step">
                        Save and continue
                        </button>
                      </li>
                    </ul>
                  </div> 
                </div>
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
                        <div class="row" style="margin-top: 10px;"> 
                          <div class="col-md-12">   
                            <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                           </div> 
                        </div>
                      </div>
                    </div>
                </div>
                <!--skills and interests-->
                  <div class="tab-pane" role="tabpanel" id="step3">
                    <div class="panel-body">
                      <div class="step33">
                        <!--<h5><strong>Skills and Interests</strong></h5>-->
                          <div class="row">
                            <div class="col-md-6">
                            <label class="required" for="industry"> Industry :</label> 
                            <select name="industry" id="industry" class="form-control dropselected">
                              <option value="">Select you Industry</option>
                              <option value="computer-tech">Computer Technology</option>
                              <option value="engineering">Engineering</option>
                              <option value="education">Education</option>
                              <option value="desing">Design</option>
                              <option value="building-con">Building & Construction</option>
                              <option selected="selected"><?php echo $industry;?></option>
                            </select>
                            </div>
                            
                          </div>
                      </div>
                    </div>
                  </div>

  <?php
  echo form_close();
  ?>
                </div>
          </div>
</section>
      </div>
      </div>

 
           <!--end of employer_corporate form-->

           <!--beggining of employer_individual form-->
   <div class="container-fluid">
     <div class="col-md-6 col-md-offset-3" style="background-color: #ffffff;">
       <section style="/**/display: none;" id="employer_individual">
         <div class="wizard">
    <div class="wizard-inner">
      <div class="connecting-line"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#step12" data-toggle="tab" arial-controls="step12" role="tab" title="Personal Details">
              <span class="round-tab">
                <i class="glyphicon glyphicon-user"></i>
              </span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a href="#step21" data-toggle="tab" aria-controls="step21" role="tab" title="Location Details">
              <span class="round-tab">
                <i class=" glyphicon glyphicon-map-marker"></i>
              </span>
            </a>
          </li>  
          <li role="presentation" class="disabled">
              <a href="#step31" data-toggle="tab" aria-controls="step31" role="tab" title="Interests">
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
  echo form_open ('employers/saveIndividual/', array('id'=>'employer_individual','class'=>'form-horizontal','novalidate'=>'novalidate','enctype'=>'multipart/form-data','accept-charset'=>'utf-8'));
  ?><!--form starts here-->
  <div class="tab-content">
    <div class="tab-pane active" role="tabpanel" id="step12">
          <div class="panel-body">
            <div class="step12">
              <div class="row">
                <div class="col-md-6">
                  <label class="required">
                  Registering as :
                  </label>
                    <select name="employer_type" id="employer_type" class="form-control" disabled="disabled">
                      <option value="individual">Individual</option>
                    </select>
                </div>
              </div><!--end of 1st row-->
              <div class="row">
                <div class="col-md-4">
                  <label class="required" for="first_name">
                  First Name :
                  </label>
                  <input id="first_name" type="text" name="first_name" class="form-control">
                </div>
                <div class="col-md-4">
                  <label class="required" for="last_name">
                  Last Name :
                  </label>
                  <input id="last_name" type="text" name="last_name" class="form-control">
                </div>
                <div class="col-md-4">
                  <label class="required" for="surname">
                  Surname :
                  </label>
                  <input id="surname" type="text" name="surname" class="form-control">
                </div>
              </div><!--end of 2nd row-->
              <div class="row">
                <div class="col-md-6">
                  <label class="required" for="email">
                  Email :
                  </label>
                  <input id="email" type="text" name="email" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="required" for="conf_email">
                  Confirm Email :
                  </label>
                  <input id="conf_email" type="text" name="conf_email" class="form-control">
                </div>
              </div><!--end of 3rd row-->
              <div class="row">
                <div class="col-md-6">
                  <label class="required" for="phone_number1">
                  Mobile Number 1 :
                  </label>
                  <input id="phone_no" type="text" name="phone_no" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="required" for="phone_no2">
                  Mobile Number 2 (Optional) :
                  </label>
                  <input id="phone_no2" type="text" name="phone_no2" class="form-control">
                </div>
              </div><!--end of 4th row-->
                <div class="row">
                  <div class="col-md-6">
                    <label for="logo">Upload Profile Photo :
                    </label>
                    <img id="preview-img" src="<?php print base_url();?>assets/bower_components/bootstrap/dist/images/avatar.png" />
                    <input id="input-22" type="file" accept="image/*" class="file-loading" name="file"> 
                 </div> 
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <ul class="list-inline pull-right">
                      <li>
                        <button type="button" class="btn btn-primary next-step">Save and continue
                        </button>
                      </li>
                    </ul>
                    
                  </div>
                </div>
            </div>
          </div>
    </div>
                <div class="tab-pane" role="tabpanel" id="step21">
                  <div class="panel-body">
                  <div class="step21">
                      <div class="row">
                      <div class="col-md-6">
                    <label class="required" for="country">Country :
                    </label>
                    <input id="country" type="text" value="" name="country" class="form-control">
                  </div>
                  <div class="col-md-6">
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
                        <div class="row" style="margin-top: 10px;"> 
                          <div class="col-md-12">   
                            <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                           </div> 
                        </div>
                      </div>
                    </div>
                </div>
                <!--skills and interests-->
                  <div class="tab-pane" role="tabpanel" id="step31">
                    <div class="panel-body">
                      <div class="step31">
                        <!--<h5><strong>Skills and Interests</strong></h5>-->
                          <div class="row">
                            <div class="col-md-6">
                            <label class="required" for="industry"> Industry :</label> 
                            <select name="industry" id="industry" class="form-control dropselected">
                              <option value="">Select you Industry</option>
                              <option value="computer-tech">Computer Technology</option>
                              <option value="engineering">Engineering</option>
                              <option value="education">Education</option>
                              <option value="desing">Design</option>
                              <option value="building-con">Building & Construction</option>
                              <option selected="selected"><?php echo $industry;?></option>
                            </select>
                            </div>
                            
                          </div>
                      </div>
                    </div>
                  </div>
                  <!--</div><!--end of tab-content-->
  <?php echo form_close(); ?> <!--form closes-->
  </div>
        </div><!--end of wizard-->
   <!-- End of Individual Employer form -->
</section>
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
  <script type = "text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap-select.min.js"></script>
  <!--<script type="text/javascript" src = "<?php print base_url();?>assets/js/jquery.validate-1.13.1-min.js"></script>-->
<script type = "text/javascript" src = "<?php print base_url();?>assets/js/employer.js"></script>
<script src="<?php print base_url();?>assets/bower_components/bootstrap/dist/js/intlTelInput.js"></script>
<script>
  $("#phone_number").intlTelInput();
  $("#phone_number2").intlTelInput();
  $("#phone_no").intlTelInput();
  $("#phone_no2").intlTelInput();
</script>
</script>
<script>

  $(document).on('ready', function(){
    $("#input-21").fileinput({
      previewFileType: "image",
      //browseClass: "btn btn-file-upload",
      browseLabel: "Choose File",
      browseIcon: "<i class=\"glyphicon glyphicon-folder-open\"></i> ",
      removeClass: "btn btn-danger",
      removeLabel: "Delete",
      removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i>"
    });
    $("#input-22").fileinput({
      previewFileType: "image",
      //browseClass: "btn btn-file-upload",
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


    var job_seeker = $('#choice_employee');
    job_seeker.on('click', function( event )
    {
      event.preventDefault();
      event.stopPropagation();
      window.location.href = "/janta/index.php/Employee_registration/step_four";
    });


  });


    
  </script>
</body>

</html>