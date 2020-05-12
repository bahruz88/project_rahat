<?php 
include('../session.php') ;

  //Create variables
    $certid = $_POST['certid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_certification set  cert_status=0 where id='$certid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {
        echo "success";
    }
    else {
        echo "error-".$certid."-".$aff_row_count;
    }

    //Close connection
    mysqli_close($db);

?>