<?php
include('../session.php') ;
$updateworkplaceid                          = $_POST['update_workplaceInfoid_name'];


if(isset($_POST['update_directorate'])){
    if($_POST['update_directorate']!=''){
    $update_parent=$_POST['update_directorate'];
    $directorate=$_POST['update_directorate'];
}
}
if(isset($_POST['update_department'])){
    if($_POST['update_department']!=''){
        $update_parent=$_POST['update_department'];
        $department=$_POST['update_department'];
}
}
if(isset($_POST['update_depart'])){
    if($_POST['update_depart']!=''){
        $update_parent=$_POST['update_depart'];
        $depart=$_POST['update_depart'];
    }
}
if(isset($_POST['update_area_section'])){
    if($_POST['update_area_section']!=''){
        $update_parent=$_POST['update_area_section'];
        $area_section=$_POST['update_area_section'];
    }
}

$category=$_POST['update_position'];
$update_position_old=$_POST['update_position_old'];
$command_code=$_POST['command_code'];
$company_id=$_POST['update_company_Id'];
$emp_id=$_POST['update_emplo'];

$work_status=$_POST['update_status'];

	$update_date= date("Y-m-d h:i:sa") ;

	$sql = "UPDATE  $tbl_employee_category SET  
		parent  = '$update_parent',
		category  = '$category',
		work_status = '$work_status',		
 		update_date='$update_date'
		WHERE id 	= '$updateworkplaceid' ";

	if(mysqli_query($db, $sql) ) {
      echo "success";
    }
    else  {
      echo "error=" .$update_parent.'='.mysqli_error($db);
    }
    //*******************************/


/**select company info */
$sql_company = "SELECT * FROM $tbl_employee_company Where id='$company_id'";
$result_company  = $db->query($sql_company);
$data = array();
//echo $sql_company;
if ($result_company ->num_rows > 0) {
    while($row_company  = $result_company ->fetch_assoc()) {
        $enterprise_head_position=$row_company["enterprise_head_position"];
        $company_name=$row_company["company_name"];
        $company_address=$row_company["address"];
        $company_tel=$row_company["tel"];
        $voen=$row_company["bank_voen"];
        $sun=$row_company["sun"];
        $enterprise_head_fullname=$row_company["enterprise_head_fullname"];
    }
}
//insert Command table
if($command_code!='' && $category!=$update_position_old){
    $sqlCommand = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname, structure1, structure2, structure3, structure4, structure5) 
 VALUES ('Null',$command_code,'$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname','$category','$directorate','$department','$depart','$area_section')";

//echo $sqlCommand;
    if(!mysqli_query($db, $sqlCommand)) {
        echo "Error=".$sqlCommand.'='.$emp_id.'=' .mysqli_error($db);
    }
    else {
//    echo "success";
    }
}



    //Close connection
    mysqli_close($db);


?>