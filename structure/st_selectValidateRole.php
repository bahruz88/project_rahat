<?php
include('../session.php');
 $role_id                 =$_POST['role_id'];
 $company_id              =$_POST['company_id'];
$data=array();



$structure_positions= "select  *   from $tbl_structure_positions  
  WHERE role_id = '$role_id' and company_id = '$company_id'";
//         echo $structure_positions;
            $result_structure_positions = $db->query($structure_positions);
            if($result_structure_positions->num_rows > 0) {
                while($row_structure_positions = $result_structure_positions->fetch_assoc()) {

                    $data[] = $row_structure_positions;
                }

            }




//print_r($data);
echo json_encode($data);

?>