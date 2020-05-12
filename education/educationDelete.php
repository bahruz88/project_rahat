<?php 
include('../session.php') ;

  //Create variables
    $eduid = $_POST['eduid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_education set  edu_status=0 where id='$eduid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {
        echo "success";
    }
    else {
        echo "error-".$eduid."-".$aff_row_count;
    }

    //Close connection
    mysqli_close($db);

?>