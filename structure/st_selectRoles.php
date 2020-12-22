<?php
include('../session.php');
$site_lang=$_SESSION['dil'] ;
$id                 =$_POST['id'];
$company_id                 =$_POST['company_id'];
include('st_selectRoleIns.php');
//include('st_selectRole.php');

?>