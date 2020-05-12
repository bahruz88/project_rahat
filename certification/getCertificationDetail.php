<?php
 include('../session.php');  
 $certid = $_POST['certid'];
 $sql_certification = " SELECT emp.id empid,cert.id,cert.training_center_name,cert.training_name,
 DATE_FORMAT(cert.training_date,'%d/%m/%Y') training_date, DATE_FORMAT( cert.cert_given_date,'%d/%m/%Y') cert_given_date ,concat(emp.lastname,' ', emp.firstname ,' ', emp.surname) full_name 
 FROM tbl_employee_certification cert inner join tbl_employees emp on cert.emp_id=emp.id where cert_status=1  and   cert.id='$certid'";
	
 $result_certification = $db->query($sql_certification);
 $data = array();
if ($result_certification->num_rows > 0) {
			// output data of each row
 $row_certification = $result_certification->fetch_assoc();
 $data = $row_certification;
 
}
	 
 

echo json_encode($data);
?>