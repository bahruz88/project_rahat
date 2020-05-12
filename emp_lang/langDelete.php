<?php 
include('../session.php') ;

  //Create variables
    $langid = $_POST['langid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_language_knowledge set  lang_status=0 where id='$langid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {  echo "success";     }
    else { echo "error-".$langid."-".$aff_row_count;   }

    //Close connection
    mysqli_close($db);

?>