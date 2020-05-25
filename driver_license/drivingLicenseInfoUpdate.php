<?php

include('../session.php') ;
$drivinglicenseid         = $_POST['updatedrivinglicenseid'];
$drivinglic_seria_number  = $_POST['update_drivinglic_seria_number'];
$drivintcatId             = $_POST['update_drivintcatId'];
$drivinglic_issuer        = $_POST['update_drivinglic_issuer'];
$drivinglic_issue_date    = $_POST['update_drivinglic_issue_date'];
$drivingexpire_date       = $_POST['update_drivingexpire_date'];

$drivinglic_issue_date = strtr( $drivinglic_issue_date , '/', '-');
$drivinglic_issue_date= date('Y-m-d', strtotime($drivinglic_issue_date));

$drivingexpire_date = strtr( $drivingexpire_date , '/', '-');
$drivingexpire_date= date('Y-m-d', strtotime($drivingexpire_date));



	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_employye_driver_license SET  
		lic_seria_number  = '$drivinglic_seria_number',
		category = '$drivintcatId',
		lic_issuer = '$drivinglic_issuer',
		lic_issue_date = '$drivinglic_issue_date',
		expire_date = '$drivingexpire_date',
		update_date='$update_date' 
		WHERE id 	= '$drivinglicenseid' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>