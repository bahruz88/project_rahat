<?php
 include('../session.php');
$migrationid = $_POST['migrationid'];

$sql_migr = "SELECT tmi.id,tmi.emp_id,tmi.trp_seria_number,tmi.trp_permit_reason,
 DATE_FORMAT(tmi.trp_permit_date,'%d/%m/%Y') trp_permit_date,DATE_FORMAT(tmi.trp_valid_date,'%d/%m/%Y') trp_valid_date,
 tmi.trp_issuer,tmi.prp_seria_number,DATE_FORMAT(tmi.prp_permit_date,'%d/%m/%Y') prp_permit_date,DATE_FORMAT(tmi.prp_valid_date,'%d/%m/%Y') prp_valid_date,
 tmi.prp_issuer,tmi.wp_seria_number,DATE_FORMAT(tmi.wp_permit_date,'%d/%m/%Y') wp_permit_date,DATE_FORMAT(tmi.wp_valid_date,'%d/%m/%Y') wp_valid_date,
 tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tmi.status,
 te.emp_status,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id teId
FROM tbl_migration_info tmi
INNER join tbl_employees te on tmi.emp_id=te.id where tmi.status=1 and te.emp_status=1 and tmi.id='$migrationid'";


$result_lang = $db->query($sql_migr);
$data = array();

if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>