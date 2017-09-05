

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>User list form</title>
      <!-- Bootstrap -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/dcalendar.picker.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/validationEngine.jquery.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <style type="text/css">
         #deceased{
         background-color:#F9FDFF;
         padding-top:10px;
         border: 1px solid #337ab7;
         margin-bottom:10px;
         }
         #deceased_list{
         background-color:#FAFAFA;
         border: 1px solid #337ab7;
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
         .pn
         {
         padding:0px;
         }
      </style>
      <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/dcalendar.picker.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.validationEngine.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.validationEngine-en.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jAlert-v3.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jAlert-functions.js"></script>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jAlert-v3.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">
      <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
      <div class="panel panel-primary" style="margin:20px;">
      <div class="panel-heading">
         <h3 class="panel-title">User management list</h3>
      </div>
      <div class="panel-body">
         <?php 
            if ( $this->session->flashdata('success') ) {
            
            echo '<div class="alert alert-success errormsg" style="margin-bottom:10px;">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> x </button>'.$this->session->flashdata('success').'
            </div>';
            } 
            elseif($this->session->flashdata('error'))
            {
            echo '<div class="alert alert-danger errormsg" style="margin-bottom:10px;">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> x </button>'.$this->session->flashdata('error').'
            </div>';
            }
            ?>  
         <div class="col-md-12 col-sm-12" id="deceased"	>
            <div class="form-group col-md-12 col-sm-12">
               <div class="form-group col-md-9 col-sm-9 pn" >
                  <label style="font-size:18px;"><i class="fa fa-search" aria-hidden="true"></i>
                  Advance search</label>	
               </div>
               <div class="form-group col-md-3 col-sm-3 pn" >
                  <a href="<?php echo base_url();?>User_management/addUser"><button class="btn btn-primary pull-right input-sm"  style="font-size:15px">Add more user</button></a>
               </div>
            </div>
            <div class="form-group col-md-3 col-sm-3">
               <div class="form-group col-md-6 col-sm-6">
                  Select field :
               </div>
               <div class="form-group col-md-6 col-sm-6 pn">
                  <select class="form-control input-sm" id="select_field" name="select_field">
                     <option value="6">All field</option>
                     <option value="0">first_name</option>
                     <option value="1">last name</option>
                     <option value="2">email id</option>
                     <option value="3">address</option>
                     <option value="4">zipcode</option>
                     <option value="5">telephone no</option>
                  </select>
               </div>
            </div>
            <div class="form-group col-md-4 col-sm-4">
               <div class="form-group col-md-3 col-sm-3">
                  Keyword :
               </div>
               <div class="form-group col-md-9 col-sm-9 pn">
                  <input type="text" class="form-control input-sm" id="keyword" name="keyword" placeholder="Please enter comma separated keywords">
               </div>
            </div>
            <div class="form-group col-md-4 col-sm-4">
               <div class="form-group col-md-7 col-sm-7">
                  <select class="form-control input-sm" id="select_criteria" name="select_criteria">
                     <option value="1">Exact match</option>
                     <option value="2">All of these keywords</option>
                     <option value="3">None of these keyword</option>
                     <option value="4">At least one keyword</option>
                  </select>
               </div>
            </div>
            <div class="form-group col-md-6 col-sm-6 pn">
               <div class="form-group col-md-3 col-sm-3">
               </div>
               <div class="form-group col-md-2 col-sm-2 pn" >
                  <button class="btn btn-primary  input-sm" name="submit_search" id="submit_search" style="font-size:15px"><i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
               </div>
               <div class="form-group col-md-3 col-sm-3 pn" >
                  <input type="submit" class="btn btn-primary input-sm" id="reset_search" name="reset_search" value="Reset search"/>
               </div>
            </div>
         </div>
         <div class="col-md-12 col-sm-12" id="deceased_list"	>
            <div class=" col-md-12 col-sm-12" style="margin-bottom:8px;">
               <form action="<?php echo base_url()."User_management/get_userdetails"; ?>" method="POST">
               <div class=" col-md-7 col-sm-7">
               </div>
               <div class="col-md-3 col-sm-3" >
                  <div class="row" >
                     <div class=" col-md-6 col-sm-6 " style="padding-left:60px" >
                        Filter user:
                     </div>
                     <div class=" col-md-6 col-sm-6" >
                        <select class="form-control input-sm" id="user_status" name="user_status">
                           <option value="0">All users</option>
                           <option value="1">Active</option>
                           <option value="2">Inactive</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="col-md-2 col-sm-2" style="padding-left:5px;">
                  <button class="btn btn-primary pull-right" name="submit" style="font-size:15px"><i class="fa fa-file-excel-o excel_fevicon_style"></i>&nbsp;&nbsp;Download</button>
               </div>
            </div>
            <table  id="spam_jobs_table" class="table table-striped table-hover table-bordered" >
               <thead>
                  <tr>
                     <th>Sr no.</th>
                     <th>First name</th>
                     <th> Last name</th>
                     <th>Email id</th>
                     <th>Address</th>
                     <th>Zip code</th>
                     <th>Telephone no</th>
                     <th>DOB</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
         </div>
      </div>
      <script type="text/javascript">
         $(".alert-success").fadeTo(2000, 1000).slideUp(1000, function(){
            $(".alert-success").slideUp(1000);
         });
         
         
         $("#reset_search").click(function(){
         $("#keyword").val("");
         $("#select_field").val(0);
         $("#select_criteria").val(1);
         
         $('#spam_jobs_table').DataTable().ajax.reload();
         
         });
         
         
         
         $("#submit_search").click(function(){
         $('#spam_jobs_table').DataTable().ajax.reload();
         });
         
         $("#user_status").change(function(){
         $('#spam_jobs_table').DataTable().ajax.reload();
         });
         
         $('#spam_jobs_table').dataTable( {
              "bServerSide": true,  
              "bProcessing": true,
              "aaSorting": [[ 0, 'desc' ]],
         
              "oLanguage": {
                "sZeroRecords":"You can search jobs by  displayed fields.",
                "sProcessing":"<img src='<?php echo base_url();?>images/loader.gif'>",
                "sEmptyTable": "You can search jobs by  displayed fields."
              },
         
                  "columnDefs": [ { 
                    orderable: false, targets: [0],
         			'searchable'    : false, 
                            'targets'       : [0] 
                             } ],
         
              "sZeroRecords":"",
              "sProcessing":"<img src='<?php echo base_url();?>images/loader.gif'>",
              "sEmptyTable":"",
              "sAjaxSource": '<?php echo base_url() ?>user_management/get_userdetails',
              "fnServerParams": function ( aoData ) {
         		aoData.push( { "name": "keyword", "value":  $('#keyword').val()  } );
         		aoData.push( { "name": "select_field", "value":  $('#select_field').val()  } );
         		aoData.push( { "name": "select_criteria", "value":  $('#select_criteria').val()  } );	
         		aoData.push( { "name": "user_status", "value":  $('#user_status').val()  } );
         		
         	}
         });
         
         $( document ).ready(function() {
          jQuery("#add_user_form").validationEngine({promptPosition: 'inline'});
            });
         
         				function delete_user(user_id)
         				{
         					confirm(function(e,btn){ //event + button clicked
         							$.ajax({
         							type: "POST",
         							url: '<?php echo site_url('User_management/deleteUser').'/';?>'+user_id,
         							//data: country_id='countryId',
         							success: function(response) {
         								if(response==1)
         								{
         								successAlert("Success","User has been deleted successfully.");
         								 $('#spam_jobs_table').DataTable().ajax.reload();
         								}
         								else
         								{
         								errorAlert("Error","User has been failed to deleted");
         								 $('#spam_jobs_table').DataTable().ajax.reload();
         								}
         							},
         							});
           
           
         						  }, function(e,btn){
         							  e.preventDefault();
           
         						  });
         									  
         				}
         				
         				function Deactivate(user_id)
         				{
         				
         							$.ajax({
         							type: "POST",
         							url: '<?php echo site_url('User_management/DeactivateUser').'/';?>'+user_id,
         							//data: country_id='countryId',
         							success: function(response) {
         								if(response==1)
         								{
         								successAlert("Success","User has been Deactivated successfully.");
         								 $('#spam_jobs_table').DataTable().ajax.reload();
         								}
         								else
         								{
         								errorAlert("Error","User has been failed to Deactivate");
         								 $('#spam_jobs_table').DataTable().ajax.reload();
         								}
         							},
         							});
           
         				}
         				
         				
         				function Activate(user_id)
         				{
         					
         							$.ajax({
         							type: "POST",
         							url: '<?php echo site_url('User_management/ActivateUser').'/';?>'+user_id,
         							//data: country_id='countryId',
         							success: function(response) {
         								if(response==1)
         								{
         								successAlert("Success","User has been Activated successfully.");
         								 $('#spam_jobs_table').DataTable().ajax.reload();
         								}
         								else
         								{
         								errorAlert("Error","User has been failed to Activated");
         								 $('#spam_jobs_table').DataTable().ajax.reload();
         								}
         							},
         							});
           
         				}
         				
         				
      </script>
   </body>
</html>

