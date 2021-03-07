<?php
 include('../session.php');

$company_id = $_SESSION["CompanyId"];

$sql_employees_count= " SELECT count(*) say,tsl.title FROM tbl_category tc  inner join  tbl_structure_level tsl  on tc.structure_level=tsl.id where tsl.lang='az' and  tc.company_id='$company_id' group  by  tsl.title    ";
 
					$result_employees  = $db->query($sql_employees_count);
		     
					if ($result_employees ->num_rows > 0) {
							// output data of each row
						while($row_employees  = $result_employees ->fetch_assoc()) {
								
								
								$result_array[] = ['name'=>$row_employees['title'], 'mark'=>$row_employees['say']  , 'reng'=>  '#' . substr(str_shuffle('ABEF0123456789'), 0, 6) ];
	                           
						}
					}
 

echo json_encode($result_array);
?>