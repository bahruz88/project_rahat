<?php 
 
 
include('../session.php') ;
 
  //Create variables

$employee                  =$_POST['emplo'];
 $trp_seria_number         = $_POST['trp_seria_number'];
$trp_permit_reason        = $_POST['trp_permit_reason'];
$trp_permit_date          = $_POST['trp_permit_date'];
$trp_valid_date           = $_POST['trp_valid_date'];
$trp_issuer               = $_POST['trp_issuer'];
$prp_seria_number         = $_POST['prp_seria_number'];
$prp_permit_date          = $_POST['prp_permit_date'];
$prp_valid_date           = $_POST['prp_valid_date'];
$prp_issuer               = $_POST['prp_issuer'];
$wp_seria_number          = $_POST['wp_seria_number'];
$wp_permit_date           = $_POST['wp_permit_date'];
$wp_valid_date            = $_POST['wp_valid_date'];

$trp_permit_date = strtr( $trp_permit_date , '/', '-');
$trp_permit_date= date('Y-m-d', strtotime($trp_permit_date));

$trp_valid_date = strtr( $trp_valid_date , '/', '-');
$trp_valid_date= date('Y-m-d', strtotime($trp_valid_date));

$prp_permit_date = strtr( $prp_permit_date , '/', '-');
$prp_permit_date= date('Y-m-d', strtotime($prp_permit_date));

$prp_valid_date = strtr( $prp_valid_date , '/', '-');
$prp_valid_date= date('Y-m-d', strtotime($prp_valid_date));

$wp_permit_date = strtr( $wp_permit_date , '/', '-');
$wp_permit_date= date('Y-m-d', strtotime($wp_permit_date));

$wp_valid_date = strtr( $wp_valid_date , '/', '-');
$wp_valid_date= date('Y-m-d', strtotime($wp_valid_date));

$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_migration_info(
	 id, emp_id, trp_seria_number, trp_permit_reason, trp_permit_date, trp_valid_date, trp_issuer, prp_seria_number, prp_permit_date, prp_valid_date,prp_issuer,wp_seria_number,wp_permit_date,wp_valid_date,insert_date)
	 VALUES (NULL, '$employee','$trp_seria_number','$trp_permit_reason','$trp_permit_date','$trp_valid_date','$trp_issuer','$prp_seria_number','$prp_permit_date','$prp_valid_date','$prp_issuer','$wp_seria_number','$wp_permit_date','$wp_valid_date','$insert_date')";

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>