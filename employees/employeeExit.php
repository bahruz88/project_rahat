<?php 
 
 
include('../session.php') ;


  //Create variables

$exit_date=$_POST['exitDate'];
$company_id=$_POST['company_id'];
$emp_id = $_POST['emplo'];
$type_dismissal_id = $_POST['type_dismissal'];
$termination_clause_id = $_POST['termination_clause'];
$note_id = $_POST['notes'];
$main = $_POST['main'];
$guarantees_termination_contract = $_POST['guarantees_termination_contract'];



$exit_date = strtr($exit_date, '/', '-');
$exit_date= date('Y-m-d', strtotime($exit_date));

//-$passport_date=date('Y-m-d',strtotime($passport_date));
    $sql = "INSERT INTO $tbl_employee_exit (id,company_id, emp_id, 	exit_date, type_dismissal_id, termination_clause_id, note_id, 	main,
 guarantees_termination_contract) 
 VALUES ('Null','$company_id','$emp_id','$exit_date','$type_dismissal_id','$termination_clause_id', '$note_id','$main','$guarantees_termination_contract')";
  

  if(!mysqli_query($db, $sql)) {
        echo "Error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
$sqlDelete = "UPDATE  $tbl_employees SET  
		emp_status='0' 		
		WHERE id 	= '$emp_id' ";



//echo $sqlContract;
if(!mysqli_query($db, $sqlDelete)) {
    echo "Error=".$sqlDelete.'='.$emp_id.'=' .mysqli_error($db);
}
else {
//    echo "success";
}
    //Close connection
    mysqli_close($db);

 
?>