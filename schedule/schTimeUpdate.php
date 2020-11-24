<?php 
 
include('../session.php') ;

  //Create variables
    $schid=$_POST['timeschid_name'];
	
	
	$start_time_1=$_POST['name_start_time_1'];
	$start_time_2=$_POST['name_start_time_2'];
	$start_time_3=$_POST['name_start_time_3'];
	$start_time_4=$_POST['name_start_time_4'];
	$start_time_5=$_POST['name_start_time_5'];
	$start_time_6=$_POST['name_start_time_6'];
	$start_time_7=$_POST['name_start_time_7'];
	$end_time_1=  $_POST['name_end_time_1'];
	$end_time_2=  $_POST['name_end_time_2'];
	$end_time_3=  $_POST['name_end_time_3'];
	$end_time_4=  $_POST['name_end_time_4'];
	$end_time_5=  $_POST['name_end_time_5'];
	$end_time_6=  $_POST['name_end_time_6'];
	$end_time_7=  $_POST['name_end_time_7'];
	
	$breake_start_time_1=$_POST['name_breake_start_time_1'];
	$breake_start_time_2=$_POST['name_breake_start_time_2'];
	$breake_start_time_3=$_POST['name_breake_start_time_3'];
	$breake_start_time_4=$_POST['name_breake_start_time_4'];
	$breake_start_time_5=$_POST['name_breake_start_time_5'];
	$breake_start_time_6=$_POST['name_breake_start_time_6'];
	$breake_start_time_7=$_POST['name_breake_start_time_7'];
	
	$breake_end_time_1=  $_POST['name_breake_end_time_1'];
	$breake_end_time_2=  $_POST['name_breake_end_time_2'];
	$breake_end_time_3=  $_POST['name_breake_end_time_3'];
	$breake_end_time_4=  $_POST['name_breake_end_time_4'];
	$breake_end_time_5=  $_POST['name_breake_end_time_5'];
	$breake_end_time_6=  $_POST['name_breake_end_time_6'];
	$breake_end_time_7=  $_POST['name_breake_end_time_7'];
	
	$dinner_start_time_1=$_POST['name_dinner_start_time_1'];
	$dinner_start_time_2=$_POST['name_dinner_start_time_2'];
	$dinner_start_time_3=$_POST['name_dinner_start_time_3'];
	$dinner_start_time_4=$_POST['name_dinner_start_time_4'];
	$dinner_start_time_5=$_POST['name_dinner_start_time_5'];
	$dinner_start_time_6=$_POST['name_dinner_start_time_6'];
	$dinner_start_time_7=$_POST['name_dinner_start_time_7'];
	$dinner_end_time_1=  $_POST['name_dinner_end_time_1'];
	$dinner_end_time_2=  $_POST['name_dinner_end_time_2'];
	$dinner_end_time_3=  $_POST['name_dinner_end_time_3'];
	$dinner_end_time_4=  $_POST['name_dinner_end_time_4'];
	$dinner_end_time_5=  $_POST['name_dinner_end_time_5'];
	$dinner_end_time_6=  $_POST['name_dinner_end_time_6'];
	$dinner_end_time_7=  $_POST['name_dinner_end_time_7'];

	if (  isset($_POST['name_status_id_1'])){ $work_day_status_1=1 ; } 
	else  { $work_day_status_1=0 ; }
	if (  isset($_POST['name_status_id_2'])){ $work_day_status_2=1 ; } 
	else  { $work_day_status_2=0 ; }
	if (  isset($_POST['name_status_id_3'])){ $work_day_status_3=1 ; } 
	else  { $work_day_status_3=0 ; }	
	if (  isset($_POST['name_status_id_4'])){ $work_day_status_4=1 ; } 
	else  { $work_day_status_4=0 ; }
	if (  isset($_POST['name_status_id_5'])){ $work_day_status_5=1 ; } 
	else  { $work_day_status_5=0 ; }
	if (  isset($_POST['name_status_id_6'])){ $work_day_status_6=1 ; } 
	else  { $work_day_status_6=0 ; }	
	if (  isset($_POST['name_status_id_7'])){ $work_day_status_7=1 ; } 
	else  { $work_day_status_7=0 ; }
	
	$query = mysqli_query($db,"SELECT * FROM $tbl_schedules_additional WHERE schid='$schid' ");	
	
 
   if(mysqli_num_rows($query) > 0){
$sql="
 update $tbl_schedules_additional SET 
 start_time_1='$start_time_1', 
 start_time_2='$start_time_2', 
 start_time_3='$start_time_3', 
 start_time_4='$start_time_4', 
 start_time_5='$start_time_5', 
 start_time_6='$start_time_6', 
 start_time_7='$start_time_7', 
 end_time_1='$end_time_1', 
 end_time_2='$end_time_2', 
 end_time_3='$end_time_3', 
 end_time_4='$end_time_4', 
 end_time_5='$end_time_5', 
 end_time_6='$end_time_6', 
 end_time_7='$end_time_7', 
 breake_start_time_1='$breake_start_time_1', 
 breake_start_time_2='$breake_start_time_2', 
 breake_start_time_3='$breake_start_time_3', 
 breake_start_time_4='$breake_start_time_4', 
 breake_start_time_5='$breake_start_time_5', 
 breake_start_time_6='$breake_start_time_6', 
 breake_start_time_7='$breake_start_time_7', 
 breake_end_time_1='$breake_end_time_1', 
 breake_end_time_2='$breake_end_time_2', 
 breake_end_time_3='$breake_end_time_3', 
 breake_end_time_4='$breake_end_time_4', 
 breake_end_time_5='$breake_end_time_5', 
 breake_end_time_6='$breake_end_time_6', 
 breake_end_time_7='$breake_end_time_7', 
 dinner_start_time_1='$dinner_start_time_1',
 dinner_start_time_2='$dinner_start_time_2', 
 dinner_start_time_3='$dinner_start_time_3', 
 dinner_start_time_4='$dinner_start_time_4', 
 dinner_start_time_5='$dinner_start_time_5', 
 dinner_start_time_6='$dinner_start_time_6', 
 dinner_start_time_7='$dinner_start_time_7', 
 dinner_end_time_1='$dinner_end_time_1', 
 dinner_end_time_2='$dinner_end_time_2', 
 dinner_end_time_3='$dinner_end_time_3', 
 dinner_end_time_4='$dinner_end_time_4', 
 dinner_end_time_5='$dinner_end_time_5', 
 dinner_end_time_6='$dinner_end_time_6', 
 dinner_end_time_7='$dinner_end_time_7', 
 work_day_status_1='$work_day_status_1', 
 work_day_status_2='$work_day_status_2', 
 work_day_status_3='$work_day_status_3', 
 work_day_status_4='$work_day_status_4', 
 work_day_status_5='$work_day_status_5', 
 work_day_status_6='$work_day_status_6', 
 work_day_status_7='$work_day_status_7',
update_user= '$uid'
where schid='$schid' "; 

   }
   else 
   {
	 $sql="INSERT INTO $tbl_schedules_additional
	   (id, schid, 
	   start_time_1, start_time_2, start_time_3, start_time_4, start_time_5, start_time_6, start_time_7, 
	   end_time_1, end_time_2, end_time_3, end_time_4, end_time_5, end_time_6, end_time_7, 
	   breake_start_time_1, breake_start_time_2, breake_start_time_3, breake_start_time_4, breake_start_time_5, breake_start_time_6, breake_start_time_7, 
	   breake_end_time_1, breake_end_time_2, breake_end_time_3, breake_end_time_4, breake_end_time_5, breake_end_time_6, breake_end_time_7, 
	   dinner_start_time_1,dinner_start_time_2, dinner_start_time_3, dinner_start_time_4, dinner_start_time_5, dinner_start_time_6, dinner_start_time_7, 
	   dinner_end_time_1, dinner_end_time_2, dinner_end_time_3, dinner_end_time_4, dinner_end_time_5, dinner_end_time_6, dinner_end_time_7, 
	   work_day_status_1, work_day_status_2, work_day_status_3, work_day_status_4, work_day_status_5, work_day_status_6, work_day_status_7, insert_user) 
		VALUES (NULL, '$schid', 
		'$start_time_1', '$start_time_2', '$start_time_3', '$start_time_4', '$start_time_5', '$start_time_6', '$start_time_7', 
		'$end_time_1','$end_time_2','$end_time_3','$end_time_4','$end_time_5','$end_time_6','$end_time_7',

		'$breake_start_time_1', '$breake_start_time_2', '$breake_start_time_3', '$breake_start_time_4', '$breake_start_time_5', '$breake_start_time_6', '$breake_start_time_7', 
		'$breake_end_time_1','$breake_end_time_2','$breake_end_time_3','$breake_end_time_4','$breake_end_time_5','$breake_end_time_6','$breake_end_time_7',

		'$dinner_start_time_1', '$dinner_start_time_2', '$dinner_start_time_3', '$dinner_start_time_4', '$dinner_start_time_5', '$dinner_start_time_6', '$dinner_start_time_7', 
		'$dinner_end_time_1','$dinner_end_time_2','$dinner_end_time_3','$dinner_end_time_4','$dinner_end_time_5','$dinner_end_time_6','$dinner_end_time_7',

		'$work_day_status_1','$work_day_status_2','$work_day_status_3','$work_day_status_4','$work_day_status_5','$work_day_status_6','$work_day_status_7','$uid') ";   
	   
   }
  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>