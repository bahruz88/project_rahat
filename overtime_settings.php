<?php    
 include('session.php'); 
$sql_tm_type="Select   *  from $tbl_sch_time_managment_type where  lang='$site_lang'";
$result_tm_type = $db->query($sql_tm_type); 
 
$sql_sch_type="Select   *  from $tbl_sch_schtype where  lang='$site_lang'";
$result_sch_type = $db->query($sql_sch_type); 

$sql_reduce_type="Select   *  from $tbl_sch_reduce_from where  lang='$site_lang'";
$result_reduce_type = $db->query($sql_reduce_type); 
 
$sql_reduce_reason="Select   *  from $tbl_sch_reduce_reason where  lang='$site_lang'";
$result_reduce_reason = $db->query($sql_reduce_reason);  
 

 
$result_lang = $db->query($sql_lang);
$result_roles = $db->query($sql_roles);		
$result_lang_edit = $db->query($sql_lang);	
$result_roles_edit = $db->query($sql_roles);
$result_lang_view = $db->query($sql_lang);	
$result_roles_view = $db->query($sql_roles);
$message=$dil["selectone"]; 	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RahatHR</title>
  <!-- Test  yoxlama Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
   
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">

    <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">-->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="css/google_fonts.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
     
  <!--  
  <style>
        .dataTables_length {
            margin-bottom: 10px;
        }
        
        .dataTables_length select {
            border: 1px solid #e4e4e4;
        }
        
        .dt-buttons a {
            margin-left: 12px;
            font-size: 12px;
            padding: 6px;
            border: 1px solid #e4e4e4;
            background: #FFF;
            box-shadow: 0px 0px 14px 0px #ececec;
        }
        
        .dataTables_filter input {
            border: 1px solid #e4e4e4;
        }
        
        .table-striped tbody tr {
            line-height: 10px;
			font-size:12px;
        }
		.table-striped thead tr {
            line-height: 13px;
			font-size:14px;
        }
    </style>-->
