<?php
 include('../session.php');
$drivinglicenseid = $_POST['drivinglicenseid'];

//$sql_lang = "SELECT  tmi.id,tmi.emp_id,tmi.status,tmi.military_reg_group, tmi.military_reg_category,tmi.military_staff,tmi.military_rank, tmi.military_specialty_acc,tmi.military_fitness_service,tmi.military_registration_service, DATE_FORMAT(tmi.military_registration_date,'%d/%m/%Y') military_registr_date, tmi.military_general,tmi.military_special,tmi.military_no_official, tmi.military_additional_information,DATE_FORMAT(tmi.military_date_completion,'%d/%m/%Y') military_date_comp, tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tms.staff_id tmsId,tms.staff_desc tmsStaffDesc,tmr.rank_id tmrId,tmr.rank_desc tmrRankDesc,te.id teId, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.emp_status,tms.staff_desc
//FROM $tbl_military_information tmi
//inner join  $tbl_employees te on tmi.emp_id=te.id
//INNER join $tbl_military_rank  tmr on tmi.military_rank=tmr.rank_id and  tmr.lang='az'
//INNER join $tbl_military_staff  tms on tmi.military_staff=tms.staff_id and  tms.lang='az'
//where tmi.status=1 and te.emp_status=1 and  tmi.id='$drivinglicenseid' ";
$sql_driving = "SELECT tedl.id,tedl.emp_id,tedl.lic_seria_number,tedl.category, tedl.lic_issuer, DATE_FORMAT(tedl.lic_issue_date,'%d/%m/%Y') lic_issue_date,DATE_FORMAT(tedl.expire_date,'%d/%m/%Y') expire_date, tedl.insert_user,tedl.update_user,DATE_FORMAT(tedl.insert_date,'%d/%m/%Y') insert_date,
  concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.emp_status,
 tdlc.cat_id tcatId,tdlc.cat_desc,tdlc.lang
 FROM tbl_employye_driver_license tedl
 INNER join tbl_driver_lic_cat tdlc on tdlc.cat_id=tedl.category and tdlc.lang='az'
  INNER join tbl_employees te on te.id=tedl.emp_id where tedl.status=1 and te.emp_status=1 and tedl.id='$drivinglicenseid'";



$result_lang = $db->query($sql_driving);
$data = array();

if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>