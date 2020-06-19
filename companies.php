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
  <!-- Test  yoxlama Tell the browser to be responsive to screen width -->
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
      <img src="dist/img/rhr.png" alt="RahatHR Logo" class="brand-image img-circle elevation-3"
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
              <h5 class="modal-title"><?php echo $dil["company_edit_title"];?></h5>
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
              <h5 class="modal-title"><?php echo  $dil["company_insert_title"];?></h5>
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
              <h5 class="modal-title"> <?php echo  $dil["company_insert_title"];?></h5>
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
			  <form id="companyDelete" method="post" class="form-horizontal" action="">
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
    <form id="companyInsert" method="post" class="form-horizontal" action="">
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
                            <label class="col-sm-5 col-form-label" for="compempid"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="compempid" id='compempid' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>"  >
                                    <?php
                                    $result_employees_s_view = $db->query($sql_employees);
                                    if ($result_employees_s_view->num_rows > 0) {
                                        while($row_employees= $result_employees_s_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'] ;  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="company_name"><?php echo $dil["company_name"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="company_name" name="company_name" value="" placeholder="<?php echo $dil["company_name"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="voen"><?php echo $dil["voen"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control onlyDigit" id="voen" name="voen" placeholder="<?php echo $dil["voen"];?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="sun"><?php echo $dil["sun"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sun" name="sun" placeholder="<?php echo $dil["sun"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="bank_name"><?php echo $dil["bank_name"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="<?php echo $dil["bank_name"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="code"><?php echo $dil["code"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="code" name="code" placeholder="<?php echo $dil["code"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="bank_filial"><?php echo $dil["bank_filial"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="bank_filial" name="bank_filial" placeholder="<?php echo $dil["bank_filial"];?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="bank_voen"><?php echo $dil["bank_voen"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control onlyDigit" id="bank_voen" name="bank_voen" placeholder="<?php echo $dil["bank_voen"];?>"  />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="cor_account"><?php echo $dil["cor_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="cor_account" name="cor_account" placeholder="<?php echo $dil["cor_account"];?>"  />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="swift"><?php echo $dil["swift"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="swift" name="swift" placeholder="<?php echo $dil["swift"];?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="azn_account"><?php echo $dil["azn_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="azn_account" name="azn_account" placeholder="<?php echo $dil["azn_account"];?>"  />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="usd_account"><?php echo $dil["usd_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="usd_account" name="usd_account" placeholder="<?php echo $dil["usd_account"];?>"  />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="eur_account"><?php echo $dil["eur_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="eur_account" name="eur_account" placeholder="<?php echo $dil["eur_account"];?>"  />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="country"><?php echo $dil["country"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="country" name="country" placeholder="<?php echo $dil["country"];?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="city"><?php echo $dil["city"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="city" name="city" placeholder="<?php echo $dil["city"];?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="address"><?php echo $dil["address"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo $dil["address"];?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="poct_index"><?php echo $dil["poct_index"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="poct_index" name="poct_index" placeholder="<?php echo $dil["poct_index"];?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="tel"><?php echo $dil["tel"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tel" name="tel" placeholder="<?php echo $dil["tel"];?>" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="enterprise_head_fullname"><?php echo $dil["enterprise_head_fullname"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="enterprise_head_fullname" name="enterprise_head_fullname" placeholder="<?php echo $dil["enterprise_head_fullname"];?>"  />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="enterprise_head_position"><?php echo $dil["enterprise_head_position"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="enterprise_head_position" name="enterprise_head_position" placeholder="<?php echo $dil["enterprise_head_position"];?>"  />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="founder"><?php echo $dil["founder"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="founder" name="founder" placeholder="<?php echo $dil["founder"];?>" />
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
    <form id="companyUpdate" method="post" class="form-horizontal" action="">
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
			<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title"><?php echo $dil["company_edit_title"];?></h4>

            <span  id="badge_danger_update" class="badge badge-danger"></span>
					</div>
					<div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="update_compempid"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="update_compempid" id='update_compempid' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>"  Disabled="true"  >
                                    <?php
                                    $result_employees_s_view = $db->query($sql_employees);
                                    if ($result_employees_s_view->num_rows > 0) {
                                        while($row_employees= $result_employees_s_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'] ;  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>
							<div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_company_name"><?php echo $dil["company_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_company_name" name="update_company_name" value="" placeholder="<?php echo $dil["company_name"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_voen"><?php echo $dil["voen"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_voen" name="update_voen" placeholder="<?php echo $dil["voen"];?>" />
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_sun"><?php echo $dil["sun"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_sun" name="update_sun" placeholder="<?php echo $dil["sun"];?>" />
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_bank_name"><?php echo $dil["bank_name"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_bank_name" name="update_bank_name" placeholder="<?php echo $dil["bank_name"];?>" />
								</div>
							</div>

                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_code"><?php echo $dil["code"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_code" name="update_code" placeholder="<?php echo $dil["code"];?>" />
								</div>
							</div>

                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_bank_filial"><?php echo $dil["bank_filial"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_bank_filial" name="update_bank_filial" placeholder="<?php echo $dil["bank_filial"];?>" />
								</div>
							</div>

                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_bank_voen"><?php echo $dil["bank_voen"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_bank_voen" name="update_bank_voen" placeholder="<?php echo $dil["bank_voen"];?>" />
								</div>
							</div>

                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_cor_account"><?php echo $dil["cor_account"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_cor_account" name="update_cor_account" placeholder="<?php echo $dil["cor_account"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_swift"><?php echo $dil["swift"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_swift" name="update_swift" placeholder="<?php echo $dil["swift"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_azn_account"><?php echo $dil["azn_account"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_azn_account" name="update_azn_account" placeholder="<?php echo $dil["azn_account"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_usd_account"><?php echo $dil["usd_account"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_usd_account" name="update_usd_account" placeholder="<?php echo $dil["usd_account"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_eur_account"><?php echo $dil["eur_account"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_eur_account" name="update_eur_account" placeholder="<?php echo $dil["eur_account"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_country"><?php echo $dil["country"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_country" name="update_country" placeholder="<?php echo $dil["country"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_city"><?php echo $dil["city"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_city" name="update_city" placeholder="<?php echo $dil["city"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_address"><?php echo $dil["address"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_address" name="update_address" placeholder="<?php echo $dil["address"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_poct_index"><?php echo $dil["poct_index"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_poct_index" name="update_poct_index" placeholder="<?php echo $dil["poct_index"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_tel"><?php echo $dil["tel"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_tel" name="update_tel" placeholder="<?php echo $dil["tel"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_enterprise_head_fullname"><?php echo $dil["enterprise_head_fullname"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_enterprise_head_fullname" name="update_enterprise_head_fullname" placeholder="<?php echo $dil["enterprise_head_fullname"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_enterprise_head_position"><?php echo $dil["enterprise_head_position"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_enterprise_head_position" name="update_enterprise_head_position" placeholder="<?php echo $dil["enterprise_head_position"];?>" />
								</div>
							</div>


                            <div class="form-group row">
								<label class="col-sm-5 col-form-label" for="update_founder"><?php echo $dil["founder"];?></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="update_founder" name="update_founder" placeholder="<?php echo $dil["founder"];?>" />
								</div>
							</div>
					</div>
				</div>
   
		</div>
        <div class="modal-footer">
						 
		<button  id ="add_new_item2" type="submit" class="btn btn-primary" name="signup" value="UPDATE"><?php echo $dil["save"];?></button>
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $dil["close"];?></button>
		<input type="hidden" id="update_companyid" name="update_companyid" value="" /> 			 
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
                            <label class="col-sm-5 col-form-label" for="view_compempid"><?php echo $dil["employee"];?></label>
                            <div class="col-sm-6">
                                <select data-live-search="true"  name="view_compempid" id='view_compempid' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>"  Disabled="true"  >
                                    <?php
                                    $result_employees_s_view = $db->query($sql_employees);
                                    if ($result_employees_s_view->num_rows > 0) {
                                        while($row_employees= $result_employees_s_view->fetch_assoc()) {

                                            ?>
                                            <option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'] ;  ?></option>

                                        <?php } }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_company_name"><?php echo $dil["company_name"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_company_name" name="view_company_name" value="" placeholder="<?php echo $dil["company_name"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_voen"><?php echo $dil["voen"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_voen" name="view_voen" placeholder="<?php echo $dil["voen"];?>" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_sun"><?php echo $dil["sun"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_sun" name="view_sun" placeholder="<?php echo $dil["sun"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_bank_name"><?php echo $dil["bank_name"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_bank_name" name="view_bank_name" placeholder="<?php echo $dil["bank_name"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_code"><?php echo $dil["code"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_code" name="view_code" placeholder="<?php echo $dil["code"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_bank_filial"><?php echo $dil["bank_filial"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_bank_filial" name="view_bank_filial" placeholder="<?php echo $dil["bank_filial"];?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_bank_voen"><?php echo $dil["bank_voen"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_bank_voen" name="view_bank_voen" placeholder="<?php echo $dil["bank_voen"];?>" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_cor_account"><?php echo $dil["cor_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_cor_account" name="view_cor_account" placeholder="<?php echo $dil["cor_account"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_swift"><?php echo $dil["swift"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_swift" name="view_swift" placeholder="<?php echo $dil["swift"];?>" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_azn_account"><?php echo $dil["azn_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_azn_account" name="view_azn_account" placeholder="<?php echo $dil["azn_account"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_usd_account"><?php echo $dil["usd_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_usd_account" name="view_usd_account" placeholder="<?php echo $dil["usd_account"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_eur_account"><?php echo $dil["eur_account"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_eur_account" name="view_eur_account" placeholder="<?php echo $dil["eur_account"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_country"><?php echo $dil["country"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_country" name="view_country" placeholder="<?php echo $dil["country"];?>" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_city"><?php echo $dil["city"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_city" name="view_city" placeholder="<?php echo $dil["city"];?>" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_address"><?php echo $dil["address"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_address" name="view_address" placeholder="<?php echo $dil["address"];?>" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_poct_index"><?php echo $dil["poct_index"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_poct_index" name="view_poct_index" placeholder="<?php echo $dil["poct_index"];?>" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_tel"><?php echo $dil["tel"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_tel" name="view_tel" placeholder="<?php echo $dil["tel"];?>" readonly/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_enterprise_head_fullname"><?php echo $dil["enterprise_head_fullname"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_enterprise_head_fullname" name="view_enterprise_head_fullname" placeholder="<?php echo $dil["enterprise_head_fullname"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_enterprise_head_position"><?php echo $dil["enterprise_head_position"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_enterprise_head_position" name="view_enterprise_head_position" placeholder="<?php echo $dil["enterprise_head_position"];?>" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label" for="view_founder"><?php echo $dil["founder"];?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="view_founder" name="view_founder" placeholder="<?php echo $dil["founder"];?>" readonly/>
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

    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
        <div class="tab-pane active" id="employees">


        <table id="company_table" class="table table-striped  table-bordered table-hover">
                <thead>
               <tr>
                        <th>id</th>
                        <th><?php echo $dil["fio"];?></th>
                        <th><?php echo $dil["company_name"];?></th>
                        <th><?php echo $dil["voen"];?></th>
                        <th><?php echo $dil["sun"];?></th>
                        <th><?php echo $dil["bank_name"];?></th>
                        <th><?php echo $dil["bank_filial"];?></th>
                        <th><?php echo $dil["code"];?></th>
                        <th><?php echo $dil["bank_voen"];?></th>
                        <th><?php echo $dil["cor_account"];?></th>
                        <th><?php echo $dil["swift"];?></th>
                        <th><?php echo $dil["azn_account"];?></th>
                        <th><?php echo $dil["usd_account"];?></th>
                        <th><?php echo $dil["eur_account"];?></th>
                        <th><?php echo $dil["country"];?></th>
                        <th><?php echo $dil["city"];?></th>
                        <th><?php echo $dil["address"];?></th>
                        <th><?php echo $dil["poct_index"];?></th>
                        <th><?php echo $dil["tel"];?></th>
                        <th><?php echo $dil["enterprise_head_fullname"];?></th>
                        <th><?php echo $dil["enterprise_head_position"];?></th>
                        <th><?php echo $dil["founder"];?></th>


                   </tr>
                </thead>

              </table>

          </div>
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
 			$( "#companyInsert" ).validate( {
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
 
 
 
  			$( "#companyUpdate" ).validate( {
				
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
	
	
var table = $("#company_table").DataTable({
    "scrollX": true,
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
                url: "company/get_company.php",
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
	$('#company_table tbody').on( 'click', '#delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        document.getElementById("userid").value = data[0];
		$('#modalDelete').modal('show');
    } );
	

  $('#company_table tbody').on( 'click', '#edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
		GetCompanyDetails(data[0],'update');
		document.getElementById("update_companyid").value = data[0];
		 
    } );
 
$('#company_table tbody').on( 'click', '#view', function () {
        var data = table.row( $(this).parents('tr') ).data();
		GetCompanyDetails(data[0],'view');
		document.getElementById("update_companyid").value = data[0];
		 
    } );


 
 	/*USERIN  UPDATE MELUMATLARINI  GETIRIR*/
	 function GetCompanyDetails(companyid,optype)
	 { console.log('companyid=',companyid)
			$.post("company/getCompanyDetail.php", 
				{
                    companyid: companyid
				},
				function (company_data, status)
				{
				    console.log(company_data)
					// PARSE json data
					var company = JSON.parse(company_data);
					// Assing existing values to the modal popup fields
					
					if  (optype=='update') {
					$("#update_compempid").val(company.emp_id).change();
					$("#update_company_name").val(company.company_name);
					$("#update_voen").val(company.voen);
					$("#update_sun").val(company.sun);
					$("#update_bank_name").val(company.bank_name);
					$("#update_code").val(company.kod);
					$("#update_bank_filial").val(company.bank_filial);
					$("#update_bank_voen").val(company.bank_voen);
					$("#update_cor_account").val(company.cor_account);
					$("#update_swift").val(company.swift);
					$("#update_azn_account").val(company.azn_account);
					$("#update_usd_account").val(company.usd_account);
					$("#update_eur_account").val(company.eur_account);
					$("#update_country").val(company.country);
					$("#update_city").val(company.city);
					$("#update_address").val(company.address);
					$("#update_poct_index").val(company.poct_index);
					$("#update_tel").val(company.tel);
					$("#update_enterprise_head_fullname").val(company.enterprise_head_fullname);
					$("#update_enterprise_head_position").val(company.enterprise_head_position);
					$("#update_founder").val(company.founder);

					$('#modalEdit').modal('show');
					}
					else {
                        $("#view_compempid").val(company.emp_id).change();
                        $("#view_company_name").val(company.company_name);
                        $("#view_voen").val(company.voen);
                        $("#view_sun").val(company.sun);
                        $("#view_bank_name").val(company.bank_name);
                        $("#view_code").val(company.kod);
                        $("#view_bank_filial").val(company.bank_filial);
                        $("#view_bank_voen").val(company.bank_voen);
                        $("#view_cor_account").val(company.cor_account);
                        $("#view_swift").val(company.swift);
                        $("#view_azn_account").val(company.azn_account);
                        $("#view_usd_account").val(company.usd_account);
                        $("#view_eur_account").val(company.eur_account);
                        $("#view_country").val(company.country);
                        $("#view_city").val(company.city);
                        $("#view_address").val(company.address);
                        $("#view_poct_index").val(company.poct_index);
                        $("#view_tel").val(company.tel);
                        $("#view_enterprise_head_fullname").val(company.enterprise_head_fullname);
                        $("#view_enterprise_head_position").val(company.enterprise_head_position);
                        $("#view_founder").val(company.founder);
						$('#modalView').modal('show');						
					}
				}
			);

}
 
 /*USER MELUMATLARI  DAXIL  EDILIR  */
		$("#companyInsert").submit(function(e)
		{
                    e.preventDefault();
					if($("#companyInsert").valid())
			{ 
                    $.ajax( {
                        url: "company/companyInsert.php",
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
					$( "#companyInsert" ).get(0).reset();
			}
        });
				
				
	$("#companyDelete").submit(function(e) {
		
                    e.preventDefault();
                    $.ajax( {
                        url: "company/companyDelete.php",
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
				
				
				
	$("#companyUpdate").submit(function(e) {
	    console.log('companyUpdate')
                    e.preventDefault();
			 if($("#companyUpdate").valid()){ 
                    $.ajax( {
                        url: "company/companyUpdate.php",
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

  // Only digits (with dot)
  $(document).on('keypress', ".onlyDigit", function (e) {
      var char = e.which ;
      if (
          ( char != 46 || $(this).val().indexOf('.') != -1 )
          && (char != 8) //backspace
          && (char != 0) // tab + controls
          && ( char <  48 || char > 57 )
      )
      {
          e.preventDefault();
      }

      // If wants to make dot first
      if ( (char == 46) && ( $(this).val().indexOf('.') == -1) && ($(this).val() =="") )
      {
          e.preventDefault();
      }
      // If first is zero allow only dot
      if ( (char != 46) && ($(this).val() =="0") )
      {
          e.preventDefault();
      }
  });
</script>
</body>
</html>
