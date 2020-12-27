<?php
 include('../session.php');
$company_id=$_POST['company_id'];

$sql_skill = " 
SELECT  tes.id,tes.skill_name,tes.skill_descr,te.lastname,te.firstname,te.surname 
FROM $tbl_employee_skills tes  inner  join  $tbl_employees te  on tes.emp_id=te.id  
 where tes.skill_status =1 and  te.emp_status=1 and te.company_id='$company_id'";

					
					$result_skill  = $db->query($sql_skill );
					$data = array();
					if ($result_skill ->num_rows > 0) {
							// output data of each row
					while($row_skill  = $result_skill ->fetch_assoc()) {

						   $sub_array   = array();
						   $sub_array[] = $row_skill['id'];
						   $sub_array[] = $row_skill['lastname'].' ' .$row_skill['firstname'].' ' .$row_skill['surname'];
						   $sub_array[] = $row_skill['skill_name'];
						   $sub_array[] = $row_skill['skill_descr'];
								$data[] = $sub_array;
					}
					}
 
					
	 $row_count=$result_skill->num_rows ;
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