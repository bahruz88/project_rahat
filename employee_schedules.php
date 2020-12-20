<?php    
 include('session.php'); 
 
$sql_tm_type="Select   *  from $tbl_sch_time_managment_type where  lang='$site_lang'";
 
 $company_id=$_SESSION["CompanyId"] ;
 
$sql_periods ="Select   *  from $tbl_periods where  lang='$site_lang'";
$result_periods  = $db->query($sql_periods); 
 
$sql_overtime_calc_status="Select   *  from $tbl_overtime_calc_status where  lang='$site_lang'";
$result_overtime_calc_status = $db->query($sql_overtime_calc_status);  
 
$sql_employees_sch = "select  id, concat(concat(sch_name,' / '),sch_code) sch_name
from $tbl_schedules  where status=1 and company_id='$company_id' "; 

$sql_employees = "select  id, concat(lastname,' ', firstname ,' ', surname) full_name ,lastname, firstname ,surname, emp_status,empno,image_name
from $tbl_employees  where emp_status=1 and company_id='$company_id'
/*and id not in (Select emp_id from  $tbl_employee_schedules where status=1) */";
 
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
  <title><?php echo $company_name ; ?></title>
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
      <span class="brand-text font-weight-light"><?php echo $company_name ; ?></span>
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
				  <form id="empschDelete" method="post" class="form-horizontal" action="">
				  <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
				  <input type="hidden" id="empschid" name="empschid_name" value="" /> 
				  </form>
				  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
				   
				</div>
			  </div>
			  <!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		  </div>
	  
	  
  <!--EMPSCH İNSERT MODAL -->
  <div class="modal fade" id="empschModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="empschInsert" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["add_schedules_to_employee"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body" >
						
						 <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="employee_id"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <select   data-live-search="true"   name="employee_id_name" id="employee_id"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>"  >
                                    <?php
                                    $result_employees = $db->query($sql_employees);
                                    if ($result_employees->num_rows > 0) {
                                        while($row_employees= $result_employees->fetch_assoc()) {
                                            ?>
                                            <option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['full_name'];  ?></option>
                                        <?php } }?>
                                </select>
                            </div>
                        </div>
 
						<div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="schedules"><?php echo $dil["schedules"];?></label>
                            <div class="col-sm-6" id="sch_div">
                                <select data-live-search="true"  name="sch_id_name" id="sch_id"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["schedules"];?>" >
                                                                     <?php
                                    $result_employees_sch = $db->query($sql_employees_sch);
                                    if ($result_employees_sch->num_rows > 0) {
                                        while($row_employees_sch= $result_employees_sch->fetch_assoc()) {
                                            ?>
                                            <option  value="<?php echo $row_employees_sch['id']; ?>" ><?php echo $row_employees_sch['sch_name'];  ?></option>
                                        <?php } }?>
                                </select>
                            </div>
                        </div>
						
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="tm_type"><?php echo $dil["tm_type"];?></label>
								<div class="col-sm-6">
						<select    data-live-search="true" name="tm_type_name" id="tm_type_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["tm_type"];?>" >
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
								<label class="col-sm-3 col-form-label" for="reduce_type"><?php echo $dil["reduce_type"];?></label>
								<div class="col-sm-6">
								<select    data-live-search="true" name="reduce_type_name" id="reduce_type_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["reduce_type"];?>" >
											<?php 
											 $result_reduce_type  = $db->query($sql_reduce_type);
												if ($result_reduce_type ->num_rows > 0) {
												while($row_reduce_type = $result_reduce_type ->fetch_assoc()) {
													
												?>
												<option  value="<?php echo $row_reduce_type ['type_id']; ?>" ><?php echo $row_reduce_type ['type_descr'] ;  ?></option>
													
												<?php } }?>
								</select>
						</div>
							</div>	
							 <div class="form-group row">
								<label class="col-sm-3 col-form-label" for="reduce_reason"><?php echo $dil["reduce_reason"];?></label>
								<div class="col-sm-6">
		                        <select     name="reduce_reason_name"  id="reduce_reason_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["reduce_reason"];?>">
                                    <?php
                                    $result_reduce_reason = $db->query($sql_reduce_reason); 
                                    if ($result_reduce_reason->num_rows > 0) {
                                        while($row_reduce_reason= $result_reduce_reason->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_reduce_reason['reason_id']; ?>" ><?php echo $row_reduce_reason['res_desc'];  ?></option>

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
							
					</div>
				</div>
   
		</div>
		
		
        <div class="modal-footer"> 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>		 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
 
 
     <div class="modal fade" id="ovrEdit" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="ovrUpdate" method="post" class="form-horizontal" action="">
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
                            <label class="col-sm-3 col-form-label" for="update_company_id"><?php echo $dil["company"];?></label>
                            <div class="col-sm-6">
                                <select   data-live-search="true"  name="update_company_id_name" id='update_company_id' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"  >
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
                            <label class="col-sm-3 col-form-label" for="update_employee"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6" id="sch_div_update">
                                <select data-live-search="true"  name="update_employee_id_name" id="update_employee_id"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
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
								<label class="col-sm-3 col-form-label" for="update_ovr_start_date"><?php echo $dil["start_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_ovr_start_date_id" name="update_ovr_start_date_name" placeholder="<?php echo $dil["start_date"];?>" />
								</div>
							</div>
						 
							 <div class="form-group row">
								<label class="col-sm-3 col-form-label" for="update_ovr_end_date"><?php echo $dil["end_date"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_ovr_end_date_id" name="update_ovr_end_date_name" placeholder="<?php echo $dil["end_date"];?>" />
								</div>
							</div>
							
 
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="update_calc_status"><?php echo $dil["overtime_calc_status"];?></label>
								<div class="col-sm-6">
						<select    data-live-search="true" name="update_calc_status_name" id="update_calc_status_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["overtime_calc_status"];?>" >
								 	<?php 
									 $result_overtime_calc_status = $db->query($sql_overtime_calc_status);
										if ($result_overtime_calc_status->num_rows > 0) {
										while($row_overtime_calc_status= $result_overtime_calc_status->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_overtime_calc_status['status_id']; ?>" ><?php echo $row_overtime_calc_status['status_desc'] ;  ?></option>
											
										<?php } }?>
						</select>
						</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="update_overtime_period"><?php echo $dil["overtime_period"];?></label>
								<div class="col-sm-6">
								<select    data-live-search="true" name="update_overtime_period_name" id="update_overtime_period_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["overtime_period"];?>" >
											<?php 
											 $result_periods  = $db->query($sql_periods);
												if ($result_periods ->num_rows > 0) {
												while($row_periods = $result_periods ->fetch_assoc()) {
													
												?>
												<option  value="<?php echo $row_periods ['period_id']; ?>" ><?php echo $row_periods ['period_desc'] ;  ?></option>
													
												<?php } }?>
								</select>
						</div>
							</div>	
							 <div class="form-group row">
								<label class="col-sm-3 col-form-label" for="update_night_time"><?php echo $dil["overtime_status"];?></label>
								<div class="col-sm-6">
		                        <select     name="update_overtime_status_name"  id="update_overtime_status_id" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["overtime_status"];?>">
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
		<input type="hidden" id="update_ovrid" name="update_ovrid_name" value="" /> 	
		<input type="hidden" id="update_empid" name="update_emp_name" value="" /> 			
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
 

 
 
 
 <div id="filtercol"></div>
		   <table id="empsch_table" class="table table-striped  table-bordered table-hover">
                <thead>
               <tr>
                        <th>id</th>
						<th><?php echo $dil["schname"];?></th>
                        <th><?php echo $dil["schcode"];?></th>
						<th><?php echo $dil["fio"];?></th>
						<th><?php echo $dil["reduce_type"];?></th>
						<th><?php echo $dil["red_working_hours"];?></th>
						<th><?php echo $dil["reduce_reason"];?></th>				 
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
	  
	  	 $("#company_select_id").change(function(){
	     $("#companyselect").submit();
 
        }) ;	  
	
	var sessCompany = '<?php echo $_SESSION['CompanyId']?>';
	
		if   (sessCompany=='NOCOMPANY'){
		 $('#modalCompanySelect').modal({
		  backdrop: 'static',
		  keyboard: false
		});

		}
 
    /*$("#company_id").change(function(){*/
	   	  
 
	 
	 
   /* });*/
 
 
  function validInsert(){
 
		 if($('#employee_id').val()=='' ){
			$('#employee_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#employee_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		
		 if($('#sch_id').val()=='' ){
			$('#sch_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#sch_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}		
		
		if($('#tm_type_id').val()=='' ){
			$('#tm_type_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#tm_type_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}		
		
		if($('#reduce_type_id').val()=='' ){
			$('#reduce_type_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#reduce_type_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}	
		
		if($('#reduce_reason_id').val()=='' ){
			$('#reduce_reason_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#reduce_reason_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}

		if($('#red_working_hours_id').val()=='' ){
			$('#red_working_hours_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#red_working_hours_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

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
		
		 if($('#update_employee_id').val()=='' ){
			$('#update_employee_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_employee_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );

		}
		
		 if($('#update_ovr_start_date_id').val()=='' ){
			$('#update_ovr_start_date_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_ovr_start_date_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		
		if($('#update_ovr_end_date_id').val()=='' ){
			$('#update_ovr_end_date_id').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_ovr_end_date_id').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		 if($('#update_calc_status_id').val()=='' ){
			$('#update_calc_status_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_calc_status_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		
		 if($('#update_overtime_period_id').val()=='' ){
			$('#update_overtime_period_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_overtime_period_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		}
		
		 if($('#update_overtime_status_id').val()=='' ){
			$('#update_overtime_status_id').closest('div').addClass( "is-invalid" ).removeClass( "is-valid" );
			return false
		}else{
			$('#update_overtime_status_id').closest('div').addClass( "is-valid" ).removeClass( "is-invalid" );
		} 	
		return true
	} 

 

 
 
	
var table = $("#empsch_table").DataTable({
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
                url: "employee_schedule/get_empsch.php",
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
            this.api().columns(1).every( function () {
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
		
		
 $( ".dt-buttons" ).prepend( $( "<a class='dt-button buttons-excel buttons-html5' id='add_new_item'  data-toggle='modal' data-target='#empschModal'><?php echo $dil['addnew'];?> <i class='fa fa-plus'></i></a>" ) );
  
  /*Button  click  on grid */
	$('#empsch_table tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("empschid").value = data[0];
		$('#modalDelete').modal('show');
    } );
	

  $('#empsch_table tbody').on( 'click', '#edit', function () {
	  
        var data = table.row( $(this).parents('tr') ).data();
	    console.log(data) ;
		GetOvrDetails(data[0]);
		document.getElementById("update_ovrid").value = data[0];
		 
    } );
 



 
 	/*OVERTİME UPDATE MELUMATLARINI  GETIRIR*/
	 
	 function GetOvrDetails(ovrid) 
	 {
			$.post("overtime/getOvrDetail.php", 
				{
					ovrid: ovrid
				},
				function (ovr_data, status) 
				{
				

				    // PARSE json data
					var overtime = JSON.parse(ovr_data);
					// Assing existing values to the modal popup fields
					console.log(overtime);
					
			         
					 $('#update_empid').val(overtime.empid);
					 $('#update_company_id').val(overtime.compid).change();
					 
					 
					 
					 //$('#update_employee_id').val(overtime.empid).change();
					 $("#update_ovr_start_date_id").val(overtime.start_date);
					 $("#update_ovr_end_date_id").val(overtime.expire_date);
					 $('#update_calc_status_id').val(overtime.status_id).change();
					 $('#update_overtime_period_id').val(overtime.period_id).change();
					 $('#update_overtime_status_id').val(overtime.chois_id).change();
					 
					$('#ovrEdit').modal('show');
					
				}
			);

}
   $("#update_company_id").change(function(){
	  console.log('Basladi');
        var company_id = $("#update_company_id").val();
		var upd_emp_id = $("#update_empid").val();
		console.log(company_id) ;
    $.ajax({
            url: "schedule/getCompanySchedules.php",
            type: "POST",
            data: { company_id:company_id},
			dataType: 'json',
            success: function (response) {
                console.log('data=',response)
				$("#employee_id").empty();
                var option='<select data-live-search="true"  name="update_employee_id_name" id="update_employee_id"  title="Birini seçin" class="form-control selectpicker"  placeholder="" >\n';
                option += '<option value=""><?php  echo $dil['selectone'] ;?></option>';

                $.each(response, function (k, v) {
                //console.log('v=', v[1])
                option += '<option value="' + v[0] + '" >' + v[1] + '</option>';
            });
            option += '</select>';
             $('#sch_div_update').html(option);
            $("#update_employee_id").selectpicker();
            $('#update_employee_id').val(upd_emp_id).change();

            }
        }) ;
     
    });
 
 /*USER MELUMATLARI  DAXIL  EDILIR  */
		$("#empschInsert").submit(function(e)
		{
                    e.preventDefault();
		if (validInsert()) {
                    $.ajax( {
                        url: "employee_schedule/empSchInsert.php",
                        method: "post",
                        data: $("#empschInsert").serialize(),
                        dataType: "text",
                        success: function(strMessage)
						{
								$("#badge_success").text('');
								$("#badge_danger").text('');
								 if ( strMessage==='duplicate' )
								 {					 
									 $("#errorp").text('Bu isci ucun  elave is vaxti artiq sazlanib');
									 $("#modalInsertError").modal('show');
									  $("#empschModal").modal('hide');
								 }
								 else if (strMessage.substr(1, 4)==='error')
								 {
									  
									 
									 $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#empschModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Məlumat müvəffəqiyyətlə daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#empschModal").modal('hide');
									 table.ajax.reload();
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#empschModal").modal('hide');
									 
								 }
						}
                    });
				    table.ajax.reload();
					$( "#empschInsert" ).get(0).reset();
 }
        });
				
				
	$("#empschDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "employee_schedule/empSchDelete.php",
                        method: "post",
                        data: $("#empschDelete").serialize(),
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
				
				
				
 	$("#ovrUpdate").submit(function(e) {
                    e.preventDefault();
			  if (validUpdate()) {
                    $.ajax( {
                        url: "overtime/ovrUpdate.php",
                        method: "post",
                        data: $("#ovrUpdate").serialize(),
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
								 $('#ovrEdit').modal('hide');
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
	  /*$("#update_sch_start_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });	
	  $("#update_sch_expire_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });	
	  $('#update_start_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#update_end_time_id').datetimepicker({ format: 'HH:mm'   }); 
	  $('#update_break_start_time_id').datetimepicker({ format: 'HH:mm'   });  
	  $('#update_break_end_time_id').datetimepicker({ format: 'HH:mm'   });  
	  $('#update_dinner_start_time_id').datetimepicker({ format: 'HH:mm'   }); 
	  $('#update_dinner_end_time_id').datetimepicker({ format: 'HH:mm'   }); 
	  */
	  $("#ovr_start_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });
	  $("#ovr_end_date_id").datetimepicker({ format: 'DD/MM/YYYY'  });
	  /*$('#end_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#start_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#break_end_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#break_start_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#dinner_end_time_id').datetimepicker({ format: 'HH:mm'   });
	  $('#dinner_start_time_id').datetimepicker({ format: 'HH:mm'   });*/
	
  });
</script>
</body>
</html>
