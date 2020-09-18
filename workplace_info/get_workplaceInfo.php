<?php
include('../session.php');


    $sql_parent="select * from $tbl_employee_category WHERE emp_id != 0";
$data2 = array();
//   echo $sql_parents;
    $result_parent = $db->query($sql_parent);
    if($result_parent){
        if ($result_parent->num_rows > 0) {
            while($row_parent = $result_parent->fetch_assoc()) {
                $parent =$row_parent["parent"];
                $i=1;
                $sub_array   = array();
//                $sub_array[] = $row_parent['id'];
//                $sub_array[] = $row_parent['emp_id'];
                $sub_array[] = $row_parent;
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
                                    $sub_array[] = $data;
                                }
                                $i--;
//                                $data[] =$row_parents["structure_level"];
                            }
                        }

                    }
                }
                $data2[]     = $sub_array;

            }

        }
    }






//$sql_minfo = "SELECT tec.*, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name
//  FROM $tbl_employee_category tec
// LEFT join $tbl_employees te on tec.emp_id=te.id where tec.emp_id!=0 and te.emp_status=1";
//
//
//
//
//$result_minfo  = $db->query($sql_minfo);
//$data = array();
//if ($result_minfo ->num_rows > 0) {
//    // output data of each row
//    while($row_minfo  = $result_minfo ->fetch_assoc()) {
//
//        $sub_array   = array();
//        $sub_array[] = $row_minfo['id'];
//        $sub_array[] = $row_minfo['full_name'];
//        $sub_array[] = $row_minfo['parent'];
//        $sub_array[] = $row_minfo['structure_level'];
//        $sub_array[] = $row_minfo['position_level'];
//        $sub_array[] = $row_minfo['position_level'];
//        $sub_array[] = $row_minfo['position_level'];
//        $sub_array[] = $row_minfo['position_level'];
//        $sub_array[] = $row_minfo['position_level'];
//        $sub_array[] = $row_minfo['position_level'];
//
//
// //        $sub_array[] = $row_minfo['insert_date'];
//        $data[]     = $sub_array;
//    }
//}


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

