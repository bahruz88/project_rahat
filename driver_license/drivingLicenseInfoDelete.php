<?php 
include('../session.php') ;

  //Create variables
    $drivinglicenseinfoid = $_POST['drivinglicenseinfoid'];
 
   $delete_query = mysqli_query($db,"update  $tbl_employye_driver_license  set  status=0 where id='$drivinglicenseinfoid'");//

    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {  echo "success";     }
    else { echo "error-".$drivinglicenseinfoid."-".$aff_row_count;   }

    //Close connection
    mysqli_close($db);

?>