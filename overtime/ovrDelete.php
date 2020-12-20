<?php 
include('../session.php') ;
$company_id = $_SESSION["CompanyId"];
  //Create variables
    $ovrid = $_POST['ovrid'];
 
    $delete_query = mysqli_query($db,"update  $tbl_employee_overtimes set  status=0 where id='$ovrid'");
  
    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {
        echo "success";
    }
    else {
        echo "error-".$ovrid."-".$aff_row_count;
    }

    //Close connection
    mysqli_close($db);

?>