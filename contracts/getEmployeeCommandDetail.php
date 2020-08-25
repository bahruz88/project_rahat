<?php
 include('../session.php');  
 $empid = $_POST['empid'];
$order = $_POST['order'];

//$contractDate = $_POST['contractDate'];
$contractDate ='3';
if (isset($_POST['contractDate']))
{
    $contractDate = $_POST['contractDate'];
}
$command_id = $_POST['command_id'];
$sinceBeginDate = $_POST['sinceBeginDate'];
$sinceEndDate = $_POST['sinceEndDate'];
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
$sinceBeginDate = strtr( $sinceBeginDate , '/', '-');
$sinceBeginDate= date('Y-m-d', strtotime($sinceBeginDate));

$sinceEndDate = strtr( $sinceEndDate , '/', '-');
$sinceEndDate= date('Y-m-d', strtotime($sinceEndDate));

if( $contractDate=='1'){
    $sql_emp_contracts = "select tc.*,te.*,tc.id id,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employees te on te.id=tc.emp_id   
   where  tc.emp_id='$empid' and tc.command_id='$command_id'and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate' and tc.command_no!=''";
}else if( $contractDate=='2'){

    $sql_emp_contracts = "select tc.*,te.*,tc.id id,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employees te on te.id=tc.emp_id
   where  tc.emp_id='$empid' and tc.command_id='$command_id'and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate'  and tc.command_no=''";

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
    $sql_emp_contracts ="select tc.*,te.*,tc.id id,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_employee_commands tc
LEFT join $tbl_employees te on te.id=tc.emp_id 
   where  tc.emp_id='$empid'and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate' and tc.command_id='$command_id' ";
//    echo $sql_emp_contracts;
}
//echo $sql_emp_contracts;
$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
//if ($result_emp_contracts->num_rows > 0)
//{
//    $row_emp_contracts = $result_emp_contracts->fetch_assoc();
//    $data[]  = $row_emp_contracts;
//}
$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
if ($result_emp_contracts->num_rows > 0 && $contractDate!='2')
{
    while ($row_emp_contracts = $result_emp_contracts->fetch_assoc()) {

        $data[] = $row_emp_contracts;
        $emp_id=$row_emp_contracts['emp_id'];

        $sql_member_types ="select tefi.*,tefi.id famId,tfmt.type_desc memberType
     from $tbl_employee_family_info tefi     
    LEFT join $tbl_family_member_types tfmt on tfmt.id=tefi.member_type     
    where  tefi.emp_id='$emp_id' ";
//    echo $sql_member_types;
        $result_member_types = $db->query($sql_member_types);
        if ($result_member_types->num_rows > 0 ) {
            while ($row_member_types = $result_member_types->fetch_assoc()) {
                $data[] = $row_member_types;
            }
        }
    }
}
//echo $sql_emp;
echo json_encode($data);
?>