<?php


include('../session.php');

//Create variables

$silid                 =$_POST['id'];
$id                 =$_POST['stId'];
$company_id                 =$_POST['company_id'];

$sql="delete FROM  $tbl_structure_positions where id=$silid";

//echo $sql;

$delete_query = mysqli_query($db,$sql);// set  status=0



$aff_row_count = mysqli_affected_rows($db);
//Response
//Checking to see if name or email already exsist
if ($aff_row_count > 0) {
//    echo "success";
} else {
    echo "error-" . $id . "-" . $aff_row_count.'bitdi';
}

//Close connection
//mysqli_close($db);

//include ('st_select.php');
//include('st_selectRole.php');
include('st_selectRoleIns.php');
?>