<?php


include('../session.php');
$site_lang=$_SESSION['dil'] ;

//Create variables

$id                 =$_POST['id'];
if(isset($_POST['change'])){
    $change             = $_POST['change'];
}

if(isset($_POST['name'])){
    $name           = $_POST['name'];
}
if(isset($_POST['icon'])){
    $name           = $_POST['icon'];
}
if(isset($_POST['createDate'])){
    $createDate        = $_POST['createDate'];
    $endDate           = $_POST['endDate'];

    $createDate = strtr( $createDate , '/', '-');
    $createDate= date('Y-m-d', strtotime($createDate));

    $endDate = strtr( $endDate , '/', '-');
    $endDate= date('Y-m-d', strtotime($endDate));

    $sql = "UPDATE  $tbl_employee_category SET  
			create_date  = '$createDate',
		end_date  = '$endDate'
		WHERE id 	= '$id'";
}else{
    $sql = "UPDATE  $tbl_employee_category SET  
		$change  = '$name'
		WHERE id 	= '$id'";
}




if(mysqli_query($db, $sql) ) {
//    echo "success";
}
else  {
    echo "errorwww" .mysqli_error($db);
}

//include ('st_select.php');
include('st_selectWithComp.php');
?>