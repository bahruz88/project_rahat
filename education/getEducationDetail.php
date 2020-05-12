<?php
 include('../session.php');  
 $eduid = $_POST['eduid'];
 $sql_education = " Select  ee.id ,e.id empid,qd.id qid,u.id uni_id,concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name, qd.qualification , u.uni_name, ee.faculty,ee.profession, DATE_FORMAT(ee.end_date,'%d/%m/%Y') end_date ,ee.diplom_seria_num , DATE_FORMAT(ee.diplom_issue_date,'%d/%m/%Y') diplom_issue_date  from 
$tbl_education  ee left  join 
$tbl_universities u on ee.institution_id=u.id left  join  
$tbl_qualification_dic qd on ee.qualification_id=qd.id left  join  
$tbl_employees e on e.id=ee.emp_id  where edu_status =1 and   ee.id='$eduid'";
	
 $result_education = $db->query($sql_education);
 $data = array();
if ($result_education->num_rows > 0) {
			// output data of each row
 $row_education = $result_education->fetch_assoc();
 $data = $row_education;
 
}
	

echo json_encode($data);
?>