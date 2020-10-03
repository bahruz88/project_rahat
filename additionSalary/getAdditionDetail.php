<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;
$id = $_POST['id'];
 $sql_emp = "select e.* ,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name ,tas.title add_salary,tc.title additions_currency_text,tec.company_name
from $tbl_additions_deductions_salary e
INNER join $tbl_employees te on te.id=e.emp_id
LEFT join $tbl_additions_salary tas on tas.code=e.add_salary_id and tas.lang='$site_lang'
INNER join $tbl_employee_company tec on tec.id=e.company_id
LEFT join $tbl_currency tc on tc.id=e.additions_currency
   where  e.id='$id' and e.status='1'";
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