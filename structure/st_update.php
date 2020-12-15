<?php


include('../session.php');
$site_lang=$_SESSION['dil'] ;

//Create variables

$id                 =$_POST['id'];
$command_code       =$_POST['command_code'];
$company_id         =$_POST['company_id'];
$emp_id         =$_POST['emp_id'];
if(isset($_POST['change'])){
    $change             = $_POST['change'];
}

if(isset($_POST['name'])){
    $name           = $_POST['name'];
}
if(isset($_POST['icon'])){
    $name           = $_POST['icon'];
}
if(isset($_POST['createDate'])){
    $createDate        = $_POST['createDate'];
    $endDate           = $_POST['endDate'];

    $createDate = strtr( $createDate , '/', '-');
    $createDate= date('Y-m-d', strtotime($createDate));

    $endDate = strtr( $endDate , '/', '-');
    $endDate= date('Y-m-d', strtotime($endDate));

    $sql = "UPDATE  $tbl_employee_category SET  
			create_date  = '$createDate',
		end_date  = '$endDate'
		WHERE id 	= '$id'";
}else{
    $sql = "UPDATE  $tbl_employee_category SET  
		$change  = '$name'
		WHERE id 	= '$id'";
}

/**select company info */
$sql_company = "SELECT * FROM $tbl_employee_company Where id='$company_id'";
$result_company  = $db->query($sql_company);
$data = array();
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
/**select company info */
$sql_parent = "SELECT * FROM $tbl_employee_category Where id='$id'";
$result_parent  = $db->query($sql_parent);
$data = array();
if ($result_parent ->num_rows > 0) {
    while($row_parent  = $result_parent ->fetch_assoc()) {
        $parent=$row_parent["parent"];
    }
}
$directorate='';
$department='';
$depart='';
$area_section='';
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
//insert Command table
if($command_code!='' && $change=="category"){
    $sqlCommand = "INSERT INTO $tbl_employee_commands (id,command_id, emp_id,  company_id, enterprise_head_position, company_name, company_address, company_tel, voen, sun, enterprise_head_fullname, structure1, structure2, structure3, structure4, structure5) 
 VALUES ('Null',$command_code,'$emp_id','$company_id','$enterprise_head_position','$company_name','$company_address','$company_tel','$voen','$sun','$enterprise_head_fullname','$name','$directorate','$department','$depart','$area_section')";

//echo $sqlCommand;
    if(!mysqli_query($db, $sqlCommand)) {
        echo "Error=".$sqlCommand.'='.$emp_id.'=' .mysqli_error($db);
    }
    else {
//    echo "success";
    }
}

if(mysqli_query($db, $sql) ) {
//    echo "success";
}
else  {
    echo "errorwww" .mysqli_error($db);
}

//include ('st_select.php');
include('st_selectWithComp.php');
?>