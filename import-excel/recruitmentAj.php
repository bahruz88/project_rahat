 <?php
//include('../session.php');
function generateRandomString($length = 2) {
    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

//$site_lang=$_SESSION['dil'] ;


$data=array();
$data2=array();
//$filename=$_FILES["excel"]["tmp_name"];


 $data = [];
 require_once('PHPExcel.php');


 function setTimeout($fn, $timeout){
     // sleep for $timeout milliseconds.
     sleep(($timeout/1000));
     $fn();
 }

if (in_array($_FILES["excel"]["type"], $allowedFileType)) {

    $filename = 'uploads/' . $_FILES['excel']['name'];
    move_uploaded_file($_FILES['excel']['tmp_name'], $filename);

//    $filename = 'uploads/' . $_FILES['excel']['name'];
//    move_uploaded_file($_FILES['excel']['tmp_name'], $filename);
    setTimeout(function(){
        $filename = 'uploads/' . $_FILES['excel']['name'];
        $type = PHPExcel_IOFactory::identify($filename);
        $objReader = PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($filename);

        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $data[$worksheet->getTitle()] = $worksheet->toArray();
        }
        echo json_encode($data);
    }, 1000);

}

//    print_r($worksheets);
//
//
//
//
////    $fp = fopen($targetPath, "wb");
//    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
//
//    $spreadSheet = $Reader->load($targetPath);
//    $excelSheet = $spreadSheet->getActiveSheet();
//    $spreadSheetAry = $excelSheet->toArray();
//    $sheetCount = count($spreadSheetAry);
////    echo $sheetCount;
//
//    for ($i = 1; $i < $sheetCount; $i ++) {
//
//        $name = "";
//        if (isset($spreadSheetAry[$i][1])) {
//            $firstname = mysqli_real_escape_string($db, $spreadSheetAry[$i][1]);
//        }
//        $description = "";
//        if (isset($spreadSheetAry[$i][2])) {
//            $lastname = mysqli_real_escape_string($db, $spreadSheetAry[$i][2]);
//            $surname = mysqli_real_escape_string($db, $spreadSheetAry[$i][3]);
//            $sex = mysqli_real_escape_string($db, $spreadSheetAry[$i][4]);
//            $marital_status = mysqli_real_escape_string($db, $spreadSheetAry[$i][5]);
//            $birth_date = mysqli_real_escape_string($db, $spreadSheetAry[$i][6]);
//            $birth_place = mysqli_real_escape_string($db, $spreadSheetAry[$i][7]);
//            $citizenship = mysqli_real_escape_string($db, $spreadSheetAry[$i][8]);
//            $pincode = mysqli_real_escape_string($db, $spreadSheetAry[$i][9]);
//            $pass_seria_num = mysqli_real_escape_string($db, $spreadSheetAry[$i][10]);
//            $passport_date = mysqli_real_escape_string($db, $spreadSheetAry[$i][11]);
//            $passport_end_date = mysqli_real_escape_string($db, $spreadSheetAry[$i][12]);
//            $pass_given_authority = mysqli_real_escape_string($db, $spreadSheetAry[$i][13]);
//            $living_address = mysqli_real_escape_string($db, $spreadSheetAry[$i][14]);
//            $reg_address = mysqli_real_escape_string($db, $spreadSheetAry[$i][15]);
//            $mob_tel = mysqli_real_escape_string($db, $spreadSheetAry[$i][16]);
//            $home_tel = mysqli_real_escape_string($db, $spreadSheetAry[$i][17]);
//            $email = mysqli_real_escape_string($db, $spreadSheetAry[$i][18]);
//            $emr_contact = mysqli_real_escape_string($db, $spreadSheetAry[$i][19]);
//        }
//
//        if (! empty($firstname) || ! empty($lastname)) {
////            $query = "insert into tbl_info(name,description) values(?,?)";
////            $paramType = "ss";
////            $paramArray = array(
////                $name,
////                $description
////            );
////            $insertId = $db->insert($query, $paramType, $paramArray);
//            $data=array();
//            $data['firstname']= $firstname;
//            $data['lastname']=$lastname;
//            $data['surname']=$surname;
//            $data['sex']=$sex;
//            $data['marital_status']=$marital_status;
//            $data['birth_date']=$birth_date;
//            $data['birth_place']=$birth_place;
//            $data['citizenship']=$citizenship;
//            $data['pincode']=$pincode;
//            $data['pass_seria_num']=$pass_seria_num;
//            $data['passport_date']=$passport_date;
//            $data['passport_end_date']=$passport_end_date;
//            $data['pass_given_authority']=$pass_given_authority;
//            $data['living_address']=$living_address;
//            $data['reg_address']=$reg_address;
//            $data['mob_tel']=$mob_tel;
//            $data['home_tel']=$home_tel;
//            $data['email']=$email;
//            $data['emr_contact']=$emr_contact;
//            $data2[]=$data;
//            if(strtoupper($sex)=="QADIN"){
//                $sex=2;
//            }else{
//                $sex=1;
//            }
//            if(strtoupper($marital_status)=="EVLİ"){
//                $marital_status=1;
//            }else{
//                $marital_status=2;
//            }
//            if(strtoupper($citizenship)=="AZƏRBAYCANLI" ||strtoupper($citizenship)=="AZ?RBAYCANLI"||strtoupper($citizenship)=="AZ?Rİ"||strtoupper($citizenship)=="AZƏRİ"){
//                $citizenship=1;
//            }else if(strtoupper($citizenship)=="RUS"){
//                $citizenship=2;
//            }else if(strtoupper($citizenship)=="TÜRK"){
//                $citizenship=3;
//            }else if(strtoupper($citizenship)=="İNGİLİS"){
//                $citizenship=4;
//            }else {
//                $citizenship=0;
//            }
//
//            $empno=generateRandomString();
//            $empno=$empno.mt_rand(10000000,99999999);
//
//            $passport_date = strtr($passport_date, '/', '-');
//            $passport_date= date('Y-m-d', strtotime($passport_date));
//
//            $passport_end_date = strtr($passport_end_date, '/', '-');
//            $passport_end_date= date('Y-m-d', strtotime($passport_end_date));
//
//            $birth_date = strtr($birth_date, '/', '-');
//            $birth_date= date('Y-m-d', strtotime($birth_date));
//
//            $birth_date = strtr($birth_date, '/', '-');
//            $birth_date= date('Y-m-d', strtotime($birth_date));
//
//
//
//            // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
//            // $result = mysqli_query($conn, $query);
//
////            if (! empty($insertId)) {
////                $type = "success";
////                $message = "Excel Data Imported into the Database";
////            } else {
////                $type = "error";
////                $message = "Problem in Importing Excel Data";
////            }
//        }
//    }
//} else {
//    $type = "error";
//    $message = "Invalid File Type. Upload Excel File.";
//}


