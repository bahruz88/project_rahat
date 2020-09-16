<?php
include('../session.php');

$sql_minfo = "SELECT twe.*, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name
  FROM $tbl_work_experience twe
 LEFT join $tbl_employees te on twe.emp_id=te.id where twe.status=1 and te.emp_status=1";



$result_minfo  = $db->query($sql_minfo);
$data = array();
if ($result_minfo ->num_rows > 0) {
    // output data of each row
    while($row_minfo  = $result_minfo ->fetch_assoc()) {
        if  ($row_minfo ['status']==1 )
        {
            $row_minfo ['status']='active'	;

        }
        else {
            $row_minfo ['status']='deactive';
        }
         $w1=explode(",",$row_minfo['work_experience_before_enterprise']);
        $r1='';
        $r1.=$w1[0].$dil["year"]." ";
        $r1.=$w1[1].$dil["month"]." ";
        $r1.=$w1[2].$dil["day"]." ";

        $w2=explode(",",$row_minfo['work_experience_enterprise']);
        $r2='';
        $r2.=$w2[0].$dil["year"]." ";
        $r2.=$w2[1].$dil["month"]." ";
        $r2.=$w2[2].$dil["day"]." ";

        $w3=explode(",",$row_minfo['general_work_experience']);
        $r3='';
        $r3.=$w3[0].$dil["year"]." ";
        $r3.=$w3[1].$dil["month"]." ";
        $r3.=$w3[2].$dil["day"]." ";



        $sub_array   = array();
        $sub_array[] = $row_minfo['id'];
        $sub_array[] = $row_minfo['full_name'];
        $sub_array[] = $r1;
        $sub_array[] = $r2;
        $sub_array[] = $r3;

 //        $sub_array[] = $row_minfo['insert_date'];
        $data[]     = $sub_array;
    }
}


$row_count=$result_minfo->num_rows ;

$draw=10;

$output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);
//print_r($output);
echo  json_encode($output);
?>

