<?php
 include('../session.php');  

$company_id = $_SESSION["CompanyId"];
$sql_sch = "SELECT esch.id,concat(emp.lastname,' ', emp.firstname ,' ', emp.surname) full_name,
sch.sch_name,sch.sch_code, rf.type_descr,esch.reduce_hours,schr.res_desc 
FROM 
$tbl_employee_schedules esch inner join 
$tbl_schedules sch on esch.sch_id=sch.id left join 
$tbl_employees emp on esch.emp_id=emp.id left join 
$tbl_sch_time_managment_type tmt on esch.tm_type=tmt.tm_id and tmt.lang='$site_lang' left join 
$tbl_sch_reduce_reason schr on esch.reduce_reason=schr.reason_id and schr.lang='$site_lang' left join 
$tbl_sch_reduce_from rf on esch.reduce_type=rf.type_id and rf.lang='$site_lang' where esch.status=1 and sch.status=1 and  sch.company_id='$company_id' ";

					$result_sch  = $db->query($sql_sch);
					$data = array();
					
					if ($result_sch ->num_rows > 0) {
							// output data of each row
					while($row_sch  = $result_sch ->fetch_assoc()) {
			
						
						   $sub_array   = array();
						   $sub_array[] = $row_sch['id'];
						   $sub_array[] = $row_sch['sch_name'];
						   $sub_array[] = $row_sch['sch_code'];
						   $sub_array[] = $row_sch['full_name'];
						   $sub_array[] = $row_sch['type_descr'];
						   $sub_array[] = $row_sch['reduce_hours'];
						   $sub_array[] = $row_sch['res_desc'];
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