<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;

$sql_salary_info = "select  tads.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,tas.title add_salary,tc.title additions_currency,tec.company_name
 from $tbl_additions_deductions_salary tads
INNER join $tbl_employees te on te.id=tads.emp_id
INNER join $tbl_employee_company tec on tec.id=tads.company_id
LEFT join $tbl_additions_salary tas on tas.code=tads.add_salary_id and tas.lang='$site_lang'
LEFT join $tbl_currency tc on tc.id=tads.additions_currency 
where tads.status='1'
";
//echo $sql_salary_info;

					$result_salary_info  = $db->query($sql_salary_info);
					$data = array();
					if ($result_salary_info ->num_rows > 0) {
							// output data of each row
					while($row_salary_info  = $result_salary_info ->fetch_assoc()) {
						 
						   $sub_array   = array();
						   $sub_array[] = $row_salary_info['id'];
//						   $sub_array[] = $row_salary_info['emp_id'];
                           $sub_array[] = $row_salary_info['company_name'];
						   $sub_array[] = $row_salary_info['full_name'];
//						   $sub_array[] = $row_salary_info['company_id'];
						   $sub_array[] = $row_salary_info['add_salary'];
  						   $sub_array[] = $row_salary_info['salary'].' '.$row_salary_info['additions_currency'];
						   $sub_array[] = $row_salary_info['begin_date'];
 						   $sub_array[] = $row_salary_info['end_date'];
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