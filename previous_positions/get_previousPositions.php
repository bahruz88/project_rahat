<?php
include('../session.php');

$sql_minfo = "SELECT tepp.id,tepp.emp_id,tepp.prev_employer, DATE_FORMAT(tepp.start_date,'%d/%m/%Y') start_date,
DATE_FORMAT(tepp.end_date,'%d/%m/%Y') end_date,
tepp.leave_reason,tepp.sector,tepp.status,tepp.insert_date,
te.firstname,te.lastname,te.surname,te.emp_status
FROM tbl_employee_prev_positions tepp
INNER join tbl_employees te on te.id=tepp.emp_id where tepp.status=1 and te.emp_status=1";


$result_minfo  = $db->query($sql_minfo);
$data = array();
if ($result_minfo ->num_rows > 0) {
    // output data of each row
    while($row_minfo  = $result_minfo ->fetch_assoc()) {
        if  ($row_minfo ['emp_status']==1 )
        {
            $row_minfo ['emp_status']='active'	;

        }
        else {
            $row_minfo ['emp_status']='deactive';

        }


        $sub_array   = array();
        $sub_array[] = $row_minfo['id'];
        $sub_array[] = $row_minfo['lastname'].' '.$row_minfo['firstname'].' '.$row_minfo['surname'];

        $sub_array[] = $row_minfo['prev_employer'];
        $sub_array[] = $row_minfo['start_date'];
        $sub_array[] = $row_minfo['end_date'];
        $sub_array[] = $row_minfo['leave_reason'];
        $sub_array[] = $row_minfo['sector'];
        $sub_array[] = $row_minfo['insert_date'];
        $data[]     = $sub_array;
    }
}


$row_count=$result_minfo->num_rows ;

$draw=10;

$output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);
//print_r($output);
echo  json_encode($output);
?>

