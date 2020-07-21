<?php
$users= "select tec.*,concat(te.lastname,' ', te.firstname ,' ', te.surname) full_name,teco.company_name company,tsl.title struc,tpl.title posit
from $tbl_employee_category tec
LEFT join $tbl_employees te on te.id=tec.emp_id
LEFT join $tbl_employee_company teco on tec.company_id=teco.id
LEFT join $tbl_structure_level tsl on tsl.struc_id=tec.structure_level
LEFT join $tbl_position_level tpl on tpl.posit_id=tec.position_level";
$result_users = $db->query($users);
$user=[];
$parent=[];
$user_id=[];
$zNodeArray=[];
$data=array();
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
//            $zNodeArray["user"]=$row_users['user'];
//            $zNodeArray.array_push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});

            $sub_array   = array();
            $sub_array[] = $row_users['id'];
            $sub_array[] = utf8_encode($row_users['category']);
            $sub_array[] = $row_users['parent'];
            $sub_array[] = $row_users['create_date'];
            $sub_array[] = utf8_encode($row_users['code']);

            $sub_array[] = [];//children
            $sub_array[] = utf8_encode($row_users['full_name']);
            $sub_array[] = utf8_encode($row_users['company']);
            $sub_array[] = utf8_encode($row_users['struc']);
            $sub_array[] = utf8_encode($row_users['posit']);
            $data[]     = $sub_array;




        }

    }
}
$flatArray=$data;
//echo  json_encode($data);
unflattenArray($flatArray);
function createArray($arrC){
    $arrChil=array();
    foreach ($arrC as $arrCh)
    {
        $arrCh['id'] = $arrCh[0];
        $arrCh['title'] = $arrCh[1];
        $arrCh['pId'] = $arrCh[2];
        $arrCh['year'] = $arrCh[3];
        $arrCh['code'] = $arrCh[4];

        $arrCh['full_name'] = $arrCh[6];
        $arrCh['company'] = $arrCh[7];
        $arrCh['structure'] = $arrCh[8];
        $arrCh['posit'] = $arrCh[9];
        $arrCh['expanded'] = true;
        $arrCh['folder'] = true;
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

    //process all elements until nohting could be resolved.
    //then add remaining elements to the root one by one.
    while (count($flatArray) > 0) {
        for ($i = count($flatArray) - 1; $i >= 0; $i--) {
            if(in_array($flatArray[$i][2],$arrrId)){
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
    if (count($result) > 0) {
//        print_r(createArray($result));
        echo json_encode(createArray($result));
    }
}
?>