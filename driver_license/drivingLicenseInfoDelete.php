<?php 
include('../session.php') ;

  //Create variables
    $drivinglicenseinfoid = $_POST['drivinglicenseinfoid'];
 
   $delete_query = mysqli_query($db,"update  $tbl_military_information  set  status=0 where id='$drivinglicenseinfoid'");//
//    $delete_query = mysqli_query($db,"delete FROM  $tbl_military_information where id='$drivinglicenseinfoid'");// set  status=0

    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {  echo "success";     }
    else { echo "error-".$drivinglicenseinfoid."-".$aff_row_count;   }

    //Close connection
    mysqli_close($db);

?>