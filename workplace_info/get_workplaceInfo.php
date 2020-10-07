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
$data3 = array();
//   echo $sql_parents;
    $result_parent = $db->query($sql_parent);
    if($result_parent){
        if ($result_parent->num_rows > 0) {
            while($row_parent = $result_parent->fetch_assoc()) {
                $parent =$row_parent["parent"];
                $i=1;
                $k=5;
                $p = 1;
                $par=$parent;
                $sub_array   = array();
                $sub_array[] = $row_parent['id'];
                $sub_array[] = $row_parent['full_name'];
                 for($j=2;$j<=5;$j++){
                    $sub_array[] = '';
                }
                $sub_array[6] = $row_parent['category'];
                $sub_array[7] = $row_parent['work_status'];
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
                                    if($row_parents["structure_level"]==2) {
                                        $data['category2'] = $row_parents["category"];
                                        $data['id2'] = $row_parents["id"];
                                        $sub_array[2] = $row_parents["category"];

                                    }
                                    if($row_parents["structure_level"]==3) {
                                        $data['category3'] = $row_parents["category"];
                                        $data['id3'] = $row_parents["id"];
                                        $sub_array[3] = $row_parents["category"];
                                    }
                                    if($row_parents["structure_level"]==4) {
                                        $data['category4'] = $row_parents["category"];
                                        $data['id4'] = $row_parents["id"];
                                        $sub_array[4] = $row_parents["category"];
                                    }
                                    if($row_parents["structure_level"]==5) {
                                        $data['category5'] = $row_parents["category"];
                                        $data['id5'] = $row_parents["id"];
                                        $sub_array[5] = $row_parents["category"];
                                    }
//                                    $sub_array['structure_level'.$i] = $data['structure_level'.$i];
//                                    $sub_array[$k] = $row_parents["category"];
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

                    $sql_posparents = "select tec.*, tsl.title position from $tbl_employee_category  tec
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
                                    if($p==1){
                                        $sub_array[8] = $row_posparents["category"];
                                    }
                                    if($p==2){
                                        $sub_array[9] = $row_posparents["category"];
                                    }

                                    $p++;
                                }

//                           $data3[]  = $data;


                                $sub_array['position_level'] = $data3;

//                          $data[] =$row_parents["structure_level"];
                            }
                        }

                    }
                }

                $sub_array[10] = $par;
                $sub_array[11] = $row_parent['emp_id'];
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

