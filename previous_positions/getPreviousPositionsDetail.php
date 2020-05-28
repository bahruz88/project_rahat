<?php
 include('../session.php');
$positionid = $_POST['positionid'];



$sql_lang = "SELECT tepp.id,tepp.emp_id,tepp.prev_employer, DATE_FORMAT(tepp.start_date,'%d/%m/%Y') start_date,
DATE_FORMAT(tepp.end_date,'%d/%m/%Y') end_date,
tepp.leave_reason,tepp.sector,tepp.status,tepp.insert_date,
te.firstname,te.lastname,te.surname,te.emp_status
FROM tbl_employee_prev_positions tepp
INNER join tbl_employees te on te.id=tepp.emp_id where tepp.status=1 and te.emp_status=1 and  tepp.id='positionid'";


$result_lang = $db->query($sql_lang);
$data = array();

if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>