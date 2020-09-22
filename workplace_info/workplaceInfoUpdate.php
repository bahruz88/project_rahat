<?php
include('../session.php') ;
$updateworkplaceid                          = $_POST['update_workplaceInfoid_name'];


if(isset($_POST['update_directorate'])){
    if($_POST['update_directorate']!=''){
    $update_parent=$_POST['update_directorate'];
}
}
if(isset($_POST['update_department'])){
    if($_POST['update_department']!=''){
        $update_parent=$_POST['update_department'];
}
}
if(isset($_POST['update_depart'])){
    if($_POST['update_depart']!=''){
        $update_parent=$_POST['update_depart'];
    }
}
if(isset($_POST['update_area_section'])){
    if($_POST['update_area_section']!=''){
        $update_parent=$_POST['update_area_section'];
    }
}

$category=$_POST['update_position'];
$work_status=$_POST['update_status'];

	$update_date= date("Y-m-d h:i:sa") ;

	$sql = "UPDATE  $tbl_employee_category SET  
		parent  = '$update_parent',
		category  = '$category',
		work_status = '$work_status',		
 		update_date='$update_date'
		WHERE id 	= '$updateworkplaceid' ";

	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
      echo "error=" .$update_parent.'='.mysqli_error($db);
    }
    //*******************************/




    //Close connection
    mysqli_close($db);


?>