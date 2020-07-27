<?php
include('session.php');
if(isset($_GET['id_user'])){
    $id_user=$_GET['id_user'];
}
if(isset($_POST['Submit']))
{
    $oldpass=md5($_POST['opwd']);
//    $useremail=$_SESSION['login'];
    $newpassword=md5($_POST['npwd']);
    $sql=mysqli_query($db,"SELECT upass FROM $tbl_users where upass='$oldpass' && id='$id_user'");
    $num=mysqli_fetch_array($sql);
    if($num>0)
    {
        $con=mysqli_query($db,"update $tbl_users set upass='$newpassword' where id='$id_user'");
        $_SESSION['msg1']="Sizin şifrəniz müvəffəqiyyətlə dəyişildi !!";
    }
    else
    {
        $_SESSION['msg1']="Sizin şifrəniz  dəyişilə bilmədi !!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RahatHR</title>
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
<!--    change-->
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .clearFix{
            clear: both;
        }
        .info{
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }
        .panel{
            box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);
            margin:10px;
            padding:10px;
        }
        .profile-user-img{
            width:100px;
            height:100px;
        }
        .btn {
            padding:5px !important;
        }
    </style>
</head>

<!--<body class="hold-transition sidebar-mini layout-fixed">-->

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
                        <div class="row">
    <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6  col-md-offset-3  panel panel-white">

            <div class="panel-body">
                <p style="color:red;" class="text-center"><?php echo $_SESSION['msg1'];?><?php echo $_SESSION['msg1']="";?></p>
                <form name="chngpwd" action="" method="post" onSubmit="return valid();">
            <table align="center">
                <tr height="50">
                    <td>Köhnə Şifrə :</td>
                    <td><input type="password" class="form-control inputFile" name="opwd" id="opwd"></td>
                </tr>
                <tr height="50">
                    <td>Yeni Şifrə :</td>
                    <td><input type="password"  class="form-control  inputFile" name="npwd" id="npwd"></td>
                </tr>
                <tr height="50">
                    <td>Yeni şifrənin təsdiqi :</td>
                    <td><input type="password" class="form-control inputFile"  name="cpwd" id="cpwd"></td>
                </tr>
                <tr>
                    <td><a href="general.php">Geri qayıt</a></td>
                    <td><input type="submit" name="Submit" class="btn btn-primary btn-block btn-outlined" value="Şifrəni dəyiş" /></td>
                </tr>
            </table>
        </form>
            </div>
        </div>
    </div>
                 </div>
            </div>
        </div>
        <!-- /.content-wrapper -->



    </div> <?php  include ("footer.php"); ?>
    <!-- ./wrapper -->
    <script type="text/javascript">
        function valid()
        {
            if(document.chngpwd.opwd.value=="")
            {
                alert("Köhnə Şifrə xanası Boşdur !!");
                document.chngpwd.opwd.focus();
                return false;
            }
            else if(document.chngpwd.npwd.value=="")
            {
                alert("Yeni Şifrə xanası Boşdur !!");
                document.chngpwd.npwd.focus();
                return false;
            }
            else if(document.chngpwd.cpwd.value=="")
            {
                alert("Yeni şifrənin təsdiqi xanası Boşdur !!");
                document.chngpwd.cpwd.focus();
                return false;
            }
            else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
            {
                alert("Yeni Şifrə və Yeni şifrənin təsdiqi xanası uyğun gəlmir  !!");
                document.chngpwd.cpwd.focus();
                return false;
            }
            return true;
        }
    </script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


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
