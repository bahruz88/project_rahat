<?php
 include('../session.php');
$company_id=$_POST['company_id'];

$sql_salary_info = "select  tsi.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,tpe.title place_expenditure,tps.title position_status,trp.title reward_period,tc.title wage_currency,tc2.title prize_amount_currency
 from $tbl_salary_info tsi
LEFT join $tbl_employees te on te.id=tsi.emp_id
LEFT join $tbl_place_expenditure tpe on tpe.id=tsi.place_expenditure_id and tpe.lang='$site_lang'
LEFT join $tbl_position_status tps on tps.id=tsi.position_status_id and tps.lang='$site_lang'
LEFT join $tbl_reward_period trp on trp.id=tsi.reward_period and trp.lang='$site_lang'
LEFT join $tbl_currency tc on tc.id=tsi.wage_currency
LEFT join $tbl_currency tc2 on tc2.id=tsi.prize_amount_currency 
where tsi.status='1' and te.company_id='$company_id'
";

					$result_salary_info  = $db->query($sql_salary_info);
					$data = array();
					if ($result_salary_info ->num_rows > 0) {
							// output data of each row
					while($row_salary_info  = $result_salary_info ->fetch_assoc()) {
						 
						   $sub_array   = array();
						   $other_conditions='';
						   $sub_array[] = $row_salary_info['id'];
//						   $sub_array[] = $row_salary_info['emp_id'];
						   $sub_array[] = $row_salary_info['full_name'];
//						   $sub_array[] = $row_salary_info['company_id'];
						   $sub_array[] = $row_salary_info['tariff_rate'];
//						   $sub_array[] = $row_salary_info['position_status_id'];
						   $sub_array[] = $row_salary_info['position_status'];
						   $sub_array[] = $row_salary_info['wage'].' '.$row_salary_info['wage_currency'];
						   $sub_array[] = $row_salary_info['salary_change_reason'];
//						   $sub_array[] = $row_salary_info['reason_change'];
						   $sub_array[] = $row_salary_info['total_monthly_salary'];
						   $sub_array[] = $row_salary_info['prize_amount'].' '.$row_salary_info['prize_amount_currency'];
						   $sub_array[] = $row_salary_info['reward_period'];
//						   $sub_array[] = $row_salary_info['place_expenditure_id'];
						   $sub_array[] = $row_salary_info['place_expenditure'];

                        $other_conditions.=$row_salary_info['other_conditions1'];
                        if($row_salary_info['other_conditions2']!='' && $other_conditions!=''){
                            $other_conditions.=', ';
                        }
                        $other_conditions.=$row_salary_info['other_conditions2'];
                        if($row_salary_info['other_conditions3']!='' && $other_conditions!=''){
                            $other_conditions.=', ';
                        }
                        $other_conditions.=$row_salary_info['other_conditions3'];
						   $sub_array[] = $other_conditions;
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