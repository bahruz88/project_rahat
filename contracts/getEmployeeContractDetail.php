<?php
 include('../session.php');  
 $empid = $_POST['empid'];
 $sql_emp = "select e.* ,e.company_id company_id,
 DATE_FORMAT(e.birth_date,'%d/%m/%Y') birth_date_u, DATE_FORMAT(e.passport_date,'%d/%m/%Y') passport_date_u,DATE_FORMAT(e.passport_end_date,'%d/%m/%Y') passport_end_date_u, concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name,
 tec.company_name,tec.voen,tec.sun,tec.enterprise_head_position,tec.enterprise_head_fullname,
 te.qualification_id ,te.profession,te.institution_id, 
 tqd.qualification ,tu.uni_name,
 tc.create_date ,tc.structure_level,
 tsl.title structure
from $tbl_employees e
LEFT join $tbl_employee_company tec on tec.id=company_id
LEFT join $tbl_education te on te.emp_id='$empid'
LEFT join $tbl_qualification_dic tqd on tqd.id=te.qualification_id
LEFT join $tbl_universities tu on tu.id=te.institution_id
LEFT join $tbl_employee_category tc on tc.emp_id='$empid'
LEFT join $tbl_structure_level tsl on tsl.struc_id=tc.structure_level
  where  e.id='$empid'";
	
 $result_emp = $db->query($sql_emp);
 $data = array();
if ($result_emp->num_rows > 0) 
{
 $row_emp = $result_emp->fetch_assoc();
 $data = $row_emp;
}
//echo $sql_emp;
echo json_encode($data);
?>