</head>
 
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
 <?php  include ("navbar.php")?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/rhr.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RahatHR</span>
    </a>

    <!-- Sidebar -->
   <?php  include("main_menu.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header)
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $dil["users"];?></h1>
          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=""><?php echo $dil["adminpage"];?></a></li>
              <li class="breadcrumb-item active"><?php echo $dil["users"];?></li>
            </ol>
          </div> 
        </div> 
      </div> 
    </div> -->
	<br>
<div class="col-12 col-sm-12 col-lg-12">
 <div class="card">
<div class="card-body">

	<!-- SUCCCES  CONTENT MODAL  DELETE -->
	<div class="modal fade" id="modalSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo $dil["delete_warning"];?></h5>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <p > <?php echo $dil["row_deleted"];?></p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
	  
<!-- SUCCCES  CONTENT MODAL UPDATE -->
<div class="modal fade" id="modalUpdateSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo $dil["user_update_title"];?></h5>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
              <p > <?php echo $dil["row_updated"];?></p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	  


<!-- SUCCCES  CONTENT MODAL INSERT -->
<div class="modal fade" id="modalInsertSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo  $dil["user_input_title"];?></h5>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
              <p id="successp"> </p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	
<!-- ERROR  CONTENT MODAL INSERT -->
<div class="modal fade" id="modalInsertError">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h5 class="modal-title"> <?php echo  $dil["input_error_title"];?></h5>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
              <p id="errorp"> </p>
            </div>
            <div class="modal-footer justify-content-between"> 
              <button class="btn btn-outline-light" type="button" data-dismiss="modal">OK</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>	  
	  
<!-- DELETE  CONTENT MODAL  -->
<div class="modal fade" id="modalDelete" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $dil["delete_warning"];?></h4>
              <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p><?php echo $dil["delete_warning_content"];?></p>
            </div>
            <div class="modal-footer justify-content-between">
			  <form id="userDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="schid" name="schid" value="" /> 
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  
  <!--SCH İNSERT MODAL -->
  <div class="modal fade" id="ovrModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="ovrInsert" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["ovr_input_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">
						
						 <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select required oninvalid="this.setCustomValidity('<?php echo  $message; ?>')" data-live-search="true"  name="company_id_name" id='company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"  >
                                    <?php
                                    $result_company = $db->query($sql_employee_company);
                                    if ($result_company->num_rows > 0) {
                                        while($row_company= $result_company->fetch_assoc()) {
                                            ?>
                                            <option  value="<?php echo $row_company['id']; ?>" ><?php echo $row_company['company_name'];  ?></option>
                                        <?php } }?>
                                </select>
                            </div>
                        </div>
						
						    <div class="form-group row">
                            <label class="col-sm-3 col-form-label"for="employee"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6" id="emp_div">
                                <select data-live-search="true"  name="emplo" id="employee"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
                                <option  value="0" > <?php echo $dil["selectone"];?></option>
                                </select>
                            </div>
                        </div>
						
						
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="schname"><?php echo $dil["schname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="schname_id" name="schname_name" placeholder="<?php echo $dil["schname"];?>" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="sch_start_date"><?php echo $dil["sch_start_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="sch_start_date_id" name="sch_start_date_name" placeholder="<?php echo $dil["sch_start_date"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="sch_expire_date"><?php echo $dil["sch_expire_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="sch_expire_date_id" name="sch_expire_date_name" placeholder="<?php echo $dil["sch_expire_date"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="tm_type"><?php echo $dil["tm_type"];?></label>
								<div class="col-sm-6">
						<select required oninvalid="this.setCustomValidity('<?php echo  $message; ?>')"  data-live-search="true" name="tm_type_name" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["tm_type"];?>" >
								 	<?php 
									 $result_tm_type = $db->query($sql_tm_type);
										if ($result_tm_type->num_rows > 0) {
										while($row_tm_type= $result_tm_type->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_tm_type['tm_id']; ?>" ><?php echo $row_tm_type['tm_descr'] ;  ?></option>
											
										<?php } }?>
						</select>
						</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="sch_type"><?php echo $dil["sch_type"];?></label>
								<div class="col-sm-6">
						<select required oninvalid="this.setCustomValidity('<?php echo  $message; ?>')"  data-live-search="true" name="sch_type_name" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sch_type"];?>" >
								 	<?php 
									 $result_sch_type = $db->query($sql_sch_type);
										if ($result_sch_type->num_rows > 0) {
										while($row_sch_type= $result_sch_type->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_sch_type['sch_type_id']; ?>" ><?php echo $row_sch_type['sch_type_desc'] ;  ?></option>
											
										<?php } }?>
						</select>
						</div>
							</div>	
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="reduce_type"><?php echo $dil["reduce_type"];?></label>
								<div class="col-sm-6">
						<select    data-live-search="true" name="reduce_type_name" id="reduce_type" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["reduce_type"];?>" >
								 	<?php 
									 $result_reduce_type = $db->query($sql_reduce_type);
										if ($result_reduce_type->num_rows > 0) {
										while($row_reduce_type= $result_reduce_type->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_reduce_type['type_id']; ?>" ><?php echo $row_reduce_type['type_descr'] ;  ?></option>
											
										<?php } }?>
						</select>
						</div>
							</div>	
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="red_working_hours"><?php echo $dil["red_working_hours"];?></label>
								<div class="col-sm-6">
								
								<select    name="red_working_hours_name" id="red_working_hours_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["red_working_hours"];?>" >
								 
										<option  value="1" >1</option>
										<option  value="2" >2</option>
										<option  value="3" >3</option>
										<option  value="4" >4</option>
										<option  value="5" >5</option>
										<option  value="6" >6</option>
										<option  value="7" >7</option>
										<option  value="8" >8</option>
										<option  value="9" >9</option>
										<option  value="10" >10</option>
 									
								</select>
 
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="reduce_reason"><?php echo $dil["reduce_reason"];?></label>
								<div class="col-sm-6">
							
								<select   data-live-search="true" name="reduce_reason_name" id="reduce_reason_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["reduce_reason"];?>" >
											<?php 
											 $result_reduce_reason = $db->query($sql_reduce_reason);
												if ($result_reduce_reason->num_rows > 0) {
												while($row_reduce_reason= $result_reduce_reason->fetch_assoc()) {
													
												?>
												<option  value="<?php echo $row_reduce_reason['reason_id']; ?>" ><?php echo $row_reduce_reason['res_desc'] ;  ?></option>
													
												<?php } }?>
								</select>
							</div>
							</div>	
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="start_time"><?php echo $dil["sch_start_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="start_time_id" name="start_time_name" placeholder="<?php echo $dil["sch_start_time"];?>" />
								</div>
							</div>
 
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="end_time"><?php echo $dil["sch_end_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="end_time_id" name="end_time_name" placeholder="<?php echo $dil["sch_end_time"];?>" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="break_start_time"><?php echo $dil["break_start_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="break_start_time_id" name="break_start_time_name" placeholder="<?php echo $dil["break_start_time"];?>" />
								</div>
							</div>
 
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="break_end_time"><?php echo $dil["break_end_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="break_end_time_id" name="break_end_time_name" placeholder="<?php echo $dil["break_end_time"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="dinner_start_time"><?php echo $dil["dinner_start_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="dinner_start_time_id" name="dinner_start_time_name" placeholder="<?php echo $dil["dinner_start_time"];?>" />
								</div>
							</div>
 
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="dinner_end_time"><?php echo $dil["dinner_end_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="dinner_end_time_id" name="dinner_end_time_name" placeholder="<?php echo $dil["dinner_end_time"];?>" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="night_time"><?php echo $dil["sch_night_time"];?></label>
								<div class="col-sm-6">
		                        <select required oninvalid="this.setCustomValidity('<?php echo  $message; ?>')"  data-live-search="true"  name="night_time_name"  id="night_time_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sch_night_time"];?>">
                                    <?php
                                    $result_yesno = $db->query($sql_yesno); 
                                    if ($result_yesno->num_rows > 0) {
                                        while($row_yesno= $result_yesno->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_yesno['chois_id']; ?>" ><?php echo $row_yesno['chois_desc'];  ?></option>

                                        <?php } }?>
                                </select>
								</div>
							</div>
				 
 				
					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php echo $dil["save"];?></button><button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
							 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
 
 
   <!--USER EDİT MODAL -->
  <div class="modal fade" id="schEdit" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="schUpdate" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["sch_input_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" style="position: relative; overflow: auto; height: 500px;overflow-y: scroll; ">
						
						 <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select  
								name="update_company_id_name" id='update_company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"  >
                                    <?php
                                    $result_company = $db->query($sql_employee_company);
                                    if ($result_company->num_rows > 0) {
                                        while($row_company= $result_company->fetch_assoc()) {
                                            ?>
                                            <option  value="<?php echo $row_company['id']; ?>" ><?php echo $row_company['company_name'];  ?></option>
                                        <?php } }?>
                                </select>
                            </div>
                        </div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="schname"><?php echo $dil["schname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_schname_id" name="update_schname_name" placeholder="<?php echo $dil["schname"];?>" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="sch_start_date"><?php echo $dil["sch_start_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_sch_start_date_id" name="update_sch_start_date_name" placeholder="<?php echo $dil["sch_start_date"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="sch_expire_date"><?php echo $dil["sch_expire_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_sch_expire_date_id" name="update_sch_expire_date_name" placeholder="<?php echo $dil["sch_expire_date"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="tm_type"><?php echo $dil["tm_type"];?></label>
								<div class="col-sm-6">
						<select   data-live-search="true"  id="update_tm_type_id" name="update_tm_type_name" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["tm_type"];?>" >
								 	<?php 
									 $result_tm_type = $db->query($sql_tm_type);
										if ($result_tm_type->num_rows > 0) {
										while($row_tm_type= $result_tm_type->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_tm_type['tm_id']; ?>" ><?php echo $row_tm_type['tm_descr'] ;  ?></option>
											
										<?php } }?>
						</select>
						</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="sch_type"><?php echo $dil["sch_type"];?></label>
								<div class="col-sm-6">
						<select    data-live-search="true" id="update_sch_type_id" name="update_sch_type_name" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sch_type"];?>" >
								 	<?php 
									 $result_sch_type = $db->query($sql_sch_type);
										if ($result_sch_type->num_rows > 0) {
										while($row_sch_type= $result_sch_type->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_sch_type['sch_type_id']; ?>" ><?php echo $row_sch_type['sch_type_desc'] ;  ?></option>
											
										<?php } }?>
						</select>
						</div>
							</div>	
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="reduce_type"><?php echo $dil["reduce_type"];?></label>
								<div class="col-sm-6">
						<select    data-live-search="true" name="update_reduce_type_name" id="update_reduce_type_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["reduce_type"];?>" >
								 	<?php 
									 $result_reduce_type = $db->query($sql_reduce_type);
										if ($result_reduce_type->num_rows > 0) {
										while($row_reduce_type= $result_reduce_type->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_reduce_type['type_id']; ?>" ><?php echo $row_reduce_type['type_descr'] ;  ?></option>
											
										<?php } }?>
						</select>
						</div>
							</div>	
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="red_working_hours"><?php echo $dil["red_working_hours"];?></label>
								<div class="col-sm-6">
								
								<select    name="update_red_working_hours_name" id="update_red_working_hours_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["red_working_hours"];?>" >
								 
										<option  value="1" >1</option>
										<option  value="2" >2</option>
										<option  value="3" >3</option>
										<option  value="4" >4</option>
										<option  value="5" >5</option>
										<option  value="6" >6</option>
										<option  value="7" >7</option>
										<option  value="8" >8</option>
										<option  value="9" >9</option>
										<option  value="10" >10</option>
 									
								</select>
 
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="reduce_reason"><?php echo $dil["reduce_reason"];?></label>
								<div class="col-sm-6">
							
								<select   data-live-search="true" name="update_reduce_reason_name" id="update_reduce_reason_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["reduce_reason"];?>" >
											<?php 
											 $result_reduce_reason = $db->query($sql_reduce_reason);
												if ($result_reduce_reason->num_rows > 0) {
												while($row_reduce_reason= $result_reduce_reason->fetch_assoc()) {
													
												?>
												<option  value="<?php echo $row_reduce_reason['reason_id']; ?>" ><?php echo $row_reduce_reason['res_desc'] ;  ?></option>
													
												<?php } }?>
								</select>
							</div>
							</div>	
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="start_time"><?php echo $dil["sch_start_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_start_time_id" name="update_start_time_name" placeholder="<?php echo $dil["sch_start_time"];?>" />
								</div>
							</div>
 
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="end_time"><?php echo $dil["sch_end_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_end_time_id" name="update_end_time_name" placeholder="<?php echo $dil["sch_end_time"];?>" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="break_start_time"><?php echo $dil["break_start_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_break_start_time_id" name="update_break_start_time_name" placeholder="<?php echo $dil["break_start_time"];?>" />
								</div>
							</div>
 
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="break_end_time"><?php echo $dil["break_end_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_break_end_time_id" name="update_break_end_time_name" placeholder="<?php echo $dil["break_end_time"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="dinner_start_time"><?php echo $dil["dinner_start_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_dinner_start_time_id" name="update_dinner_start_time_name" placeholder="<?php echo $dil["dinner_start_time"];?>" />
								</div>
							</div>
 
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="dinner_end_time"><?php echo $dil["dinner_end_time"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_dinner_end_time_id" name="update_dinner_end_time_name" placeholder="<?php echo $dil["dinner_end_time"];?>" />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="night_time"><?php echo $dil["sch_night_time"];?></label>
								<div class="col-sm-6">
		                        <select    data-live-search="true"  name="update_night_time_name"  id="update_night_time_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sch_night_time"];?>">
                                    <?php
                                    $result_yesno = $db->query($sql_yesno); 
                                    if ($result_yesno->num_rows > 0) {
                                        while($row_yesno= $result_yesno->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_yesno['chois_id']; ?>" ><?php echo $row_yesno['chois_desc'];  ?></option>

                                        <?php } }?>
                                </select>
								</div>
							</div>
				 
 				
					</div>
				</div>
   
		</div>
        <div class="modal-footer">				 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_schid" name="update_schid_name" value="" /> 			 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
 

 
 
 
 <div id="filtercol"></div>
		   <table id="sch_table" class="table table-striped  table-bordered table-hover">
                <thead>
               <tr>
                        <th>id</th>
                        <th><?php echo $dil["schname"];?></th>
						<th><?php echo $dil["schcode"];?></th>
						<th><?php echo $dil["company_name"];?></th>
						<th><?php echo $dil["sch_start_date"];?></th>
						<th><?php echo $dil["sch_expire_date"];?></th>
						<th><?php echo $dil["tm_type"];?></th>
						<th><?php echo $dil["sch_type"];?></th>
						<th><?php echo $dil["reduce_type"];?></th>
						<th><?php echo $dil["red_working_hours"];?></th>
						<th><?php echo $dil["reduce_reason"];?></th>
						
						<th><?php echo $dil["sch_start_time"];?></th>
						<th><?php echo $dil["sch_end_time"];?></th>
						<th><?php echo $dil["break_start_time"];?></th>
						<th><?php echo $dil["break_end_time"];?></th>
						<th><?php echo $dil["dinner_start_time"];?></th>
						<th><?php echo $dil["dinner_end_time"];?></th>
						<th><?php echo $dil["sch_night_time"];?></th>
						<th>Action</th>
                   </tr>
                </thead>  
	
              </table>
            
          </div>

          </div>
		  

</div>
</div>
  </div>
  <!-- /.content-wrapper -->
<?php  include ("footer.php"); ?>


</div>
<!-- ./wrapper -->
 <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 
 
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


<script type="text/javascript" src="js/datatables.min.js"></script>
<script type="text/javascript" src="dist/js/jquery.validate.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>	
<script type="text/javascript" src="js/popper.min.js" ></script>
<script type="text/javascript" src="js/moment.min.js"  ></script>
<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
  
<script>

  $(function () {
 
 
 
   $("#company_id").change(function(){
        var company_id = $(this).val();
    $.ajax({
            url: "employees/getEmployee.php",
            type: "POST",
            data: { company_id:company_id},
            success: function (data) {
                console.log('data=',data)
                console.log('$.parseJSON(data)=',$.parseJSON(data))
                var option='<select data-live-search="true"  name="emplo" id="employee"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                option += '<option value=""><?php  echo $dil['selectone'] ;?></option>';

                 $.each($.parseJSON(data), function(k,row) {
                    option += '<option value="' + row[0] + '" >' + row[1] + '  </option>';
                });
                option+=' </select>';
                $('#emp_div').html(option);
                $(".selectpicker").selectpicker();

            }
        }) ;
     
    });
/*FORM  VALIDATE */	  
 			$( "#schInsert" ).validate( {
				rules: {
					schname_name2: "required",
					sch_start_date_name: "required",
					sch_expire_date: "required",
					schname_name: {
						required: true,
						minlength: 5
					},
					langinput: "required"
				},
				messages: {
					schname_name2: "<?php echo $dil['empty_firstname'];?>",
					sch_start_date_name: "<?php echo $dil['empty_sch_start_date_name'];?>",
					sch_expire_date: "<?php echo $dil['empty_sch_expire_date'];?>",
					langinput: "<?php echo $dil['wrong_lang'];?>",
					schname_name: {
						required: "<?php echo $dil['empty_sch_name'];?>",
						minlength: "<?php echo $dil['length_input'];?>"
					}



				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );
 
 
 
  			$( "#userUpdate" ).validate( {
				
				rules: {
					update_firstname: "required",
					update_lastname: "required",
					update_username: {
						required: true,
						minlength: 3
					},
					
					update_email: {
						required: true,
						email: true
					},
					password: {
						required: false,
						minlength: 5
					},
					confirm_password: {
						required: false,
						minlength: 5,
						equalTo: "#password"
					},
					update_deflang: "required"

				},
				messages: {
					update_firstname: "<?php echo $dil['empty_firstname'];?>",
					update_lastname: "<?php echo $dil['empty_lastname'];?>",

					update_username: {
						required: "<?php echo $dil['empty_user'];?>",
						minlength: "<?php echo $dil['length_input'];?>"
					},
					password: {
						required: "Please provide a password",
						minlength: "<?php echo $dil['length_input'];?>"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "<?php echo $dil['length_input'];?>",
						equalTo: "Please enter the same password as above"
					},
					
					update_email: "<?php echo $dil['wrong_mail'];?>",
					update_deflang: "<?php echo $dil['wrong_lang'];?>"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `invalid-feedback` class to the error element
					error.addClass( "invalid-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.next( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				}
			} );
	
	
/*LOAD  USER TABLE 
	$("#sch_table").append(
       $('<filtercol>').append( $("#sch_table thead tr").clone() )
   );*/
	
var table = $("#sch_table").DataTable({
       "scrollX": true,
       "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,

	    "language": {
            "lengthMenu": "<?php echo $dil['display'] ; ?> _MENU_ records per page",
            "zeroRecords": "<?php echo $dil['datanotfound'] ; ?>",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "<?php echo $dil['datanotfound'] ; ?>",
            "infoFiltered": "(filtered from _MAX_ total records)",
			 "paginate": {
			"previous": "<?php echo $dil['previous'] ; ?> " ,
			"next": "<?php echo $dil['next'] ; ?>"
    }
        },
	    "ajax": {
                url: "schedule/get_sch.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "4%",
            "targets": -1,
            "data": null,
            "defaultContent": 
			"<img  id='delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img id='edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "
        } ],
	   dom: 'lBfrtip',
        
    buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
					 {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }  ,'copy','print',
                    'colvis'
                ],
				
			 "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ],
			   initComplete: function () {
            this.api().columns(3).every( function () {
                var column = this;
                var select = $('<a class=" dt-button buttons-excel buttons-html5"><?php echo $dil["filter_by_company"];?> :  <select  id="selectf"><option value=""><?php echo $dil["all_data"];?> </option></select></a>')
                    .appendTo( ".dt-buttons" );
                    $( "#selectf" ).on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    $("#selectf").append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }//initComplete

        });
		
		
 $( ".dt-buttons" ).prepend( $( "<a class='dt-button buttons-excel buttons-html5' id='add_new_item'  data-toggle='modal' data-target='#ovrModal'><?php echo $dil['addnew'];?> <i class='fa fa-plus'></i></a>" ) );
  
  /*Button  click  on grid */
	$('#sch_table tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("schid").value = data[0];
		$('#modalDelete').modal('show');
    } );
	

  $('#sch_table tbody').on( 'click', '#edit', function () {
	  

        var data = table.row( $(this).parents('tr') ).data();

	    //console.log(data) ;
		GetSchDetails(data[0]);
		document.getElementById("update_schid").value = data[0];
		 
    } );
 



 
 	/*USERIN  UPDATE MELUMATLARINI  GETIRIR*/
	 function GetSchDetails(schid) 
	 {
			$.post("schedule/getSchDetail.php", 
				{
					schid: schid
				},
				function (sch_data, status) 
				{
				

				// PARSE json data
					var schedule = JSON.parse(sch_data);
					// Assing existing values to the modal popup fields
					console.log(schedule);
					/*$("#update_username").val(user.username);
					$("#update_firstname").val(user.firstname);*/
					$("#update_sch_start_date_id").val(schedule.start_date);
					$("#update_sch_expire_date_id").val(schedule.expire_date);
					$("#update_schname_id").val(schedule.sch_name);
					$('#update_company_id').val(schedule.compid).change();
					$('#update_tm_type_id').val(schedule.tm_id).change();
					$('#update_sch_type_id').val(schedule.sch_type_id).change();
					$('#update_reduce_type_id').val(schedule.reduce_type).change();
					$('#update_red_working_hours_id').val(schedule.red_working_hours).change();
					$('#update_reduce_reason_id').val(schedule.reason_id).change();
					$("#update_start_time_id").val(schedule.start_time);
					$("#update_end_time_id").val(schedule.end_time);
					$("#update_break_start_time_id").val(schedule.break_start_time);
					$("#update_break_end_time_id").val(schedule.break_end_time);
					$("#update_dinner_start_time_id").val(schedule.dinner_start_time);
					$("#update_dinner_end_time_id").val(schedule.dinner_end_time);
					$('#update_night_time_id').val(schedule.night_time).change();
					/*
					$('#update_userlevel').val([1,2,3]).change();*/
					//$('#update_userlevel').selectpicker('val', [1,2,3]);
				     
					$('#schEdit').modal('show');
					
				}
			);

}
 
 /*USER MELUMATLARI  DAXIL  EDILIR  */
		$("#schInsert").submit(function(e)
		{
                    e.preventDefault();
					if($("#schInsert").valid())
			{ 
                    $.ajax( {
                        url: "schedule/schInsert.php",
                        method: "post",
                        data: $("#schInsert").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if ( strMessage==='duplicate' )
								 {					 
									 $("#badge_success").text('');
									 $("#badge_danger").text("<?php echo $dil['duplicate_username']?>");
								 }
								 else if (strMessage.substr(1, 4)==='error')
								 {
									  
									 
									 $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#schModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Melumat muveffeqiyyetle daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#schModal").modal('hide');
									 table.ajax.reload();
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#schModal").modal('hide');
									 
								 }
						}
                    });
				    table.ajax.reload();
					$( "#schInsert" ).get(0).reset();
			}
        });
				
				
	$("#userDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "schedule/schDelete.php",
                        method: "post",
                        data: $("form").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 {
								$('#modalDelete').modal('hide');
								$('#modalSuccess').modal('show');
								 table.ajax.reload();
							 }
							 else  {
								$("#badge_danger").text(strMessage);
							 }
						}
                    });
					 table.ajax.reload();	
                });
				
				
				
	$("#schUpdate").submit(function(e) {
                    e.preventDefault();
			 //if($("#schUpdate").valid()){ 
                    $.ajax( {
                        url: "schedule/schUpdate.php",
                        method: "post",
                        data: $("#schUpdate").serialize(),
                        dataType: "text",
                        success: function(strMessage) 
						{
							$("#badge_danger_update").text("");
							 if (strMessage.substr(1, 4)==='error')
							 {
								console.log(strMessage);
							 }
							 else if (strMessage==='success')
							 { 
								 $('#schEdit').modal('hide');
								$('#modalUpdateSuccess').modal('show');
								 table.ajax.reload();
							 }
							 else if (strMessage==='duplicate')
							 {
								 
								$("#badge_danger_update").text("<?php echo $dil['duplicate_username']?>");
								
							 }
							 else  {
								$("#badge_danger_update").text(strMessage);
							 }
						}
                    });
					 table.ajax.reload();	
			// }
                });
	  $("#update_sch_start_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });	
	  $("#update_sch_expire_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });	
	  $('#update_start_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#update_end_time_id').datetimepicker({ format: 'HH:mm'   }); 
	  $('#update_break_start_time_id').datetimepicker({ format: 'HH:mm'   });  
	  $('#update_break_end_time_id').datetimepicker({ format: 'HH:mm'   });  
	  $('#update_dinner_start_time_id').datetimepicker({ format: 'HH:mm'   }); 
	  $('#update_dinner_end_time_id').datetimepicker({ format: 'HH:mm'   }); 
	  
	  $("#sch_start_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });
	  $("#sch_expire_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });
	  $('#end_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#start_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#break_end_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#break_start_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#dinner_end_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#dinner_start_time_id').datetimepicker({ format: 'HH:mm'   });
	
  });
</script>
</body>
</html>
