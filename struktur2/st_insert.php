<?php


include('../session.php') ;

//Create variables

////$id                 =$_POST['id'];
$pId                = $_POST['pId'];
$name               = $_POST['name'];
$emp_id             = $_POST['emp_id'];
$structure_level    = $_POST['structure_level'];
$position_level     = $_POST['position_level'];
$create_date        = $_POST['create_date'];
$create_date = strtr( $create_date , '/', '-');
$create_date= date('Y-m-d', strtotime($create_date));

$code               = '';
if($pId==0 or $pId=='' or $pId=='null'){
    $sql = "INSERT INTO $tbl_employee_category( 
	 id, parent, category,code,emp_id,structure_level,position_level,create_date) 
	 VALUES (NULL, NULL,'$name','$code','$emp_id','$structure_level','$position_level','$create_date')";

}else{
    $sql = "INSERT INTO $tbl_employee_category( 
	 id, parent, category,code,emp_id,structure_level,position_level,create_date) 
	 VALUES (NULL, '$pId','$name','$code','$emp_id','$structure_level','$position_level','$create_date')";

}



if(!mysqli_query($db, $sql)) {
    echo "error=".$pId.'=' .mysqli_error($db);
}
else {
//  echo "success" ;
}

//Close connection
//mysqli_close($db);
//
include ('st_select.php');
?>