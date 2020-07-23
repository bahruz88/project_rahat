<?php


include('../session.php') ;

//Create variables

$id                 =$_POST['id'];
$change             = $_POST['change'];
if(isset($_POST['name'])){
    $name           = $_POST['name'];
}
if(isset($_POST['icon'])){
    $name           = $_POST['icon'];
}


$sql = "UPDATE  $tbl_employee_category SET  
		$change  = '$name'
		WHERE id 	= '$id' ";

if(mysqli_query($db, $sql) ) {
//    echo "success";
}
else  {
    echo "error" .mysqli_error($db);
}


//Close connection
//mysqli_close($db);

$users= "select * from $tbl_employee_category";
$result_users = $db->query($users);
$user=[];
$parent=[];
$user_id=[];
$zNodeArray=[];
if($result_users){
    if ($result_users->num_rows > 0) {
        while($row_users = $result_users->fetch_assoc()) {
//            $zNodeArray["user"]=$row_users['user'];
//            $zNodeArray.array_push({"id":userIdArray[j], "pId":parentArray[j],"name":userArray[j],"open":open});
            if($row_users['parent']==null){
                $open=true;
            }else {
                $open=false;
            }
                array_push($zNodeArray, ['id'=>$row_users['id'],'pId'=>$row_users['parent'],'name'=>$row_users['category'],'open'=>$open]);





        }

    }
}
echo  json_encode($zNodeArray);

?>