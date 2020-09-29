<?php
 include('../session.php');  
 $companyid = $_POST['companyid'];
$site_lang=$_SESSION['dil'] ;

//$sql_company = "select tec.* ,concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name
//from $tbl_employee_company tec inner  join
//$tbl_employees e on e.id=tec.emp_id where tec.id='$companyid'";

$sql_company = "select tec.*, ten.exist_id service,ten.exist_desc serviceText
from $tbl_employee_company tec
  LEFT JOIN $tbl_exist_not_exist ten on ten.id=tec.service and ten.lang='$site_lang'
  where tec.id='$companyid'";
//echo $sql_company;
  $result_company = $db->query($sql_company);
 $data = array();
if ($result_company->num_rows > 0) {
			// output data of each row
 $row_users = $result_company->fetch_assoc();
 $data = $row_users;
 
}
	 
 

echo json_encode($data);
?>