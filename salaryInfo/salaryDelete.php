<?php 
include('../session.php') ;

  //Create variables
    $id = $_POST['id'];
 
    $delete_query = mysqli_query($db,"update  $tbl_salary_info set  status=0 where id='$id'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {
        echo "success";
    }
    else {
        echo "error-".$id."-".$aff_row_count;
    }

    //Close connection
    mysqli_close($db);

?>