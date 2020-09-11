<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;
 $empid = $_POST['empid'];


$contractDate ='3';
$order="";
if (isset($_POST['contractDate']))
{
    $contractDate = $_POST['contractDate'];
    $order = $_POST['order'];
}
$id1=0;
$id2=0;
$company_name_2= '';
$voen_2= '';
$enterprise_head_position_2= '';
$enterprise_head_fullname_2= '';
$profession_2= '';
$create_date_2= '';
$structure1_2= '';

$structure2_2= '';

$structure3_2= '';

$structure4_2= '';

$structure5_2= '';

$data = array();
$data2 = array();
if($order=="" && $contractDate==''){
    $sql_emp_contracts = "select tc.*,te.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_contracts tc
LEFT join $tbl_employees te on te.id=tc.emp_id   
  where  tc.emp_id='$empid' ";
}else
if($order!="" && $contractDate=='1'){
    $sql_emp_contracts = "select tc.*,te.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_contracts tc
LEFT join $tbl_employees te on te.id=tc.emp_id       
  
  where  tc.emp_id='$empid' $order";
}else if($order!="" && $contractDate=='2'){
    $sql_emp_contracts = "select tc.*,te.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id 
from $tbl_contracts tc
LEFT join $tbl_employees te on te.id=tc.emp_id    

  where  tc.emp_id='$empid' $order";

    $result_emp_contracts = $db->query($sql_emp_contracts);
    $row_emp_contracts = $result_emp_contracts->fetch_assoc();
    $data2[]  = $row_emp_contracts;

            $company_name_2= $data2[0]['company_name'];
            $voen_2= $data2[0]['voen'];
            $enterprise_head_position_2= $data2[0]['enterprise_head_position'];
            $enterprise_head_fullname_2= $data2[0]['enterprise_head_fullname'];
            $profession_2= $data2[0]['profession'];
            $create_date_2= $data2[0]['create_date'];
            $structure1_2= $data2[0]['structure1'];

            $structure2_2= $data2[0]['structure2'];

            $structure3_2= $data2[0]['structure3'];

            $structure4_2= $data2[0]['structure4'];

            $structure5_2= $data2[0]['structure5'];

}
else{

    $sql_id1 = "select id from $tbl_contracts 
  where  emp_id='$empid' ORDER BY id ASC LIMIT 1";
    $result = $db->query($sql_id1);
    if($result){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id1 = $row["id"];
            }
        }
    }
    $sql_id2 = "select id from $tbl_contracts 

  where  emp_id='$empid' ORDER BY id DESC LIMIT 1";
    $result2 = $db->query($sql_id2);
    if($result2){
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $id2 = $row2["id"];
            }
        }
    }
if($id1==0 || $id2==0){
    $sql_emp_contracts ="select tc.*,te.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_contracts tc
LEFT join $tbl_employees te on te.id=tc.emp_id
  where  tc.emp_id='$empid'";
}else{
    $sql_emp_contracts ="select tc.*,te.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,te.id emp_id
 from $tbl_contracts tc
LEFT join $tbl_employees te on te.id=tc.emp_id
  where  tc.emp_id='$empid' and tc.id!='$id1' and tc.id!='$id2'";
}

}


