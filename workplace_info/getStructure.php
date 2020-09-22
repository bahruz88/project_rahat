<?php
include('../session.php');
$site_lang=$_SESSION['dil'] ;
$stid = $_POST['stid'];
$st_array   = array();

$sql_positions="select id,structure_level,position_level, category,code,create_date,end_date, parent,icon,emp_id from
(select * from tbl_category order by parent, id) folders_sorted, (select @pv := $stid) initialisation
 where find_in_set(parent, @pv) > 0 and @pv := concat(@pv, ',', id)";
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

