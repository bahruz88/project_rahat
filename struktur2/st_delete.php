<?php


include('../session.php');

//Create variables


if($_POST['delet']=="id"){
    $id                 =$_POST['id'];
    $delete_query = mysqli_query($db,"delete FROM  $tbl_employee_category where id=$id or  parent=$id");// set  status=0

}
if($_POST['delet']=="parent"){
    $id                 =$_POST['id'];

    $delete_query = mysqli_query($db,"delete FROM  $tbl_employee_category where parent='$id'");// set  status=0

}

$aff_row_count = mysqli_affected_rows($db);
//Response
//Checking to see if name or email already exsist
if ($aff_row_count > 0) {
    echo "success";
} else {
    echo "error-" . $id . "-" . $aff_row_count;
}

//Close connection
mysqli_close($db);


?>