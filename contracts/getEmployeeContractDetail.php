<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;
 $empid = $_POST['empid'];
 $company_id = $_POST['companyId'];


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
    $sql_emp_contracts = "select tc.*,te.*,tes.*,tqd.qualification,ttec.*,tYN.chois_desc indefinite,tws.title workplace_status,twc.title working_conditions,tu.uni_name,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,tsi.total_monthly_salary,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id,
td.title dates, tco.bank_name,tco.bank_filial,tco.kod,tco.cor_account,tco.swift,tco.bank_voen,tco.azn_account,tco.usd_account,tco.eur_account,tco.country,tco.city,tco.address,tco.tel,tco.enterprise_head_fullname,tco.enterprise_head_position, tYN2.chois_desc service,
tsi.other_conditions1,tsi.other_conditions2,tsi.other_conditions3
from $tbl_contracts tc
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id   
LEFT join $tbl_education tes on tes.emp_id=tc.emp_id   
LEFT join $tbl_qualification_dic tqd on tqd.id=tes.qualification_id    
LEFT join $tbl_universities tu on tu.id=tes.institution_id    
LEFT join $tbl_terms_employment_contract ttec on ttec.emp_id=tc.emp_id
LEFT join $tbl_workplace_status tws on tws.work_status_id=ttec.workplace_status
LEFT join $tbl_working_conditions twc on twc.cond_id=ttec.working_conditions
LEFT join $tbl_yesno tYN on ttec.indefinite=tYN.chois_id and tYN.lang='$site_lang'
LEFT join $tbl_dates td on ttec.probation_dates=td.level_id and td.lang='$site_lang'
LEFT join $tbl_employee_company tco on tco.id=tc.company_id
LEFT join $tbl_yesno tYN2 on tco.service=tYN.chois_id and tYN.lang='$site_lang'

  where  tc.emp_id='$empid' and tc.company_id='$company_id'";
}else
if($order!="" && $contractDate=='1'){
    $sql_emp_contracts = "select tc.*,te.*,tes.*,tqd.qualification,ttec.*,tYN.chois_desc indefinite,tws.title workplace_status,twc.title working_conditions,tu.uni_name,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id,
td.title dates , tco.bank_name,tco.bank_filial,tco.kod,tco.cor_account,tco.swift,tco.bank_voen,tco.azn_account,tco.usd_account,tco.eur_account,tco.country,tco.city,tco.address,tco.tel,tco.enterprise_head_fullname,tco.enterprise_head_position, tYN2.chois_desc service,
tsi.other_conditions1,tsi.other_conditions2,tsi.other_conditions3
from $tbl_contracts tc
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id    
LEFT join $tbl_education tes on tes.emp_id=tc.emp_id
LEFT join $tbl_qualification_dic tqd on tqd.id=tes.qualification_id    
LEFT join $tbl_universities tu on tu.id=tes.institution_id       
  LEFT join $tbl_terms_employment_contract ttec on ttec.emp_id=tc.emp_id
  LEFT join $tbl_workplace_status tws on tws.work_status_id=ttec.workplace_status
  LEFT join $tbl_working_conditions twc on twc.cond_id=ttec.working_conditions
  LEFT join $tbl_yesno tYN on ttec.indefinite=tYN.chois_id and tYN.lang='$site_lang'
  LEFT join $tbl_dates td on ttec.probation_dates=td.level_id and td.lang='$site_lang'
  LEFT join $tbl_employee_company tco on tco.id=tc.company_id
  LEFT join $tbl_yesno tYN2 on tco.service=tYN.chois_id and tYN.lang='$site_lang'
  where  tc.emp_id='$empid' and tc.company_id='$company_id' $order ";
}else if($order!="" && $contractDate=='2'){
    $sql_emp_contracts = "select tc.*,te.*,tes.*,tqd.qualification,ttec.*,tYN.chois_desc indefinite,tws.title workplace_status,twc.title working_conditions,tu.uni_name,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id,
td.title dates , tco.bank_name,tco.bank_filial,tco.kod,tco.cor_account,tco.swift,tco.bank_voen,tco.azn_account,tco.usd_account,tco.eur_account,tco.country,tco.city,tco.address,tco.tel,tco.enterprise_head_fullname,tco.enterprise_head_position, tYN2.chois_desc service,
tsi.other_conditions1,tsi.other_conditions2,tsi.other_conditions3
from $tbl_contracts tc
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id    
LEFT join $tbl_education tes on tes.emp_id=tc.emp_id   
LEFT join $tbl_qualification_dic tqd on tqd.id=tes.qualification_id    
LEFT join $tbl_universities tu on tu.id=tes.institution_id 
LEFT join $tbl_terms_employment_contract ttec on ttec.emp_id=tc.emp_id
LEFT join $tbl_workplace_status tws on tws.work_status_id=ttec.workplace_status
LEFT join $tbl_working_conditions twc on twc.cond_id=ttec.working_conditions
LEFT join $tbl_yesno tYN on ttec.indefinite=tYN.chois_id and tYN.lang='$site_lang'
LEFT join $tbl_dates td on ttec.probation_dates=td.level_id and td.lang='$site_lang'
LEFT join $tbl_employee_company tco on tco.id=tc.company_id
LEFT join $tbl_yesno tYN2 on tco.service=tYN.chois_id and tYN.lang='$site_lang'
  where  tc.emp_id='$empid' and tc.company_id='$company_id' $order";

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
    $sql_emp_contracts ="select tc.*,te.*,tes.*,tqd.qualification,ttec.*,tYN.chois_desc indefinite,tws.title workplace_status,twc.title working_conditions,tu.uni_name,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id,
td.title dates, tco.bank_name,tco.bank_filial,tco.kod,tco.cor_account,tco.swift,tco.bank_voen,tco.azn_account,tco.usd_account,tco.eur_account,tco.country,tco.city,tco.address,tco.tel,tco.enterprise_head_fullname,tco.enterprise_head_position, tYN2.chois_desc service,
tsi.other_conditions1,tsi.other_conditions2,tsi.other_conditions3
 from $tbl_contracts tc
 LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id
LEFT join $tbl_education tes on tes.emp_id=tc.emp_id   
 LEFT join $tbl_qualification_dic tqd on tqd.id=tes.qualification_id    
LEFT join $tbl_universities tu on tu.id=tes.institution_id 
LEFT join $tbl_terms_employment_contract ttec on ttec.emp_id=tc.emp_id
LEFT join $tbl_workplace_status tws on tws.work_status_id=ttec.workplace_status
LEFT join $tbl_working_conditions twc on twc.cond_id=ttec.working_conditions
LEFT join $tbl_yesno tYN on ttec.indefinite=tYN.chois_id and tYN.lang='$site_lang'
LEFT join $tbl_dates td on ttec.probation_dates=td.level_id and td.lang='$site_lang'
LEFT join $tbl_employee_company tco on tco.id=tc.company_id
LEFT join $tbl_yesno tYN2 on tco.service=tYN.chois_id and tYN.lang='$site_lang'
  where  tc.emp_id='$empid' and tc.company_id='$company_id'";
}else{
    $sql_emp_contracts ="select tc.*,te.*,tes.*,ttec.*,tYN.chois_desc indefinite,tws.title workplace_status,twc.title working_conditions,tqd.qualification,tu.uni_name,trp.title reward_period,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id,
td.title dates, tco.bank_name,tco.bank_filial,tco.kod,tco.cor_account,tco.swift,tco.bank_voen,tco.azn_account,tco.usd_account,tco.eur_account,tco.country,tco.city,tco.address,tco.tel,tco.enterprise_head_fullname,tco.enterprise_head_position, tYN2.chois_desc service,
 tsi.other_conditions1,tsi.other_conditions2,tsi.other_conditions3
 from $tbl_contracts tc
 LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_reward_period trp on trp.reward_id=tsi.reward_period
LEFT join $tbl_employees te on te.id=tc.emp_id
LEFT join $tbl_education tes on tes.emp_id=tc.emp_id  
 LEFT join $tbl_qualification_dic tqd on tqd.id=tes.qualification_id    
LEFT join $tbl_universities tu on tu.id=tes.institution_id  
LEFT join $tbl_terms_employment_contract ttec on ttec.emp_id=tc.emp_id
LEFT join $tbl_workplace_status tws on tws.work_status_id=ttec.workplace_status
LEFT join $tbl_working_conditions twc on twc.cond_id=ttec.working_conditions
LEFT join $tbl_yesno tYN on ttec.indefinite=tYN.chois_id and tYN.lang='$site_lang'
LEFT join $tbl_dates td on ttec.probation_dates=td.level_id and td.lang='$site_lang'
LEFT join $tbl_employee_company tco on tco.id=tc.company_id
LEFT join $tbl_yesno tYN2 on tco.service=tYN.chois_id and tYN.lang='$site_lang'
  where  tc.emp_id='$empid' and tc.company_id='$company_id' and tc.id!='$id1' and tc.id!='$id2'";
}

}
//echo $sql_emp_contracts;
//echo $sql_emp_contracts;
$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
if ($result_emp_contracts->num_rows > 0 && $contractDate!='2')
{
    while ($row_emp_contracts = $result_emp_contracts->fetch_assoc()) {


        $emp_id=$row_emp_contracts['emp_id'];
        $company_id=$row_emp_contracts['company_id'];

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

$parent='';
/// tbl_category
$sql_parents = "select tec.* from $tbl_employee_category  tec
                      WHERE tec.emp_id = '$emp_id' and tec.company_id = '$company_id'";
//echo $sql_parents;
$result_parents = $db->query($sql_parents);
if ($result_parents) {
    if ($result_parents->num_rows > 0) {
//                        $data=array();
        while ($row_parents = $result_parents->fetch_assoc()) {
            $parent = $row_parents["parent"];
            $vezife = $row_parents["category"];
            $row_emp_contracts["structure1"]=$vezife;
        }
    }
}
$directorate='';
$department='';
$depart='';
$area_section='';
while ($parent != '' && $parent != null) {
    $sql_st = "select tec.*, tsl.title structure from $tbl_employee_category  tec
                    LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
                     WHERE tec.id = '$parent'";
//                  echo $sql_parents;
    $result_st = $db->query($sql_st);
    if ($result_st) {
        if ($result_st->num_rows > 0) {
            $datast=array();
            while ($row_st = $result_st->fetch_assoc()) {
                $parent = $row_st["parent"];
                if ($row_st["structure_level"] != 1) {
                    if ($row_st["structure_level"] == 2) {
                        $directorate = $row_st["category"];
                        $row_emp_contracts["structure2"]=$directorate;
                    }
                    if ($row_st["structure_level"] == 3) {
                        $department = $row_st["category"];
                        $row_emp_contracts["structure3"]=$department;
                    }
                    if ($row_st["structure_level"] == 4) {
                        $depart = $row_st["category"];
                        $row_emp_contracts["structure4"]=$depart;
                    }
                    if ($row_st["structure_level"] == 5) {
                        $area_section = $row_st["category"];
                        $row_emp_contracts["structure5"]=$area_section;
                    }
//                                $data[] = $datast;

                }

            }
        }
    }
}
        $data[] = $row_emp_contracts;
    }
}


//echo $sql_emp;
echo json_encode($data);
?>