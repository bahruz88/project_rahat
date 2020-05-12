<?php
 include('../session.php');  
 $skillid = $_POST['skillid'];
 $sql_skill = "
 SELECT  tes.id,tes.skill_name,tes.skill_descr,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id  empid
FROM $tbl_employee_skills tes inner  join  $tbl_employees te  on tes.emp_id=te.id  
 where tes.skill_status =1 and  te.emp_status=1 and tes.id='$skillid' ";
	
 $result_skill = $db->query($sql_skill);
 $data = array();
if ($result_skill->num_rows > 0) {
			// output data of each row
 $row_skill = $result_skill->fetch_assoc();
 $data = $row_skill;
 
}
	 
echo json_encode($data);
?>