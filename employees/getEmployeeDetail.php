<?php
 include('../session.php');  
 $empid = $_POST['empid'];
 $sql_emp = "select e.* , DATE_FORMAT(e.birth_date,'%d/%m/%Y') birth_date_u, DATE_FORMAT(e.passport_date,'%d/%m/%Y') passport_date_u,DATE_FORMAT(e.passport_end_date,'%d/%m/%Y') passport_end_date_u from $tbl_employees e  where  id='$empid'";
	
 $result_emp = $db->query($sql_emp);
 $data = array();
if ($result_emp->num_rows > 0) 
{
 $row_emp = $result_emp->fetch_assoc();
 $data = $row_emp;
}
echo json_encode($data);
?>