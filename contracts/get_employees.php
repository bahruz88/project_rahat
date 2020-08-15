<?php
 include('../session.php');
$company_id = $_POST['company_id'];

$sql_employees = "select  id, concat(lastname,' ', firstname ,' ', surname) full_name ,lastname, firstname ,surname, emp_status,empno,image_name
from $tbl_employees  where emp_status=1 and company_id='$company_id'";



					$result_employees  = $db->query($sql_employees);
					$data = array();
					if ($result_employees ->num_rows > 0) {
					while($row_employees  = $result_employees ->fetch_assoc()) {

						   $sub_array   = array();
						   $sub_array[] = $row_employees['id'];
						   $sub_array[] = $row_employees['lastname'];
						   $sub_array[] = $row_employees['firstname'];
						   $sub_array[] = $row_employees['surname'];
						   $sub_array[] = $row_employees['full_name'];
						   $sub_array[] = $row_employees['empno'];
						   $data[]     = $sub_array;
					}
					}
					
	 $row_count=$result_employees->num_rows ;
	 $draw=10;
	 /*$_POST['draw']*/ 
	 
//	 $output = array(
////    'draw' => intval($draw),
////    'recordsTotal' =>$row_count,
////    'recordsFiltered' => $row_count,
//    'data' => $data
//);

echo json_encode($data);
?>