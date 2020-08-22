<?php
include('session.php') ;
 $company_id                 =$_POST['company_id'];

$data=array();

$structure_employees= "select tec.*,te.id emp_id,te.firstname firstname,te.lastname lastname,te.surname surname
from $tbl_employee_category tec
LEFT join $tbl_employees te on te.id=tec.emp_id
WHERE tec.company_id = '$company_id'";

$result_employees = $db->query($structure_employees);
if($result_employees) {
    if($result_employees->num_rows > 0) {
        while($row_employees = $result_employees->fetch_assoc()) {
            $code = $row_employees['code'];

            if(substr($code,0,1)=="P"){
                $sub_array = array();
//                echo $code.'='.substr($code,0,1);

                $sub_array[] = $row_employees['code'];
                $sub_array[] = $row_employees['firstname'].' '.$row_employees['lastname'].' '.$row_employees['surname'];
                $sub_array[] = $row_employees['create_date'];
                $sub_array[] = $row_employees['end_date'];
                $sub_array[] = $row_employees['emp_id'];
                $data[]=$sub_array;
            }





        }

    }
}
echo json_encode($data);
?>