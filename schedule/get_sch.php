<?php
 include('../session.php');  

$company_id = $_SESSION["CompanyId"];
$sql_sch = "SELECT sch.id,sch.sch_name,sch.sch_code,sch.start_date,sch.expire_date,scht.sch_type_desc,yn.chois_desc night_time ,com.company_name
FROM 
tbl_schedules  sch left  join 
tbl_sch_schtype scht on sch.sch_type=scht.sch_type_id  and  scht.lang='$site_lang' left join  
tbl_employee_company com  on sch.company_id=com.id left  join 
tbl_yesno yn  on  yn.chois_id = sch.night_time and  yn.lang='$site_lang' where sch.status=1 and sch.company_id='$company_id' ";

					$result_sch  = $db->query($sql_sch);
					$data = array();
					
					if ($result_sch ->num_rows > 0) {
							// output data of each row
					while($row_sch  = $result_sch ->fetch_assoc()) {
			
						
						   $sub_array   = array();
						   $sub_array[] = $row_sch['id'];
						   $sub_array[] = $row_sch['sch_name'];
						   $sub_array[] = $row_sch['sch_code'];
						   $sub_array[] = $row_sch['company_name'];
						   $sub_array[] = $row_sch['start_date'];
						   $sub_array[] = $row_sch['expire_date'];
						   $sub_array[] = $row_sch['sch_type_desc'];
						   /*
						   $sub_array[] = $row_sch['tm_descr'];
						   $sub_array[] = $row_sch['type_descr'];
						   $sub_array[] = $row_sch['red_working_hours'];
						   $sub_array[] = $row_sch['res_desc'];
						   $sub_array[] = $row_sch['start_time'];
						   $sub_array[] = $row_sch['end_time'];
						   $sub_array[] = $row_sch['break_start_time'];
						   $sub_array[] = $row_sch['break_end_time'];
						   $sub_array[] = $row_sch['dinner_start_time'];
						   $sub_array[] = $row_sch['dinner_end_time'];*/
						   $sub_array[] = $row_sch['night_time'];
						   $data[]     = $sub_array ;
					}
					}
					
	 $row_count=$result_sch->num_rows ;
	 $draw=10;
	 /*$_POST['draw']*/ 
	 
	 $output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);

echo json_encode($output);
?>