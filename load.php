<?php
include('session.php') ;
$data=array();

$sql_category="select tec.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from tbl_employee_category tec
LEFT join $tbl_employees te on te.id=tec.emp_id";
$result_position = $db->query($sql_category);
if($result_position){
    if ($result_position->num_rows > 0) {
        while($row_users = $result_position->fetch_assoc()) {
//            $zNodeArray["user"]=$row_users['user'];
//            $zNodeArray.array_push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});
            if(substr($row_users['code'],0,1)!="P"){
                $sub_array   = array();
                $sub_array[] = $row_users['id'];
                $sub_array[] = ($row_users['parent']);
                $sub_array[] = ($row_users['category']);
                $sub_array[] = ($row_users['full_name']);
                $sub_array[] = ($row_users['code']);
                $data[]     = $sub_array;
            }
        }

    }
}
echo json_encode($data);
?>