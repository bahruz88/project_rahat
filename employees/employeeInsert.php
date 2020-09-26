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
//	echo 'company_id='.$company_id;
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

//$rs='';
//$c = 1;
//$number=1;
//$head='/K';
//function generateRandomStringInsert($length,$head) {
//    $number = sprintf("%02d", $length);
//    $p=$number.$head;
//    return $p;
//}
//WHILE ($c > 0){
//    $rs = generateRandomStringInsert($number,$head);
//
//    $users= "select * from $tbl_employee_commands WHERE command_no = '$rs'";
//    $result_users = $db->query($users);
//    if($result_users->num_rows > 0) {
//        $c = 1;
//        $number++;
//    }else{
//        $c=0;
//        $number++;
//    }
//
//}
//$command_no=$rs;

//$emp_id = "SELECT id FROM $tbl_employees ORDER BY id DESC LIMIT 1";
$sql_emp_id = "SELECT * FROM $tbl_employees ORDER BY id DESC LIMIT 1";
$result_emp_id  = $db->query($sql_emp_id);
$data = array();
if ($result_emp_id ->num_rows > 0) {
    while($row_emp_id  = $result_emp_id ->fetch_assoc()) {
        $emp_id=$row_emp_id["id"];
    }
}

$sql_company = "SELECT * FROM $tbl_employee_company Where id='$company_id'";
$result_company  = $db->query($sql_company);
$data = array();
if ($result_company ->num_rows > 0) {
    while($row_company  = $result_company ->fetch_assoc()) {
        $enterprise_head_position=$row_company["enterprise_head_position"];
        $company_name=$row_company["company_name"];
        $company_address=$row_company["address"];
        $company_tel=$row_company["tel"];
        $voen=$row_company["bank_voen"];
        $sun=$row_company["sun"];
        $enterprise_head_fullname=$row_company["enterprise_head_fullname"];
    }
}


//insert Command table
$sqlCommand = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id, command_no, company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname) 
 VALUES ('Null','5','$emp_id','$command_no','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname')";

$sqlCommand = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname) 
 VALUES ('Null','5','$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname')";

//echo $sqlCommand;
if(!mysqli_query($db, $sqlCommand)) {
    echo "Error=".$sqlCommand.'='.$emp_id.'=' .mysqli_error($db);
}
else {
//    echo "success";
}
//insert Contract table
$sqlContract = "INSERT INTO $tbl_contracts (id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname) 
 VALUES ('Null','$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname')";

//echo $sqlContract;
if(!mysqli_query($db, $sqlContract)) {
    echo "Error=".$sqlContract.'='.$emp_id.'=' .mysqli_error($db);
}
else {
//    echo "success";
}
    //Close connection
    mysqli_close($db);

 
?>