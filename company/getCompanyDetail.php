<?php
 include('../session.php');  
 $companyid = $_POST['companyid'];


$sql_company = "select tec.* ,concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name
from $tbl_employee_company tec inner  join  
$tbl_employees e on e.id=tec.emp_id where tec.id='$companyid'";
  $result_company = $db->query($sql_company);
 $data = array();
if ($result_company->num_rows > 0) {
			// output data of each row
 $row_users = $result_company->fetch_assoc();
 $data = $row_users;
 
}
	 
 

echo json_encode($data);
?>