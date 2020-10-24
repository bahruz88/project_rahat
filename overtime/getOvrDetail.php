<?php
 include('../session.php');  
 
 $ovrid = $_POST['ovrid'];
 
$sql_sch = "SELECT DATE_FORMAT(eo.start_date,'%d/%m/%Y') start_date,
DATE_FORMAT(eo.expire_date,'%d/%m/%Y') expire_date, concat(emp.lastname,' ', emp.firstname ,' ', emp.surname) full_name ,
yn.chois_desc,p.period_desc,ocs.status_desc
FROM tbl_employee_overtimes eo inner join   
tbl_employees emp on eo.emp_id=emp.id inner join 
tbl_overtime_calc_status ocs  on eo.calc_status=ocs.status_id and  ocs.lang='az' inner join 
tbl_yesno  yn  on eo.overtime_status=yn.chois_id and  yn.lang='az'  inner join
tbl_periods p  on  eo.overtime_period=p.period_id and  p.lang='az'
  eo.id='$ovrid'";
  $result_sch= $db->query($sql_sch);
 $data = array();
if ($result_sch->num_rows > 0) 
{
 $row_sch = $result_sch->fetch_assoc();
 $data = $row_sch;
}
echo json_encode($data);
?>