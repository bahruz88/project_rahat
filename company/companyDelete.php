<?php 
include('../session.php') ;

  //Create variables
    $companyid = $_POST['companyid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_employee_company set  status=0 where id='$companyid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {
        echo "success";
    }
    else {
        echo "error-".$companyid."-".$aff_row_count;
    }

    //Close connection
    mysqli_close($db);

?>