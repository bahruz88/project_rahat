 <?php
include('../session.php');

// $data = json_decode(($_POST['data']));
// $data = explode(",", $_POST['data']);
// print_r($_POST['data']);
 $data =$_POST['data'];
 function generateRandomString($length = 2) {
     return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 }
//
// // here i would like use foreach:
//
// foreach($data as $d){
     foreach($data as $key=>$row){
//         print_r($row) ;
         if($key!=0){
             $firstname = $row[1];
             $lastname = $row[2];
             $surname = $row[3];
             $sex = $row[4];
             $marital_status = $row[5];
             $birth_date = $row[6];
             $birth_place = $row[7];
             $citizenship = $row[8];
             $pincode = $row[9];
             $pass_seria_num = $row[10];
             $passport_date = $row[11];
             $passport_end_date = $row[12];
             $pass_given_authority = $row[13];
             $living_address = $row[14];
             $reg_address = $row[15];
             $mob_tel = $row[16];
             $home_tel = $row[17];
             $email = $row[18];
             $emr_contact = $row[19];
             $company_id = $row[20];
             if(strtoupper($sex)=="QADIN"){
                 $sex=2;
             }else{
                 $sex=1;
             }
             if(strtoupper($marital_status)=="EVLİ"){
                 $marital_status=1;
             }else{
                 $marital_status=2;
             }
             if(strtoupper($citizenship)=="AZƏRBAYCANLI" ||strtoupper($citizenship)=="AZ?RBAYCANLI"||strtoupper($citizenship)=="AZ?Rİ"||strtoupper($citizenship)=="AZƏRİ"){
                 $citizenship=1;
             }else if(strtoupper($citizenship)=="RUS"){
                 $citizenship=2;
             }else if(strtoupper($citizenship)=="TÜRK"){
                 $citizenship=3;
             }else if(strtoupper($citizenship)=="İNGİLİS"){
                 $citizenship=4;
             }else {
                 $citizenship=0;
             }

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

                 $sql = "INSERT INTO $tbl_employees (id, firstname, lastname, surname, sex, marital_status, birth_date,
 birth_place,citizenship, pincode, passport_seria_number, passport_date, passport_end_date, pass_given_authority,
 living_address, reg_address, home_tel, mob_tel, email, emr_contact,empno,company_id)
 VALUES ('Null','$firstname','$lastname','$surname','$sex', '$marital_status','$birth_date','$birth_place','$citizenship','$pincode','$pass_seria_num','$passport_date','$passport_end_date',
 '$pass_given_authority','$living_address','$reg_address','$mob_tel','$home_tel','$email','$emr_contact','$empno','$company_id')";

             if(!mysqli_query($db, $sql)) {
                 echo "error" .mysqli_error($db);
             }
             else {
                 echo "ss";
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
//                 mysqli_close($db);
             }






         }

//     }
 }



