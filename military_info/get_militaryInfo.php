<?php
include('../session.php');

$sql_minfo = "SELECT tmi.id,tmi.emp_id,tmi.status,tmi.military_reg_group, tmi.military_reg_category,tmi.military_staff,tmi.military_rank, tmi.military_specialty_acc,tmi.military_fitness_service,tmi.military_registration_service, DATE_FORMAT(tmi.military_registration_date,'%d/%m/%Y') military_registr_date, tmi.military_general,tmi.military_special,tmi.military_no_official, tmi.military_additional_information,DATE_FORMAT(tmi.military_date_completion,'%d/%m/%Y') military_date_comp, tmi.insert_date,tmi.insert_user,tmi.update_user,tmi.update_date, tms.staff_id, tms.staff_desc,tmr.rank_id,tmr.rank_desc, te.firstname,te.lastname,te.surname,te.emp_status,tms.staff_desc FROM tbl_military_information tmi INNER join tbl_military_rank tmr on tmi.military_rank=tmr.rank_id and tmr.lang='az' INNER join tbl_military_staff tms on tmi.military_staff=tms.staff_id and tms.lang='az' INNER join tbl_employees te on tmi.emp_id=te.id where tmi.status=1 and te.emp_status=1";


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

        $military_reg_category='';
		$military_reg_group='';
		if($row_minfo['military_reg_category']==1){
		    $military_reg_category='Kateqoriya 1';
		}else{
		    $military_reg_category='Kateqoriya 2';
		}
		if($row_minfo['military_reg_group']==1){
		    $military_reg_group='Çağırışçı';
		}else{
		    $military_reg_group='Hərbi vəzifəli';
		}
        $sub_array   = array();
        $sub_array[] = $row_minfo['id'];
        $sub_array[] = $row_minfo['lastname'].' '.$row_minfo['firstname'].' '.$row_minfo['surname'];
        $sub_array[] = $military_reg_category;
        $sub_array[] = $military_reg_group;
        $sub_array[] = $row_minfo['staff_desc'];
        $sub_array[] = $row_minfo['rank_desc'];
        $sub_array[] = $row_minfo['military_specialty_acc'];
        $sub_array[] = $row_minfo['military_fitness_service'];
        $sub_array[] = $row_minfo['military_registration_service'];
        $sub_array[] = $row_minfo['military_registr_date'];
        $sub_array[] = $row_minfo['military_general'];
        $sub_array[] = $row_minfo['military_special'];
        $sub_array[] = $row_minfo['military_no_official'];
        $sub_array[] = $row_minfo['military_additional_information'];
        $sub_array[] = $row_minfo['military_date_comp'];
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

