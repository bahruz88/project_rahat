<?php
//$id                 =$_POST['id'];
$data=array();

//$sql_positions="select id, category,code,create_date,end_date, parent,icon,emp_id
// from (select * from $tbl_employee_category  order by parent, id) folders_sorted,
//  (select @pv := $id) initialisation where find_in_set(parent, @pv) > 0 and @pv := concat(@pv, ',', id)";
////
//// echo $sql_positions;
//$result_position = $db->query($sql_positions);
//if($result_position){
//    if ($result_position->num_rows > 0) {
//        while($row_users = $result_position->fetch_assoc()) {
////
//            $code=$row_users["code"];
//            $emp_id=$row_users["emp_id"];
//            $struc_id=$row_users["struc_id"];
//            $code= $posit_code;
//            $emp_id=$emp_id;

            $structure_positions= "select tsp.*,tsr.role  
            from $tbl_structure_positions tsp
             LEFT join $tbl_structure_roles tsr on tsr.id=tsp.role_id and tsr.lang='$site_lang'
              WHERE tsp.company_id = '$company_id' and tsp.struc_id='$id'";
//       echo $structure_positions;
            $result_structure_positions = $db->query($structure_positions);
            if($result_structure_positions->num_rows > 0) {
                while($row_structure_positions = $result_structure_positions->fetch_assoc()) {
                    $sub_array = array();
                    $sub_array[] = $row_structure_positions['id'];
//                    $sub_array[] = ($row_users['category']);
                    $sub_array[] = ($row_structure_positions['posit_code']);

//                    $sub_array[] = $row_users['parent'];
                    $emp_id=$row_structure_positions["emp_id"];
                    $sub_array[] = $row_structure_positions['start_date'];
                    $sub_array[] = $row_structure_positions['end_date'];
                    $sub_array[] = $row_structure_positions['icon'];
                    $sub_array[] = ($row_structure_positions['percent']);

                    $structure_employees= "select * from $tbl_employees WHERE id = '$emp_id'";
                    $result_employees = $db->query($structure_employees);
                    if($result_employees) {
                        if($result_employees->num_rows > 0) {
                            while($row_employees = $result_employees->fetch_assoc()) {
                                //                            $sub_array = array();
                                $sub_array[] = $row_employees['firstname'].' '.$row_employees['lastname'].' '.$row_employees['surname'];
                            }
                        }
                    }else{
                        $sub_array[] = '';
                    }
                    $sub_array[] = ($row_structure_positions['role']);
                    $sub_array[] = ($row_structure_positions["emp_id"]);
                    $sub_array[] = ($row_structure_positions['id']);
                    $sub_array[] = ($row_structure_positions['role']);
                    $data[] = $sub_array;
                }
            }
//        }
//    }
//}
//print_r($data);
echo json_encode($data);
//include('session.php') ;
//$data=array();
//
//
//$structure_positions= "select tsp.*,tsr.role
//from $tbl_structure_positions tsp
// LEFT join $tbl_structure_roles tsr on tsr.id=tsp.role_id
// WHERE tsp.role_id != 0";
////echo $structure_positions;
//
//
// $result_structure_positions = $db->query($structure_positions);
//
//            if($result_structure_positions->num_rows > 0) {
//                while($row_structure_positions = $result_structure_positions->fetch_assoc()) {
//                    $sub_array = array();
//                    $sub_array[] = ($row_structure_positions['id']);
//                    $sub_array[] = ($row_structure_positions['posit_code']);
//                    $sub_array[] = $row_structure_positions['start_date'];
//                    $sub_array[] = $row_structure_positions['end_date'];
//                    $sub_array[] = ($row_structure_positions['percent']);
//
//                    $emp_id = ($row_structure_positions['emp_id']);
//
//                    $structure_employees = "select * from $tbl_employees WHERE id = '$emp_id'";
//                    $result_employees = $db->query($structure_employees);
//                    if ($result_employees) {
//                        if ($result_employees->num_rows > 0) {
//                            while ($row_employees = $result_employees->fetch_assoc()) {
//                                $sub_array[] = $row_employees['firstname'] . ' ' . $row_employees['lastname'] . ' ' . $row_employees['surname'];
//
//                            }
//
//                        }
//                    } else {
//                        $sub_array[] = '';
//
//                    }
//                    $sub_array[] = ($row_structure_positions['role']);
//                    $data[] = $sub_array;
//                }
//            }
//
////print_r($data);
//echo json_encode($data);
?>