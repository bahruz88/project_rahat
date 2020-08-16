<?php
include('session.php') ;
$data=array();

$sql_category="select * from $tbl_employee_category";
$result_position = $db->query($sql_category);
if($result_position){
    if ($result_position->num_rows > 0) {
        while($row_users = $result_position->fetch_assoc()) {
//            $zNodeArray["user"]=$row_users['user'];
//            $zNodeArray.array_push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});
            if(substr($row_users['code'],0,1)!="P"){
                $sub_array   = array();
                $id=$row_users['id'];
                $sub_array[] = $row_users['id'];
                $sub_array[] = ($row_users['parent']);
                $sub_array[] = ($row_users['category']);

                $sql_name="select tec.*,concat(te.lastname,' ', te.firstname) full_name,te.id emp_id 
                    from $tbl_employee_category tec
                    LEFT join $tbl_employees te on te.id=tec.emp_id where tec.parent='$id' and tec.position_level=2";
                $result_name = $db->query($sql_name);
                if($result_name){
                    if ($result_name->num_rows > 0) {
                        while($row_name = $result_name->fetch_assoc()) {
                            $sub_array[] = ($row_name['full_name']);
                        }
                    }else{
                        $sub_array[] = '';
                    }
                 }
                $sub_array[] = ($row_users['code']);
                $data[]     = $sub_array;
            }
        }

    }
}
echo json_encode($data);
?>