<?php
//include('session.php') ;
if(isset($_POST['company_ids'])){
    $company_id= $_POST['company_ids'];
}else{
    $company_id=$_POST['company_id'];
}

//echo $company_id;
$haystack = $company_id;
$needle = ',';

//if (strpos($haystack,$needle) !== false) {
//    echo "$haystack contains $needle";
//}

 if(isset($_POST["st"])){
     $company_id=(int)$company_id;

     $company_idWhere=" tec.company_id='$company_id' ";
     $search=",";
     if (strpos($haystack,$needle) !== false) {
     //     if (preg_match("/{$search}/i", $company_id)) {

         $company_idArr = explode(",", $haystack);
          if (count($company_idArr) > 1) {
             $company_idWhere = " tec.company_id=$company_idArr[1] ";
             for ($i = 2; $i < count($company_idArr); $i++) {
                 $company_idWhere .= " or tec.company_id=$company_idArr[$i] ";
//                 echo $company_idWhere;
             }
         }
     }

 }else {
         $company_idWhere = " tec.company_id='$company_id' ";
 }


$users= "select tec.*,COUNT(tec.category) countCategory,concat(tsi.wage,' ', tcu.title) wage,tsi.wage wageN, concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,teco.company_name company,teco.enterprise_head_fullname,teco.enterprise_head_position,teco.address company_address,teco.tel company_tel,tsl.title struc,tsl.struc_id struc_id,tpl.posit_id posit_id,tpl.title posit,tpl.posit_icon 
from $tbl_employee_category tec 
LEFT join $tbl_employees te on te.id=tec.emp_id 
LEFT join $tbl_salary_info tsi on tsi.emp_id=tec.emp_id and tsi.company_id=tec.company_id
LEFT join $tbl_currency tcu on tcu.id=tsi.wage_currency
LEFT join $tbl_employee_company teco on tec.company_id=teco.id
LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level and tsl.lang='$site_lang'
LEFT join $tbl_position_level tpl on tpl.posit_id=tec.position_level and tpl.lang='$site_lang'
where $company_idWhere GROUP BY
 category,parent,company_id,wage,wageN,
  full_name,company,enterprise_head_fullname,
  enterprise_head_position,company_address,
  company_tel,struc,struc_id,posit_id,posit,posit_icon 
  ORDER BY tec.id DESC";
// echo $users;
$result_users = $db->query($users);
$data=array();
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
//            $zNodeArray["user"]=$row_users['user'];
//            $zNodeArray.array_push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});

            $sub_array   = array();
            $sub_array[] = $row_users['id'];
            $sub_array[] = ($row_users['category']);
            $sub_array[] = $row_users['parent'];
            $sub_array[] = $row_users['create_date'];
            $sub_array[] = $row_users['end_date'];


            $sub_array[] = [];//children
            $sub_array[] = ($row_users['code']);
            $sub_array[] = ($row_users['full_name']);
            $sub_array[] = ($row_users['company']);
            $sub_array[] = ($row_users['struc']);
            $sub_array[] = ($row_users['posit']);
            $sub_array[] = ($row_users['struc_id']);
            $sub_array[] = ($row_users['posit_id']);
            $sub_array[] = ($row_users['emp_id']);
            $sub_array[] = $row_users['icon'];
            $sub_array[] = $row_users['posit_icon'];
            $sub_array[] = $row_users['company_id'];
            if (strpos($haystack,$needle) !== false) {
                $sub_array[] = substr($haystack, 2);
            }else{
                $sub_array[] = $haystack;
            }
            $sub_array[] = $row_users['enterprise_head_fullname'];
            $sub_array[] = $row_users['enterprise_head_position'];
            $sub_array[] = $row_users['company_address'];
            $sub_array[] = $row_users['company_tel'];
            $sub_array[] = $row_users['countCategory'];
            $sub_array[] = $row_users['wage'];
            $sub_array[] = $row_users['wageN'];
            $data[]     = $sub_array;
        }
    }
}


