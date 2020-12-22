<?php 
 
 
include('../session.php') ;
 
  //Create variables

	$employee=$_POST['emplo'];
	$qualification=$_POST['qualification'];
	$institution_id=$_POST['institution_id'];
	$faculty=$_POST['faculty'];
	$profession=$_POST['profession'];
	$diplom_seria_num=$_POST['diplom_seria_num'];
	
	$diplom_issue_date=$_POST['diplom_issue_date'];
	$diplom_issue_date = strtr($diplom_issue_date, '/', '-');
	$diplom_issue_date= date('Y-m-d', strtotime($diplom_issue_date));
	
	$uni_end_date=$_POST['uni_end_date'];	
	$uni_end_date = strtr($uni_end_date, '/', '-');
	$uni_end_date= date('Y-m-d', strtotime($uni_end_date));
	$insert_date =date('Y-m-d') ;

    $sql = "INSERT INTO $tbl_education ( 
	id, emp_id, qualification_id, institution_id, faculty, profession, end_date, diplom_seria_num, 
	diplom_issue_date, insert_date, update_date, insert_user, update_user) 
	VALUES ('Null','$employee','$qualification','$institution_id','$faculty','$profession','$uni_end_date','$diplom_seria_num','$diplom_issue_date','$insert_date','$insert_date','$employee','$employee')";
  
//echo $sql;
  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>