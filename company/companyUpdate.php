<?php 
include('../session.php') ;

  //Create variables


	$companyid = $_POST['update_companyid'];
    $update_company_name = $_POST['update_company_name'];
    $update_voen = $_POST['update_voen'];
	$update_sun=$_POST['update_sun'];
	$update_bank_name=$_POST['update_bank_name'];
	$update_code=$_POST['update_code'];
	$update_bank_filial=$_POST['update_bank_filial'];
	$update_bank_voen=$_POST['update_bank_voen'];
	$update_cor_account=$_POST['update_cor_account'];
	$update_swift=$_POST['update_swift'];
	$update_azn_account=$_POST['update_azn_account'];
	$update_usd_account=$_POST['update_usd_account'];
	$update_eur_account=$_POST['update_eur_account'];
	$update_country=$_POST['update_country'];
	$update_city=$_POST['update_city'];
	$update_address=$_POST['update_address'];
	$update_poct_index=$_POST['update_poct_index'];
	$update_tel=$_POST['update_tel'];
	$update_enterprise_head_fullname=$_POST['update_enterprise_head_fullname'];
	$update_enterprise_head_position=$_POST['update_enterprise_head_position'];
	$update_founder=$_POST['update_founder'];
	$update_service=$_POST['update_service'];

//	$query = mysqli_query($db,"SELECT * FROM $tbl_users WHERE username='$username' OR reg_mail='$email'");
//	$row_user = mysqli_fetch_array($query ,MYSQLI_ASSOC);
    
//	if(!empty($password))	{		$upass=md5($password) ;	}
//	else {$upass=$row_user['id'] ;	}
//	if(empty($_POST['update_empno']))	{$empno=$row_user['empno']  ;	}
//	else { 	$empno=$_POST['update_empno'];}

	$sql =   "UPDATE $tbl_employee_company SET 
	company_name = '$update_company_name', 
	voen = '$update_voen', 
	sun = '$update_sun', 
	bank_name = '$update_bank_name', 
	kod = '$update_code', 
	bank_filial = '$update_bank_filial' ,
	bank_voen ='$update_bank_voen',
	cor_account ='$update_cor_account',
	swift ='$update_swift',
	azn_account ='$update_azn_account',
	usd_account ='$update_usd_account',
	eur_account ='$update_eur_account',
	country ='$update_country',
	city ='$update_city',
	address ='$update_address',
	poct_index ='$update_poct_index',
	tel ='$update_tel',
	enterprise_head_fullname ='$update_enterprise_head_fullname',
	enterprise_head_position ='$update_enterprise_head_position',
	service ='$update_service',
	founder ='$update_founder'
	WHERE id = '$companyid'
	";
 
 //Make sure name is valid

  
    //Checking to see if name or email already exsist
  if(mysqli_query($db, $sql) ) {
      echo "success";  
    }
    else  {
        echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);


?>