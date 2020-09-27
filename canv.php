<?php
include('../session.php');
$company_id = $_POST['company_id'];
//$sql_employees = "select  id, firstname, lastname, surname , emp_status,empno,image_name from $tbl_employees  where emp_status=1";
$sql_employee_category = "select  emp_id from $tbl_employee_category where company_id='$company_id'";
$result_employee_category  = $db->query($sql_employee_category);
$data = array();
if ($result_employee_category ->num_rows > 0) {
    // output data of each row
    while($row_employee_category  = $result_employee_category ->fetch_assoc()) {
        $empId=$row_employee_category['id'];
        $sql_employees = "select  id, firstname, lastname, surname , emp_status,empno,image_name from $tbl_employees  where emp_status=1 and id!='$empId' and company_id='$company_id'";
        $result_employees  = $db->query($sql_employees);

        if ($result_employees ->num_rows > 0) {
            // output data of each row
            while($row_employees  = $result_employees ->fetch_assoc()) {

                $sub_array   = array();
                $sub_array[] = $row_employees['id'];
                $sub_array[] = $row_employees['firstname'];
                $sub_array[] = $row_employees['lastname'];
                $sub_array[] = $row_employees['surname'];
                $sub_array[] = $row_employees['empno'];
                $sub_array[] = $row_employees['emp_status'];
                $data[]     = $sub_array;
            }
        }

    }
}




$row_count=$result_employees->num_rows ;
$draw=10;
/*$_POST['draw']*/

$output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);

echo json_encode($output);
?>