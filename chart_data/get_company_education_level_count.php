<?php
 include('../session.php');

$company_id = $_SESSION["CompanyId"];

$sql_employees_count= "SELECT count(*) say ,qd.qualification title  FROM tbl_employee_education ee inner  join  tbl_qualification_dic  qd on ee.qualification_id=qd.id
inner join  tbl_employees  te  on  ee.emp_id=te.id  
where  te.company_id='$company_id' and emp_status=1 and edu_status=1
group  by  qd.qualification   ";
 
					$result_employees  = $db->query($sql_employees_count);
		     
					if ($result_employees ->num_rows > 0) {
							// output data of each row
						while($row_employees  = $result_employees ->fetch_assoc()) {
								
								
								$result_array[] = ['name'=>$row_employees['title'], 'mark'=>$row_employees['say']  , 'reng'=>  '#' . substr(str_shuffle('ABEF0123456789'), 0, 6) ];
	                           
						}
					}
 

echo json_encode($result_array);
?>