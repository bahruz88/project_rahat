<?php


include('../session.php');

//Create variables

$id                 =$_POST['id'];
$code='';
$codes= "select * from $tbl_employee_category where id=$id";
//    echo $users;
$result_codes = $db->query($codes);
if($result_codes->num_rows > 0) {
    while($row_codes = $result_codes->fetch_assoc()) {
        $code = $row_codes["code"];
    }
}

if($_POST['delet']=="id"){
        if($id!=0){
            $sql="delete FROM  $tbl_employee_category where id=$id";

        }else{
            $sql="delete FROM  $tbl_employee_category";
        }
    }
else{
    $sql="delete FROM  $tbl_employee_category where parent=$id";
}
if($code!='' &&$code.substr(0,1)=="P"){
//    echo $code.substr(0,1);
    $sqlpositions="delete FROM  $tbl_structure_positions where posit_code='$code'";
    $delete_positions = mysqli_query($db,$sqlpositions);// set  status=0

}
$delete_query = mysqli_query($db,$sql);// set  status=0



$aff_row_count = mysqli_affected_rows($db);
//Response
//Checking to see if name or email already exsist
if ($aff_row_count > 0) {
//    echo "success";
} else {
    echo "error-" . $id . "-" . $aff_row_count.'='.$sqlpositions;
}

//Close connection
//mysqli_close($db);

//include ('st_select.php');
include('st_selectWithComp.php');
?>