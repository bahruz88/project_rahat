<?php
include('../session.php') ;
//Create variables
$c=0;
$rs='';
$c = 1;
$number=1;
$head='';

    $head='P';


function generateRandomString($length,$head) {
    $number = sprintf("%08d", $length);
    $p=$head.$number;
    return $p;
}
WHILE ($c > 0){
    $rs = generateRandomString($number,$head);

    $users= "select * from $tbl_employee_category WHERE code = '$rs'";
    $result_users = $db->query($users);
    if($result_users->num_rows > 0) {
        $c = 1;
        $number++;
    }else{
        $c=0;
        $number++;
    }

}
$code               = $rs;

  //Create variables
$employee =$_POST['emplo'];
$company_id =$_POST['company_id'];
$position=$_POST['position'];
$work_status=$_POST['status'];
$position_level=1;
$create_date='1900-01-01';
$end_date='9999-12-31';
//$direct_guide=$_POST['direct_guide'];
//$second_leader=$_POST['second_leader'];
$icon="images/icons/man2.png";

if(isset($_POST['position_level'])){
    if($_POST['position_level']!=''){
        $position_level=$_POST['position_level'];
    }
}
if($position_level==2){
    $icon="images/icons/capman3.png";
}
if(isset($_POST['directorate'])){
    if($_POST['directorate']!=''){
        $parent=$_POST['directorate'];
    }
}
if(isset($_POST['department'])){
    if($_POST['department']!=''){
        $parent=$_POST['department'];
    }
}
if(isset($_POST['depart'])){
    if($_POST['depart']!=''){
        $parent=$_POST['depart'];
    }
}
if(isset($_POST['area_section'])){
    if($_POST['area_section']!=''){
        $parent=$_POST['area_section'];
    }
}

$insert_date= date("Y-m-d h:i:sa") ;

    $sql = "INSERT INTO $tbl_employee_category(
	 id, emp_id,code,icon, category, company_id,position_level, parent, work_status,create_date,end_date, insert_date)
	 VALUES (NULL, '$employee','$code','$icon','$position','$company_id','$position_level','$parent','$work_status','$create_date','$end_date','$insert_date')";

  if(!mysqli_query($db, $sql)) {
        echo "error=".$parent.' = ' .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>