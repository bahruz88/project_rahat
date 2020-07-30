<?php


include('session.php') ;


////$id                 =$_POST['id'];
$role_id                = $_POST['role_id'];
$posit_code               = $_POST['posit_code'];
$start_date             = $_POST['role_start_date'];
$end_date    = $_POST['role_end_date'];
$percent    = $_POST['percent'];

$start_date = strtr( $start_date , '/', '-');
$start_date= date('Y-m-d', strtotime($start_date));

$end_date = strtr( $end_date , '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));

    $sql = "INSERT INTO tbl_structure_positions( 
	 id, role_id, posit_code,start_date,end_date) 
	 VALUES (NULL, '$role_id','$posit_code','$start_date','$end_date')";





if(!mysqli_query($db, $sql)) {
    echo "error=".$pId.'=' .mysqli_error($db);
}
else {
  echo "success" ;
}

//Close connection
mysqli_close($db);
//
//include ('st_select.php');
?>