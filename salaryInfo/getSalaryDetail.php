<?php
 include('../session.php');
$id = $_POST['id'];
 $sql_emp = "select e.* ,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name ,tpe.title place_expenditure,tps.title position_status,trp.title reward_period,tc.title wage_currency,tc2.title prize_amount_currency
from $tbl_salary_info e
  INNER join $tbl_employees te on te.id=e.emp_id
  INNER join $tbl_place_expenditure tpe on tpe.id=e.place_expenditure_id
INNER join $tbl_position_status tps on tps.id=e.position_status_id
INNER join $tbl_reward_period trp on trp.id=e.reward_period
LEFT join $tbl_currency tc on tc.id=e.wage_currency
LEFT join $tbl_currency tc2 on tc2.id=e.prize_amount_currency 
  where  e.id='$id'";
 //, concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name
//	echo $sql_emp;
 $result_emp = $db->query($sql_emp);
 $data = array();
if ($result_emp->num_rows > 0) 
{
 $row_emp = $result_emp->fetch_assoc();
 $data = $row_emp;
}
echo json_encode($data);
?>