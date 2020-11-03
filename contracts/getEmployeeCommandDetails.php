<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;
 $empid = $_POST['empid'];
$order = $_POST['order'];

//$contractDate = $_POST['contractDate'];
$contractDate ='';
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
    $sql_emp_contracts = "select tc.*,te.*,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,tc.insert_date create_date,tc.id id,tee.exit_date exit_date,tee.main main,tee.guarantees_termination_contract guarantees_termination_contract,ttd.title type_dismissal,ttc.title termination_clause,tn.title note,tc.structure1 pos,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employee_exit tee on tee.emp_id=tc.emp_id
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_type_dismissal ttd on ttd.level_id=tee.type_dismissal_id
LEFT join $tbl_termination_clause ttc on ttc.level_id=tee.termination_clause_id
LEFT join $tbl_notes tn on tn.level_id=tee.note_id
LEFT join $tbl_employees te on te.id=tc.emp_id       
   where  tc.emp_id='$empid' and tc.command_id='$command_id'and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate' and tc.command_no!=''";
}else if( $contractDate=='2'){
    $sql_emp_contracts = "select tc.*,te.*,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize,tc.insert_date create_date,tc.id id,tee.exit_date exit_date,tee.main main,tee.guarantees_termination_contract guarantees_termination_contract,ttd.title type_dismissal,ttc.title termination_clause,tn.title note,tc.structure1 pos,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employee_exit tee on tee.emp_id=tc.emp_id
LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_type_dismissal ttd on ttd.level_id=tee.type_dismissal_id
LEFT join $tbl_termination_clause ttc on ttc.level_id=tee.termination_clause_id
LEFT join $tbl_notes tn on tn.level_id=tee.note_id
LEFT join $tbl_employees te on te.id=tc.emp_id  
   where  tc.emp_id='$empid' and tc.command_id='$command_id'and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate'  and tc.command_no=''";


}
else if( $contractDate=='3'||  $contractDate==''){
    $sql_emp_contracts ="select tc.*,te.*,concat(tsi.wage,' ', tcu.title) wage,concat(tsi.prize_amount,' ', tcu2.title) prize, tc.insert_date create_date,tc.id id,tee.exit_date exit_date,tee.main main,tee.guarantees_termination_contract guarantees_termination_contract,ttd.title type_dismissal,ttc.title termination_clause,tn.title note,tc.structure1 pos,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_employee_commands tc
 LEFT join $tbl_employee_exit tee on tee.emp_id=tc.emp_id
 LEFT join $tbl_salary_info tsi on tsi.emp_id=tc.emp_id
 LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_currency tcu2 on tcu2.id=tsi.prize_amount_currency
LEFT join $tbl_type_dismissal ttd on ttd.level_id=tee.type_dismissal_id
LEFT join $tbl_termination_clause ttc on ttc.level_id=tee.termination_clause_id
LEFT join $tbl_notes tn on tn.level_id=tee.note_id
LEFT join $tbl_employees te on te.id=tc.emp_id  
   where  tc.emp_id='$empid' and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate' and tc.command_id='$command_id' ";
//    echo $sql_emp_contracts;
}
 //echo $sql_emp_contracts;
$parent ='';
$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
if($result_emp_contracts){
    if ($result_emp_contracts->num_rows > 0 && $contractDate!='2')
    {
        while ($row_emp_contracts = $result_emp_contracts->fetch_assoc()) {

            $emp_id=$row_emp_contracts['emp_id'];
            $company_id=$row_emp_contracts['company_id'];

            $sql_member_types ="select tefi.*,tefi.id famId,tfmt.type_desc memberType
     from $tbl_employee_family_info tefi     
    LEFT join $tbl_family_member_types tfmt on tfmt.id=tefi.member_type  and tfmt.lang='$site_lang'    
    where  tefi.emp_id='$emp_id' ";
//    echo $sql_member_types;
            $result_member_types = $db->query($sql_member_types);
            if ($result_member_types->num_rows > 0 ) {
                while ($row_member_types = $result_member_types->fetch_assoc()) {
                    $data[] = $row_member_types;
                }
            }
            /// tbl_category
            $sql_parents = "select tec.* from $tbl_employee_category  tec
                      WHERE tec.emp_id = '$emp_id' and tec.company_id = '$company_id'";
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
}

//echo $sql_emp;
echo json_encode($data);
?>