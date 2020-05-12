<?php 
 
 
include('../session.php') ;
 
  //Create variables

	$employee=$_POST['certempid'];
	$training_center_name=$_POST['training_center_name'];
	$training_name=$_POST['training_name'];
	
	$training_date=$_POST['training_date_name'];
	$training_date = strtr($training_date, '/', '-');
	$training_date= date('Y-m-d', strtotime($training_date));
	
	$cert_given_date=$_POST['cert_given_date_name'];	
	$cert_given_date = strtr($cert_given_date, '/', '-');
	$cert_given_date= date('Y-m-d', strtotime($cert_given_date));
	$insert_date =date('Y-m-d') ;

    $sql = "INSERT INTO $tbl_certification (  
id, emp_id, training_center_name, training_name, training_date, cert_given_date, insert_date, update_date, insert_user, update_user
) 
VALUES ('Null','$employee','$training_center_name','$training_name','$training_date','$cert_given_date','$insert_date','$insert_date','$employee','$employee')";
  

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>