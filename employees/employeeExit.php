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
$parent='';
$directorate='';
$department='';
$depart='';
$area_section='';
$category='';
/**select company info */
$sql_parent = "SELECT * FROM $tbl_employee_category Where emp_id='$emp_id'";
$result_parent  = $db->query($sql_parent);
$data = array();
if ($result_parent ->num_rows > 0) {
    while($row_parent  = $result_parent ->fetch_assoc()) {
        $parent=$row_parent["parent"];
        $category=$row_parent["category"];
    }
}

while ($parent != '' && $parent != null && $parent != 0) {
    $sql_parents = "select tec.*, tsl.title structure from $tbl_employee_category  tec
                    LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
                     WHERE tec.id = '$parent'";
//                  echo $sql_parents;
    $result_parents = $db->query($sql_parents);
    if ($result_parents) {
        if ($result_parents->num_rows > 0) {
//                        $data=array();
            while ($row_parents = $result_parents->fetch_assoc()) {
                $parent = $row_parents["parent"];
                if ($row_parents["structure_level"] != 1) {
//                      $data['structure_level'.$i]  = $row_parents["structure"];
                    if ($row_parents["structure_level"] == 2) {
//                        $data['category2'] = $row_parents["category"];
                        $directorate = $row_parents["id"];
                    }
                    if ($row_parents["structure_level"] == 3) {
//                        $data['category3'] = $row_parents["category"];
                        $department = $row_parents["id"];
                    }
                    if ($row_parents["structure_level"] == 4) {
//                        $data['category4'] = $row_parents["category"];
                        $depart = $row_parents["id"];
                    }
                    if ($row_parents["structure_level"] == 5) {
//                        $data['category5'] = $row_parents["category"];
                        $area_section = $row_parents["id"];
                    }
                }
            }
        }
    }
}
$command_code=19;
//insert Command table
if($command_code!='') {
    $sqlCommand = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname, structure1, structure2, structure3, structure4, structure5) 
 VALUES ('Null','$command_code','$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname','$category','$directorate','$department','$depart','$area_section')";

//echo $sqlCommand;
    if (!mysqli_query($db, $sqlCommand)) {
        echo "Error=" . $sqlCommand . '=' . $emp_id . '=' . mysqli_error($db);
    } else {
//    echo "success";
    }

}
    mysqli_close($db);

 
?>