<?php
 include('../session.php');


$sql_employees_count= "select count(*) say ,sex.descr from $tbl_employees emp inner join 
$tbl_sex sex on emp.sex=sex.id GROUP by sex.descr ,sex.id";
 
					$result_employees  = $db->query($sql_employees_count);
		     
					if ($result_employees ->num_rows > 0) {
							// output data of each row
						while($row_employees  = $result_employees ->fetch_assoc()) {
								
								
								$result_array[] = ['name'=>$row_employees['descr'], 'mark'=>$row_employees['say']];
	                           
						}
					}
 

echo json_encode($result_array);
?>