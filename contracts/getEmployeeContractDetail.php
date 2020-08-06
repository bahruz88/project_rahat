<?php
 include('../session.php');  
 $empid = $_POST['empid'];
$order = $_POST['order'];
$data = array();
if($order!=""){
    $sql_emp_contracts = "select * from $tbl_contracts 
  where  emp_id='$empid' $order";
}else{
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

    $sql_emp_contracts ="select * from $tbl_contracts 
  where  emp_id='$empid' and id!='$id1' and id!='$id2'";
//    echo $sql_emp_contracts;
}


//echo $sql_emp_contracts;
$result_emp_contracts = $db->query($sql_emp_contracts);

if ($result_emp_contracts->num_rows > 0)
{
    $row_emp_contracts = $result_emp_contracts->fetch_assoc();
    $data[]  = $row_emp_contracts;
}else {
    $sql_emp = "select e.* ,e.company_id company_id,
 DATE_FORMAT(e.birth_date,'%d/%m/%Y') birth_date_u, DATE_FORMAT(e.passport_date,'%d/%m/%Y') passport_date_u,DATE_FORMAT(e.passport_end_date,'%d/%m/%Y') passport_end_date_u, concat(e.lastname,' ', e.firstname ,' ', e.surname) full_name,
 tec.company_name,tec.voen,tec.sun,tec.enterprise_head_position,tec.enterprise_head_fullname,
 te.qualification_id ,te.profession,te.institution_id, 
 tqd.qualification ,tu.uni_name,
 tc.create_date ,tc.structure_level,
 tsl.title structure,
 tmi.military_reg_group ,tmi.military_reg_category ,tmi.military_staff ,tmi.military_rank,tmi.military_specialty_acc,tmi.military_fitness_service,tmi.military_registration_service,tmi.military_registration_date,tmi.military_general,tmi.military_special,tmi.military_no_official,tmi.military_additional_information,tmi.military_date_completion,
 tmr.rank_desc ,tms.staff_desc
from $tbl_employees e
LEFT join $tbl_employee_company tec on tec.id=company_id
LEFT join $tbl_education te on te.emp_id='$empid'
LEFT join $tbl_qualification_dic tqd on tqd.id=te.qualification_id
LEFT join $tbl_universities tu on tu.id=te.institution_id
LEFT join $tbl_employee_category tc on tc.emp_id='$empid'
LEFT join $tbl_structure_level tsl on tsl.struc_id=tc.structure_level
LEFT join $tbl_military_information tmi on tmi.emp_id='$empid'
LEFT join $tbl_military_staff tms on tms.staff_id=tmi.military_staff
LEFT join $tbl_military_rank tmr on tmr.rank_id=tmi.military_rank
  where  e.id='$empid'";


    /***/

    $id='';
    $parent='';
    $i=5;
    $result = $db->query($sql_emp);
    if($result){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id=$row["id"];
//            $parent=$row["parent"];
            }
        }
    }

    $sql_parent="select * from $tbl_employee_category WHERE emp_id = '$id'";

