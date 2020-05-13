<?php 
include('../session.php') ;

    //Create variables
    $faminfoid = $_POST['faminfoid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_employee_family_info set  status=0 where id='$faminfoid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
 
    if($aff_row_count > 0) {  echo "success";     }
    else { echo "error-".$faminfoid."-".$aff_row_count;   }

    //Close connection
    mysqli_close($db);

?>