<?php 
 
 
include('../session.php') ;
 
  //Create variables

	$employee=$_POST['employee'];
	$skill_name=$_POST['skills_name'];
	$skill_descr=$_POST['skills_descr'];
	$insert_date =date('Y-m-d') ;

    $sql = "INSERT INTO $tbl_employee_skills( 
	 id, emp_id, skill_name,skill_descr, skill_status,insert_date) VALUES (NULL, '$employee','$skill_name','$skill_descr', '1','$insert_date' )";
  

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>