<?php
 include('../session.php');
$medicalid = $_POST['medicalid'];

//$sql_lang = "SELECT  tmi.id,tmi.emp_id,tmi.status,tmi.military_reg_group, tmi.military_reg_category,tmi.military_staff,tmi.military_rank, tmi.military_specialty_acc,tmi.military_fitness_service,tmi.military_registration_service, DATE_FORMAT(tmi.military_registration_date,'%d/%m/%Y') military_registr_date, tmi.military_general,tmi.military_special,tmi.military_no_official, tmi.military_additional_information,DATE_FORMAT(tmi.military_date_completion,'%d/%m/%Y') military_date_comp, tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tms.staff_id tmsId,tms.staff_desc tmsStaffDesc,tmr.rank_id tmrId,tmr.rank_desc tmrRankDesc,te.id teId, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.emp_status,tms.staff_desc
//FROM $tbl_military_information tmi
//inner join  $tbl_employees te on tmi.emp_id=te.id
//INNER join $tbl_military_rank  tmr on tmi.military_rank=tmr.rank_id and  tmr.lang='az'
//INNER join $tbl_military_staff  tms on tmi.military_staff=tms.staff_id and  tms.lang='az'
//where tmi.status=1 and te.emp_status=1 and  tmi.id='$medicalid' ";

$sql_medical = "SELECT tmi.id,tmi.emp_id,tmi.medical_app,tmi.renew_interval,
 DATE_FORMAT(tmi.last_renew_date,'%d/%m/%Y') last_renew_date,tmi.physical_deficiency,tmi.deficiency_desc,
 tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tmi.status,
 te.emp_status, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id  teId,
  tEN.exist_id, tEN.exist_desc,tEN.lang,
  tYN.chois_id, tYN.chois_desc,tYN.lang
FROM tbl_employee_medical_information tmi
INNER join tbl_exist_not_exist tEN on tmi.medical_app=tEN.exist_id and tEN.lang='az'
INNER join tbl_yesno tYN on tmi.physical_deficiency=tYN.chois_id and tYN.lang='az'
INNER join tbl_employees te on tmi.emp_id=te.id where tmi.status=1 and te.emp_status=1 and tmi.id='$medicalid'";


$result_lang = $db->query($sql_medical);
$data = array();

if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>