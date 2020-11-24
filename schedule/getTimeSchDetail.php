<?php
 include('../session.php');  
 
 $schid = $_POST['schid'];
 
$sql_sch = "SELECT sch.* 
FROM  $tbl_schedules_additional sch where sch.status=1 and   sch.schid='$schid'";
  $result_sch= $db->query($sql_sch);
 $data = array();
if ($result_sch->num_rows > 0) 
{
 $row_sch = $result_sch->fetch_assoc();
 $data = $row_sch;
}
echo json_encode($data);
?>