<?php 
include('../session.php') ;

	$empid = $_POST['update_empidn'];
	$empimg = $_POST['imgName'];
	$surname = $_POST['update_surnamen'];
    $email = $_POST['update_emailn'];
	$firstname=$_POST['update_firstnamen'];
	$lastname=$_POST['update_lastnamen'];
	$sex=$_POST['update_sexn'];
	$marital_status=$_POST['update_marital_statusn'];
	$birth_date = strtr($_POST['update_birth_dateu'], '/', '-');
    $birth_date= date('Y-m-d', strtotime($birth_date));
	$birth_place=$_POST['update_birth_placen'];
	$citizenship=$_POST['update_citizenshipn'];
	$pincode=$_POST['update_pincoden'];
	$pass_seria_num=$_POST['update_pass_seria_numn'];
	$update_company_id=$_POST['update_company_id'];

	$passport_date = strtr($_POST['update_passport_daten'], '/', '-');
    $passport_date= date('Y-m-d', strtotime($passport_date));
	//$passport_date=$_POST['update_passport_daten'];
	
	$passport_end_date = strtr($_POST['update_passport_end_daten'], '/', '-');
    $passport_end_date= date('Y-m-d', strtotime($passport_end_date));
	//$passport_end_date=$_POST['update_passport_end_daten'];
	
	$pass_given_authority=$_POST['update_pass_given_authorityn'];
	$living_address=$_POST['update_living_addressn'];
	$reg_address=$_POST['update_reg_addressn'];
	$home_tel=$_POST['update_home_teln'];
	$mob_tel=$_POST['update_mob_teln'];	
	$emr_contact=$_POST['update_emr_contactn'];
	
	$sql =   "UPDATE  $tbl_employees SET 
		company_id = '$update_company_id',
		surname = '$surname',
		email = '$email',
		firstname='$firstname',
		lastname='$lastname',
		sex='$sex',
		marital_status='$marital_status',
		birth_date='$birth_date',
		birth_place='$birth_place',
		citizenship='$citizenship',
		pincode='$pincode',
		passport_seria_number='$pass_seria_num',
		passport_date='$passport_date',
		passport_end_date='$passport_end_date',
		pass_given_authority='$pass_given_authority',
		living_address='$living_address',
		reg_address='$reg_address',
		home_tel='$home_tel',
		mob_tel='$mob_tel',	
		emr_contact='$emr_contact',
		image_name='$empimg' 
		WHERE id = '$empid' ";
 

  
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