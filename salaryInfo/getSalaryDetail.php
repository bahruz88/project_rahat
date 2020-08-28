<?php
 include('../session.php');
$id = $_POST['id'];
 $sql_emp = "select e.*  
from $tbl_salary_info e  where  id='$id'";
 //, concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name
//	echo $sql_emp;
 $result_emp = $db->query($sql_emp);
 $data = array();
if ($result_emp->num_rows > 0) 
{
 $row_emp = $result_emp->fetch_assoc();
 $data = $row_emp;
}
echo json_encode($data);
?>