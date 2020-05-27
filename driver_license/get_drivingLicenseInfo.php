<?php
include('../session.php');

$sql_minfo = "SELECT tedl.id,tedl.emp_id,tedl.lic_seria_number,tedl.category, tedl.lic_issuer, DATE_FORMAT(tedl.lic_issue_date,'%d/%m/%Y') lic_issue_date,DATE_FORMAT(tedl.expire_date,'%d/%m/%Y') expire_date, tedl.insert_user,tedl.update_user,DATE_FORMAT(tedl.insert_date,'%d/%m/%Y') insert_date,
 te.firstname,te.lastname,te.surname,te.emp_status,
 tdlc.cat_id,tdlc.cat_desc,tdlc.lang
 FROM tbl_employye_driver_license tedl
 INNER join tbl_driver_lic_cat tdlc on tdlc.cat_id=tedl.category and tdlc.lang='az'
  INNER join tbl_employees te on te.id=tedl.emp_id where tedl.status=1 and te.emp_status=1";

$result_minfo  = $db-> query($sql_minfo);
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

        $sub_array[] = $row_minfo['lic_seria_number'];
        $sub_array[] = $row_minfo['cat_desc'];
        $sub_array[] = $row_minfo['lic_issuer'];
        $sub_array[] = $row_minfo['lic_issue_date'];
        $sub_array[] = $row_minfo['expire_date'];
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
if (!$result_minfo) {
    trigger_error('Invalid query: ' . $db->error);
} else 
{
echo  json_encode($output);
}
?>

