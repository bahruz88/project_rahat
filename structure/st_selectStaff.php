<?php
include('../session.php');
$site_lang=$_SESSION['dil'] ;
$company_id                 =$_POST['company_id'];
$data=array();
$category_company= "select tc.*,tec.*,tec.enterprise_head_fullname,tec.company_name,tec.address company_address,tec.tel company_tel 
from $tbl_employee_category tc
 LEFT join $tbl_employee_company tec on tec.id=tc.company_id
 WHERE tc.company_id = '$company_id'";
//echo $category_company;
$result_category_company = $db->query($category_company);
if($result_category_company->num_rows > 0) {
    while($row_category_company = $result_category_company->fetch_assoc()) {
        $sub_array1 = array();
        $sub_array1[] = $row_category_company['enterprise_head_fullname'];
        $sub_array1[] = $row_category_company['company_name'];
        $sub_array1[] = $row_category_company['company_address'];
        $sub_array1[] = $row_category_company['company_tel'];
        $sub_array1[] = $row_category_company['enterprise_head_position'];
        $data['bir'] = $sub_array1;
    }
}

/***/

$sql_positions="select id, category,code,create_date,end_date, parent,icon,emp_id,company_id
 from (select * from $tbl_employee_category  order by parent, id) folders_sorted,
  (select @pv := $id) initialisation where find_in_set(parent, @pv) > 0 and @pv := concat(@pv, ',', id)";

//$sql_positions= "select * from $tbl_employee_category WHERE parent = '$emp_id'";
//,enterprice_head_fullname,company_name,company_address,company_tel
$result_position = $db->query($sql_positions);
if($result_position){
    if ($result_position->num_rows > 0) {
        while($row_users = $result_position->fetch_assoc()) {

            $code=$row_users["code"];
            $emp_id=$row_users["emp_id"];


                    $sub_array = array();
                    $sub_array[] = $row_users['id'];
                    $sub_array[] = ($row_users['category']);
                    $sub_array[] = ($row_users['code']);

                    $sub_array[] = $row_users['parent'];

                    $sub_array[] = $row_users['create_date'];
                    $sub_array[] = $row_users['end_date'];
                    $sub_array[] = $row_users['icon'];




                    $structure_employees= "select * from $tbl_employees WHERE id = '$emp_id'";
                    $result_employees = $db->query($structure_employees);
                    if($result_employees->num_rows > 0) {
                        while($row_employees = $result_employees->fetch_assoc()) {
//                            $sub_array = array();
                            $sub_array[] = $row_employees['firstname'].' '.$row_employees['lastname'].' '.$row_employees['surname'];


                        }

                    }
                    $data[] = $sub_array;
                }

            }






}
//print_r($data);
$arrChil=array();
$arrb=$data["bir"];
$arrChil["enterprise_head_fullname"]=$arrb[0];
$arrChil["company_name"]=$arrb[1];
$arrChil["company_address"]=$arrb[2];
$arrChil["company_tel"]=$arrb[3];
$arrChil["enterprise_head_position"]=$arrb[4];
unset($data["bir"]);

foreach ($data as $arrC)
{
    $arrCh['id'] = $arrC[0];
    $arrCh['category'] = $arrC[1];
    $arrChil[]=$arrCh;
}
echo json_encode($arrChil);
?>