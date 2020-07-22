<?php


include('../session.php');

//Create variables

$id                 =$_POST['id'];

if($_POST['delet']=="id"){

    if($id!=0){
        $sql="delete FROM  $tbl_employee_category where id=$id";
    }else{
        $sql="delete FROM  $tbl_employee_category";
    }


    }
else{
    $sql="delete FROM  $tbl_employee_category where parent=$id";
} $delete_query = mysqli_query($db,$sql);// set  status=0

//    $delete_query = mysqli_query($db,"DELETE FROM
//  $tbl_employee_category mem1
//  INNER JOIN $tbl_employee_category mem2 ON  mem1.id = mem2.parent
//  INNER JOIN $tbl_employee_category mem3 ON mem2.id = mem3.parent
//  INNER JOIN $tbl_employee_category mem4 ON mem3.id = mem4.parent
//  INNER JOIN $tbl_employee_category mem5 ON mem4.id = mem5.parent
//  WHERE mem1.parent = $id;");// set  status=0

//}
//if($_POST['delet']=="parent"){
//    $id                 =$_POST['id'];
//
//    $delete_query = mysqli_query($db,"delete FROM  $tbl_employee_category where parent='$id'");// set  status=0
//
//}

$aff_row_count = mysqli_affected_rows($db);
//Response
//Checking to see if name or email already exsist
if ($aff_row_count > 0) {
    echo "success";
} else {
    echo "error-" . $id . "-" . $aff_row_count.'='.$sql;
}

//Close connection
mysqli_close($db);


?>