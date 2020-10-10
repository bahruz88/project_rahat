<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;
$company_id = '';
$code = '';
$position = '';
$empid = '';
$sql= "";
if($_POST['company_id']!=''){
    $company_id = $_POST['company_id'];
    $sql.= " te.company_id='$company_id'";
}



$sql_employees = "select te.*,tec.*,te.lastname, te.firstname , te.surname,te.id emp_id ,tpl.posit_id posit_id,tpl.title posit,tpl.posit_icon
from $tbl_employees te
LEFT join $tbl_employee_category tec on te.id=tec.emp_id
LEFT join $tbl_employee_company teco on tec.company_id=teco.id
 LEFT join $tbl_position_level tpl on tpl.posit_id=tec.position_level and tpl.lang='$site_lang'
  where ".$sql." and te.emp_status=1";

//$sql_employees = "select te.*,te.id emp_id
//from $tbl_employees te
//  where ".$sql." and te.emp_status=1";

//echo $sql_employees;


					$result_employees  = $db->query($sql_employees);
					$data = array();
                if($result_employees){
					if ($result_employees ->num_rows > 0) {

					while($row_employees  = $result_employees ->fetch_assoc()) {
                        $data[]  = $row_employees;
					}
				}
			}



echo json_encode($data);
?>