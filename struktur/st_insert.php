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
mysqli_close($db);


?>