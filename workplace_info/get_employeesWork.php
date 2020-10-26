<?php
include('../session.php');
    $company_id = $_POST['company_id'];

//$sql_employees = "select  id, concat(lastname,' ', firstname ,' ', surname) full_name ,lastname, firstname ,surname, emp_status,empno,image_name
//from $tbl_employees  where emp_status=1 and company_id='$company_id'";
$sql_employees = "SELECT DISTINCT emp_id FROM  $tbl_employee_category 
           WHERE company_id='$company_id' and emp_id!=0 ";

$result_employees  = $db->query($sql_employees);
$data = array();
if ($result_employees ->num_rows > 0) {
    while($row_employees  = $result_employees ->fetch_assoc()) {
        $sub_array   = array();
//        $sub_array[] = $row_employees['id'];
        $sub_array[] = $row_employees['emp_id'];
        $data[]     = $sub_array;
    }
}
$row_count=$result_employees->num_rows ;
$draw=10;


echo json_encode($data);
?>