<?php


include('../session.php');


////$id                 =$_POST['id'];
$role_id      = $_POST['role_id'];
$id           = $_POST['stId'];
$emp_id       = $_POST['emp_id'];
$posit_code   = $_POST['posit_code'];
$start_date   = $_POST['role_start_date'];
$end_date     = $_POST['role_end_date'];
$company_id     = $_POST['company_id'];

$percent=100;

if(isset($_POST['percent'])) {
    $percent = $_POST['percent'];
}

$start_date = strtr( $start_date , '/', '-');
$start_date= date('Y-m-d', strtotime($start_date));

$end_date = strtr( $end_date , '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));

//$users= "select * from $tbl_structure_positions WHERE posit_code = '$posit_code'";
$users= "select * from $tbl_structure_positions WHERE role_id = '$role_id' and company_id = '$company_id'and struc_id = '$id'";
//    echo $users;
$result_users = $db->query($users);
if($result_users->num_rows > 0) {


    $sql = "UPDATE  $tbl_structure_positions SET
		role_id  = '$role_id',
		posit_code  = '$posit_code',
		company_id  = '$company_id',
		start_date  = '$start_date',
		emp_id  = '$emp_id',";
    if($percent!=''){
        $sql.=" percent  = '$percent', ";
    }
    $sql.="end_date  = '$end_date'
		WHERE role_id 	= '$role_id' and company_id  = '$company_id'";
//		WHERE id 	= '$id'";
}
else{
    $sql = "INSERT INTO $tbl_structure_positions( 
	 id,company_id, role_id, posit_code,start_date,end_date,emp_id,percent,struc_id) 
	 VALUES (NULL, '$company_id', '$role_id','$posit_code','$start_date','$end_date','$emp_id','$percent','$id')";
}




//echo  $sql ;

if(!mysqli_query($db, $sql)) {
    echo "error=".$sql.'=' .mysqli_error($db);
}
else {
// echo "success".$sql ;
}

//Close connection
//mysqli_close($db);
//
//include('st_selectRoleAfterInsert.php');
include('st_selectRoleIns.php');

?>