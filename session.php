<?php 
  session_start();
   include('config/config.php');
   $user_check = $_SESSION['login_user'];
   $uid = $_SESSION['uid'];


   $ses_sql = mysqli_query($db,"select * from $tbl_users where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   $u_photo = $row['u_photo'];
   $emp_id = $row['emp_id'];
   $company_id = $row['company_id'];
   $login_fullname= $row['firstname'].' '.$row['lastname'];
   $login_lang = $row['def_lang'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
   if($emp_id){
       $sql_education = "Select  ee.*,u.uni_name,qd.qualification  from
$tbl_education  ee left  join
$tbl_universities u on ee.institution_id=u.id left  join
$tbl_qualification_dic qd on ee.qualification_id=qd.id inner  join
$tbl_employees e on e.id=ee.emp_id  where ee.edu_status =1 and  e.emp_status=1 and  e.id=$emp_id";
       $result_education = $db->query($sql_education);
       $uni_name='';
       $faculty='';
       $profession='';
       $qualification='';
       if($result_education){
           if ($result_education->num_rows > 0) {
               while($row_edu = $result_education->fetch_assoc()) {

                   $uni_name=$row_edu['uni_name'];
                   $faculty=$row_edu['faculty'];
                   $profession=$row_edu['profession'];
                   $qualification=$row_edu['qualification'];
               }
           }
       }
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