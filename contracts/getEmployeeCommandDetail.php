@@ -1,112 +0,0 @@
<?php
include('../session.php');
$site_lang=$_SESSION['dil'] ;
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
    $sql_emp_contracts = "select tc.*,te.*,tc.id id,tee.exit_date exit_date,tee.main main,tee.guarantees_termination_contract guarantees_termination_contract,ttd.title type_dismissal,ttc.title termination_clause,tn.title note,tc.structure1 pos,tec2.category directorate,tec3.category department,tec4.category depart,tec5.category area_section,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employee_exit tee on tee.emp_id=tc.emp_id
LEFT join $tbl_type_dismissal ttd on ttd.level_id=tee.type_dismissal_id
LEFT join $tbl_termination_clause ttc on ttc.level_id=tee.termination_clause_id
LEFT join $tbl_notes tn on tn.level_id=tee.note_id
LEFT join $tbl_employees te on te.id=tc.emp_id   
 LEFT join $tbl_employee_category tec2 on tec2.id=tc.structure2   
LEFT join $tbl_employee_category tec3 on tec3.id=tc.structure3   
LEFT join $tbl_employee_category tec4 on tec4.id=tc.structure4   
LEFT join $tbl_employee_category tec5 on tec5.id=tc.structure5   
   where  tc.emp_id='$empid' and tc.command_id='$command_id'and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate' and tc.command_no!=''";
}else if( $contractDate=='2'){
    $sql_emp_contracts = "select tc.*,te.*,tc.id id,tee.exit_date exit_date,tee.main main,tee.guarantees_termination_contract guarantees_termination_contract,ttd.title type_dismissal,ttc.title termination_clause,tn.title note,tc.structure1 pos,tec2.category directorate,tec3.category department,tec4.category depart,tec5.category area_section,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_employee_commands tc
LEFT join $tbl_employee_exit tee on tee.emp_id=tc.emp_id
LEFT join $tbl_type_dismissal ttd on ttd.level_id=tee.type_dismissal_id
LEFT join $tbl_termination_clause ttc on ttc.level_id=tee.termination_clause_id
LEFT join $tbl_notes tn on tn.level_id=tee.note_id
LEFT join $tbl_employees te on te.id=tc.emp_id
 LEFT join $tbl_employee_category tec2 on tec2.id=tc.structure2   
LEFT join $tbl_employee_category tec3 on tec3.id=tc.structure3   
LEFT join $tbl_employee_category tec4 on tec4.id=tc.structure4   
LEFT join $tbl_employee_category tec5 on tec5.id=tc.structure5  
   where  tc.emp_id='$empid' and tc.command_id='$command_id'and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate'  and tc.command_no=''";


}
else if( $contractDate=='3'){
    $sql_emp_contracts ="select tc.*,te.*,tc.id id,tee.exit_date exit_date,tee.main main,tee.guarantees_termination_contract guarantees_termination_contract,ttd.title type_dismissal,ttc.title termination_clause,tn.title note,tc.structure1 pos,tec2.category directorate,tec3.category department,tec4.category depart,tec5.category area_section,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_employee_commands tc
 LEFT join $tbl_employee_exit tee on tee.emp_id=tc.emp_id
LEFT join $tbl_type_dismissal ttd on ttd.level_id=tee.type_dismissal_id
LEFT join $tbl_termination_clause ttc on ttc.level_id=tee.termination_clause_id
LEFT join $tbl_notes tn on tn.level_id=tee.note_id
LEFT join $tbl_employees te on te.id=tc.emp_id 
 LEFT join $tbl_employee_category tec2 on tec2.id=tc.structure2   
LEFT join $tbl_employee_category tec3 on tec3.id=tc.structure3   
LEFT join $tbl_employee_category tec4 on tec4.id=tc.structure4   
LEFT join $tbl_employee_category tec5 on tec5.id=tc.structure5  
   where  tc.emp_id='$empid' and tc.insert_date>='$sinceBeginDate' and tc.insert_date<='$sinceEndDate' and tc.command_id='$command_id' ";
//    echo $sql_emp_contracts;
}
//echo $sql_emp_contracts;

$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
if($result_emp_contracts){
    if ($result_emp_contracts->num_rows > 0 && $contractDate!='2')
    {
        while ($row_emp_contracts = $result_emp_contracts->fetch_assoc()) {
            $data[] = $row_emp_contracts;
            $emp_id=$row_emp_contracts['emp_id'];

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
        }
    }
}

//echo $sql_emp;
echo json_encode($data);
?>