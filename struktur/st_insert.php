<?php


include('../session.php') ;

//Create variables
$c=0;
$rs='';
$c = 1;
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
WHILE ($c > 0){
  $rs = generateRandomString(5);

    $users= "select * from $tbl_employee_category WHERE code = $rs";
    $result_users = $db->query($users);
    if($result_users) {
        $c = 1;
    }else{
        $c=0;
    }
}



////$id                 =$_POST['id'];
$pId                = $_POST['pId'];
$name               = $_POST['name'];
$emp_id             = $_POST['emp_id'];
$structure_level    = $_POST['structure_level'];
$position_level     = $_POST['position_level'];
$create_date        = $_POST['create_date'];
$end_date        = $_POST['end_date'];
$icon        = $_POST['icon'];
$create_date = strtr( $create_date , '/', '-');
$create_date= date('Y-m-d', strtotime($create_date));

$end_date = strtr( $end_date , '/', '-');
$end_date= date('Y-m-d', strtotime($end_date));
$code               = $rs;
if($pId==0 or $pId=='' or $pId=='null'){
    $sql = "INSERT INTO $tbl_employee_category( 
	 id, parent, category,icon,code,emp_id,structure_level,position_level,create_date,end_date) 
	 VALUES (NULL, NULL,'$name','$icon','$code','$emp_id','$structure_level','$position_level','$create_date','$end_date')";

}else{
    $sql = "INSERT INTO $tbl_employee_category( 
	 id, parent, category,icon,code,emp_id,structure_level,position_level,create_date,end_date) 
	 VALUES (NULL, '$pId','$name','$icon','$code','$emp_id','$structure_level','$position_level','$create_date','$end_date')";

}



if(!mysqli_query($db, $sql)) {
    echo "error=".$pId.'=' .mysqli_error($db);
}
else {
//  echo "success" ;
}

//Close connection
//mysqli_close($db);
//
include ('st_select.php');
?>