<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee                 =$_POST['emplo'];
$drivinglic_seria_number  = $_POST['drivinglic_seria_number'];
$drivintcatId             = $_POST['drivintcatId'];
$drivinglic_issuer        = $_POST['drivinglic_issuer'];
$drivinglic_issue_date    = $_POST['drivinglic_issue_date'];
$drivingexpire_date       = $_POST['drivingexpire_date'];

$drivinglic_issue_date = strtr( $drivinglic_issue_date , '/', '-');
$drivinglic_issue_date= date('Y-m-d', strtotime($drivinglic_issue_date));

$drivingexpire_date = strtr( $drivingexpire_date , '/', '-');
$drivingexpire_date= date('Y-m-d', strtotime($drivingexpire_date));

$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_employye_driver_license( 
	 id, emp_id, lic_seria_number, category, lic_issuer, lic_issue_date, expire_date,insert_date) 
	 VALUES (NULL, '$employee','$drivinglic_seria_number','$drivintcatId','$drivinglic_issuer','$drivinglic_issue_date','$drivingexpire_date','$insert_date')";
  

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>