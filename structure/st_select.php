<?php

$site_lang=$_SESSION['dil'] ;
$users= "select tsp.*,tsr.role  
from $tbl_structure_positions tsp on tsp.lang='$site_lang'
 LEFT join $tbl_structure_roles tsr on tsr.id=tsp.role_id and tsr.lang='$site_lang'
 WHERE tsp.role_id != 0";
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
//        $arrCh['children'] = $arrCh[5];
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
            unset($arrCh[10]);
            unset($arrCh[11]);
            unset($arrCh[12]);
            unset($arrCh[13]);
            unset($arrCh[14]);
            unset($arrCh[15]);
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
                if ($flatArray[$i][2] == NULL || $flatArray[$i][2] == 0) {
                    //root element: set in result and ref!
                    $result[$flatArray[$i][0]] = $flatArray[$i];
                    $refs[$flatArray[$i][0]] = &$result[$flatArray[$i][0]];
                    unset($flatArray[$i]);
                    $flatArray = array_values($flatArray);
                } else if ($flatArray[$i][2] != NULL || $flatArray[$i][2] != 0) {
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