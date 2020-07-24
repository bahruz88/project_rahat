<?php 
include('../session.php') ;

  //Create variables
	$userid = $_POST['update_userid'];
    $username = $_POST['update_username'];
    $email = $_POST['update_email'];
	$langinput=$_POST['update_deflang'];
	$firstname=$_POST['update_firstname'];
	$lastname=$_POST['update_lastname'];
	$password=$_POST['password'];
	
	$query = mysqli_query($db,"SELECT * FROM $tbl_users WHERE username='$username' OR reg_mail='$email'");
	$row_user = mysqli_fetch_array($query ,MYSQLI_ASSOC);
    
	if(!empty($password))	{		$upass=md5($password) ;	}
	else {$upass=$row_user['id'] ;	}
	if(empty($_POST['update_empno']))	{$empno=$row_user['empno']  ;	}
	else { 	$empno=$_POST['update_empno'];}

	$sql =   "UPDATE $tbl_users SET 
	username = '$username', 
	firstname = '$firstname', 
	lastname = '$lastname', 
	reg_mail = '$email', 
	def_lang = '$langinput', 
	emp_id = '$empno' ,
	upass ='$upass'
	WHERE id = '$userid'
	";
 
 //Make sure name is valid
    if(!preg_match("/^[a-zA-Z'-]+$/",$username)) { 
        die ("invalid USERNAME ");
    }
  
    //Checking to see if name or email already exsist
    if(mysqli_num_rows($query) > 0 and  $row_user['id']!=$userid)  {
        echo "duplicate";
    }
    elseif(mysqli_query($db, $sql) ) {
      echo "success";  
    }
    else  {
        echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>