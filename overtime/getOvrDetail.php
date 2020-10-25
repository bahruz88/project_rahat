<?php
 include('../session.php');  
 
 $ovrid = $_POST['ovrid'];
 
$sql_ovr = "SELECT  com.id compid,eo.start_date , eo.expire_date, emp.id empid,
yn.chois_id,p.period_id,ocs.status_id
FROM 
$tbl_employee_overtimes eo inner join   
$tbl_employees emp on eo.emp_id=emp.id inner join 
$tbl_overtime_calc_status ocs  on eo.calc_status=ocs.status_id and ocs.lang='az' inner join 
$tbl_yesno  yn  on  eo.overtime_status=yn.chois_id and  yn.lang='az' inner join
$tbl_periods p  on  eo.overtime_period=p.period_id and  p.lang='az'  inner join
$tbl_companies com  on emp.company_id=com.id 
  where eo.id='$ovrid'";
  $result_ovr= $db->query($sql_ovr);
 $data = array();
if ($result_ovr->num_rows > 0) 
{
 $row_ovr = $result_ovr->fetch_assoc();
 $data = $row_ovr;
}
echo json_encode($data);
?>