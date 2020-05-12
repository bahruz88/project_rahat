<?php 
include('../session.php') ;

  //Create variables
    $userid = $_POST['userid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_users set  ustatus=0 where id='$userid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {
        echo "success";
    }
    else {
        echo "error-".$userid."-".$aff_row_count;
    }

    //Close connection
    mysqli_close($db);

?>