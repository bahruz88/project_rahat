<?php


include('../session.php') ;

//Create variables

////$id                 =$_POST['id'];
$pId                = $_POST['pId'];
//$isParent           = $_POST['isParent'];
$name               = $_POST['name'];


$sql = "INSERT INTO $tbl_employee_category( 
	 id, parent, category) 
	 VALUES (NULL, '$pId','$name')";


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
}
function unflattenArray($flatArray){

    $refs = array(); //for setting children without having to search the parents in the result tree.
    $result = array();
    $arrr = array();

    //process all elements until nohting could be resolved.
    //then add remaining elements to the root one by one.
    while(count($flatArray) > 0){
        for ($i=count($flatArray)-1; $i>=0; $i--){
//
            if ($flatArray[$i][2]==0){
                //root element: set in result and ref!
                $result[$flatArray[$i][0]] = $flatArray[$i];
                $refs[$flatArray[$i][0]] = &$result[$flatArray[$i][0]];
                unset($flatArray[$i]);
                $flatArray = array_values($flatArray);
            }

            else if ($flatArray[$i][2] != 0){
                //no root element. Push to the referenced parent, and add to references as well.
                if (array_key_exists($flatArray[$i][2], $refs)){
                    //parent found
                    $o = $flatArray[$i];
                    $refs[$flatArray[$i][0]] = $o;
                    $refs[$flatArray[$i][2]][5][] = &$refs[$flatArray[$i][0]];
                    unset($flatArray[$i]);
                    $flatArray = array_values($flatArray);
                }
            }
        }
    }
    $arrResult=array();
    foreach ($result as $arr)
    {
        $arr['id'] = $arr[0];
        $arr['title'] = $arr[1];
        $arr['pId'] = $arr[2];
        $arr['st_type'] = $arr[3];
        $arr['year'] = $arr[4];
        $arr['expanded'] = true;
        $arr['folder'] = true;
        $arrCi=array();
        foreach ($arr[5] as $arrC)
        {
            $arrC['id'] = $arrC[0];
            $arrC['title'] = $arrC[1];
            $arrC['pId'] = $arrC[2];
            $arrC['st_type'] = $arrC[3];
            $arrC['year'] = $arrC[4];
            $arrC['expanded'] = true;
            $arrC['folder'] = true;
//            $arrC['children'] = $arrC[5];
            $arrChi=array();
            if(count($arrC[5])>0){
                $arrChi= createArray($arrC[5]);
                $arrC['children'] = $arrChi;
                unset($arrC[0]);
                unset($arrC[1]);
                unset($arrC[2]);
                unset($arrC[3]);
                unset($arrC[4]);
                unset($arrC[5]);
            }

//            $arrC['children'] = $arrChi;
            $arrCi[]=$arrC;


        }
        $arr['children'] = $arrCi;
        unset($arr[0]);
        unset($arr[1]);
        unset($arr[2]);
        unset($arr[3]);
        unset($arr[4]);
        unset($arr[5]);
        $arrResult[]= $arr;
    }

//    return $arrResult;
    echo  json_encode($arrResult);

}
?>