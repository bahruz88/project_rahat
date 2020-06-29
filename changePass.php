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

<body class="hold-transition sidebar-mini layout-fixed">
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
            <td><input type="submit" name="Submit" value="Şifrəni dəyiş" /></td>
        </tr>
    </table>
</form>
</div>
</div></div>
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
</body>
</html>