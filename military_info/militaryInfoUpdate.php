<?php 
include('../session.php') ;

	$update_langid_name = $_POST['update_langid_name'];
	$language = $_POST['language'];
	$reading = $_POST['reading'];
	$writing = $_POST['writing'];
 	$speaking = $_POST['speaking'];
	$understanding = $_POST['understanding'];
	
	$update_date= date("Y-m-d h:i:sa") ;
	
	$sql = "UPDATE  $tbl_language_knowledge SET 
		lang_id  = '$language',
		lang_reading  = '$reading',
		lang_writing = '$writing',
		lang_speaking = '$speaking',
		lang_understanding = '$understanding',
		update_date = '$update_date' 
		WHERE id 	= '$update_langid_name' ";
  
	if(mysqli_query($db, $sql) ) {
      echo "success" ;  
    }
    else  {
      echo "error" .mysqli_error($db);
    }
 
    //Close connection
    mysqli_close($db);

 
?>