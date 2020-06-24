<?php 
 
 
include('../session.php') ;

function generateRandomString($length = 2) {
    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

  //Create variables

	$firstname=$_POST['firstname_name'];
	$lastname=$_POST['lastname_name'];
    $surname = $_POST['surname_name'];
	$sex = $_POST['sex'];
	$marital_status = $_POST['marital_status'];
	$birth_date = $_POST['birth_date'];
	$birth_place = $_POST['birth_place'];
	$citizenship = $_POST['citizenship'];
	$pincode = $_POST['pincode'];
	$pass_seria_num = $_POST['pass_seria_num'];
	$passport_date = $_POST['passport_date'];
	$passport_end_date = $_POST['passport_end_date'];
	$pass_given_authority = $_POST['pass_given_authority'];
	$living_address = $_POST['living_address'];
	$reg_address = $_POST['reg_address'];
	$mob_tel = $_POST['mob_tel']; 
	$home_tel = $_POST['home_tel']; 
	$email = $_POST['email'];
	$emr_contact = $_POST['emr_contact'];
	if(isset($_POST['imgName'])){
        $imgName = $_POST['imgName'];
    }else{
        $imgName = "images/users/def.png";
    }

	$company_id = $_POST['company_id'];
	//$empno_num='00000000' ;
	
	$empno=generateRandomString();
	$empno=$empno.mt_rand(10000000,99999999);
 

$passport_date = strtr($passport_date, '/', '-');
$passport_date= date('Y-m-d', strtotime($passport_date));

$passport_end_date = strtr($passport_end_date, '/', '-');
$passport_end_date= date('Y-m-d', strtotime($passport_end_date));

$birth_date = strtr($birth_date, '/', '-');
$birth_date= date('Y-m-d', strtotime($birth_date));

$birth_date = strtr($birth_date, '/', '-');
$birth_date= date('Y-m-d', strtotime($birth_date));

//-$passport_date=date('Y-m-d',strtotime($passport_date));
    $sql = "INSERT INTO $tbl_employees (id,company_id, firstname, lastname, surname, sex, marital_status, birth_date,
 birth_place,citizenship, pincode, passport_seria_number, passport_date, passport_end_date, pass_given_authority, 
 living_address, reg_address, home_tel, mob_tel, email, emr_contact,empno,image_name) 
 VALUES ('Null','$company_id','$firstname','$lastname','$surname','$sex', '$marital_status','$birth_date','$birth_place','$citizenship','$pincode','$pass_seria_num','$passport_date','$passport_end_date',
 '$pass_given_authority','$living_address','$reg_address','$mob_tel','$home_tel','$email','$emr_contact','$empno','$imgName')";
  

  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>