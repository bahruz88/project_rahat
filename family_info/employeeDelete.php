<?php 
include('../session.php') ;

  //Create variables
    $empid = $_POST['empid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_employees set  emp_status=0 where id='$empid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {
        echo "success";
    }
    else {
        echo "error-".$empid."-".$aff_row_count;
    }

    //Close connection
    mysqli_close($db);

?>