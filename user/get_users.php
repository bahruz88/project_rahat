<?php
 include('../session.php');  

$sql_user = "select id,username,firstname,lastname,upass,reg_mail,company_id,ustatus from $tbl_users  where ustatus=1";

if (isset($_POST['search']['value'])) {
    $sql_user .= '
 WHERE username LIKE "%' . $_POST['search']['value'] . '%"  
 ';
}
					
					$result_users = $db->query($sql_user);
					$data = array();
					if ($result_users->num_rows > 0) {
							// output data of each row
					while($row_users = $result_users->fetch_assoc()) {
						if  ($row_users['ustatus']==1 )
						{
							$row_users['ustatus']='active'	;
							
						}
						else {
							$row_users['ustatus']='deactive';
							
						}
						   $sub_array   = array();
						   $sub_array[] = $row_users['id'];
						   $sub_array[] = $row_users['username'];
						   $sub_array[] = $row_users['firstname'];
						   $sub_array[] = $row_users['lastname'];
						   $sub_array[] = $row_users['reg_mail'];
						   $sub_array[] = $row_users['company_id'];
						   $sub_array[] = $row_users['ustatus'];
						   $data[]     = $sub_array;
					}
					}
 
					
	 $row_count=$result_users->num_rows ;
	 $draw=10/*$_POST['draw']*/ ;
	 
	 $output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);

echo json_encode($output);
?>