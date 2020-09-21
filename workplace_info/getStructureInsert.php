<?php
include('../session.php');
$site_lang=$_SESSION['dil'] ;
$company_id=$_POST['company_id'];
 $st_array   = array();

$sql_positions="SELECT * FROM `tbl_category` WHERE structure_level='2' and company_id='$company_id'";
$data2 = array();
// echo $sql_positions;
$result_position = $db->query($sql_positions);
if($result_position){
    if ($result_position->num_rows > 0) {
        while($row_users = $result_position->fetch_assoc()) {
            $st_array[] = $row_users;
        }
    }
}
$sub_array["structures"] = $st_array;
//print_r($output);
echo  json_encode($sub_array);
?>

