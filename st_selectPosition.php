<?php
include('session.php') ;
$id                 =$_POST['id'];
$data=array();

$sql_positions="select id, category,code,create_date,end_date, parent,icon
 from (select * from tbl_employee_category  order by parent, id) folders_sorted,
  (select @pv := $id) initialisation where find_in_set(parent, @pv) > 0 and @pv := concat(@pv, ',', id)";
$result_position = $db->query($sql_positions);
if($result_position){
    if ($result_position->num_rows > 0) {
        while($row_users = $result_position->fetch_assoc()) {
//            $zNodeArray["user"]=$row_users['user'];
//            $zNodeArray.array_push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});

            $sub_array   = array();
            $sub_array[] = $row_users['id'];
            $sub_array[] = ($row_users['category']);
            $sub_array[] = ($row_users['code']);
            $sub_array[] = $row_users['parent'];

            $sub_array[] = $row_users['create_date'];
            $sub_array[] = $row_users['end_date'];
            $sub_array[] = $row_users['icon'];
            $data[]     = $sub_array;

        }

    }
}
echo json_encode($data);
?>