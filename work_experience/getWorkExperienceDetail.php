<?php
 include('../session.php');
$workExperienceid = $_POST['workExperienceid'];


$sql_medical = "SELECT twe.*, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name
  FROM $tbl_work_experience twe
 LEFT join $tbl_employees te on twe.emp_id=te.id where twe.status=1 and te.emp_status=1 and twe.id='$workExperienceid'";


$result_lang = $db->query($sql_medical);
$data = array();

if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>