//echo $sql_emp_contracts;
$result_emp_contracts = $db->query($sql_emp_contracts);
//eger tbl_contract cedvelinde verilen varsa ordan serte uygun secir
if ($result_emp_contracts->num_rows > 0 && $contractDate!='2')
{
    while ($row_emp_contracts = $result_emp_contracts->fetch_assoc()) {

        $data[] = $row_emp_contracts;
        $emp_id=$row_emp_contracts['emp_id'];

    $sql_member_types ="select tefi.*,tefi.id famId,tfmt.type_desc memberType
     from $tbl_employee_family_info tefi     
    LEFT join $tbl_family_member_types tfmt on tfmt.id=tefi.member_type   and tfmt.lang='$site_lang'  
    where  tefi.emp_id='$emp_id' ";
//    echo $sql_member_types;
        $result_member_types = $db->query($sql_member_types);
        if ($result_member_types->num_rows > 0 ) {
             while ($row_member_types = $result_member_types->fetch_assoc()) {
                $data[] = $row_member_types;
            }
        }
    }
}
//else {
//    //eger tbl_contract cedvelinde verilen yoxdursa umumi bazadan secib getirir ve tbl_contract cedveline de yazir
//    $sql_emp = "select e.* ,concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name,e.company_id company_id,
// tec.company_name,tec.address company_address,tec.tel company_tel,tec.voen,tec.sun,tec.enterprise_head_position,tec.enterprise_head_fullname,
// te.qualification_id ,te.profession,te.institution_id,
// tqd.qualification ,tu.uni_name,
// tc.create_date ,tc.structure_level,
// tsl.title structure,
// tmi.military_reg_group ,tmi.military_reg_category ,tmi.military_staff ,tmi.military_rank,tmi.military_specialty_acc,tmi.military_fitness_service,tmi.military_registration_service,tmi.military_registration_date,tmi.military_general,tmi.military_special,tmi.military_no_official,tmi.military_additional_information,tmi.military_date_completion,
// tmr.rank_desc ,tms.staff_desc
//from $tbl_employees e
//LEFT join $tbl_employee_company tec on tec.id=company_id
//LEFT join $tbl_education te on te.emp_id='$empid'
//LEFT join $tbl_qualification_dic tqd on tqd.id=te.qualification_id
//LEFT join $tbl_universities tu on tu.id=te.institution_id
//LEFT join $tbl_employee_category tc on tc.emp_id='$empid'
//LEFT join $tbl_structure_level tsl on tsl.struc_id=tc.structure_level
//LEFT join $tbl_military_information tmi on tmi.emp_id='$empid'
//LEFT join $tbl_military_staff tms on tms.staff_id=tmi.military_staff
//LEFT join $tbl_military_rank tmr on tmr.rank_id=tmi.military_rank
//  where  e.id='$empid'";
//
//
//    /***/
//
//    $id='';
//    $parent='';
//    $i=5;
//    $result = $db->query($sql_emp);
//    if($result){
//        if ($result->num_rows > 0) {
//            while ($row = $result->fetch_assoc()) {
//                $id=$row["id"];
////            $parent=$row["parent"];
//            }
//        }
//    }
//
//    $sql_parent="select * from $tbl_employee_category WHERE emp_id = '$id'";
//
////   echo $sql_parents;
//    $result_parent = $db->query($sql_parent);
//    if($result_parent){
//        if ($result_parent->num_rows > 0) {
//            while($row_parent = $result_parent->fetch_assoc()) {
//                $parent =$row_parent["parent"];
////            $parent =$row_parents["structure_level"];
//                while($parent!=''){
//                    $sql_parents="select tec.*, tsl.title structure from $tbl_employee_category  tec
//                    LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
//                     WHERE tec.id = '$parent'";
////                    echo $sql_parents;
//                    $result_parents = $db->query($sql_parents);
//                    if($result_parents){
//                        if ($result_parents->num_rows > 0) {
//                            while($row_parents = $result_parents->fetch_assoc()) {
//
//                                $parent = $row_parents["parent"];
//                                if($row_parents["structure_level"]!=1){
//
//                                    $data['structure_level'.$i]  = $row_parents["structure"];
//                                    $data['category'.$i]  = $row_parents["category"];
//
//                                }$i--;
//
////                                $data[] =$row_parents["structure_level"];
//                            }
//                        }
//
//                    }
//                }
//
//
//
//            }
//
//        }
//    }
//
//    /**/
//
//    $result_emp = $db->query($sql_emp);
//
//    if ($result_emp->num_rows > 0)
//    {
//
//        $row_emp = $result_emp->fetch_assoc();
//        $data[]  = $row_emp;
//
//        /***/
////        print_r($data);
//        $structure1= '';
//        $structure2= '';
//        $structure3= '';
//        $structure4= '';
//        $structure5= '';
//
//        $emp_id=$empid;
//
//        $company_name= $data[0]['company_name'];
//        $voen= $data[0]['voen'];
//        $sun= $data[0]['sun'];
//        $enterprise_head_position= $data[0]['enterprise_head_position'];
//        $enterprise_head_fullname= $data[0]['enterprise_head_fullname'];
//        $qualification= $data[0]['qualification'];
//        $uni_name= $data[0]['uni_name'];
//        $profession= $data[0]['profession'];
//        $create_date= $data[0]['create_date'];
//        if(isset($data['category1'])){
//            $structure1= $data['category1'];
//        }
//        if(isset($data['category2'])){
//            $structure2= $data['category2'];
//        }
//        if(isset($data['category3'])){
//            $structure3= $data['category3'];
//        }
//        if(isset($data['category4'])){
//            $structure4= $data['category4'];
//        }
//        if(isset($data['category5'])){
//            $structure5= $data['category5'];
//        }
//
//
//
//        $military_reg_group= $data[0]['military_reg_group'];
//        $military_reg_category= $data[0]['military_reg_category'];
//        $military_staff= $data[0]['military_staff'];
//        $military_rank= $data[0]['military_rank'];
//        $military_specialty_acc= $data[0]['military_specialty_acc'];
//        $military_fitness_service= $data[0]['military_fitness_service'];
//        $military_registration_service= $data[0]['military_registration_service'];
//        $military_registration_date= $data[0]['military_registration_date'];
//        $military_general= $data[0]['military_general'];
//        $military_special= $data[0]['military_special'];
//        $military_no_official= $data[0]['military_no_official'];
//        $military_additional_information= $data[0]['military_additional_information'];
//        $military_date_completion= $data[0]['military_date_completion'];
//
////        $passport_date = strtr($passport_date, '/', '-');
////        $passport_date= date('Y-m-d', strtotime($passport_date));
//
//        $create_date = strtr($create_date, '/', '-');
//        $create_date= date('Y-m-d', strtotime($create_date));
//
//        $military_registration_date = strtr($military_registration_date, '/', '-');
//        $military_registration_date= date('Y-m-d', strtotime($military_registration_date));
//
//        $military_date_completion = strtr($military_date_completion, '/', '-');
//        $military_date_completion= date('Y-m-d', strtotime($military_date_completion));
//        $insert_date= date("Y-m-d h:i:sa") ;
//        if($structure5!=$structure5_2 ||
//            $structure4!=$structure4_2 ||
//            $structure3!=$structure3_2 ||
//            $structure2!=$structure2_2 ||
//            $structure1!=$structure1_2 ||
//            $create_date!=$create_date_2 ||
//            $profession!=$profession_2 ||
//            $enterprise_head_fullname!=$enterprise_head_fullname_2 ||
//            $enterprise_head_position!=$enterprise_head_position_2 ||
//            $voen!=$voen_2 ||
//            $company_name!=$company_name_2
//        ){
//            $sql = "INSERT INTO $tbl_contracts (id,emp_id,company_name,
//voen,sun,enterprise_head_position,enterprise_head_fullname,qualification,uni_name,profession,
//create_date,structure1,structure2,structure3,structure4,structure5,military_reg_group,military_reg_category
//,military_staff,military_rank,military_specialty_acc,military_fitness_service,military_registration_service,military_registration_date,military_general,military_special,military_no_official,military_additional_information,military_date_completion,insert_date)
//    VALUES ('Null','$emp_id','$company_name','$voen','$sun','$enterprise_head_position','$enterprise_head_fullname','$qualification','$uni_name','$profession','$create_date','$structure1','$structure2','$structure3','$structure4','$structure5','$military_reg_group','$military_reg_category
//    ','$military_staff','$military_rank','$military_specialty_acc','$military_fitness_service','$military_registration_service','$military_registration_date','$military_general','$military_special','$military_no_official','$military_additional_information','$military_date_completion','$insert_date')";
//
//
//            if(!mysqli_query($db, $sql)) {
//                echo "error" .mysqli_error($db);
//            }
//            else {
////            echo "success".$sql;
//            }
//        }else{
////            echo "eynidir";
//        }
//
//
//
//
//    }
//}




//echo $sql_emp;
echo json_encode($data);
?>