<?php
 include('../session.php');  

$sql_salary_info = "select  tsi.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,tpe.title place_expenditure,tps.title position_status from $tbl_salary_info tsi
INNER join $tbl_employees te on te.id=tsi.emp_id
INNER join $tbl_place_expenditure tpe on tpe.id=tsi.place_expenditure_id
INNER join $tbl_position_status tps on tps.id=tsi.position_status_id
";

					$result_salary_info  = $db->query($sql_salary_info);
					$data = array();
					if ($result_salary_info ->num_rows > 0) {
							// output data of each row
					while($row_salary_info  = $result_salary_info ->fetch_assoc()) {
						 
						   $sub_array   = array();
						   $sub_array[] = $row_salary_info['id'];
//						   $sub_array[] = $row_salary_info['emp_id'];
						   $sub_array[] = $row_salary_info['full_name'];
//						   $sub_array[] = $row_salary_info['company_id'];
						   $sub_array[] = $row_salary_info['tariff_rate'];
//						   $sub_array[] = $row_salary_info['position_status_id'];
						   $sub_array[] = $row_salary_info['position_status'];
						   $sub_array[] = $row_salary_info['wage'];
						   $sub_array[] = $row_salary_info['salary_change_reason'];
//						   $sub_array[] = $row_salary_info['reason_change'];
						   $sub_array[] = $row_salary_info['total_monthly_salary'];
						   $sub_array[] = $row_salary_info['prize_amount'];
						   $sub_array[] = $row_salary_info['reward_period'];
//						   $sub_array[] = $row_salary_info['place_expenditure_id'];
						   $sub_array[] = $row_salary_info['place_expenditure'];

						   $sub_array[] = $row_salary_info['other_conditions'];
//						   $sub_array[] = $row_salary_info['full_name'];
//						   $sub_array[] = $row_salary_info['place_expenditure'];
//						   $sub_array[] = $row_salary_info['position_status'];
						   $data[]     = $sub_array;
					    }
					}
					
	 $row_count=$result_salary_info->num_rows ;
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