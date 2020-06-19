<?php    
 include('session.php');  
 $site_lang=$_SESSION['dil'] ;
 $sql_fam_member_type= "select * from $tbl_family_member_types  where lang='$site_lang' ";
 $sql_military_rank= "select * from $tbl_military_rank  where lang='$site_lang' ";
 $sql_military_staff= "select * from $tbl_military_staff  where lang='$site_lang' ";
 $sql_driving_category= "select * from $tbl_driver_lic_cat  where lang='$site_lang' ";

 $sql_lang_level= "select * from $tbl_lang_level  where lang_short_name='$site_lang' ";
 $result_qua_dic_view = $db->query($sql_qua_dic);
 $result_qua_dic_s_view = $db->query($sql_qua_dic);	 
 $result_university_view = $db->query($sql_university);
 $result_university_s_view = $db->query($sql_university);
 $result_emp_lang_view = $db->query($sql_emp_lang);
 $result_emp_lang_edit = $db->query($sql_emp_lang);
 $result_lang_level_view = $db->query($sql_lang_level);
 $result_lang_level_edit = $db->query($sql_lang_level);
 $result_lang_level_w_view = $db->query($sql_lang_level);
 $result_lang_level_w_edit = $db->query($sql_lang_level);
 $result_lang_level_s_view = $db->query($sql_lang_level);
 $result_lang_level_s_edit = $db->query($sql_lang_level);
 $result_lang_level_u_view = $db->query($sql_lang_level);
 $result_lang_level_u_edit = $db->query($sql_lang_level);
 $result_fam_member_type_view = $db->query($sql_fam_member_type);
 $result_fam_member_type_edit = $db->query($sql_fam_member_type);
 $result_military_rank_view = $db->query($sql_military_rank);
 $result_military_rank_edit = $db->query($sql_military_rank);
 $result_military_staff_view = $db->query($sql_military_staff);
 $result_military_staff_edit = $db->query($sql_military_staff);

 $result_driving_category_view = $db->query($sql_driving_category);
 $result_driving_category_edit = $db->query($sql_driving_category);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>RahatHR</title>
  <!-- Tell the browser to be responsive to screen width -->
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
            <h1 class="m-0 text-dark"><?php echo $dil["employees"];?></h1>
          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=""><?php echo $dil["employees"];?></a></li>
              <li class="breadcrumb-item active"><?php echo $dil["employee_list"];?></li>
            </ol>
          </div> 
        </div> 
      </div> 
    </div>-->
	<br>
<div class="col-12 col-sm-6 col-lg-12">
 <div class="card">
<div class="card-body">




<!-- SUCCCES MODAL INSERT -->
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

<!-- ERROR  MODAL INSERT -->
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
<!-- SUCCCES  MODAL  DELETE -->
<div class="modal fade" id="modalDeleteSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $dil["delete_warning"];?></h4>
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
<!-- SUCCCES  MODAL UPDATE -->
<div class="modal fade" id="modalUpdateSuccess">
        <div class="modal-dialog  modal-sm">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $dil["user_update_title"];?></h4>
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
			  <form id="employeeDelete" method="post" class="form-horizontal" action="">
              <button class="btn btn-outline-light" id="itemDelete" type="submit"><?php echo $dil["yes"];?></button>
			  <input type="hidden" id="empid" name="empid" value="" /> 
			  </form>
			  <button class="btn btn-outline-light" type="button" data-dismiss="modal"><?php echo $dil["no"];?></button>
			   
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>	  

  <?php 
  include  ('employees/mainInfoModal.php');
  include  ('payment_salary/paymentSalaryModal.php');
  include  ('family_info/familyInfoModal.php');
  include  ('driver_license/drivingLicenseInfoModal.php');
  include  ('medical_info/medicalInfoModal.php');
  include  ('previous_positions/previousPositionsModal.php');
  include  ('migration_info/migrationInfoModal.php');
  include  ('emp_lang/langModal.php');
  include  ('education/educationModal.php');
  include  ('certification/certificationModal.php');
  include  ('skills/skillsModal.php');
  include  ('military_info/militaryInfoModal.php');
  ?>
  
  
  
