<!DOCTYPE html>
<html>
<?php 
$obj = $user_info->row();
?>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/bower_components/bootstrap/dist/css/template.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
    <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.css">
   <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/node_modules/bootstrap-material-design/dist/css/ripples.css">
   <!--Material design-->
   <link rel="stylesheet" type="text/css" href="<?php print base_url();?>assets/node_modules/material-design-lite/material.css">
  <!-- <script src="https://js-agent.newrelic.com/nr-974.min.js"></script> -->
  <script type="text/javascript">
  toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    
    $.fn.editableform.buttons = 
      '<button tabindex="-1" type="submit" class="btn btn-primary btn-sm editable-submit">'+
        '<i class="icon ti-check"></i>'+
      '</button>'+
      '<button tabindex="-1" type="button" class="btn btn-default btn-sm editable-cancel">'+
        '<i class="icon ti-close"></i>'+
      '</button>';
    
    $.fn.editable.defaults.emptytext = "Empty";
    
    $(document).ready(function()
    {
      $(".wrapper.mini-bar .left-bar").hover(
         function() {
           $(this).parent().removeClass('mini-bar');
         }, function() {
           $(this).parent().addClass('mini-bar');
         }
       );

        $('.menu-bar').click(function(e){                  
          e.preventDefault();
            $(".wrapper").toggleClass('mini-bar');        
        }); 
              
          });
  </script>
</head>
<body>

<div class="modal fade hidden-print" id="myModal" tabindex="-1" role="dialog" aria-hidden="true"></div>
  <div class="modal fade hidden-print" id="myModalDisableClose" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static"></div>
  
  <div class="wrapper ">
    <div tabindex="0">
      <div class="admin-logo" style="">
        <div class="logo-holder pull-left">
          <img src="<?php print base_url();?>assets/bower_components/bootstrap/dist/images/logo2.png" class="hidden-print logo" id="header-logo" alt="">        </div>
        <!-- logo-holder -->
              
      </div>
      <!-- admin-logo -->
  <!-- beginning of side-bar menu -->
      

  <form id="customer_form" novalidate="novalidate" action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">

      <div class="panel panel-piluku">
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
          
          <label class="required col-sm-3 col-md-3 col-lg-2 control-label wide">Choose type :</label>
          <div class="col-sm-9 col-md-9 col-lg-10">
            <select name="employer_type" class="form-control" disabled = "true">
              <option value="individual"><?php print $obj->employee_type?></option>
            </select>
          </div>
        </div>
          
            <div class="row">
                          <div class="col-md-12">
                <div class="form-group">
                  <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="first_name">First Name :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="first_name" type="text" name="first_name" class="form-control" value = "<?php print $obj->first_name;?>">
                  </div>
                </div>
                <div class="form-group">
                
                <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="last_name">Last Name :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="last_name" type="text" name="last_name" class="form-control" value="<?php print $obj->last_name;?>">
                </div>
                
                </div>
                  <div class="form-group">
                  <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="first_name">User name :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="user_name" type="text" name="user_name" class="form-control" value = "<?php print $obj->username;?>">
                  </div>
                </div>
                  <div class="form-group">
                  <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="first_name">Password :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="password" type="text" name="first_name" class="form-control" value = "<?php print $obj->password;?>">
                  </div>
                    <div class="form-group">
                  <label class="required col-sm-3 col-md-3 col-lg-2 control-label" for="first_name">Repassword :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="re_password" type="text" name="re_password" class="form-control" value = "<?php print $obj->password;?>">
                  </div>
                </div>
                </div>
                <div class="form-group">
                 
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="id_passort">National Id/Passport :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="id_passort" type="text" value="<?php print $obj->id_passport;?>" name="id_passort" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label not_required" for="email">E-mail :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="email" type="text" value="<?php print $obj->email; ?>" name="email" class="form-control">
                </div>
                
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="phone_number">Phone :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="phone_number" type="text" value="<?php print $obj->phone1; ?>" name="phone_number" class="form-control">
                </div>
                
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="image_id">Choose Image :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <ul class="list-unstyled avatar-list">
                    <li>
                      <input type="image_id" name="filestyle" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" name="image_id" type="file">
                      <div class="bootstrap-filestyle input-group">
                        <input type="text" name="" class="form-control" disabled="disabled" type="text"><span tabindex="0">
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
                    <input id="address_1" type="text" value="<?php print $obj->address; ?>" name="address_1" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                  
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="address_2">Address 2 :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="address_2" type="text" value="<?php print $obj->address; ?>" name="address_2" class="form-control">
                  </div>
                 
                </div>
                <div class="form-group">
                 
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="county">County/Province :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="county" type="text" value="<?php print $obj->country; ?>" name="county" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                  
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="city">City/Town :</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input id="city" type="text" value="<?php print $obj->city_town; ?>" name="city" class="form-control">
                  </div>
                  
                </div>
                <div class="form-group">
                
                <label class="col-sm-3 col-md-3 col-lg-2 control-label" for="suburb">Suburb/Estate :</label>
                <div class="col-sm-9 col-md-9 col-lg-10">
                  <input id="suburb" type="text" value="<?php print $obj->estate_locality; ?>" name="suburb" class="form-control">
                </div>
              
                </div>
                
                <div class="form-actions pull-right">
                  <button id="cancel" class="submit_button btn btn-danger" name="cancel" type="button" value="true">Cancel</button>
                  <input id="submitf" class="submit_button btn btn-primary" type="submit" name="submitf" value="Submit">
                </div>
                
              </div>
            </div>
  </form>
   <!-- End of Individual Employer form -->

  </div> 
  </div>
</div>
<!-- end of container -->
</body>

<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/babel-core.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-dom.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/react/react-with-addons.min.js"></script>
<script type="text/javascript" src = "<?php print base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type = "text/babel" src = "<?php print base_url();?>assets/js/orders.js"></script>
</html>