$flatArray=$data;
//echo  json_encode($data);
//print_r($flatArray);
unflattenArray($flatArray);
function createArray($arrC){
    $arrChil=array();
    foreach ($arrC as $arrCh)
    {
        $arrCh['id'] = $arrCh[0];
        $arrCh['title'] = $arrCh[1];
        $arrCh['pId'] = $arrCh[2];
        $arrCh['create_date'] = $arrCh[3];
        $arrCh['end_date'] = $arrCh[4];
        $arrCh['code'] = $arrCh[6];
        $arrCh['full_name'] = $arrCh[7];
        $arrCh['company'] = $arrCh[8];
        $arrCh['structure'] = $arrCh[9];
        $arrCh['posit'] = $arrCh[10];
        $arrCh['struc_id'] = $arrCh[11];
        $arrCh['posit_id'] = $arrCh[12];
        $arrCh['emp_id'] = $arrCh[13];
        $arrCh['icon'] = $arrCh[14];
        $arrCh['posit_icon'] = $arrCh[15];
        $arrCh['company_id'] = $arrCh[16];
        $arrCh['company_ids'] = $arrCh[17];
        $arrCh['enterprise_head_fullname'] = $arrCh[18];
        $arrCh['enterprise_head_position'] = $arrCh[19];
        $arrCh['company_address'] = $arrCh[20];
        $arrCh['company_tel'] = $arrCh[21];
        $arrCh['countCategory'] = $arrCh[22];
        $arrCh['wage'] = $arrCh[23];
        $arrCh['wageN'] = $arrCh[24];
//        $arrCh['children'] = $arrCh[5];
        $arrCh['expanded'] = true;
        if(substr($arrCh[6],0,1)=="P"){
            $arrCh['folder'] = false;
        }else{
            $arrCh['folder'] = true;
        }

        if(count($arrCh[5])>0){

            $arrCh['children'] = createArray($arrCh[5]);
            unset($arrCh[0]);
            unset($arrCh[1]);
            unset($arrCh[2]);
            unset($arrCh[3]);
            unset($arrCh[4]);
            unset($arrCh[5]);
            unset($arrCh[6]);
            unset($arrCh[7]);
            unset($arrCh[8]);
            unset($arrCh[9]);
            unset($arrCh[10]);
            unset($arrCh[11]);
            unset($arrCh[12]);
            unset($arrCh[13]);
            unset($arrCh[14]);
            unset($arrCh[15]);
            unset($arrCh[16]);
            unset($arrCh[17]);
            unset($arrCh[18]);
            unset($arrCh[19]);
            unset($arrCh[20]);
            unset($arrCh[21]);
            unset($arrCh[22]);
            unset($arrCh[23]);
            unset($arrCh[24]);
        }
        $arrChil[]=$arrCh;
    }
    return $arrChil;
    //  echo json_encode($arrChil);
}
function unflattenArray($flatArray)
{

    $refs = array(); //for setting children without having to search the parents in the result tree.
    $result = array();
    $arrrId = array();
    $arrrPId = array();
    $arrrId[]=0;
    for ($j = 0; $j < count($flatArray); $j++) {
        $arrrId[]=$flatArray[$j][0];
        $arrrPId[]=$flatArray[$j][2];
    }
//echo " arrrId=";
//    print_r($arrrId);
    //process all elements until nohting could be resolved.
    //then add remaining elements to the root one by one.
    while (count($flatArray) > 0) {
        for ($i = count($flatArray) - 1; $i >= 0; $i--) {
            if(count($arrrId) > 0){
                if(in_array($flatArray[$i][2],$arrrId)){
//                    echo " flatArray[$i][2]=".$flatArray[$i][2];
                    if ($flatArray[$i][2] == NULL) {
                        //root element: set in result and ref!
                        $result[$flatArray[$i][0]] = $flatArray[$i];
                        $refs[$flatArray[$i][0]] = &$result[$flatArray[$i][0]];
                        unset($flatArray[$i]);
                        $flatArray = array_values($flatArray);
                    } else if ($flatArray[$i][2] != NULL) {
                        //no root element. Push to the referenced parent, and add to references as well.
                        if (array_key_exists($flatArray[$i][2], $refs)) {
                            //parent found
                            $o = $flatArray[$i];
                            $refs[$flatArray[$i][0]] = $o;
                            $refs[$flatArray[$i][2]][5][] = &$refs[$flatArray[$i][0]];
                            unset($flatArray[$i]);
                            $flatArray = array_values($flatArray);


                        }
                    }
                }else {
                    unset($flatArray[$i]);
                    $flatArray = array_values($flatArray);
                }
            }

        }
    }
    if (count($result) > 0) {
//        $yoxlaArray=createArray($result);
//        if (strpos($haystack,$needle) !== false) {
//            $sub_array[] = substr($haystack, 2);
//        }
//        print_r(createArray($result));
        echo json_encode(createArray($result));
    }
}
?>