<ul class="nav nav-tabs"  id="navtabs" role="tablist">
  <li Class="nav-item"><a href="#employees"  style="border-radius:0px;color:#494e53;" class="nav-link active" role="tab" data-toggle="tab"    ><?php echo $dil["employees"];?></a></li>
  <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" style="border-radius:0px;color:#494e53;" data-toggle="dropdown" id="qual" href="#"     ><?php echo $dil["qualification"];?></a>
    <div class="dropdown-menu dropdown-menu-lg  ">
      <a class="dropdown-item" id="eduinfotab" href="#eduinfo" data-toggle="tab">  <?php echo $dil["education_informations"];?></a>
      <a class="dropdown-item" id="certtab" href="#certification" data-toggle="tab"> <?php echo $dil["certification_info"];?></a>
	  <a class="dropdown-item" id="langtab" href="#lang" data-toggle="tab"><?php echo $dil["lang_knowledge"];?></a>
	  <a class="dropdown-item" id="skillstab" href="#skills" data-toggle="tab"><?php echo $dil["skills"];?></a>

    </div>
  </li>
  <li Class="nav-item"><a href="#aileinfo" id="aileinfotab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" >
  <?php echo $dil["family_information"];?> </a></li>

  <li Class="nav-item"><a href="#militaryInfo" id="militaryInfotab" style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" >Hərbi məlumatlar</a></li>
    <li Class="nav-item"><a href="#paymentSalary"  id="paymentSalarytab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" > Ödəmə/maaş  </a></li>
    <li Class="nav-item"><a href="#mysqltab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" > Struktur </a></li>
    <li Class="nav-item"><a href="#mysqltab"  style="border-radius:0px;color:#494e53;" class="nav-link" role="tab" data-toggle="tab" > Iş yeri barədə </a></li>
	
    <li class="nav-item dropdown" >
    <a class="nav-link dropdown-toggle" style="border-radius:0px;color:#494e53;" data-toggle="dropdown" href="#"   id="qual2"  ><?php echo $dil["other_informations"];?></a>
    <div class="dropdown-menu dropdown-menu-lg  ">
      <a class="dropdown-item" href="#drivingLicense"  id="drivingLicensetab" data-toggle="tab">Sürücülük vəsiqəsi</a>
      <a class="dropdown-item" href="#migrationInfo"   id="migrationInfotab" data-toggle="tab">Miqrasiya Məlumatları</a>
	  <a class="dropdown-item" href="#medicalInfo"   id="medicalInfotab" data-toggle="tab">Tibbi məlumatlar</a>
	  <a class="dropdown-item" href="#previousPositions"    id="previousPositionstab" data-toggle="tab">Əvvəlki iş yerləri</a>
    </div>
  </li>
</ul>
</li>


