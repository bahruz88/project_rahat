<?php
 include('../session.php');  
 $empid = $_POST['empid'];
 $sql_emp = "select e.* , DATE_FORMAT(e.begin_date,'%d/%m/%Y') begin_date, DATE_FORMAT(e.end_date,'%d/%m/%Y') end_date, concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name 
from $tbl_salary_info e  where  emp_id='$empid'";
	
 $result_emp = $db->query($sql_emp);
 $data = array();
if ($result_emp->num_rows > 0) 
{
 $row_emp = $result_emp->fetch_assoc();
 $data = $row_emp;
}
echo json_encode($data);
?>