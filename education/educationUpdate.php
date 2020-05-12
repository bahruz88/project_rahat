<?php 
include('../session.php') ;

	$update_eduid_name = $_POST['update_eduid_name'];
	$update_qualification_name = $_POST['update_qualification_name'];
	$update_institution_id_name = $_POST['update_institution_id_name'];
	$update_faculty_name = $_POST['update_faculty_name'];
	$update_profession_name = $_POST['update_profession_name'];
	$update_diplom_seria_num_name = $_POST['update_diplom_seria_num_name'];
	$update_qualification_name = $_POST['update_qualification_name'];
	
	$update_uni_end_date_name = strtr($_POST['update_uni_end_date_name'], '/', '-');
    $update_uni_end_date_name= date('Y-m-d', strtotime($update_uni_end_date_name));
	
	$diplom_issue_date_name = strtr($_POST['diplom_issue_date_name'], '/', '-');
    $diplom_issue_date_name= date('Y-m-d', strtotime($diplom_issue_date_name));
	
	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql =   "UPDATE  $tbl_education SET 
		qualification_id = '$update_qualification_name',
		institution_id = '$update_institution_id_name',
		faculty='$update_faculty_name',
		profession='$update_profession_name',
		end_date='$update_uni_end_date_name',
		diplom_seria_num='$update_diplom_seria_num_name',
		diplom_issue_date='$diplom_issue_date_name',
		update_date='$update_date' 
		WHERE id = '$update_eduid_name' ";
 

  
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