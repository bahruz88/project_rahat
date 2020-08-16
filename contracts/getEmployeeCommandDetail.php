<?php
 include('../session.php');  
 $empid = $_POST['empid'];
$order = $_POST['order'];

$contractDate = $_POST['contractDate'];
$command_id = $_POST['command_id'];
$sinceDate = $_POST['sinceDate'];
$company_name_2= '';
$voen_2= '';
$enterprise_head_position_2= '';
$enterprise_head_fullname_2= '';
$profession_2= '';
$create_date_2= '';
$structure1_2= '';

$structure2_2= '';

$structure3_2= '';

$structure4_2= '';

$structure5_2= '';

$data = array();
$data2 = array();
$sinceDate = strtr( $sinceDate , '/', '-');
$sinceDate= date('Y-m-d', strtotime($sinceDate));
if( $contractDate=='1'){
    $sql_emp_contracts = "select tc.*,te.*,tc.id id,tefi.*,tefi.id famId,tfmt.type_desc memberType,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employees te on te.id=tc.emp_id   
LEFT join $tbl_employee_family_info tefi on tefi.emp_id=tc.emp_id     
LEFT join $tbl_family_member_types tfmt on tfmt.id=tefi.member_type     
  where  tc.emp_id='$empid' and tc.command_id='$command_id' and tc.insert_date<='$sinceDate' and tc.command_no!=''";
}else if( $contractDate=='2'){

    $sql_emp_contracts = "select tc.*,te.*,tc.id id,tefi.*,tefi.id famId,tfmt.type_desc memberType,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employees te on te.id=tc.emp_id
LEFT join $tbl_employee_family_info tefi on tefi.emp_id=tc.emp_id     
LEFT join $tbl_family_member_types tfmt on tfmt.id=tefi.member_type        
  where  tc.emp_id='$empid' and tc.command_id='$command_id' and tc.insert_date<='$sinceDate'  and tc.command_no=''";

//    $result_emp_contracts = $db->query($sql_emp_contracts);
//    $row_emp_contracts = $result_emp_contracts->fetch_assoc();
//    $data2[]  = $row_emp_contracts;
//
//            $company_name_2= $data2[0]['company_name'];
//            $voen_2= $data2[0]['voen'];
//            $enterprise_head_position_2= $data2[0]['enterprise_head_position'];
//            $enterprise_head_fullname_2= $data2[0]['enterprise_head_fullname'];
//            $profession_2= $data2[0]['profession'];
//            $create_date_2= $data2[0]['create_date'];
//            $structure1_2= $data2[0]['structure1'];
//
//            $structure2_2= $data2[0]['structure2'];
//
//            $structure3_2= $data2[0]['structure3'];
//
//            $structure4_2= $data2[0]['structure4'];
//
//            $structure5_2= $data2[0]['structure5'];
}
else if( $contractDate=='3'){
    $sql_emp_contracts ="select tc.*,te.*,tc.id id,tefi.*,tefi.id famId,tfmt.type_desc memberType,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_employee_commands tc
LEFT join $tbl_employees te on te.id=tc.emp_id 
LEFT join $tbl_employee_family_info tefi on tefi.emp_id=tc.emp_id     
LEFT join $tbl_family_member_types tfmt on tfmt.id=tefi.member_type   
  where  tc.emp_id='$empid'and tc.insert_date<='$sinceDate' and tc.command_id='$command_id' ";
//    echo $sql_emp_contracts;
}
//echo $sql_emp_contracts;
$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
if ($result_emp_contracts->num_rows > 0)
{
    $row_emp_contracts = $result_emp_contracts->fetch_assoc();
    $data[]  = $row_emp_contracts;
}
//echo $sql_emp;
echo json_encode($data);
?>