<!-- Tab panes -->
<div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
	<div class="tab-pane active" id="employees">   
		<table id="employee_table" class="table table-striped  table-bordered table-hover">
            <thead>
				<tr>
                    <th>id</th>
                    <th>Şəkil</th>
                    <th>Adı</th>
					<th>Soyadı</th>
					<th>Ataadı</th>
					<th>İşçi nömrəsi</th>
					<th>Statusu</th>
					<th></th>
				</tr>
            </thead>  
        </table>
	</div>
  <div class="tab-pane" id="javatab">The Java is an object-oriented programming language that was developed by James Gosling from the Sun Microsystems in 1995.</div>
  <div class="tab-pane" id="main_information"> main_information  </div>
  <div class="tab-pane" id="eduinfo">
 
 
  		<table id="eduinfo_table" class="table table-striped  table-bordered table-hover">
            <thead>
				<tr>
                    <th style="width:15px;">id</th>
                    <th><?php echo $dil["fio"];?></th>
					<th><?php echo $dil["qualification"];?></th>
					<th><?php echo $dil["institution_name"];?></th>
					<th><?php echo $dil["faculty"];?></th>
					<th><?php echo $dil["profession"];?></th>
					<th><?php echo $dil["diplom_seria_num"];?></th>
					<th><?php echo $dil["uni_end_date"];?></th>
					<th><?php echo $dil["diplom_issue_date"];?></th>
					<th><?php echo $dil["operation"];?></th>
				</tr>
            </thead>  
        </table>
  </div>
  <div class="tab-pane" id="certification">
 
   		<table id="cert_table" class="table table-striped  table-bordered table-hover">
            <thead>
				<tr>
                    <th style="width:15px;">id</th>
                    <th><?php echo $dil["fio"];?></th>
					<th><?php echo $dil["training_center_name"];?></th>
					<th><?php echo $dil["training_name"];?></th>
					<th><?php echo $dil["training_date"];?> </th>
					<th><?php echo $dil["cert_given_date"];?> </th>
					<th><?php echo $dil["operation"];?> </th>
				</tr>
            </thead>  
        </table>
  </div>
  <div class="tab-pane" id="skills"> 
     		<table id="skills_table" class="table table-striped  table-bordered table-hover">
            <thead>
				<tr>
                    <th style="width:15px;">id</th>
                    <th><?php echo $dil["fio"];?></th>
					<th><?php echo $dil["skills_name"];?> </th>
					<th><?php echo $dil["skills_descr"];?> </th>
					<th><?php echo $dil["operation"];?></th>
				</tr>
            </thead>  
        </table>
  
  </div>
  <div class="tab-pane" id="lang"> 
	<table id="lang_knowledge_table" class="table table-striped  table-bordered table-hover">
            <thead>
				<tr>
                    <th style="width:15px;">id</th>
                    <th><?php echo $dil["fio"];?></th>
					<th><?php echo $dil["language"];?></th>
					<th><?php echo $dil["reading"];?></th>
					<th><?php echo $dil["speaking"];?></th>
					<th><?php echo $dil["writing"];?></th>
					<th><?php echo $dil["understanding"];?></th>
					<th><?php echo $dil["operation"];?></th>
				</tr>
            </thead>  
        </table>
  
  </div>
  <div class="tab-pane" id="aileinfo">
	<table id="faminfo_table" class="table table-striped  table-bordered table-hover">
            <thead>
				<tr>
                    <th style="width:15px;">id</th>
                    <th><?php echo $dil["fio"];?></th>
					<th><?php echo $dil["family_member_name"];?></th>
					<th><?php echo $dil["family_member_type"];?></th>
					<th><?php echo $dil["family_member_phone"];?></th>
					<th><?php echo $dil["family_member_adress"];?></th>
					<th><?php echo $dil["operation"];?></th>
				</tr>
            </thead>  
        </table>
  
 </div>
 
<!--<div class="tab-pane" id="herbi">HERBI  MELUMATLAR</div>-->
<div class="tab-pane" id="militaryInfo">
    <table id="military_info_table" class="table table-striped  table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:15px;">id</th>
            <th><?php echo $dil["fio"];?></th>
            <th><?php echo $dil["military_registration_group"];?></th>
            <th><?php echo $dil["military_registration_category"];?></th>
            <th><?php echo $dil["military_staff"];?></th>
            <th><?php echo $dil["military_rank"];?></th>
            <th><?php echo $dil["military_specialty_accounting"];?></th>
            <th><?php echo $dil["military_fitness_service"];?></th>
            <th><?php echo $dil["military_registration_service"];?></th>
            <th><?php echo $dil["military_registration_date"];?></th>
            <th><?php echo $dil["military_general"];?></th>
            <th><?php echo $dil["military_special"];?></th>
            <th><?php echo $dil["military_no_official"];?></th>
            <th><?php echo $dil["military_additional_information"];?></th>
            <th><?php echo $dil["military_date_completion"];?></th>
            <th><?php echo $dil["operation"];?></th>
        </tr>
        </thead>
    </table>
