<?php 
include('../session.php') ;

  //Create variables
    $workplaceInfoid = $_POST['workplaceInfoid'];

//   $delete_query = mysqli_query($db,"update  $tbl_employee_category  set  status=0 where id='$workplaceInfoid'");//
   $delete_query = mysqli_query($db,"delete FROM  $tbl_employee_category where id='$workplaceInfoid'");// set  status=0

    $aff_row_count=mysqli_affected_rows($db) ;
    //Response
    //Checking to see if name or email already exsist
    if($aff_row_count > 0) {  echo "success";     }
    else { echo "error-".$workplaceInfoid."-".$aff_row_count;   }

    //Close connection
    mysqli_close($db);

?>