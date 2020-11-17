<?php
 include('../session.php');  

$sql_ovr = "
SELECT eo.id,com.company_name, DATE_FORMAT(eo.start_date,'%d/%m/%Y') start_date,
DATE_FORMAT(eo.expire_date,'%d/%m/%Y') expire_date, concat(emp.lastname,' ', emp.firstname ,' ', emp.surname) full_name ,
yn.chois_desc,p.period_desc,ocs.status_desc
FROM $tbl_employee_overtimes eo inner join   
$tbl_employees emp on eo.emp_id=emp.id inner join 
$tbl_overtime_calc_status ocs  on eo.calc_status=ocs.status_id and  ocs.lang='$site_lang' inner join 
$tbl_yesno  yn  on eo.overtime_status=yn.chois_id and  yn.lang='$site_lang'  inner join
$tbl_periods p  on  eo.overtime_period=p.period_id and  p.lang='$site_lang' inner  join  
$tbl_employee_company com  on emp.company_id=com.id 
 where eo.status=1 ";

					$result_ovr  = $db->query($sql_ovr);
					$data = array();
					
					if ($result_ovr ->num_rows > 0) {
							// output data of each row
					while($row_ovr  = $result_ovr ->fetch_assoc()) {
			
						
						   $sub_array   = array();
						   $sub_array[] = $row_ovr['id'];
						   $sub_array[] = $row_ovr['company_name'];
						   $sub_array[] = $row_ovr['full_name'];
						   $sub_array[] = $row_ovr['start_date'];
						   $sub_array[] = $row_ovr['expire_date'];
						   $sub_array[] = $row_ovr['chois_desc'];
						   $sub_array[] = $row_ovr['period_desc'];
						   $sub_array[] = $row_ovr['status_desc'];
						   $data[]     = $sub_array ;
					}
					}
					
	 $row_count=$result_ovr->num_rows ;
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