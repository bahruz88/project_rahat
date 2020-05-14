<?php
include('../session.php');

$sql_minfo = " SELECT tmi.*, te.firstname,te.lastname,te.surname  
FROM $tbl_military_information tmi  
INNER join $tbl_military_rank  tmr on tmi.military_rank=tmr.rank_id and  tmr.lang='az'
INNER join $tbl_military_staff  tms on tmi.military_rank=tmr.staff_id and  tmi.lang='az'
inner join  $tbl_employees te on tmi.emp_id=te.id  where  te.status=1";


$result_minfo  = $db->query($sql_minfo );
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
        $sub_array[] = $row_minfo['lastname'].' ' .$row_minfo['firstname'].' ' .$row_minfo['surname'];
        $sub_array[] = $row_minfo['military_reg_group'];
        $sub_array[] = $row_minfo['military_reg_category'];
        $sub_array[] = $row_minfo['staff_desc'];
        $sub_array[] = $row_minfo['rank_desc'];
        $sub_array[] = $row_minfo['military_specialty_acc'];
        $sub_array[] = $row_minfo['military_fitness_service'];
        $sub_array[] = $row_minfo['military_registration_service'];
        $sub_array[] = $row_minfo['military_registration_date'];
        $sub_array[] = $row_minfo['military_general'];
        $sub_array[] = $row_minfo['military_special'];
        $sub_array[] = $row_minfo['military_no_official'];
        $sub_array[] = $row_minfo['military_additional_information'];
        $sub_array[] = $row_minfo['military_date_completion'];
        $sub_array[] = $row_minfo['insert_date'];
        $data[]     = $sub_array;
    }
}


$row_count=$result_minfo->num_rows ;
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