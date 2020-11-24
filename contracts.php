<?php
include('session.php');
$site_lang=$_SESSION['dil'] ;
$sql_fam_member_type= "select * from $tbl_family_member_types  where lang='$site_lang' ";
$sql_military_rank= "select * from $tbl_military_rank  where lang='$site_lang' ";
$sql_military_staff= "select * from $tbl_military_staff  where lang='$site_lang' ";
$sql_driving_category= "select * from $tbl_driver_lic_cat  where lang='$site_lang' ";

$sql_lang_level= "select * from $tbl_lang_level  where lang_short_name='$site_lang' ";

$sql_position_level= "select * from $tbl_position_level where lang='$site_lang'";
$sql_employee= "select * from $tbl_employees where  emp_status=1";

$commands= "select * from $tbl_commands where lang='$site_lang'";
$result_commands = $db->query($commands);
//$sql_employees= "select * from $tbl_employees where  emp_status=1 ";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $company_name ; ?></title>
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


                    <?php
                    include  ('contracts/mainContractModal.php');
                    ?>

                    <!-- Tab panes -->
                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
                        <div class="tab-pane active" id="employees" style="padding: 10px;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="company"><?php echo $dil["company"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="company" id='company' title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["company"];?>"   >
                                        <option  value="" >Seçin...</option>

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
                                <label class="col-sm-4 col-form-label" for="code"><?php echo $dil["code"];?></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="code" name="code"   />

                                    <!--                                    <select data-live-search="true"  name="code"  id="code" title="--><?php //echo $dil["selectone"];?><!--" class="form-control selectpicker"  placeholder="--><?php //echo $dil["code"];?><!--">-->
<!---->
<!--                                    </select>-->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="empid"><?php echo $dil["employee"];?></label>
                                <div class="col-sm-6" id="contract_emp">
                                    <select data-live-search="true"  name="empid"  id="empid" title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["employee"];?>">
                                        <?php
                                        $result_employees_view = $db->query($sql_employee);
                                        if ($result_employees_view->num_rows > 0) {
                                            while($row_employees= $result_employees_view->fetch_assoc()) {

                                                ?>
                                                <option  value="<?php echo $row_employees['id']; ?>" ><?php echo $row_employees['firstname']." " .$row_employees['lastname'];  ?></option>

                                            <?php } }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="position"><?php echo $dil["position"];?></label>
                                <div class="col-sm-6">
                                    <select data-live-search="true"  name="position_level" id="position_level"  title="<?php echo $dil["selectone"];?>" class="form-control selectpicker"  placeholder="<?php echo $dil["position_level"];?>" >
                                        <option  value="" >Seçin...</option>

                                        <?php
                                        $result_position_view = $db->query($sql_position_level);
                                        if ($result_position_view->num_rows > 0) {
                                            while($row_position= $result_position_view->fetch_assoc()) {

                                                ?>
                                                <option  value="<?php echo $row_position['id']; ?>" data-icon="<?php echo $row_position['posit_icon']; ?>"  style="background-image:url(images/icons/man2.png);"  ><?php echo  $row_position['title'];  ?></option>

                                            <?php } }?>
                                    </select>
                                </div>
                            </div>

<!--                            <button id="searchContract">Axtar</button>-->

                        </div>


                    </div>
                    <div class="tab-content" style=" box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24)">
                        <div class="tab-pane active" id="employees" style="padding: 10px;">
                            <table id="emp_table" class="table table-striped  table-bordered table-hover">

                                <thead>
                                <th style="width:15px;"></th>
                                <th style="width:15px;">Kod</th>
                                <th style="width:150px;">Ad</th>
                                <th style="width:80px;">Soyad</th>
                                <th style="width:150px;">Ata adı</th>
                                <th style="width:150px;">Pozisya</th>
                                </thead>
                                <tbody>

                                </tbody>



                            </table


                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->



</div>  <?php  include ("footer.php"); ?>
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
<script type="text/javascript" src="js/contracts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

</body>
</html>
