<?php


include('../session.php') ;

//Create variables

//$id                 =$_POST['id'];
$pId                = $_POST['pId'];
$isParent           = $_POST['isParent'];
$name               = $_POST['name'];

$sql = "INSERT INTO $users( 
	 id, parent, user) 
	 VALUES (NULL, '$pId','$name')";


if(!mysqli_query($db, $sql)) {
    echo "error" .mysqli_error($db);
}
else {
    echo "success" ;
}

//Close connection
//mysqli_close($db);

$users= "select * from $users";
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
            array_push($zNodeArray, ['id'=>$row_users['id'],'pId'=>$row_users['parent'],'name'=>$row_users['user'],'open'=>$open]);





        }

    }
}
echo  json_encode($zNodeArray);

?>