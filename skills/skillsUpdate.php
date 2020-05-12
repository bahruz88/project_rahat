<?php 
include('../session.php') ;

	$update_skillid_name = $_POST['update_skillid_name'];
	$update_skill_n_name = $_POST['update_skill_n_name'];
	$update_skill_descr_name = $_POST['update_skill_descr_name'];
 	
	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_employee_skills SET 
		skill_name  = '$update_skill_n_name',
		skill_descr = '$update_skill_descr_name',
		update_date = '$update_date' 
		WHERE id 	= '$update_skillid_name' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success" ;  
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>