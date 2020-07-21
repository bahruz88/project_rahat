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
if($_POST['change']=='create_date'){
    $name           = $_POST['name'];
    $name = strtr( $name , '/', '-');
    $name= date('Y-m-d', strtotime($name));
}


$sql = "UPDATE  $tbl_employee_category SET  
		$change  = '$name'
		WHERE id 	= '$id' ";

if(mysqli_query($db, $sql) ) {
//    echo "success";
}
else  {
    echo "errorwww" .mysqli_error($db);
}

include ('st_select.php');
?>