</div>
<div class="tab-pane" id="paymentSalary">
    <table id="payment_salary_table" class="table table-striped  table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:15px;">id</th>
            <th><?php echo $dil["fio"];?></th>
            <th><?php echo $dil["payment_wage"];?></th>
            <th><?php echo $dil["payment_addition_salary"];?></th>
            <th><?php echo $dil["payment_addition_salary2"];?></th>
            <th><?php echo $dil["payment_total_monthly_salary"];?></th>
            <th><?php echo $dil["payment_prize_amount"];?></th>
            <th><?php echo $dil["payment_reward_period"];?></th>
            <th><?php echo $dil["payment_place_expenditure"];?></th>
            <th><?php echo $dil["payment_salary_payment_day"];?></th>
            <th><?php echo $dil["payment_parties_agree_payment_wages"];?></th>
            <th><?php echo $dil["operation"];?></th>
        </tr>
        </thead>
    </table>
</div>

    <div class="tab-pane" id="drivingLicense">
        <table id="driving_info_table" class="table table-striped  table-bordered table-hover">
            <thead>
            <tr>
                <th style="width:15px;">id</th>
                <th><?php echo $dil["fio"];?></th>
                <th><?php echo $dil["driving_serial_number_card"];?></th>
                <th><?php echo $dil["driving_category"];?></th>
                <th><?php echo $dil["driving_licensing_authority"];?></th>
                <th><?php echo $dil["driving_date_issue_card"];?></th>
                <th><?php echo $dil["driving_period_validity"];?></th>
                <th><?php echo $dil["operation"];?></th>
            </tr>
            </thead>
        </table>
    </div>
<div class="tab-pane" id="migrationInfo">
    <table id="migration_info_table" class="table table-striped  table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:15px;">id</th>
            <th><?php echo $dil["fio"];?></th>
            <th><?php echo $dil["trp_seria_number"];?></th>
            <th><?php echo $dil["trp_permit_reason"];?></th>
            <th><?php echo $dil["trp_permit_date"];?></th>
            <th><?php echo $dil["trp_valid_date"];?></th>
            <th><?php echo $dil["trp_issuer"];?></th>
            <th><?php echo $dil["prp_seria_number"];?></th>
            <th><?php echo $dil["prp_permit_date"];?></th>
            <th><?php echo $dil["prp_valid_date"];?></th>
            <th><?php echo $dil["prp_issuer"];?></th>
            <th><?php echo $dil["wp_seria_number"];?></th>
            <th><?php echo $dil["wp_permit_date"];?></th>
            <th><?php echo $dil["wp_valid_date"];?></th>
            <th><?php echo $dil["operation"];?></th>
        </tr>
        </thead>
    </table>
</div>
<div class="tab-pane" id="medicalInfo">
    <table id="medical_info_table" class="table table-striped  table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:15px;">id</th>
            <th><?php echo $dil["fio"];?></th>
            <th><?php echo $dil["medical_app"];?></th>
            <th><?php echo $dil["medical_renew_interval"];?></th>
            <th><?php echo $dil["medical_last_renew_date"];?></th>
            <th><?php echo $dil["medical_physical_deficiency"];?></th>
            <th><?php echo $dil["medical_deficiency_desc"];?></th>
            <th><?php echo $dil["operation"];?></th>
        </tr>
        </thead>
    </table>
</div>
<div class="tab-pane" id="previousPositions">
    <table id="previous_positions_table" class="table table-striped  table-bordered table-hover">
        <thead>
        <tr>
            <th style="width:15px;">id</th>
            <th><?php echo $dil["fio"];?></th>
            <th><?php echo $dil["prev_employer"];?></th>
            <th><?php echo $dil["date_range"];?></th>
            <th><?php echo $dil["leave_reason"];?></th>
            <th><?php echo $dil["sector"];?></th>
            <th><?php echo $dil["operation"];?></th>
        </tr>
        </thead>
    </table>
</div>

  <div class="tab-pane" id="bootstab">Bootstrap Content here
  <ul>
  <li>Bootstrap forms</li>
  <li>Bootstrap buttons</li>
  <li>Bootstrap navbar</li>
  <li>Bootstrap footer</li>
  </ul>
  </div>
  <div class="tab-pane" id="htmltab">Hypertext Markup Language</div>  
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"  ></script>
<script type="text/javascript" src="dist/js/bootstrap-datetimepicker.js"></script>
 <script type="text/javascript" src="js/employee.js"></script>
 
</body>
</html>
