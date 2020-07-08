<?php


include('../session.php') ;

//Create variables

if(isset($_POST['id'])){
    $id                 =$_POST['id'];

    $delete_query = mysqli_query($db,"delete FROM  $users where id='$id'");// set  status=0

}
if(isset($_POST['parent'])){
    $parent                 =$_POST['parent'];

    $delete_query = mysqli_query($db,"delete FROM  $users where parent='$parent'");// set  status=0

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