<?php
include('../session.php');

$sql_minfo = "SELECT tmi.id,tmi.emp_id,tmi.medical_app,tmi.renew_interval,
 DATE_FORMAT(tmi.last_renew_date,'%d/%m/%Y') last_renew_date,tmi.physical_deficiency,tmi.deficiency_desc,
 tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tmi.status,
 te.emp_status,te.lastname,te.firstname,te.surname,te.id teId,
  tEN.exist_id, tEN.exist_desc,tEN.lang
FROM tbl_employee_medical_information tmi
INNER join tbl_exist_not_exist tEN on tmi.medical_app=tEN.exist_id and tEN.lang='az'
INNER join tbl_employees te on tmi.emp_id=te.id where tmi.status=1 and te.emp_status=1";

//  tYN.chois_id, tYN.chois_desc,tYN.lang,
//INNER join tbl_yesno tYN on tmi.medical_app=tYN.chois_id and tYN.lang='az'


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

        $sub_array[] = $row_minfo['exist_desc'];
        $sub_array[] = $row_minfo['renew_interval'];
        $sub_array[] = $row_minfo['last_renew_date'];
        $sub_array[] = $row_minfo['physical_deficiency'];
        $sub_array[] = $row_minfo['deficiency_desc'];
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

