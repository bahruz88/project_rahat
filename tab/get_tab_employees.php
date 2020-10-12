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

//$users= "select tec.*
//from $tbl_employee_category tec
//where tec.company_id='$company_id'";

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
$sql_parents="select tec.* from $tbl_employee_category  tec
                     WHERE tec.company_id='$company_id'";
//                    echo $sql_parents;
$result_parents = $db->query($sql_parents);
if($result_parents){
    if ($result_parents->num_rows > 0) {
        while($row_parents = $result_parents->fetch_assoc()) {
            $parent = $row_parents["parent"];
            if($row_parents["structure_level"]!=1){
                if($row_parents["structure_level"]==2) {

                    $par = $row_parents["id"];

                    $sql_head="select tec.*, tsl.title structure,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name from $tbl_employee_category  tec
                    LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
                    LEFT join $tbl_employees te on te.id=tec.emp_id
                     WHERE tec.parent='$par'";
//                    echo $sql_parents;
                    $result_head = $db->query($sql_head);
                    if($result_head){
                        if ($result_head->num_rows > 0) {
                            while ($row_head = $result_head->fetch_assoc()) {
                                if($row_head["position_level"]==2) {
                                    $data['head_name']  = $row_head['full_name'];
                                }
                            }
                        }
                    }
                }


            }
//            $i++;
//            $k--;
//                                $data[] =$row_parents["structure_level"];
        }
    }

}


echo json_encode($data);
?>