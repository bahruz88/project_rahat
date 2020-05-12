<?php 
include('../session.php') ;

  //Create variables
    $skillid = $_POST['skillid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_employee_skills set  skill_status=0 where id='$skillid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {  echo "success";     }
    else { echo "error-".$skillid."-".$aff_row_count;   }

    //Close connection
    mysqli_close($db);

?>