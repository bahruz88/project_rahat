<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;
$company_id = $_POST['company_id'];
$sql_salary_info = "select  * from $tbl_additions_deductions_salary where company_id='$company_id'";
//echo $sql_salary_info;

$result_salary_info  = $db->query($sql_salary_info);
$data = array();
if ($result_salary_info ->num_rows > 0) {
    // output data of each row
    while($row_salary_info  = $result_salary_info ->fetch_assoc()) {

        $data[]=$row_salary_info;
    }
}


echo json_encode($data);