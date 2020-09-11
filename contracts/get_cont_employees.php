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
    $sql.= " tec.company_id='$company_id'";
}
if($_POST['code']!=''){
    $code = $_POST['code'];
    if($sql!=""){
        $sql.= " and ";
    }
    $sql.= " tec.code='$code'";
}
if($_POST['position']!=''){
    $position = $_POST['position'];
    if($sql!=""){
        $sql.= " and ";
    }
    $sql.= " tec.position_level='$position'";
  }
if($_POST['empid']!=''){
    $empid = $_POST['empid'];
    if($sql!=""){
        $sql.= " and ";
    }
    $sql.= " tec.emp_id='$empid'";

}

//$sql_employees = "select  id, concat(lastname,' ', firstname ,' ', surname) full_name ,lastname, firstname ,surname, emp_status,empno,image_name
//from $tbl_employees  where emp_status=1 and company_id='$company_id'";


$sql_employees = "select tec.*,te.lastname, te.firstname , te.surname,te.id emp_id ,tpl.posit_id posit_id,tpl.title posit,tpl.posit_icon
from $tbl_employee_category tec
LEFT join $tbl_employees te on te.id=tec.emp_id
LEFT join $tbl_employee_company teco on tec.company_id=teco.id
 LEFT join $tbl_position_level tpl on tpl.posit_id=tec.position_level and tpl.lang='$site_lang'
  where ".$sql." and tec.emp_id!=0";

//$sql_employees = "select tec.* ".$sql0." from $tbl_employee_category tec ".$sql1."
// LEFT join $tbl_employees te on te.id=tec.emp_id
// LEFT join $tbl_position_level tpl on tpl.posit_id=tec.position_level
//where ".$sql;
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