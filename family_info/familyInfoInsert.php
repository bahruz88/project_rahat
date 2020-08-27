<?php 
 
 
include('../session.php') ;
 
  //Create variables

	$employee=$_POST['employee'];
	$family_member_type=$_POST['family_member_type'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$surname=$_POST['surname'];
	$gender=$_POST['gender'];
	$contact_number=$_POST['contact_number'];
	$living_address=$_POST['living_address'];
	
 	$birth_date_fam_info=$_POST['birth_date_fam_info'];
	$birth_date_fam_info = strtr($birth_date_fam_info, '/', '-');
	$birth_date_fam_info= date('Y-m-d', strtotime($birth_date_fam_info));
	
	
    $sql = " INSERT INTO $tbl_employee_family_info (id, emp_id, member_type, m_firstname, m_lastname, m_surname, gender, birth_date, contact_number, adress, status,insert_user) 
	VALUES (NULL, '$employee', '$family_member_type', '$firstname', '$lastname', '$surname', '$gender', '$birth_date_fam_info', '$contact_number', '$living_address', '1','$uid')";


  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>