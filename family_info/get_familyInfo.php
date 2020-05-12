<?php
 include('../session.php');  

$sql_finfo = " SELECT efi.id, te.firstname,te.lastname,te.surname , efi.m_firstname ,efi.m_lastname , efi.m_surname,fmt.type_desc ,efi.contact_number,efi.adress 
FROM $tbl_employee_family_info efi  
INNER join $tbl_employees  te on efi.emp_id=te.id
INNER join $tbl_sex ts  on ts.id=efi.gender 
INNER join $tbl_family_member_types fmt  on efi.member_type=fmt.id and  fmt.lang='az' where  efi.status=1";

					
					$result_finfo  = $db->query($sql_finfo );
					$data = array();
					if ($result_finfo ->num_rows > 0) {
							// output data of each row
					while($row_finfo  = $result_finfo ->fetch_assoc()) {
						   $sub_array   = array();
						   $sub_array[] = $row_finfo['id'];
						   $sub_array[] = $row_finfo['lastname'].' ' .$row_finfo['firstname'].' ' .$row_finfo['surname'];
						   $sub_array[] = $row_finfo['m_lastname'].' ' .$row_finfo['m_firstname'].' ' .$row_finfo['m_surname'];
						   $sub_array[] = $row_finfo['type_desc'];
						   $sub_array[] = $row_finfo['contact_number'];
						   $sub_array[] = $row_finfo['adress'];
						   $data[]     = $sub_array;
					}
					}
 
					
	 $row_count=$result_finfo->num_rows ;
	 $draw=10;
	 /*$_POST['draw']*/ 
	 
	 $output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);

echo json_encode($output);
?>