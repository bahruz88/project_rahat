<?php
 include('../session.php');
$militaryid = $_POST['militaryid'];
 $sql_lang = "SELECT tmi.*,tms.staff_id tmsId,tms.staff_desc tmsStaffDesc,tmr.rank_id tmrId,tmr.rank_desc tmrRankDesc,te.id teId, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.emp_status,tms.staff_desc 
FROM $tbl_military_information tmi  
inner join  $tbl_employees te on tmi.emp_id=te.id 
INNER join $tbl_military_rank  tmr on tmi.military_rank=tmr.rank_id and  tmr.lang='az'
INNER join $tbl_military_staff  tms on tmi.military_staff=tms.staff_id and  tms.lang='az'
where te.emp_status=1 and  tmi.id='$militaryid' ";
	
 $result_lang = $db->query($sql_lang);
 $data = array();
if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>