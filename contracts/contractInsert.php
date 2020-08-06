<?php 
include('../session.php') ;

  //Create variables
$emp_id=$_POST['emp_id'];
$full_name=$_POST['full_name'];
$citizenship= $_POST['citizenship'];
$passport_seria_number= $_POST['passport_seria_number'];
$pincode= $_POST['pincode'];
$passport_date= $_POST['passport_date'];
$pass_given_authority= $_POST['pass_given_authority'];
$company_name= $_POST['company_name'];
$voen= $_POST['voen'];
$sun= $_POST['sun'];
$enterprise_head_position= $_POST['enterprise_head_position'];
$enterprise_head_fullname= $_POST['enterprise_head_fullname'];
$qualification= $_POST['qualification'];
$uni_name= $_POST['uni_name'];
$profession= $_POST['profession'];
$create_date= $_POST['create_date'];
$structure1= $_POST['structure1'];
$structure2= $_POST['structure2'];
$structure3= $_POST['structure3'];
$structure4= $_POST['structure4'];
$structure5= $_POST['structure5'];
$lastname= $_POST['lastname'];
$firstname= $_POST['firstname'];
$surname= $_POST['surname'];
$birth_date= $_POST['birth_date'];
$birth_place= $_POST['birth_place'];
$marital_status= $_POST['marital_status'];
$mob_tel= $_POST['mob_tel'];
$living_address= $_POST['living_address'];

$military_reg_group= $_POST['military_reg_group'];
$military_reg_category= $_POST['military_reg_category'];
$military_staff= $_POST['military_staff'];
$military_rank= $_POST['military_rank'];
$military_specialty_acc= $_POST['military_specialty_acc'];
$military_fitness_service= $_POST['military_fitness_service'];
$military_registration_service= $_POST['military_registration_service'];
$military_registration_date= $_POST['military_registration_date'];
$military_general= $_POST['military_general'];
$military_special= $_POST['military_special'];
$military_no_official= $_POST['military_no_official'];
$military_additional_information= $_POST['military_additional_information'];
$military_date_completion= $_POST['military_date_completion'];

$passport_date = strtr($passport_date, '/', '-');
$passport_date= date('Y-m-d', strtotime($passport_date));

$create_date = strtr($create_date, '/', '-');
$create_date= date('Y-m-d', strtotime($create_date));

$birth_date = strtr($birth_date, '/', '-');
$birth_date= date('Y-m-d', strtotime($birth_date));

$military_registration_date = strtr($military_registration_date, '/', '-');
$military_registration_date= date('Y-m-d', strtotime($military_registration_date));

$military_date_completion = strtr($military_date_completion, '/', '-');
$military_date_completion= date('Y-m-d', strtotime($military_date_completion));
$insert_date= date("Y-m-d h:i:sa") ;
//	$query = mysqli_query($db,"SELECT * FROM $tbl_users WHERE username='$username' OR reg_mail='$email'");
//	$upass=md5('qwerty'/*rand()*/) ;
    $sql = "INSERT INTO $tbl_contracts (id,emp_id,company_name,full_name,citizenship,passport_seria_number, pincode,
passport_date,pass_given_authority,voen,sun,enterprise_head_position,enterprise_head_fullname,qualification,uni_name,profession,
create_date,structure1,structure2,structure3,structure4,structure5,lastname,firstname,surname,birth_date,birth_place,marital_status,mob_tel,living_address,military_reg_group,military_reg_category
,military_staff,military_rank,military_specialty_acc,military_fitness_service,military_registration_service,military_registration_date,military_general,military_special,military_no_official,military_additional_information,military_date_completion,insert_date) 
    VALUES ('Null','$emp_id','$company_name','$full_name','$citizenship','$passport_seria_number','$pincode','$
    passport_date','$pass_given_authority','$voen','$sun','$enterprise_head_position','$enterprise_head_fullname','$qualification','$uni_name','$profession','$
    create_date','$structure1','$structure2','$structure3','$structure4','$structure5','$lastname','$firstname','$surname','$birth_date','$birth_place','$marital_status','$mob_tel','$living_address','$military_reg_group','$military_reg_category
    ','$military_staff','$military_rank','$military_specialty_acc','$military_fitness_service','$military_registration_service','$military_registration_date','$military_general','$military_special','$military_no_official','$military_additional_information','$military_date_completion','$insert_date')";


    if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success".$sql;
    }
 
    //Close connection
    mysqli_close($db);

 
?>