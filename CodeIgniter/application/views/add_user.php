

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Add user</title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/dcalendar.picker.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/validationEngine.jquery.css" rel="stylesheet">
      <style type="text/css">
         #deceased{
         background-color:#FFF3F5;
         padding-top:10px;
         margin-bottom:10px;
         }
         .remove_field{
         float:right;	
         cursor:pointer;
         position : absolute;
         }
         .remove_field:hover{
         text-decoration:none;
         }
      </style>
      <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dcalendar.picker.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.validationEngine.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.validationEngine-en.js"></script>
      <script type='text/javascript'>
         $(function() {
         	//calendar call function
         	$('.datepicker').dcalendar();
         	$('.datepicker').dcalendarpicker();
         
         	   
         	
         
         	
         });
      </script>
   </head>
   <body>
      <div class="panel panel-primary" style="margin:20px;">
      <div class="panel-heading">
         <h3 class="panel-title">Add User</h3>
      </div>
      <div class="panel-body">
         <form action="<?php echo base_url()."User_management/addUser/";?><?php if(isset($user_id) and $user_id!=0){ echo $user_id;}?>" method="POST" id="add_user_form">
            <div class="col-md-12 col-sm-12">
               <div class="form-group col-md-6 col-sm-6">
                  <label for="name">First name<span style="color:red;">*</span>:</label>
                  <input type="text" class="form-control input-sm validate[required,minSize[3],maxSize[25]]" data-errormessage-value-missing="Please enter first name" id="fname" value="<?php if(isset($user_details['c_firstname'])){
                     echo $user_details['c_firstname'];
                     }?>" name="fname" placeholder="">
               </div>
               <div class="form-group col-md-6 col-sm-6">
                  <label for="name">Last name<span style="color:red;">*</span>:</label>
                  <input type="text"  class="form-control input-sm validate[required,minSize[3],maxSize[25]]" data-errormessage-value-missing="Please enter last name" id="lname" value="<?php if(isset($user_details['c_lastname'])){
                     echo $user_details['c_lastname'];
                     }?>" name="lname" placeholder="">
               </div>
               <div class="form-group col-md-6 col-sm-6">
                  <label for="email">Email ID<span style="color:red;">*</span>:</label>
                  <input type="email" class="form-control input-sm validate[required,custom[email],minSize[3],maxSize[25]]" data-errormessage-value-missing="Please enter email id" id="email" value="<?php if(isset($user_details['c_emailid'])){
                     echo $user_details['c_emailid'];
                     }?>"  name="email" placeholder="">
               </div>
               <div class="form-group col-md-6 col-sm-6">
                  <label for="address">Address<span style="color:red;">*</span>:</label>
                  <textarea class="form-control input-sm validate[required,minSize[3],maxSize[100]]" name="address" data-errormessage-value-missing="Please enter address" id="address" rows="3"><?php if(isset($user_details['c_address'])){
                     echo $user_details['c_address'];
                     }?></textarea>
               </div>
               <div class="form-group col-md-6 col-sm-6">
                  <label for="pincode">Pincode</label>
                  <input type="text" class="form-control input-sm" id="pincode" name="pincode" value="<?php if(isset($user_details['c_zipcode'])){
                     echo $user_details['c_zipcode'];
                     }?>" placeholder="">
               </div>
               <div class="form-group col-md-6 col-sm-6">
                  <label for="pincode">Telephone no<span style="color:red;">*</span>:</label>
                  <input type="text" class="form-control input-sm validate[required,custom[onlyMobileno],minSize[4],maxSize[13]]" data-errormessage-value-missing="Please enter mobile no" id="mobile_no" value="<?php if(isset($user_details['c_telephoneno'])){
                     echo $user_details['c_telephoneno'];
                     }?>" name="mobile_no" placeholder="">
               </div>
               <div class="form-group col-md-6 col-sm-6">
                  <label for="arrival">DOB<span style="color:red;">*</span>:</label>
                  <input type="text" class="form-control input-sm datepicker validate[required]" name="DOB" data-errormessage-value-missing="Please enter DOB"  id="arrival" value="<?php if(isset($user_details['c_dob'])){
                     echo date("d/m/Y",strtotime($user_details['c_dob']));
                     }?>" placeholder="">
               </div>
            </div>
            <div class="col-md-12 col-sm-12" id="addblock">
               <div class="form-group col-md-1 col-sm-1">
                  <input type="submit" class="btn btn-primary" value="Submit"/>
               </div>
               <div class="form-group col-md-3 col-sm-3">
                  <a href="<?php echo base_url()."User_management";?>"><input type="button" class="btn btn-primary" value="Back to userlist"/>
               </div>
            </div>
         </form>
      </div>
      <script type="text/javascript">
         jQuery(document).ready( function() {
         
          
         
           jQuery("#add_user_form").validationEngine({promptPosition: 'inline'});
         });
         
      </script>
   </body>
</html>

