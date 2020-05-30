<?php 
include('../session.php') ;

$migid                    = $_POST['update_migid_name'];
$trp_seria_number         = $_POST['update_trp_seria_number'];
$trp_permit_reason        = $_POST['update_trp_permit_reason'];
$trp_permit_date          = $_POST['update_trp_permit_date'];
$trp_valid_date           = $_POST['update_trp_valid_date'];
$trp_issuer               = $_POST['update_trp_issuer'];
$prp_seria_number         = $_POST['update_prp_seria_number'];
$prp_permit_date          = $_POST['update_prp_permit_date'];
$prp_valid_date           = $_POST['update_prp_valid_date'];
$prp_issuer               = $_POST['update_prp_issuer'];
$wp_seria_number          = $_POST['update_wp_seria_number'];
$wp_permit_date           = $_POST['update_wp_permit_date'];
$wp_valid_date            = $_POST['update_wp_valid_date'];


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


	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_migration_info SET  
		trp_seria_number  = '$trp_seria_number',
		trp_permit_reason = '$trp_permit_reason',
		trp_permit_date = '$trp_permit_date',
		trp_valid_date = '$trp_valid_date',
		trp_issuer = '$trp_issuer', 		
		prp_seria_number = '$prp_seria_number', 		
		prp_permit_date = '$prp_permit_date', 		
		prp_valid_date = '$prp_valid_date', 		
		prp_issuer = '$prp_issuer', 		
		wp_seria_number = '$wp_seria_number', 		
		wp_permit_date = '$wp_permit_date', 		
		wp_valid_date = '$wp_valid_date', 		
		update_date='$update_date' 
		WHERE id 	= '$migid' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>