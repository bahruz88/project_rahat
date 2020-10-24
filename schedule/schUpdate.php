<?php 
 
include('../session.php') ;

  //Create variables
    $schid=$_POST['update_schid_name'];
	$schname_name=$_POST['update_schname_name'];
	$sch_start_date_name=$_POST['update_sch_start_date_name'];
    $sch_expire_date_name = $_POST['update_sch_expire_date_name'];
	$tm_type_name = $_POST['update_tm_type_name'];
	$sch_type_name = $_POST['update_sch_type_name'];
	$reduce_type_name = $_POST['update_reduce_type_name'];
	$red_working_hours_name = $_POST['update_red_working_hours_name'];
	$reduce_reason_name = $_POST['update_reduce_reason_name'];
	$start_time_name = $_POST['update_start_time_name'];
	$end_time_name = $_POST['update_end_time_name'];
	$break_start_time_name = $_POST['update_break_start_time_name'];
	$break_end_time_name = $_POST['update_break_end_time_name'];
	$dinner_start_time_name = $_POST['update_dinner_start_time_name'];
	$dinner_end_time_name = $_POST['update_dinner_end_time_name'];
	$night_time_name = $_POST['update_night_time_name'];
	$company_id_name = $_POST['update_company_id_name']; 
	
  

$sch_start_date_name = strtr($sch_start_date_name, '/', '-');
$sch_start_date_name= date('Y-m-d', strtotime($sch_start_date_name));

$sch_expire_date_name = strtr($sch_expire_date_name, '/', '-');
$sch_expire_date_name= date('Y-m-d', strtotime($sch_expire_date_name));




 
//-$passport_date=date('Y-m-d',strtotime($passport_date));

$sql="
update  $tbl_schedules SET 

sch_name='$schname_name' ,
company_id='$company_id_name',
start_date='$sch_start_date_name' ,
expire_date='$sch_expire_date_name',
tm_type='$tm_type_name' ,
sch_type='$sch_type_name' ,
reduce_type='$reduce_type_name',
red_working_hours= '$red_working_hours_name',
reduce_reason='$reduce_reason_name',
start_time='$start_time_name',
end_time='$end_time_name',
break_start_time='$break_start_time_name',
break_end_time='$break_end_time_name',
dinner_start_time='$dinner_start_time_name',
dinner_end_time='$dinner_end_time_name',
night_time='$night_time_name',
update_user= '$uid'
where id='$schid' "; 

  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>