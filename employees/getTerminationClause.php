<?php
 include('../session.php');
$type_dismissal_id = $_POST['type_dismissal_id'];

$sql_termination_clause = "select  *
from $tbl_termination_clause  where  type_id='$type_dismissal_id'";
//echo $sql_termination_clause;
$result_termination_clause  = $db->query($sql_termination_clause);
$data = array();
if ($result_termination_clause ->num_rows > 0) {
    while($row_termination_clause  = $result_termination_clause ->fetch_assoc()) {
//        $sub_array   = array();
//        $sub_array[] = $row_termination_clause['id'];
//        $sub_array[] = $row_termination_clause['full_name'];
        $data[]     = $row_termination_clause;
    }
}
$row_count=$result_termination_clause->num_rows ;
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