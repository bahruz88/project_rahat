<?php
 include('../session.php');

$company_id = $_SESSION["CompanyId"];

$sql_employees_count= "select count(*) say ,ms.descr from tbl_employees emp inner join tbl_marital_status ms on emp.marital_status=ms.id where emp.company_id='$company_id' GROUP by ms.descr ,ms.id   ";
 
					$result_employees  = $db->query($sql_employees_count);
		     
					if ($result_employees ->num_rows > 0) {
							// output data of each row
						while($row_employees  = $result_employees ->fetch_assoc()) {
								
								
								$result_array[] = ['name'=>$row_employees['descr'], 'mark'=>$row_employees['say']];
	                           
						}
					}
 

echo json_encode($result_array);
?>