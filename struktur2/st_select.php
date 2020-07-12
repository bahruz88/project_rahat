<?php
include('../session.php') ;
//if(isset($_POST['parent'])) {
    $parent = $_POST['parent'];
$childs= "select * from $tbl_employee_category where parent=$parent";
$result_childs = $db->query($childs);
$childuser = [];
$childparent = [];
$childuser_id= [];
    $data = array();

if($result_childs){
    if ($result_childs->num_rows > 0) {
        while($row_childs = $result_childs->fetch_assoc()) {
//            array_push($childuser, $row_childs['category']);
//            array_push($childparent, $row_childs['parent']);
//            array_push($childuser_id, $row_childs['id']);
////            $data[] = array_merge($childuser, $childparent,$childuser_id);
//            $data[] = $childuser;

            $sub_array   = array();
            $sub_array[] = $row_childs['id'];
            $sub_array[] = $row_childs['category'];
            $sub_array[] = $row_childs['parent'];
            $data[]     = $sub_array;
        }
    }
}
//$zNodeArray=[];
//    for($j=0;$j<count($childuser);$j++){
//        zNodeArray.push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});
//
//    }

//$childuser = implode(",", $childuser);
//$childparent = implode(",", $childparent);
//$childuser_id = implode(",", $childuser_id);

    $row_count=$result_childs->num_rows ;

    $draw=10;
//
//    $output = array(
////        'draw' => intval($draw),
////        'recordsTotal' =>$row_count,
////        'recordsFiltered' => $row_count,
//        'data' => $sub_array
//    );
//print_r($output);
    echo  json_encode($data);
//}

?>

