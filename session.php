<?php 
  session_start();
   include('config/config.php');
   $user_check = $_SESSION['login_user'];
   $uid = $_SESSION['uid'];


   $ses_sql = mysqli_query($db,"select * from $tbl_users where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   $u_photo = $row['u_photo'];
   $login_fullname= $row['firstname'].' '.$row['lastname'];
   $login_lang = $row['def_lang'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
   
   if  (isset($_GET["dil"])){	   
	$dil=strip_tags($_GET["dil"]);	
	/*Eger basqa dil  secilirse*/
	$sql_def_lang = mysqli_query($db,"select * from $tbl_lang where short_name = '$dil' ");
	$row_def_lang = mysqli_fetch_array($sql_def_lang,MYSQLI_ASSOC);

	

	if ($dil =="az" || $dil == "eng" || $dil =="tr" || $dil == "rus"){
	$_SESSION["dil"] = $dil;
	}
	
	else {$dil ="az";}
	if (!isset($_SESSION["dil"])){
	require("lang/az.php");
	}else {
	require("lang/".$_SESSION["dil"].".php");
   } }
   else {
	   /* Login olduqda secilen  dil */
   $sql_def_lang = mysqli_query($db,"select * from $tbl_lang where short_name = '$login_lang' ");
   $row_def_lang = mysqli_fetch_array($sql_def_lang,MYSQLI_ASSOC);
   
	 $_SESSION["dil"]=$row_def_lang['short_name'];
	 require("lang/".$_SESSION["dil"].".php");
   }
   
   	$lang_image=$row_def_lang['image_path'];
 
?>