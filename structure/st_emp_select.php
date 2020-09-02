<?php
include('../session.php');
$company_id                 =$_POST['company_id'];
$data=array();

$sql_emp= "select * from $tbl_employees where  emp_status=1 and company_id='$company_id'";

$result_emp = $db->query($sql_emp);
if($result_emp){
    if ($result_emp->num_rows > 0) {
        while($row_emp = $result_emp->fetch_assoc()) {
            $data[]=$row_emp;

//            $code=$row_users["code"];
//            $emp_id=$row_users["emp_id"];
//
//             $structure_positions= "select * from $tbl_structure_positions WHERE posit_code = '$code'";
//             $result_structure_positions = $db->query($structure_positions);
//            if($result_structure_positions->num_rows > 0) {
//                while($row_structure_positions = $result_structure_positions->fetch_assoc()) {
//                    $sub_array = array();
//                    $sub_array[] = $row_users['id'];
//                    $sub_array[] = ($row_users['category']);
//                    $sub_array[] = ($row_structure_positions['posit_code']);
//
//                    $sub_array[] = $row_users['parent'];
//
//                    $sub_array[] = $row_structure_positions['start_date'];
//                    $sub_array[] = $row_structure_positions['end_date'];
//                    $sub_array[] = $row_users['icon'];
//                    $sub_array[] = ($row_structure_positions['percent']);
//
//                    $structure_employees= "select * from $tbl_employees WHERE id = '$emp_id'";
//                    $result_employees = $db->query($structure_employees);
//                    if($result_employees) {
//                        if($result_employees->num_rows > 0) {
//                            while($row_employees = $result_employees->fetch_assoc()) {
//    //                            $sub_array = array();
//
//                                    $sub_array[] = $row_employees['firstname'].' '.$row_employees['lastname'].' '.$row_employees['surname'];
//
//
//
//
//                            }
//
//                        }
//                    }else{
//                    $sub_array[] = '';
//
//                }
//                    $data[] = $sub_array;
//                }
//
//            }





        }

    }
}
//print_r($data);
echo json_encode($data);
?>