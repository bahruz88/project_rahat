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
  <!-- iCheck --> <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
     
  
  <style>
       .schgrid {
	   font-size:14px; width:80px;
	   }
    </style> 
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
              <h5 class="modal-title"><?php echo  $dil["input_error_title"];?></h5>
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
			  <form id="schDelete" method="post" class="form-horizontal" action="">
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
  <div class="modal fade" id="schModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="schInsert" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["sch_input_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" >
						
						 <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select  data-live-search="true"  name="company_id_name" id='company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"  >
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
									<input type="text" class="form-control" id="schname_id" name="schname_name" placeholder="<?php echo $dil["schname"];?>"  />
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
								<label class="col-sm-3 col-form-label" for="sch_type"><?php echo $dil["sch_type"];?></label>
								<div class="col-sm-6">
						<select   data-live-search="true" name="sch_type_name" id="sch_type_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sch_type"];?>" >
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
								<label class="col-sm-3 col-form-label" for="night_time"><?php echo $dil["sch_night_time"];?></label>
								<div class="col-sm-6">
		                        <select   data-live-search="true"  name="night_time_name"  id="night_time_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["sch_night_time"];?>">
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
   <!--SCH  TIMES  MODAL -->
  <div class="modal fade" id="schTimeModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="schTimeInsert" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body"  >
		 
		 
                <table class="table table-condensed table-bordered" style="width:100% ;">
                  <thead>
                    <tr>
                      <th  style="width:10px;"></th>
                      <th  style="text-align:center; width:30px;" colspan="2">Qrafik üzrə iş</th>
					  <th  style="text-align:center; width:30px;" colspan="2">Fasilə </th>
					  <th  style="text-align:center; width:30px;" colspan="2">Nahar fasiləsi</th>
                      <th style="width:80px;"> Statusu </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><b>B.E</b></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="start_time_id_1"        name="name_start_time_1" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="end_time_id_1"          name="name_end_time_1" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_start_time_id_1" name="name_breake_start_time_1" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_end_time_id_1"   name="name_breake_end_time_1" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_start_time_id_1" name="name_dinner_start_time_1" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_end_time_id_1"   name="name_dinner_end_time_1" placeholder="Bitmə" /></td>
					
 				<td>
				 <input type="checkbox" name="name_status_id_1" data-bootstrap-switch id="status_id_1"  checked=""   data-off-color="danger" data-on-color="success" >
				</td>
                       
                    </tr>
                    <tr>
                      <td><b>Ç.A</b></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="start_time_id_2"         name="name_start_time_2" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="end_time_id_2"           name="name_end_time_2" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_start_time_id_2"  name="name_breake_start_time_2" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_end_time_id_2"    name="name_breake_end_time_2" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_start_time_id_2"  name="name_dinner_start_time_2" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_end_time_id_2"    name="name_dinner_end_time_2" placeholder="Bitmə" /></td>
					
						<td>
						 <input type="checkbox" name="name_status_id_2" data-bootstrap-switch id="status_id_2" checked=""  data-off-color="danger" data-on-color="success">
						</td>
                      
                    </tr>
				    <tr>
                      <td><b>Ç</b></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="start_time_id_3"        name="name_start_time_3" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="end_time_id_3"          name="name_end_time_3" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_start_time_id_3" name="name_breake_start_time_3" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_end_time_id_3"   name="name_breake_end_time_3" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_start_time_id_3" name="name_dinner_start_time_3" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_end_time_id_3"   name="name_dinner_end_time_3" placeholder="Bitmə" /></td>
					
						<td>
						 <input type="checkbox" name="name_status_id_3" data-bootstrap-switch checked="" id ="status_id_3"  data-off-color="danger" data-on-color="success">
						</td> 
                    </tr>
					
                    <tr>
                      <td><b>C.A</b></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="start_time_id_4"        name="name_start_time_4" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="end_time_id_4"   		  name="name_end_time_4" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_start_time_id_4" name="name_breake_start_time_4" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_end_time_id_4"   name="name_breake_end_time_4" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_start_time_id_4" name="name_dinner_start_time_4" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_end_time_id_4"   name="name_dinner_end_time_4" placeholder="Bitmə" /></td>
					
				 				<td>
				 <input type="checkbox" name="name_status_id_4" data-bootstrap-switch checked="" id ="status_id_4"  data-off-color="danger" data-on-color="success">
				</td>
                      
                    </tr>
                    <tr>
                      <td><b>C</b></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="start_time_id_5"        name="name_start_time_5" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="end_time_id_5"          name="name_end_time_5" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_start_time_id_5" name="name_breake_start_time_5" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_end_time_id_5"   name="name_breake_end_time_5" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_start_time_id_5" name="name_dinner_start_time_5" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_end_time_id_5"   name="name_dinner_end_time_5" placeholder="Bitmə" /></td>
					
				<td>
			<div>
				 <input type="checkbox" name="name_status_id_5" data-bootstrap-switch checked="" id ="status_id_5"   data-off-color="danger" data-on-color="success">
            </div>
				</td>
                      
                    </tr>
                    <tr>
                      <td><b>Ş</b></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="start_time_id_6"        name="name_start_time_6" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="end_time_id_6"          name="name_end_time_6" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_start_time_id_6" name="name_breake_start_time_6" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_end_time_id_6"   name="name_breake_end_time_6" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_start_time_id_6" name="name_dinner_start_time_6" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_end_time_id_6"   name="name_dinner_end_time_6" placeholder="Bitmə" /></td>
 				<td>
				 <input type="checkbox" name="name_status_id_6" data-bootstrap-switch checked="" id ="status_id_6"    data-off-color="danger" data-on-color="success" >
				</td>
                      
                    </tr>
                    <tr>
                      <td><b>B</b></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="start_time_id_7"        name="name_start_time_7" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="end_time_id_7"          name="name_end_time_7" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_start_time_id_7" name="name_breake_start_time_7" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="breake_end_time_id_7"   name="name_breake_end_time_7" placeholder="Bitmə" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_start_time_id_7" name="name_dinner_start_time_7" placeholder="Başlama" /></td>
                      <td style="width:30px;"><input type="text" class="form-control schgrid" id="dinner_end_time_id_7"   name="name_dinner_end_time_7" placeholder="Bitmə" /></td>
					
 				<td>
				 <input type="checkbox" name="name_status_id_7" data-bootstrap-switch  checked=""  id ="status_id_7"    data-off-color="danger" data-on-color="success" >
				</td>
                      
                    </tr>					
                  </tbody>
                </table>
            
	 
			 
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="timeschid" name="timeschid_name" value="" /> 	
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
					<div class="card-body"  >
						
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
						<th><?php echo $dil["sch_type"];?></th>
						<!--<th><?php echo $dil["tm_type"];?></th>
						
						<th><?php echo $dil["reduce_type"];?></th>
						<th><?php echo $dil["red_working_hours"];?></th>
						<th><?php echo $dil["reduce_reason"];?></th>
						
						<th><?php echo $dil["sch_start_time"];?></th>
						<th><?php echo $dil["sch_end_time"];?></th>
						<th><?php echo $dil["break_start_time"];?></th>
						<th><?php echo $dil["break_end_time"];?></th>
						<th><?php echo $dil["dinner_start_time"];?></th>
						<th><?php echo $dil["dinner_end_time"];?></th>-->
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
<script type="text/javascript" src="js/datatables.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>	
<script type="text/javascript" src="js/popper.min.js" ></script>
<script type="text/javascript" src="js/moment.min.js"  ></script>
<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
 
