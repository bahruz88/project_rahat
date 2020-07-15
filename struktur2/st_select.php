<?php
include('../session.php') ;
//if(isset($_POST['parent'])) {
//    $parent = $_POST['parent'];
//$childs= "select * from $tbl_employee_category where parent=$parent";
$childs= "select * from $tbl_employee_category";
$result_childs = $db->query($childs);

    $data = array();

if($result_childs){
    if ($result_childs->num_rows > 0) {
        while($row_childs = $result_childs->fetch_assoc()) {

            $sub_array   = array();
            $sub_array[] = $row_childs['id'];
            $sub_array[] = $row_childs['category'];
            $sub_array[] = $row_childs['parent'];
            $sub_array[] = $row_childs['create_date'];
            $sub_array[] = $row_childs['st_type'];

            $data[]     = $sub_array;//push edir

        }
    }
}


    $row_count=$result_childs->num_rows ;

    $draw=10;
//print_r($data);
    echo  json_encode($data);
//}

?>

