<?php
 include('../session.php');  
 $empid = $_POST['empid'];
 $sql_emp = "select e.* ,e.company_id company_id,
 DATE_FORMAT(e.birth_date,'%d/%m/%Y') birth_date_u, DATE_FORMAT(e.passport_date,'%d/%m/%Y') passport_date_u,DATE_FORMAT(e.passport_end_date,'%d/%m/%Y') passport_end_date_u, concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name,
 tec.company_name,tec.voen,tec.sun,tec.enterprise_head_position,tec.enterprise_head_fullname,
 te.qualification_id ,te.profession,te.institution_id, 
 tqd.qualification ,tu.uni_name,
 tc.create_date ,tc.structure_level,
 tsl.title structure,
 tmi.military_reg_group ,tmi.military_reg_category ,tmi.military_staff ,tmi.military_rank,tmi.military_specialty_acc,tmi.military_fitness_service,tmi.military_registration_service,tmi.military_registration_date,tmi.military_general,tmi.military_special,tmi.military_no_official,tmi.military_additional_information,tmi.military_date_completion,
 tmr.rank_desc ,tms.staff_desc
from $tbl_employees e
LEFT join $tbl_employee_company tec on tec.id=company_id
LEFT join $tbl_education te on te.emp_id='$empid'
LEFT join $tbl_qualification_dic tqd on tqd.id=te.qualification_id
LEFT join $tbl_universities tu on tu.id=te.institution_id
LEFT join $tbl_employee_category tc on tc.emp_id='$empid'
LEFT join $tbl_structure_level tsl on tsl.struc_id=tc.structure_level
LEFT join $tbl_military_information tmi on tmi.emp_id='$empid'
LEFT join $tbl_military_staff tms on tms.staff_id=tmi.military_staff
LEFT join $tbl_military_rank tmr on tmr.rank_id=tmi.military_rank
  where  e.id='$empid'";

$data = array();
 /***/

$id='';
$parent='';
$i=5;
$result = $db->query($sql_emp);
if($result){
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id=$row["id"];
//            $parent=$row["parent"];
        }
    }
}

    $sql_parent="select * from $tbl_employee_category WHERE emp_id = '$id'";

//   echo $sql_parents;
    $result_parent = $db->query($sql_parent);
    if($result_parent){
        if ($result_parent->num_rows > 0) {
            while($row_parent = $result_parent->fetch_assoc()) {
                $parent =$row_parent["parent"];
//            $parent =$row_parents["structure_level"];
                while($parent!=''){
                    $sql_parents="select tec.*, tsl.title structure from $tbl_employee_category  tec
                    LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
                     WHERE tec.id = '$parent'";
//                    echo $sql_parents;
                    $result_parents = $db->query($sql_parents);
                    if($result_parents){
                        if ($result_parents->num_rows > 0) {
                            while($row_parents = $result_parents->fetch_assoc()) {

                                    $parent = $row_parents["parent"];
                                 if($row_parents["structure_level"]!=1){
                                    $data['structure_level'.$i]  = $row_parents["structure"];
                                    $data['category'.$i]  = $row_parents["category"];

                                }$i--;

//                                $data[] =$row_parents["structure_level"];
                            }
                        }

                    }
                }



            }

    }
}

/**/
	
 $result_emp = $db->query($sql_emp);

if ($result_emp->num_rows > 0) 
{
 $row_emp = $result_emp->fetch_assoc();
    $data[]  = $row_emp;
}
//echo $sql_emp;
echo json_encode($data);
?>