<?php 
include('../session.php') ;

  //Create variables
    $username = $_POST['username'];
    $email = $_POST['email'];
	$langinput=$_POST['langinput'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$empno=$_POST['empno'];
	$query = mysqli_query($db,"SELECT * FROM $tbl_users WHERE username='$username' OR reg_mail='$email'");
	$upass=md5('qwerty'/*rand()*/) ;
    $sql = "INSERT INTO $tbl_users (id,username,firstname,lastname,upass, reg_mail,company_id,def_lang,emp_id,ustatus) VALUES ('Null','$username','$firstname','$lastname','$upass', '$email',1,'$langinput','$empno',1)";
  
 //Make sure name is valid
    if(!preg_match("/^[a-zA-Z'-]+$/",$username)) { 
        die ("invalid first name");
    }
  
    //Response
    //Checking to see if name or email already exsist
    if(mysqli_num_rows($query) > 0){
        echo "duplicate";
    }
    else if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success";
    }
 
    //Close connection
    mysqli_close($db);

 
?>