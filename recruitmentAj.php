<?php
include('session.php');
$site_lang=$_SESSION['dil'] ;
$data=array();
$data2=array();
header('Content-Type: text/html; charset=UTF-8');
function generateRandomString($length = 2) {
    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

if ( 0 < $_FILES['excel']['error'] ) {
    echo 'Error: ' . $_FILES['excel']['error'] . '<br>';
}
else {
//    echo "salam";
//    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);

    $filename=$_FILES["excel"]["tmp_name"];
    if($_FILES["excel"]["size"] > 0)
    {
        $file = fopen($filename, "r");

//$sql_data = "SELECT * FROM prod_list_1 ";

        $count = 0;                                         // add this line
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $count++;                                      // add this line
            $emapData = array_map("utf8_encode", $emapData);
            if($count>1 && $emapData[0]!='' && $emapData[1]!=''  && $emapData[2]!=''){
                $data=array();
            $data[]= $firstname=($emapData[0]);
            $data[]=$lastname=($emapData[1]);
            $data[]=$surname = ($emapData[2]);
            $data[]=$sex = $emapData[3];
            $data[]=$marital_status = $emapData[4];
            $data[]=$birth_date = $emapData[5];
            $data[]=$birth_place = $emapData[6];
            $data[]=$citizenship = ($emapData[7]);
            $data[]=$pincode = $emapData[8];
            $data[]=$pass_seria_num = $emapData[9];
            $data[]=$passport_date = $emapData[10];
            $data[]=$passport_end_date = $emapData[11];
            $data[]=$pass_given_authority = ($emapData[12]);
            $data[]=$living_address = ($emapData[13]);
            $data[]=$reg_address = ($emapData[14]);
            $data[]=$mob_tel = $emapData[15];
            $data[]=$home_tel = $emapData[16];
            $data[]=$email = $emapData[17];
            $data[]=$emr_contact = $emapData[18];
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


            }

        }
        fclose($file);
        echo json_encode($data2);
}
}
