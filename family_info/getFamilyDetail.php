<?php
 include('../session.php');  
 $faminfoid = $_POST['faminfoid'];
 $sql_lang = "
   SELECT efi.id, te.firstname,te.lastname,te.surname , efi.m_firstname ,efi.m_lastname , efi.m_surname,fmt.type_desc ,efi.contact_number,efi.adress 
FROM $tbl_employee_family_info efi  
INNER join $tbl_employees  te on efi.emp_id=te.id
INNER join $tbl_sex ts  on ts.id=efi.gender 
INNER join $tbl_family_member_types fmt  on efi.member_type=fmt.type_id and  fmt.lang='az' where  efi.status=1 ";
	
 $result_lang = $db->query($sql_lang);
 $data = array();
if ($result_lang->num_rows > 0) {
			// output data of each row
 $row_lang = $result_lang->fetch_assoc();
 $data = $row_lang;
}
	 
echo json_encode($data);
?>