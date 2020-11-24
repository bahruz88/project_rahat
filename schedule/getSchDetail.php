<?php
 include('../session.php');  
 
 $schid = $_POST['schid'];
 
$sql_sch = "SELECT 
sch.id,
sch.sch_name,
sch.sch_code,
DATE_FORMAT(sch.start_date,'%d/%m/%Y') start_date,
DATE_FORMAT(sch.expire_date,'%d/%m/%Y') expire_date,
scht.sch_type_id,
yn.chois_id night_time ,
com.id as  compid
FROM 
tbl_schedules  sch left  join 
tbl_sch_schtype scht on sch.sch_type=scht.sch_type_id  and  scht.lang='$site_lang' left join  
tbl_employee_company com  on sch.company_id=com.id left  join 
tbl_yesno yn  on  yn.chois_id = sch.night_time and  yn.lang='$site_lang' where sch.status=1 and   sch.id='$schid'";
  $result_sch= $db->query($sql_sch);
 $data = array();
if ($result_sch->num_rows > 0) 
{
 $row_sch = $result_sch->fetch_assoc();
 $data = $row_sch;
}
echo json_encode($data);
?>