<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;
 $empid = $_POST['empid'];


$contractDate ='3';
$order="";
if (isset($_POST['contractDate']))
{
    $contractDate = $_POST['contractDate'];
    $order = $_POST['order'];
}
$id1=0;
$id2=0;
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
if($order=="" && $contractDate==''){
    $sql_emp_contracts = "select tc.*,te.*,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_contracts tc
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id   
  where  tc.emp_id='$empid' ";
}else
if($order!="" && $contractDate=='1'){
    $sql_emp_contracts = "select tc.*,te.*,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_contracts tc
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id       
  
  where  tc.emp_id='$empid' $order";
}else if($order!="" && $contractDate=='2'){
    $sql_emp_contracts = "select tc.*,te.*,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_contracts tc
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id    

  where  tc.emp_id='$empid' $order";

    $result_emp_contracts = $db->query($sql_emp_contracts);
    $row_emp_contracts = $result_emp_contracts->fetch_assoc();
    $data2[]  = $row_emp_contracts;

            $company_name_2= $data2[0]['company_name'];
            $voen_2= $data2[0]['voen'];
            $enterprise_head_position_2= $data2[0]['enterprise_head_position'];
            $enterprise_head_fullname_2= $data2[0]['enterprise_head_fullname'];
            $profession_2= $data2[0]['profession'];
            $create_date_2= $data2[0]['create_date'];
            $structure1_2= $data2[0]['structure1'];

            $structure2_2= $data2[0]['structure2'];

            $structure3_2= $data2[0]['structure3'];

            $structure4_2= $data2[0]['structure4'];

            $structure5_2= $data2[0]['structure5'];

}
else{

    $sql_id1 = "select id from $tbl_contracts 
  where  emp_id='$empid' ORDER BY id ASC LIMIT 1";
    $result = $db->query($sql_id1);
    if($result){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id1 = $row["id"];
            }
        }
    }
    $sql_id2 = "select id from $tbl_contracts 

  where  emp_id='$empid' ORDER BY id DESC LIMIT 1";
    $result2 = $db->query($sql_id2);
    if($result2){
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $id2 = $row2["id"];
            }
        }
    }
if($id1==0 || $id2==0){
    $sql_emp_contracts ="select tc.*,te.*,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_contracts tc
 LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id
  where  tc.emp_id='$empid'";
}else{
    $sql_emp_contracts ="select tc.*,te.*,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_contracts tc
 LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id
  where  tc.emp_id='$empid' and tc.id!='$id1' and tc.id!='$id2'";
}

}

//echo $sql_emp_contracts;
$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
if ($result_emp_contracts->num_rows > 0 && $contractDate!='2')
{
    while ($row_emp_contracts = $result_emp_contracts->fetch_assoc()) {

        $data[] = $row_emp_contracts;
        $emp_id=$row_emp_contracts['emp_id'];

    $sql_member_types ="select tefi.*,tefi.id famId,tfmt.type_desc memberType
     from $tbl_employee_family_info tefi     
    LEFT join $tbl_family_member_types tfmt on tfmt.id=tefi.member_type   and tfmt.lang='$site_lang'  
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