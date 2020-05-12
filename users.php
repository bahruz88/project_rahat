<?php    
 include('session.php');  
$result_lang = $db->query($sql_lang);
$result_roles = $db->query($sql_roles);		
$result_lang_edit = $db->query($sql_lang);	
$result_roles_edit = $db->query($sql_roles);
$result_lang_view = $db->query($sql_lang);	
$result_roles_view = $db->query($sql_roles);	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RahatHR</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  
   
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
			  <input type="hidden" id="userid" name="userid" value="" /> 
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  
  <!--USER İNSERT MODAL -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="userInsert" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["user_input_title"];?></h4>
			 <span  id="badge_success" class="badge badge-success"></span>
            <span  id="badge_danger" class="badge badge-danger"></span>
					</div>
					<div class="card-body">
						
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="username"><?php echo $dil["username"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $dil["username"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="firstname"><?php echo $dil["firstname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $dil["firstname"];?>" />
								</div>
							</div>
														<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php echo $dil["lastname"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="email"><?php echo $dil["email"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="email" name="email" placeholder="<?php echo $dil["email"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
					
						<select data-live-search="true" name="empno" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
								 	<?php 
									 $result_employees_view = $db->query($sql_employees);
										if ($result_employees_view->num_rows > 0) {
										while($row_employees= $result_employees_view->fetch_assoc()) {
											
										?>
										<option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'];  ?></option>
											
										<?php } }?>
						</select>
					
									 
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="userlevel"><?php echo $dil["userlevel"];?></label>
								<div class="col-sm-6">
						<select data-live-search="true"   title="<?php echo $dil["selectone"];?>"  class="form-control selectpicker" id="userlevel" name="userlevel" placeholder="<?php echo $dil["userlevel"];?>" multiple="">
					<?php if ($result_roles->num_rows > 0) {
							// output data of each row
					while($row_roles = $result_roles->fetch_assoc()) {
						
					?>
							<option value="<?php echo $row_roles["id"] ; ?>" ><?php echo $row_roles["role_name"] ; ?> </option>
					<?php }}?>
						</select>
								</div>
							</div>
							<div class="form-group row">
								
								<label class="col-sm-3 col-form-label" for="langinput"><?php echo $dil["soft_lang"];?></label>
								<div class="col-sm-6">
					<select data-live-search="true"   title="<?php echo $dil["selectone"];?>"  class="form-control selectpicker" id="langinput" name="langinput" placeholder="<?php echo $dil["soft_lang"];?>">
							
					<?php if ($result_lang->num_rows > 0) {
							// output data of each row
					while($row_lang = $result_lang->fetch_assoc()) {
						
					?>
					<option  value="<?php echo $row_lang['short_name']; ?>" data-content="<img src='<?php echo $row_lang['image_path']; ?>' width ='25px' height='25px' class='img-circle elevation-2' ><?php echo " ". $dil[$row_lang['lang_code']];?> ">  </option>
						
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
  <div class="modal fade" id="modalEdit" role="dialog">
    <div class="modal-dialog modal-lg">
    <form id="userUpdate" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["user_update_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
					<div class="card-body">
						
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="username"><?php echo $dil["username"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_username" name="update_username" value="" placeholder="<?php echo $dil["username"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="firstname"><?php echo $dil["firstname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_firstname" name="update_firstname" placeholder="<?php echo $dil["firstname"];?>" />
								</div>
							</div>
														<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="lastname"><?php echo $dil["lastname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_lastname" name="update_lastname" placeholder="<?php echo $dil["lastname"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="email"><?php echo $dil["email"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_email" name="update_email" placeholder="<?php echo $dil["email"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
					
						<select data-live-search="true" name="update_empno" title="<?php echo $dil["selectone"];?>" id="update_empno" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
							<option value="90051676">Eli</option>
							<option value="90051677">Veli</option>
							<option value="90051678">Pirveli</option>
						</select>
					
									 
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="userlevel"><?php echo $dil["userlevel"];?></label>
								<div class="col-sm-6">
						<select data-live-search="true"   title="<?php echo $dil["selectone"];?>" id="update_userlevel"  name ="update_userlevel" class="form-control selectpicker"  placeholder="<?php echo $dil["userlevel"];?>" multiple="">
				<?php if ($result_roles_edit->num_rows > 0) {
							// output data of each row
					while($row_roles = $result_roles_edit->fetch_assoc()) {
						
					?>
							<option value="<?php echo $row_roles["id"] ; ?>" ><?php echo $row_roles["role_name"] ; ?> </option>
				<?php }}?>
						</select>
								</div>
							</div>
								<div class="form-group row">
								
								<label class="col-sm-3 col-form-label" for="langinput"><?php echo $dil["soft_lang"];?></label>
								<div class="col-sm-6">
					<select data-live-search="true"   title="<?php echo $dil["selectone"];?>" id="update_deflang" class="form-control selectpicker"   name="update_deflang" placeholder="<?php echo $dil["soft_lang"];?>">
							
							<?php 
							if ($result_lang_edit->num_rows > 0) {
							// output data of each row
					while($row_lang = $result_lang_edit->fetch_assoc()) {
						
					?>
					<option  value="<?php echo $row_lang['short_name']; ?>" data-content="<img src='<?php echo $row_lang['image_path']; ?>' width ='25px' height='25px' class='img-circle elevation-2' ><?php echo " ". $dil[$row_lang['lang_code']];?> ">  </option>
						
					<?php } }?>

						</select>
							
								</div>
							</div>
 
						<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="password"><?php echo $dil["password"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="password" name="password"  value="" placeholder="<?php echo $dil["password"];?>" />
								</div>
							</div>
						<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="confirm_password"><?php echo $dil["passwordrep"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="confirm_password" name="confirm_password" value="" placeholder="<?php echo $dil["passwordrep"];?>" />
								</div>
			 
							</div>					
 
					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_userid" name="update_userid" value="" /> 			 
        </div>	
		</form>
      </div>
      
    </div>
  </div>
 
 
   <!--USER VIEW MODAL -->
  <div class="modal fade" id="modalView" role="dialog">
    <div class="modal-dialog modal-lg">
       <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-text"><?php echo $dil["user_view_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
					<div class="card-body">
						
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="view_username"><?php echo $dil["username"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_username" name="view_username" value="" placeholder="<?php echo $dil["username"];?>" readonly />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="view_firstname"><?php echo $dil["firstname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_firstname" name="view_firstname" placeholder="<?php echo $dil["firstname"];?>" readonly />
								</div>
							</div>
														<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="view_lastname"><?php echo $dil["lastname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_lastname" name="view_lastname" placeholder="<?php echo $dil["lastname"];?>" readonly />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="view_email"><?php echo $dil["email"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="view_email" name="view_email" placeholder="<?php echo $dil["email"];?>" readonly />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="employee"><?php echo $dil["employee"];?></label>
								<div class="col-sm-6">
					
						<select Disabled="true" data-live-search="true" name="view_empno" title="<?php echo $dil["selectone"];?>" id="view_empno" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>" >
							<option value="90051676">Eli</option>
							<option value="90051677">Veli</option>
							<option value="90051678">Pirveli</option>
						</select>
					
									 
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-3 col-form-label" for="userlevel"><?php echo $dil["userlevel"];?></label>
								<div class="col-sm-6">
						<select  data-live-search="true"  Disabled="true"  title="<?php echo $dil["selectone"];?>" id="view_userlevel"  name ="view_userlevel" class="form-control selectpicker"  placeholder="<?php echo $dil["userlevel"];?>" multiple="">
				<?php if ($result_roles_view->num_rows > 0) {
							// output data of each row
					while($row_roles = $result_roles_view->fetch_assoc()) {
						
					?>
							<option  value="<?php echo $row_roles["id"] ; ?>" ><?php echo $row_roles["role_name"] ; ?> </option>
				<?php }}?>
						</select>
								</div>
							</div>
								<div class="form-group row">
								
								<label class="col-sm-3 col-form-label" for="langinput"><?php echo $dil["soft_lang"];?></label>
								<div class="col-sm-6">
					<select Disabled="true" data-live-search="true"   title="<?php echo $dil["selectone"];?>" id="view_deflang" class="form-control selectpicker"   name="view_deflang" placeholder="<?php echo $dil["soft_lang"];?>">
							
							<?php if ($result_lang_view->num_rows > 0) {
							// output data of each row
					while($row_lang = $result_lang_view->fetch_assoc()) {
						
					?>
					<option readonly value="<?php echo $row_lang['short_name']; ?>" data-content="<img src='<?php echo $row_lang['image_path']; ?>' width ='25px' height='25px' class='img-circle elevation-2' ><?php echo " ". $dil[$row_lang['lang_code']];?> ">  </option>
						
					<?php } }?>

						</select>
							
								</div>
							</div>				
 
					</div>
				</div>
   
		</div>
        <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
        </div>	

      </div>
      
    </div>
  </div>
 
 
 
 
		   <table id="user_table" class="table table-striped  table-bordered table-hover">
                <thead>
               <tr>
                        <th>id</th>
                        <th>İstifadəçi  adı </th>
						<th>Adı</th>
						<th>Soyadı</th>
						<th>Mail</th>
						<th>İş yeri</th>
						<th>Statusu</th>
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
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script.js"></script>

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
<script>

  $(function () {
 
/*FORM  VALIDATE */	  
 			$( "#userInsert" ).validate( {
				rules: {
					firstname: "required",
					lastname: "required",
					userlevel: "required",
					username: {
						required: true,
						minlength: 3
					},
					email: {
						required: true,
						email: true
					},
					langinput: "required"
				},
				messages: {
					firstname: "<?php echo $dil['empty_firstname'];?>",
					lastname: "<?php echo $dil['empty_lastname'];?>",
					userlevel: "<?php echo $dil['empty_role'];?>",
					username: {
						required: "<?php echo $dil['empty_user'];?>",
						minlength: "<?php echo $dil['length_input'];?>"
					},

					email: "<?php echo $dil['wrong_mail'];?>",
					langinput: "<?php echo $dil['wrong_lang'];?>"
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
	
	
/*LOAD  USER TABLE */
	
	
var table = $("#user_table").DataTable({
	
  "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
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
                url: "user/get_users.php",
                type: "POST"
            },"columnDefs": [ {
			"width": "8%",
            "targets": -1,
            "data": null,
            "defaultContent": "<img  id='view' style='cursor:pointer' src='dist/img/icons/view-file.png' width='22' height='22'>"+  
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
            ]

        });
		
 $( ".dt-buttons" ).prepend( $( "<a class='dt-button buttons-excel buttons-html5' id='add_new_item'  data-toggle='modal' data-target='#myModal'><?php echo $dil['addnew'];?> <i class='fa fa-plus'></i></a>" ) );
  
  /*Button  click  on grid */
	$('#user_table tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("userid").value = data[0];
		$('#modalDelete').modal('show');
    } );
	

  $('#user_table tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		GetUserDetails(data[0],'update');
		document.getElementById("update_userid").value = data[0];
		 
    } );
 
$('#user_table tbody').on( 'click', '#view', function () {
        var data = table.row( $(this).parents('tr') ).data();
		GetUserDetails(data[0],'view');
		document.getElementById("update_userid").value = data[0];
		 
    } );


 
 	/*USERIN  UPDATE MELUMATLARINI  GETIRIR*/
	 function GetUserDetails(userid,optype) 
	 {
			$.post("user/getUserDetail.php", 
				{
					userid: userid
				},
				function (user_data, status) 
				{
					// PARSE json data
					var user = JSON.parse(user_data);
					// Assing existing values to the modal popup fields
					
					if  (optype=='update') {
					$("#update_username").val(user.username);
					$("#update_firstname").val(user.firstname);
					$("#update_lastname").val(user.lastname);
					$("#update_email").val(user.reg_mail);
					$('#update_empno').val(user.empno).change();
					$('#update_deflang').val(user.def_lang).change();
					$('#update_userlevel').val([1,2,3]).change();
					//$('#update_userlevel').selectpicker('val', [1,2,3]);
					$('#modalEdit').modal('show');
					}
					else {
					$("#view_username").val(user.username);
					$("#view_firstname").val(user.firstname);
					$("#view_lastname").val(user.lastname);
					$("#view_email").val(user.reg_mail);
					$('#view_empno').val(user.empno).change();
					$('#view_deflang').val(user.def_lang).change();
					$('#view_userlevel').val([1,2,3]).change();
					//$('#update_userlevel').selectpicker('val', [1,2,3]);
						$('#modalView').modal('show');						
					}
				}
			);

}
 
 /*USER MELUMATLARI  DAXIL  EDILIR  */
		$("#userInsert").submit(function(e)
		{
                    e.preventDefault();
					if($("#userInsert").valid())
			{ 
                    $.ajax( {
                        url: "user/userInsert.php",
                        method: "post",
                        data: $("form").serialize(),
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
									 $("#myModal").modal('hide');
								 }
								 else if (strMessage==='success')
								 {
									 $("#successp").text('Melumat muveffeqiyyetle daxil edildi');
									 $("#modalInsertSuccess").modal('show');
									 $("#myModal").modal('hide');
									 
								 }
								 else  {
									  $("#errorp").text(strMessage);
									 $("#modalInsertError").modal('show');
									 $("#myModal").modal('hide');
									 
								 }
						}
                    });
				    table.ajax.reload();
					$( "#userInsert" ).get(0).reset();
			}
        });
				
				
	$("#userDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "user/userDelete.php",
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
				
				
				
	$("#userUpdate").submit(function(e) {
                    e.preventDefault();
			 if($("#userUpdate").valid()){ 
                    $.ajax( {
                        url: "user/userUpdate.php",
                        method: "post",
                        data: $("form").serialize(),
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
								 $('#modalEdit').modal('hide');
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
				

  });
</script>
</body>
</html>
