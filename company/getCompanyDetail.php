<?php
 include('../session.php');  
 $userid = $_POST['userid'];
 $sql_user = "select id,username,firstname,lastname,upass,reg_mail,company_id,ustatus,def_lang,empno from $tbl_users  where  id='$userid'";
	
 $result_users = $db->query($sql_user);
 $data = array();
if ($result_users->num_rows > 0) {
			// output data of each row
 $row_users = $result_users->fetch_assoc();
 $data = $row_users;
 
}
	 
 

echo json_encode($data);
?>