<?php
 include('../session.php');
$company_id=$_POST['company_id'];

$sql_certification = " SELECT emp.firstname,emp.lastname,emp.surname,emp.id empid ,cert.* FROM  $tbl_employees emp  inner join  $tbl_certification cert  on emp.id=cert.emp_id
 where cert.cert_status =1 and  emp.emp_status=1 and emp.company_id='$company_id'";

					
					$result_certification  = $db->query($sql_certification );
					$data = array();
					if ($result_certification ->num_rows > 0) {
							// output data of each row
					while($row_certification  = $result_certification ->fetch_assoc()) {

						   $sub_array   = array();
						   $sub_array[] = $row_certification['id'];
						   $sub_array[] = $row_certification['lastname'].' ' .$row_certification['firstname'].' ' .$row_certification['surname'];
						   $sub_array[] = $row_certification['training_center_name'];
						   $sub_array[] = $row_certification['training_name'];
						   $sub_array[] = $row_certification['training_date'];
						   $sub_array[] = $row_certification['cert_given_date'];
								$data[] = $sub_array;
					}
					}
 
					
	 $row_count=$result_certification->num_rows ;
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