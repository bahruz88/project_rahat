<?php 
 
include('../session.php') ;

function generateRandomString($length = 2) {
    return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

  //Create variables

	$schname_name=$_POST['schname_name'];
	$sch_start_date_name=$_POST['sch_start_date_name'];
    $sch_expire_date_name = $_POST['sch_expire_date_name'];
	$tm_type_name = $_POST['tm_type_name'];
	$sch_type_name = $_POST['sch_type_name'];
	$reduce_type_name = $_POST['reduce_type_name'];
	$red_working_hours_name = $_POST['red_working_hours_name'];
	$reduce_reason_name = $_POST['reduce_reason_name'];
	$start_time_name = $_POST['start_time_name'];
	$end_time_name = $_POST['end_time_name'];
	$break_start_time_name = $_POST['break_start_time_name'];
	$break_end_time_name = $_POST['break_end_time_name'];
	$dinner_start_time_name = $_POST['dinner_start_time_name'];
	$dinner_end_time_name = $_POST['dinner_end_time_name'];
	$night_time_name = $_POST['night_time_name'];
	$company_id_name = $_POST['company_id_name']; 
	
	/**schcode  generate*/
	$schcode =generateRandomString();
	$schcode =$schcode.mt_rand(1000,9999);
 

$sch_start_date_name = strtr($sch_start_date_name, '/', '-');
$sch_start_date_name= date('Y-m-d', strtotime($sch_start_date_name));

$sch_expire_date_name = strtr($sch_expire_date_name, '/', '-');
$sch_expire_date_name= date('Y-m-d', strtotime($sch_expire_date_name));

 
//-$passport_date=date('Y-m-d',strtotime($passport_date));
$sql = "INSERT INTO $tbl_schedules (
		  id, 		 sch_name,   sch_code,         company_id,             start_date, 			   expire_date,         tm_type,         sch_type,         reduce_type,         red_working_hours,         reduce_reason,         start_time,         end_time,         break_start_time,         break_end_time,         dinner_start_time,           dinner_end_time,          night_time,  insert_user ) 
VALUES (NULL, '$schname_name', '$schcode', '$company_id_name', '$sch_start_date_name', '$sch_expire_date_name', '$tm_type_name', '$sch_type_name', '$reduce_type_name', '$red_working_hours_name', '$reduce_reason_name', '$start_time_name', '$end_time_name', '$break_start_time_name', '$break_end_time_name', '$dinner_start_time_name', 	'$dinner_end_time_name', '$night_time_name',       '$uid') ";
  

  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>