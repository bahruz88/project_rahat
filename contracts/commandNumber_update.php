<?php
 include('../session.php');  
 $empid = $_POST['empid'];
$id = $_POST['id'];
 $command_id = $_POST['contract'];
// $contract = $_POST['contract'];
 $company_id = $_POST['company_id'];

// $command_no ='01/K';

$rs='';
$c = 1;
$number=1;
$head='/K';
function generateRandomString($length,$head) {
    $number = sprintf("%02d", $length);
    $p=$number.$head;
    return $p;
}
WHILE ($c > 0){
    $rs = generateRandomString($number,$head);

    $users= "select * from $tbl_employee_commands WHERE command_id='$command_id'and company_id='$company_id' and command_no = '$rs'";
    $result_users = $db->query($users);
    if($result_users->num_rows > 0) {
        $c = 1;
        $number++;
    }else{
        $c=0;
        $number++;
    }

}








//$data = array();
//    $sql_emp_contracts = "select *
//from $tbl_employee_commands
//   where  command_id='$command_id'and company_id='$company_id' and command_no!='' ORDER BY command_no ASC LIMIT 1";
//
////echo $sql_emp_contracts;
//$result_emp_contracts = $db->query($sql_emp_contracts);
////eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
//if ($result_emp_contracts->num_rows > 0)
//{
//    $row_emp_contracts = $result_emp_contracts->fetch_assoc();
////    $data[]  = $row_emp_contracts;
////    $result_users = $db->query($users);
//    $data=array();
//    while($row_emp_contracts = $result_emp_contracts->fetch_assoc()) {
//        $command_no=$row_emp_contracts['command_no'];
//        $command_no=number_format($command_no.substr(0,2));
//
//    }
//}else{
    $sql = "UPDATE  $tbl_employee_commands SET  
		command_no  = '$rs'
		WHERE id 	= '$id'";
    echo $sql;
    if(mysqli_query($db, $sql) ) {
   echo "success";
    }
    else  {
        echo "errorwww" .mysqli_error($db);
    }
//}
//echo $sql_emp;
//echo json_encode($data);
?>