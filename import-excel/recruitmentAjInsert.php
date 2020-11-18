<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
include('../session.php');
require_once ('vendor/autoload.php');
function generateRandomString($length = 2) {
    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
$firstname ='';

$lastname = $surname = $sex = $marital_status = $birth_date = $birth_place = $citizenship = $pincode = '';
$pass_seria_num = $passport_date = $passport_end_date = $pass_given_authority = $living_address =$reg_address =$mob_tel =$home_tel =$email = $emr_contact='';
$site_lang=$_SESSION['dil'];
$allowedFileType = [
    'application/vnd.ms-excel',
    'text/xls',
    'text/xlsx',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
];

$data=array();
$data2=array();
//$filename=$_FILES["excel"]["tmp_name"];


if($_FILES["excel"]["name"] != '')
{
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["excel"]["name"]);
    $file_extension = end($file_array);
    if(in_array($file_extension, $allowed_extension))
    {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['excel']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
        $spreadsheet = $reader->load($file_name);
        unlink($file_name);
        $data = $spreadsheet->getActiveSheet()->toArray();
        $count = 0;
        foreach($data as $row)
        {
            $count++;
            $insert_data = array(
                ':test1'          =>  $row[0],
                ':test2'          =>  $row[1],
                ':test3'          =>  $row[2],
                ':test4'          =>  $row[3]
            );
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
            $data['firstname']= $firstname;
            $data['lastname']=$lastname;
            $data['surname']=$surname;
            $data['sex']=$sex;
            $data['marital_status']=$marital_status;
            $data['birth_date']=$birth_date;
            $data['birth_place']=$birth_place;
            $data['citizenship']=$citizenship;
            $data['pincode']=$pincode;
            $data['pass_seria_num']=$pass_seria_num;
            $data['passport_date']=$passport_date;
            $data['passport_end_date']=$passport_end_date;
            $data['pass_given_authority']=$pass_given_authority;
            $data['living_address']=$living_address;
            $data['reg_address']=$reg_address;
            $data['mob_tel']=$mob_tel;
            $data['home_tel']=$home_tel;
            $data['email']=$email;
            $data['emr_contact']=$emr_contact;
            $data2[]=$data;
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
if($count>1){
    $sql = "INSERT INTO $tbl_employees (id, firstname, lastname, surname, sex, marital_status, birth_date,
 birth_place,citizenship, pincode, passport_seria_number, passport_date, passport_end_date, pass_given_authority,
 living_address, reg_address, home_tel, mob_tel, email, emr_contact,empno)
 VALUES ('Null','$firstname','$lastname','$surname','$sex', '$marital_status','$birth_date','$birth_place','$citizenship','$pincode','$pass_seria_num','$passport_date','$passport_end_date',
 '$pass_given_authority','$living_address','$reg_address','$mob_tel','$home_tel','$email','$emr_contact','$empno')";

    $db->query($sql);
}

        };
//        $query = "
//                    INSERT INTO post
//                    (  test1, test2, test3, test4)
//                    VALUES
//                    ( :test1, :test2, :test3, :test4)
//                ";
//        $statement = $connect->prepare($query);
//        $statement->execute($insert_data);
    }
//    echo "succes";
}else{
    echo "only xls,csv,xlsx are allowed";
}
echo json_encode($data2);