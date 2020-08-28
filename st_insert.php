<?php


include('session.php') ;

//Create variables
$c=0;
$rs='';
$c = 1;
$number=1;
$head='';

if($_POST['position_level']!='0' && $_POST['position_level']!=''){
    $head='P';
}
if($_POST['structure_level']!='0'&& $_POST['structure_level']!=''){
    $head='S';
}
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

$pId                = $_POST['pId'];
$name               = $_POST['name'];
$emp_id             = $_POST['emp_id'];
$structure_level    = $_POST['structure_level'];
$position_level     = $_POST['position_level'];
$create_date        = $_POST['create_date'];
$end_date           = $_POST['end_date'];
$icon              = $_POST['icon'];
$company_id        = $_POST['company_id'];
$create_date = strtr( $create_date , '/', '-');
$create_date= date('Y-m-d', strtotime($create_date));

$end_date = strtr( $end_date , '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));

$code               = $rs;
if($head!=''){


if(($pId==0 or $pId=='' or $pId=='null') ){
    $sql = "INSERT INTO $tbl_employee_category( 
	 id, parent,company_id, category,icon,code,emp_id,structure_level,position_level,create_date,end_date) 
	 VALUES (NULL, NULL,'$company_id','$name','$icon','$code','$emp_id','$structure_level','$position_level','$create_date','$end_date')";

}else{
    $sql = "INSERT INTO $tbl_employee_category( 
	 id, parent,company_id, category,icon,code,emp_id,structure_level,position_level,create_date,end_date) 
	 VALUES (NULL, '$pId','$company_id','$name','$icon','$code','$emp_id','$structure_level','$position_level','$create_date','$end_date')";

}


if(!mysqli_query($db, $sql)) {
    echo "error=".$pId.'=' .mysqli_error($db);
}
else {
//  echo "success" ;
}
}
//Close connection
//mysqli_close($db);
//
include ('st_selectWithComp.php');
?>