<script>
 function validInsert(){
	 
		if($('#company_id').val()=='' ){
			$('#company_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{ 
			$('#company_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		
		 
		
		
		if($('#schname_id').val()=='' ){
			$('#schname_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#schname_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}

		 		
		
		
		if($('#sch_start_date_id').val()=='' ){
			$('#sch_start_date_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#sch_start_date_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}	

		 	
		

		if($('#sch_expire_date_id').val()=='' ){
			$('#sch_expire_date_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#sch_expire_date_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		
		 

		if($('#sch_type_id').val()=='' ){
			$('#sch_type_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#sch_type_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}

		 		
		
		
		if($('#night_time_id').val()=='' ){
			$('#night_time_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#night_time_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		
		 
		
		return true

	} 
	
	 function validUpdate(){
	 
		if($('#update_company_id').val()=='' ){
			$('#update_company_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{ 
			$('#update_company_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
 
		if($('#update_schname_id').val()=='' ){
			$('#update_schname_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_schname_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}		

		if($('#update_sch_start_date_id').val()=='' ){
			$('#update_sch_start_date_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_sch_start_date_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}	
		
		if($('#update_sch_expire_date_id').val()=='' ){
			$('#update_sch_expire_date_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_sch_expire_date_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}

		if($('#update_sch_type_id').val()=='' ){
			$('#update_sch_type_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_sch_type_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}		
		
		if($('#update_night_time_id').val()=='' ){
			$('#update_night_time_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_night_time_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		
		return true

	} 
	
  $(function () {
	  
	  
	  
	  
	  
/*on  off load  script 	  */
	  $("#schTimeModal").on("shown.bs.modal",function(){
		  $("input[data-bootstrap-switch]").each(function(){
		  $(this).bootstrapSwitch('state', $(this).prop('checked'));
			});
        });

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
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": 
			"<img  id='delete' style='cursor:pointer' src='dist/img/icons/delete-file.png' width='22' height='22'>"+
			"<img id='edit' style='cursor:pointer' src='dist/img/icons/edit-file.png' width='22' height='22'> "+
			"<img id='timeset' style='cursor:pointer' src='dist/img/icons/time-set.png' width='22' height='22'> "
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
            ] 
        });
		
		
 $( ".dt-buttons" ).prepend( $( "<a class='dt-button buttons-excel buttons-html5' id='add_new_item'  data-toggle='modal' data-target='#schModal'><?php echo $dil['addnew'];?> <i class='fa fa-plus'></i></a>" ) );
  
  /*Button  click  on grid */
	$('#sch_table tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("schid").value = data[0];
		console.log(document.getElementById("schid").value );
		
		$('#modalDelete').modal('show');
    } );

  /*Button  click  on grid */
	$('#sch_table tbody').on( 'click', '#timeset', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("timeschid").value = data[0];	
				
		$('#schTimeModal').modal('show');
		GetSchTimes(data[0]) ;
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
				 
					$("#update_sch_start_date_id").val(schedule.start_date);
					$("#update_sch_expire_date_id").val(schedule.expire_date);
					$("#update_schname_id").val(schedule.sch_name);
					$('#update_company_id').val(schedule.compid).change();
					$('#update_sch_type_id').val(schedule.sch_type_id).change();
					$('#update_night_time_id').val(schedule.night_time).change();
					$('#schEdit').modal('show');
					
				}
			);

}


	 function GetSchTimes(schid) 
	 {
			$.post("schedule/getTimeSchDetail.php", 
				{
					schid: schid
				},
				function (sch_data, status) 
				{
				

				// PARSE json data
					var schedule = JSON.parse(sch_data);
					// Assing existing values to the modal popup fields
					console.log(schedule.work_day_status_1
					+'-'+schedule.work_day_status_2
					+'-'+schedule.work_day_status_3
					+'-'+schedule.work_day_status_4
					+'-'+schedule.work_day_status_5
					+'-'+schedule.work_day_status_6
					+'-'+schedule.work_day_status_7
					);
 
					 
					if (schedule.work_day_status_1 == 1  ){
					$("#status_id_1").bootstrapSwitch('state', true,false);
					}else{
						$("#status_id_1").bootstrapSwitch('state', false,false);
					}
					
					if (schedule.work_day_status_2 == 1  ){
					$("#status_id_2").bootstrapSwitch('state', true,false);
					}else{
						$("#status_id_2").bootstrapSwitch('state', false,false);
					}
					
					if (schedule.work_day_status_3 == 1  ){
					$("#status_id_3").bootstrapSwitch('state', true,false);
					}else{
						$("#status_id_3").bootstrapSwitch('state', false,false);
					}
					
					if (schedule.work_day_status_4 == 1  ){
					$("#status_id_4").bootstrapSwitch('state', true,false);
					}else{
						$("#status_id_4").bootstrapSwitch('state', false,false);
					}
										
					if (schedule.work_day_status_5 == 1  ){
					$("#status_id_5").bootstrapSwitch('state', true,false);
					}else{
						$("#status_id_5").bootstrapSwitch('state', false,false);
					}
					
					if (schedule.work_day_status_6 == 1  ){
					$("#status_id_6").bootstrapSwitch('state', true,false);
					}else{
						$("#status_id_6").bootstrapSwitch('state', false,false);
					}
					
					if (schedule.work_day_status_7 == 1  ){
					$("#status_id_7").bootstrapSwitch('state', true,false);
					}else{
						$("#status_id_7").bootstrapSwitch('state', false,false);
					}
					
 
					$("#start_time_id_1").val(schedule.start_time_1);
					$("#start_time_id_2").val(schedule.start_time_2);
					$("#start_time_id_3").val(schedule.start_time_3);
					$("#start_time_id_4").val(schedule.start_time_4);
					$("#start_time_id_5").val(schedule.start_time_5);
					$("#start_time_id_6").val(schedule.start_time_6);
					$("#start_time_id_7").val(schedule.start_time_7);

 					$("#end_time_id_1").val(schedule.end_time_1);
					$("#end_time_id_2").val(schedule.end_time_2);
					$("#end_time_id_3").val(schedule.end_time_3);
					$("#end_time_id_4").val(schedule.end_time_4);
					$("#end_time_id_5").val(schedule.end_time_5);
					$("#end_time_id_6").val(schedule.end_time_6);
					$("#end_time_id_7").val(schedule.end_time_7);					 
					
					$("#breake_start_time_id_1").val(schedule.breake_start_time_1);
					$("#breake_start_time_id_2").val(schedule.breake_start_time_2);
					$("#breake_start_time_id_3").val(schedule.breake_start_time_3);
					$("#breake_start_time_id_4").val(schedule.breake_start_time_4);
					$("#breake_start_time_id_5").val(schedule.breake_start_time_5);
					$("#breake_start_time_id_6").val(schedule.breake_start_time_6);
					$("#breake_start_time_id_7").val(schedule.breake_start_time_7);	

					$("#breake_end_time_id_1").val(schedule.breake_end_time_1);
					$("#breake_end_time_id_2").val(schedule.breake_end_time_2);
					$("#breake_end_time_id_3").val(schedule.breake_end_time_3);
					$("#breake_end_time_id_4").val(schedule.breake_end_time_4);
					$("#breake_end_time_id_5").val(schedule.breake_end_time_5);
					$("#breake_end_time_id_6").val(schedule.breake_end_time_6);
					$("#breake_end_time_id_7").val(schedule.breake_end_time_7);					   

					$("#dinner_start_time_id_1").val(schedule.dinner_start_time_1);
					$("#dinner_start_time_id_2").val(schedule.dinner_start_time_2);
					$("#dinner_start_time_id_3").val(schedule.dinner_start_time_3);
					$("#dinner_start_time_id_4").val(schedule.dinner_start_time_4);
					$("#dinner_start_time_id_5").val(schedule.dinner_start_time_5);
					$("#dinner_start_time_id_6").val(schedule.dinner_start_time_6);
					$("#dinner_start_time_id_7").val(schedule.dinner_start_time_7);

					$("#dinner_end_time_id_1").val(schedule.dinner_end_time_1);
					$("#dinner_end_time_id_2").val(schedule.dinner_end_time_2);
					$("#dinner_end_time_id_3").val(schedule.dinner_end_time_3);
					$("#dinner_end_time_id_4").val(schedule.dinner_end_time_4);
					$("#dinner_end_time_id_5").val(schedule.dinner_end_time_5);
					$("#dinner_end_time_id_6").val(schedule.dinner_end_time_6);
					$("#dinner_end_time_id_7").val(schedule.dinner_end_time_7);						
				}
			);

}
  /*USER MELUMATLARI  DAXIL  EDILIR  */
		$("#schTimeInsert").submit(function(e)
		{
			console.log(document.getElementById("status_id_6").value );
                    e.preventDefault();
					// if (validInsert()) {
			 
                    $.ajax( {
                        url: "schedule/schTimeUpdate.php",
                        method: "post",
                        data: $("#schTimeInsert").serialize(),
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
									 $("#schTimeModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Məlumatlar müvəffəqiyyətlə yadda saxlanıldı .');
									 $("#modalInsertSuccess").modal('show');
									 $("#schTimeModal").modal('hide');
									 table.ajax.reload();
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#schTimeModal").modal('hide');
									 
								 }
						}
                    });
				     
					$( "#schTimeInsert" ).get(0).reset();
			//}
        });
 /*USER MELUMATLARI  DAXIL  EDILIR  */
		$("#schInsert").submit(function(e)
		{
                    e.preventDefault();
					 if (validInsert()) {
			 
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
				
				
	$("#schDelete").submit(function(e) {
		
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
			  if (validUpdate()) {
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
			 }
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
	  
	  $('#start_time_id_1').datetimepicker({ format: 'HH:mm'   });
      $('#start_time_id_2').datetimepicker({ format: 'HH:mm'   });
      $('#start_time_id_3').datetimepicker({ format: 'HH:mm'   });
      $('#start_time_id_4').datetimepicker({ format: 'HH:mm'   });
      $('#start_time_id_5').datetimepicker({ format: 'HH:mm'   });
      $('#start_time_id_6').datetimepicker({ format: 'HH:mm'   });
      $('#start_time_id_7').datetimepicker({ format: 'HH:mm'   });
	  
	  $('#end_time_id_1').datetimepicker({ format: 'HH:mm'   });
	  $('#end_time_id_2').datetimepicker({ format: 'HH:mm'   });
	  $('#end_time_id_3').datetimepicker({ format: 'HH:mm'   });
	  $('#end_time_id_4').datetimepicker({ format: 'HH:mm'   });
	  $('#end_time_id_5').datetimepicker({ format: 'HH:mm'   });
	  $('#end_time_id_6').datetimepicker({ format: 'HH:mm'   });
	  $('#end_time_id_7').datetimepicker({ format: 'HH:mm'   });	  
	  
      $('#breake_start_time_id_1').datetimepicker({ format: 'HH:mm'   });
      $('#breake_start_time_id_2').datetimepicker({ format: 'HH:mm'   });
      $('#breake_start_time_id_3').datetimepicker({ format: 'HH:mm'   });
      $('#breake_start_time_id_4').datetimepicker({ format: 'HH:mm'   });
      $('#breake_start_time_id_5').datetimepicker({ format: 'HH:mm'   });
      $('#breake_start_time_id_6').datetimepicker({ format: 'HH:mm'   });
      $('#breake_start_time_id_7').datetimepicker({ format: 'HH:mm'   });
	  
      $('#breake_end_time_id_1').datetimepicker({ format: 'HH:mm'   });
      $('#breake_end_time_id_2').datetimepicker({ format: 'HH:mm'   });
      $('#breake_end_time_id_3').datetimepicker({ format: 'HH:mm'   });
      $('#breake_end_time_id_4').datetimepicker({ format: 'HH:mm'   });
      $('#breake_end_time_id_5').datetimepicker({ format: 'HH:mm'   });
      $('#breake_end_time_id_6').datetimepicker({ format: 'HH:mm'   });
      $('#breake_end_time_id_7').datetimepicker({ format: 'HH:mm'   });
	  
      $('#dinner_start_time_id_1').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_start_time_id_2').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_start_time_id_3').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_start_time_id_4').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_start_time_id_5').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_start_time_id_6').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_start_time_id_7').datetimepicker({ format: 'HH:mm'   });
      
	  $('#dinner_end_time_id_1').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_end_time_id_2').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_end_time_id_3').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_end_time_id_4').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_end_time_id_5').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_end_time_id_6').datetimepicker({ format: 'HH:mm'   });
      $('#dinner_end_time_id_7').datetimepicker({ format: 'HH:mm'   });
  });
</script>
</body>
</html>
