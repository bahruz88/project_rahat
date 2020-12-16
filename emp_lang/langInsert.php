<?php 
 
 
include('../session.php') ;
 
  //Create variables

	$employee=$_POST['emplo'];
	$language=$_POST['language'];
	$reading=$_POST['reading'];
	$writing=$_POST['writing'];
	$understanding=$_POST['understanding'];
	$speaking=$_POST['speaking'];
	//$insert_date =date('Y-m-d') ;

    $sql = "INSERT INTO $tbl_language_knowledge( 
	 id, emp_id, lang_id, lang_reading, lang_speaking, lang_writing, lang_understanding) 
	 VALUES (NULL, '$employee','$language','$reading','$speaking','$writing','$understanding')";
  

  if(!mysqli_query($db, $sql)) {
        echo "error" .mysqli_error($db);
    }
    else {
        echo "success" ;
    }
 
    //Close connection
    mysqli_close($db);

 
?>