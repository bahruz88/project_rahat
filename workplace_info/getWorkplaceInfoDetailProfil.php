<?php
include('../session.php');
$emp_id = $_POST['emp_id'];


$sql_parent = "select tec.*, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name, tc.enterprise_head_fullname,tws.title work_status,tws.level_id work_status_id
from  $tbl_employee_category tec
INNER join $tbl_employees te on tec.emp_id=te.id
INNER join $tbl_employee_company tc on tec.company_id=tc.id
INNER join $tbl_work_status tws on tws.level_id=tec.work_status and tws.lang='$site_lang'
 WHERE tec.emp_id != 0 and tec.emp_id='$emp_id'";
$data = array();
$data3 = array();
for ($f = 1; $f <= 5; $f++) {
    $data['category' . $f] = '';
    $data['id' . $f] = '';
}
$data2 = array();
//   echo $sql_parents;
$result_parent = $db->query($sql_parent);
if ($result_parent) {
    if ($result_parent->num_rows > 0) {
        while ($row_parent = $result_parent->fetch_assoc()) {
            $parent = $row_parent["parent"];
            $i = 1;
            $p = 1;
            $k = 5;
            $par = $parent;
            $sub_array = array();
            $st_array = array();
            $sub_array['id'] = $row_parent['id'];
            $sub_array['emp'] = $row_parent['full_name'];
            $sub_array['emp_id'] = $row_parent['emp_id'];


            while ($parent != '' && $parent != null) {
                $sql_parents = "select tec.*, tsl.title structure from $tbl_employee_category  tec
                    LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
                     WHERE tec.id = '$parent'";
//                  echo $sql_parents;
                $result_parents = $db->query($sql_parents);
                if ($result_parents) {
                    if ($result_parents->num_rows > 0) {
//                        $data=array();
                        while ($row_parents = $result_parents->fetch_assoc()) {
                            $parent = $row_parents["parent"];
                            if ($row_parents["structure_level"] != 1) {
//                                $data['structure_level'.$i]  = $row_parents["structure"];
                                if ($row_parents["structure_level"] == 2) {
                                    $data['category2'] = $row_parents["category"];
                                    $data['id2'] = $row_parents["id"];
                                }
                                if ($row_parents["structure_level"] == 3) {
                                    $data['category3'] = $row_parents["category"];
                                    $data['id3'] = $row_parents["id"];
                                }
                                if ($row_parents["structure_level"] == 4) {
                                    $data['category4'] = $row_parents["category"];
                                    $data['id4'] = $row_parents["id"];
                                }
                                if ($row_parents["structure_level"] == 5) {
                                    $data['category5'] = $row_parents["category"];
                                    $data['id5'] = $row_parents["id"];
                                }
                                if ($row_parents["parent"] != "" && $row_parents["parent"] != null) {
                                    $par = $row_parents["parent"];
                                }
                            }
                            $sub_array['structure_level'] = $data;
                            $i++;
                        }
                    }
                }
                $sql_posparents = "select tec.*, tsl.title posit from $tbl_employee_category  tec
                    LEFT join $tbl_position_level tsl on tsl.posit_id=tec.position_level
                     WHERE tec.parent = '$parent'";
//                  echo $sql_parents;
                $result_posparents = $db->query($sql_posparents);
                if ($result_posparents) {
                    if ($result_posparents->num_rows > 0) {
//                        $data=array();
                        while ($row_posparents = $result_posparents->fetch_assoc()) {
                            $parent = $row_posparents["parent"];
                            if ($row_posparents["position_level"] == 2) {
                                $data3['position'.$p] = $row_posparents["category"];
                                $data3['position_id'.$p] = $row_posparents["id"];
                                $p++;
                            }
                            $sub_array['position_level'] = $data3;

                        }
                    }

                }
            }
            $sub_array['category'] = $row_parent['category'];
            $sub_array['work_status'] = $row_parent['work_status'];
            $sub_array['work_status_id'] = $row_parent['work_status_id'];
            $sub_array['company_id'] = $row_parent['company_id'];
            $sub_array['posit_level'] = $row_parent['position_level'];
            $sub_array['second_leader'] = '';
            $sub_array['parent'] = $par;
//            $data2[]     = $sub_array;
        }
    }
}


//$sql_positions="select id,structure_level, category,code,create_date,end_date, parent,icon,emp_id
// from (select * from $tbl_employee_category  order by parent, id) folders_sorted,
//  (select @pv := $par) initialisation where find_in_set(parent, @pv) > 0 and @pv := concat(@pv, ',', id)";

$sql_positions = "select id,structure_level,position_level, category,code,create_date,end_date, parent,icon,emp_id from
(select * from tbl_category order by parent, id) folders_sorted, (select @pv := $par) initialisation
 where find_in_set(parent, @pv) > 0 and @pv := concat(@pv, ',', id)";

// echo $sql_positions;
$result_position = $db->query($sql_positions);
if ($result_position) {
    if ($result_position->num_rows > 0) {
        while ($row_users = $result_position->fetch_assoc()) {
            $st_array[] = $row_users;
        }
    }
}
$sub_array["structures"] = $st_array;
//print_r($output);
echo json_encode($sub_array);
?>