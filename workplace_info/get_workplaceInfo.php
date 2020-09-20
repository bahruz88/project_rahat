<?php
include('../session.php');
$site_lang=$_SESSION['dil'] ;
$par='';

    $sql_parent="select tec.*, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name, tc.enterprise_head_fullname,tws.title work_status
from  $tbl_employee_category tec
INNER join $tbl_employees te on tec.emp_id=te.id
INNER join $tbl_employee_company tc on tec.company_id=tc.id
INNER join $tbl_work_status tws on tws.level_id=tec.work_status and tws.lang='$site_lang'
 WHERE tec.emp_id != 0";
$data2 = array();
//   echo $sql_parents;
    $result_parent = $db->query($sql_parent);
    if($result_parent){
        if ($result_parent->num_rows > 0) {
            while($row_parent = $result_parent->fetch_assoc()) {
                $parent =$row_parent["parent"];
                $i=1;
                $k=5;
                $par=$parent;
                $sub_array   = array();
                $sub_array[] = $row_parent['id'];
                $sub_array[] = $row_parent['full_name'];
                 for($j=2;$j<=5;$j++){
                    $sub_array[] = '';
                }
                while($parent!='' && $parent!=null){
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
//                                    $sub_array['structure_level'.$i] = $data['structure_level'.$i];
                                    $sub_array[$k] = $row_parents["category"];
                                    if($row_parents["parent"]!="" && $row_parents["parent"]!=null){
                                        $par = $row_parents["parent"];
                                    }

                                }
                                $i++;
                                $k--;
//                                $data[] =$row_parents["structure_level"];
                            }
                        }

                    }
                }
                $sub_array[] = $row_parent['category'];
                $sub_array[] = $row_parent['work_status'];
                $sub_array[] = $row_parent['enterprise_head_fullname'];
                $sub_array[] = '';
                $sub_array[] = $par;
                $data2[]     = $sub_array;
            }
        }
    }

$row_count=$result_parent->num_rows ;

$draw=10;

$output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data2
);
//print_r($output);
echo  json_encode($output);
?>