//   echo $sql_parents;
    $result_parent = $db->query($sql_parent);
    if($result_parent){
        if ($result_parent->num_rows > 0) {
            while($row_parent = $result_parent->fetch_assoc()) {
                $parent =$row_parent["parent"];
//            $parent =$row_parents["structure_level"];
                while($parent!=''){
                    $sql_parents="select tec.*, tsl.title structure from $tbl_employee_category  tec
                    LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
                     WHERE tec.id = '$parent'";
//                    echo $sql_parents;
                    $result_parents = $db->query($sql_parents);
                    if($result_parents){
                        if ($result_parents->num_rows > 0) {
                            while($row_parents = $result_parents->fetch_assoc()) {

                                $parent = $row_parents["parent"];
                                if($row_parents["structure_level"]!=1){

                                    $data['structure_level'.$i]  = $row_parents["structure"];
                                    $data['category'.$i]  = $row_parents["category"];

                                }$i--;

//                                $data[] =$row_parents["structure_level"];
                            }
                        }

                    }
                }



            }

        }
    }

    /**/

    $result_emp = $db->query($sql_emp);

    if ($result_emp->num_rows > 0)
    {

        $row_emp = $result_emp->fetch_assoc();
        $data[]  = $row_emp;
        /***/
//        print_r($data);
        $structure1= '';
        $structure2= '';
        $structure3= '';
        $structure4= '';
        $structure5= '';

        $emp_id=$empid;
        $full_name=$data[0]['full_name'];
        $citizenship= $data[0]['citizenship'];
        $passport_seria_number= $data[0]['passport_seria_number'];
        $pincode= $data[0]['pincode'];
        $passport_date= $data[0]['passport_date'];
        $pass_given_authority= $data[0]['pass_given_authority'];
        $company_name= $data[0]['company_name'];
        $voen= $data[0]['voen'];
        $sun= $data[0]['sun'];
        $enterprise_head_position= $data[0]['enterprise_head_position'];
        $enterprise_head_fullname= $data[0]['enterprise_head_fullname'];
        $qualification= $data[0]['qualification'];
        $uni_name= $data[0]['uni_name'];
        $profession= $data[0]['profession'];
        $create_date= $data[0]['create_date'];
        if(isset($data['category1'])){
            $structure1= $data['category1'];
        }
        if(isset($data['category2'])){
            $structure2= $data['category2'];
        }
        if(isset($data['category3'])){
            $structure3= $data['category3'];
        }
        if(isset($data['category4'])){
            $structure4= $data['category4'];
        }
        if(isset($data['category5'])){
            $structure5= $data['category5'];
        }


        $lastname= $data[0]['lastname'];
        $firstname= $data[0]['firstname'];
        $surname= $data[0]['surname'];
        $birth_date= $data[0]['birth_date'];
        $birth_place= $data[0]['birth_place'];
        $marital_status= $data[0]['marital_status'];
        $mob_tel= $data[0]['mob_tel'];
        $living_address= $data[0]['living_address'];

        $military_reg_group= $data[0]['military_reg_group'];
        $military_reg_category= $data[0]['military_reg_category'];
        $military_staff= $data[0]['military_staff'];
        $military_rank= $data[0]['military_rank'];
        $military_specialty_acc= $data[0]['military_specialty_acc'];
        $military_fitness_service= $data[0]['military_fitness_service'];
        $military_registration_service= $data[0]['military_registration_service'];
        $military_registration_date= $data[0]['military_registration_date'];
        $military_general= $data[0]['military_general'];
        $military_special= $data[0]['military_special'];
        $military_no_official= $data[0]['military_no_official'];
        $military_additional_information= $data[0]['military_additional_information'];
        $military_date_completion= $data[0]['military_date_completion'];

        $passport_date = strtr($passport_date, '/', '-');
        $passport_date= date('Y-m-d', strtotime($passport_date));

        $create_date = strtr($create_date, '/', '-');
        $create_date= date('Y-m-d', strtotime($create_date));

        $birth_date = strtr($birth_date, '/', '-');
        $birth_date= date('Y-m-d', strtotime($birth_date));

        $military_registration_date = strtr($military_registration_date, '/', '-');
        $military_registration_date= date('Y-m-d', strtotime($military_registration_date));

        $military_date_completion = strtr($military_date_completion, '/', '-');
        $military_date_completion= date('Y-m-d', strtotime($military_date_completion));
        $insert_date= date("Y-m-d h:i:sa") ;

        $sql = "INSERT INTO $tbl_contracts (id,emp_id,company_name,full_name,citizenship,passport_seria_number, pincode,
passport_date,pass_given_authority,voen,sun,enterprise_head_position,enterprise_head_fullname,qualification,uni_name,profession,
create_date,structure1,structure2,structure3,structure4,structure5,lastname,firstname,surname,birth_date,birth_place,marital_status,mob_tel,living_address,military_reg_group,military_reg_category
,military_staff,military_rank,military_specialty_acc,military_fitness_service,military_registration_service,military_registration_date,military_general,military_special,military_no_official,military_additional_information,military_date_completion,insert_date) 
    VALUES ('Null','$emp_id','$company_name','$full_name','$citizenship','$passport_seria_number','$pincode','$
    passport_date','$pass_given_authority','$voen','$sun','$enterprise_head_position','$enterprise_head_fullname','$qualification','$uni_name','$profession','$
    create_date','$structure1','$structure2','$structure3','$structure4','$structure5','$lastname','$firstname','$surname','$birth_date','$birth_place','$marital_status','$mob_tel','$living_address','$military_reg_group','$military_reg_category
    ','$military_staff','$military_rank','$military_specialty_acc','$military_fitness_service','$military_registration_service','$military_registration_date','$military_general','$military_special','$military_no_official','$military_additional_information','$military_date_completion','$insert_date')";


        if(!mysqli_query($db, $sql)) {
            echo "error" .mysqli_error($db);
        }
        else {
//            echo "success".$sql;
        }

        /**/



    }
}




//echo $sql_emp;
echo json_encode($data);
?>