<?php
 include('../session.php');  
 
 $empschid = $_POST['empschid'];
 $company_id = $_SESSION["CompanyId"];
 
$sql_sch = "
SELECT esch.id,emp.id empid,
sch.id  schid , rf.type_id,esch.reduce_hours,schr.reason_id, tmt.tm_id
FROM 
$tbl_employee_schedules esch inner join 
$tbl_schedules sch on esch.sch_id=sch.id left join 
$tbl_employees emp on esch.emp_id=emp.id left join 
$tbl_sch_time_managment_type tmt on esch.tm_type=tmt.tm_id and tmt.lang='$site_lang' left join 
$tbl_sch_reduce_reason schr on esch.reduce_reason=schr.reason_id and schr.lang='$site_lang' left join 
$tbl_sch_reduce_from rf on esch.reduce_type=rf.type_id and rf.lang='$site_lang' where esch.status=1 and sch.status=1 and  sch.company_id='$company_id' and   esch.id='$empschid'";
 $result_sch= $db->query($sql_sch);
 $data = array();
if ($result_sch->num_rows > 0) 
{
 $row_sch = $result_sch->fetch_assoc();
 $data = $row_sch;
}
echo json_encode($data);
?>
 