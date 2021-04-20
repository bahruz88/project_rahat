<?php
include('../session.php');
$sql_minfo = "SELECT tmi.id,tmi.emp_id,tmi.trp_seria_number,tmi.trp_permit_reason,
 DATE_FORMAT(tmi.trp_permit_date,'%d/%m/%Y') trp_permit_date,DATE_FORMAT(tmi.trp_valid_date,'%d/%m/%Y') trp_valid_date,
 tmi.trp_issuer,tmi.prp_seria_number,DATE_FORMAT(tmi.prp_permit_date,'%d/%m/%Y') prp_permit_date,DATE_FORMAT(tmi.prp_valid_date,'%d/%m/%Y') prp_valid_date,
 tmi.prp_issuer,tmi.wp_seria_number,DATE_FORMAT(tmi.wp_permit_date,'%d/%m/%Y') wp_permit_date,DATE_FORMAT(tmi.wp_valid_date,'%d/%m/%Y') wp_valid_date,
 tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date,tmi.status,
 te.emp_status,te.lastname,te.firstname,te.surname,te.id teId
FROM tbl_migration_info tmi
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

        $sub_array[] = $row_minfo['trp_seria_number'];
        $sub_array[] = $row_minfo['trp_permit_reason'];
        $sub_array[] = $row_minfo['trp_permit_date'];
        $sub_array[] = $row_minfo['trp_valid_date'];
        $sub_array[] = $row_minfo['trp_issuer'];
        $sub_array[] = $row_minfo['prp_seria_number'];
        $sub_array[] = $row_minfo['prp_permit_date'];
        $sub_array[] = $row_minfo['prp_valid_date'];
        $sub_array[] = $row_minfo['prp_issuer'];
        $sub_array[] = $row_minfo['wp_seria_number'];
        $sub_array[] = $row_minfo['wp_permit_date'];
        $sub_array[] = $row_minfo['wp_valid_date'];
        $sub_array[] = $row_minfo['prp_issuer'];;
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

