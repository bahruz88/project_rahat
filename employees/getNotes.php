<?php
 include('../session.php');
$termination_id = $_POST['termination_id'];

$sql_notes = "select  *
from $tbl_notes  where  termination_id='$termination_id'";
//echo $sql_notes;
$result_notes  = $db->query($sql_notes);
$data = array();
if ($result_notes ->num_rows > 0) {
    while($row_notes  = $result_notes ->fetch_assoc()) {
//        $sub_array   = array();
//        $sub_array[] = $row_notes['id'];
//        $sub_array[] = $row_notes['full_name'];
        $data[]     = $row_notes;
    }
}
$row_count=$result_notes->num_rows ;
	 $draw=10;
	 /*$_POST['draw']*/ 
	 
//	 $output = array(
////    'draw' => intval($draw),
////    'recordsTotal' =>$row_count,
////    'recordsFiltered' => $row_count,
//    'data' => $data
//);

echo json_encode($data);
?>