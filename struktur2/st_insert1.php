<?php


include('../session.php') ;

//Create variables

////$id                 =$_POST['id'];
$pId                = $_POST['pId'];
$name               = $_POST['name'];
$st_type           = $_POST['st_type'];


$sql = "INSERT INTO $tbl_employee_position( 
	 id, parent, title,st_type) 
	 VALUES (NULL, '$pId','$name','$st_type')";


if(!mysqli_query($db, $sql)) {
    echo "error" .mysqli_error($db);
}
else {
//    echo "success" ;
}

//Close connection
//mysqli_close($db);

$users= "select * from $tbl_employee_category";
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
            $sub_array[] = $row_users['category'];
            $sub_array[] = $row_users['parent'];
            $sub_array[] = $row_users['create_date'];
            $sub_array[] = $row_users['st_type'];
            $sub_array[] = [];
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
        $arrCh['st_type'] = $arrCh[3];
        $arrCh['year'] = $arrCh[4];
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
//print_r($arrrId);
//echo "<br/>";
//print_r($arrrId);
//    for($j = 0; $j < count($flatArray); $j++){
//        if(in_array($flatArray[$j][2],$arrrId)){
//            echo "<br/>";
//            echo $flatArray[$j][2];
//        }
//    }
    //process all elements until nohting could be resolved.
    //then add remaining elements to the root one by one.
    while (count($flatArray) > 0) {
        for ($i = count($flatArray) - 1; $i >= 0; $i--) {
            if(in_array($flatArray[$i][2],$arrrId)){
//                            echo "<br/>";
//            echo $flatArray[$i][0];

//
                if ($flatArray[$i][2] == 0) {
                    //root element: set in result and ref!
                    $result[$flatArray[$i][0]] = $flatArray[$i];
                    $refs[$flatArray[$i][0]] = &$result[$flatArray[$i][0]];
                    unset($flatArray[$i]);
                    $flatArray = array_values($flatArray);
                } else if ($flatArray[$i][2] != 0) {
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
         echo json_encode(createArray($result));
    }
}
?>