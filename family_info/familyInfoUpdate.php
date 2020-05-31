<?php 
include('../session.php') ;

	$update_faminfoid_name = $_POST['update_faminfoid_name'];
	//$edit_famemp = $_POST['edit_famemp'];
	$edit_family_member_type_name = $_POST['edit_family_member_type_name'];
	$edit_firstname_name = $_POST['edit_firstname_name'];
 	$edit_lastname_name = $_POST['edit_lastname_name'];
	
	$edit_surname_name = $_POST['edit_surname_name'];
	$edit_gender_name = $_POST['edit_gender_name'];
	$edit_birth_date_fam_info_name = $_POST['edit_birth_date_fam_info_name'];
	$edit_birth_date_fam_info_name = strtr($_POST['edit_birth_date_fam_info_name'], '/', '-');
    $edit_birth_date_fam_info_name= date('Y-m-d', strtotime($edit_birth_date_fam_info_name));
	$edit_contact_number = $_POST['edit_contact_number'];
	$edit_living_address_name = $_POST['edit_living_address_name'];
	
	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_employee_family_info SET 
		member_type  = '$edit_family_member_type_name',
		m_firstname = '$edit_firstname_name',
		m_lastname = '$edit_lastname_name',
		m_surname = '$edit_surname_name',
		gender = '$edit_gender_name',
		birth_date = '$edit_birth_date_fam_info_name',
		contact_number = '$edit_contact_number',
		adress = '$edit_living_address_name',
		update_date = '$update_date' 
		WHERE id 	= '$update_faminfoid_name' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success" ;  
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>