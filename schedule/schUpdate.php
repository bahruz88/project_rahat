<?php 
 
include('../session.php') ;

  //Create variables
    $schid=$_POST['update_schid_name'];
	$schname_name=$_POST['update_schname_name'];
	$sch_start_date_name=$_POST['update_sch_start_date_name'];
    $sch_expire_date_name = $_POST['update_sch_expire_date_name'];
	$sch_type_name = $_POST['update_sch_type_name'];
	$night_time_name = $_POST['update_night_time_name'];
	$company_id_name = $_SESSION["CompanyId"];
	
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
sch_type='$sch_type_name' ,
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