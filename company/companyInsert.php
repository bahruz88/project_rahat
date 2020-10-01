<?php 
include('../session.php') ;

  //Create variables
$company_name = $_POST['company_name'];
$voen = $_POST['voen'];
$sun=$_POST['sun'];
$bank_name=$_POST['bank_name'];
$code=$_POST['code'];
$bank_filial=$_POST['bank_filial'];
$bank_voen=$_POST['bank_voen'];
$cor_account=$_POST['cor_account'];
$swift=$_POST['swift'];
$azn_account=$_POST['azn_account'];
$usd_account=$_POST['usd_account'];
$eur_account=$_POST['eur_account'];
$country=$_POST['country'];
$city=$_POST['city'];
$address=$_POST['address'];
$poct_index=$_POST['poct_index'];
$tel=$_POST['tel'];
$enterprise_head_fullname=$_POST['enterprise_head_fullname'];
$enterprise_head_position=$_POST['enterprise_head_position'];
$founder=$_POST['founder'];
$service=$_POST['service'];

//	$query = mysqli_query($db,"SELECT * FROM $tbl_users WHERE username='$username' OR reg_mail='$email'");
//	$upass=md5('qwerty'/*rand()*/) ;
    $sql = "INSERT INTO $tbl_employee_company (id,company_name,voen,sun,bank_name, kod,bank_filial,bank_voen,cor_account,swift,azn_account,usd_account,eur_account,country,city,address,poct_index,tel,enterprise_head_fullname,enterprise_head_position,founder,service) 
    VALUES ('Null','$company_name','$voen','$sun','$bank_name', '$code','$bank_filial','$bank_voen','$cor_account','$swift','$azn_account','$usd_account','$eur_account','$country','$city','$address','$poct_index','$tel','$enterprise_head_fullname','$enterprise_head_position','$founder','$service')";

 //Make sure name is valid
//    if(!preg_match("/^[a-zA-Z'-]+$/",$username)) {
//        die ("invalid first name");
//    }
  
    //Response
    //Checking to see if name or email already exsist
//    if(mysqli_num_rows($query) > 0){
//        echo "duplicate";
//    }
//    else
        if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>