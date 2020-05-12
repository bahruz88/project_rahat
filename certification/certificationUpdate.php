<?php 
include('../session.php') ;


	$update_certid_name = $_POST['update_certid_name'];
	$update_training_center_name = $_POST['update_training_center_name'];
	$update_training_name = $_POST['update_training_name'];
	
	$update_training_date_name = strtr($_POST['update_training_date_name'], '/', '-');
    $update_training_date_name= date('Y-m-d', strtotime($update_training_date_name));
	
	$update_cert_given_date_name = strtr($_POST['update_cert_given_date_name'], '/', '-');
    $update_cert_given_date_name= date('Y-m-d', strtotime($update_cert_given_date_name));
	
	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql =   "UPDATE  $tbl_certification SET 
		training_center_name  = '$update_training_center_name',
		training_name = '$update_training_name',
		training_date='$update_training_date_name',
		cert_given_date='$update_cert_given_date_name',
		update_date='$update_date' 
		WHERE id = '$update_certid_name' ";
 

  
    //Checking to see if name or email already exsist
	if(mysqli_query($db, $sql) ) {
      echo "success" ;  
    }
    else  {
        echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>