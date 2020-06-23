<?php
 include('../session.php');  

//$sql_company = "select tec.* ,e.lastname,e.firstname,e.surname
//from $tbl_employee_company tec inner  join
//$tbl_employees e on e.id=tec.emp_id where status=1";
$sql_company = "select tec.*  
from $tbl_employee_company tec   where status=1";

if (isset($_POST['search']['value'])) {
    $sql_company .= '
 WHERE username LIKE "%' . $_POST['search']['value'] . '%"  
 ';
}

					$result_company = $db->query($sql_company);
					$data = array();
					if ($result_company->num_rows > 0) {
							// output data of each row
					while($row_company = $result_company->fetch_assoc()) {
						if  ($row_company['status']==1 )
						{
							$row_company['status']='active'	;
							
						}
						else {
							$row_company['status']='deactive';
							
						}

						   $sub_array   = array();
						   $sub_array[] = $row_company['id'];
//						   $sub_array[] = $row_company['lastname'].' ' .$row_company['firstname'].' ' .$row_company['surname'];
                           $sub_array[] = $row_company['company_name'];
						   $sub_array[] = $row_company['voen'];
						   $sub_array[] = $row_company['sun'];
						   $sub_array[] = $row_company['bank_name'];
						   $sub_array[] = $row_company['bank_filial'];
						   $sub_array[] = $row_company['bank_voen'];
						   $sub_array[] = $row_company['cor_account'];
						   $sub_array[] = $row_company['swift'];
						   $sub_array[] = $row_company['azn_account'];
						   $sub_array[] = $row_company['usd_account'];
						   $sub_array[] = $row_company['eur_account'];
						   $sub_array[] = $row_company['country'];
						   $sub_array[] = $row_company['city'];
						   $sub_array[] = $row_company['address'];
						   $sub_array[] = $row_company['poct_index'];
						   $sub_array[] = $row_company['tel'];
						   $sub_array[] = $row_company['enterprise_head_fullname'];
						   $sub_array[] = $row_company['enterprise_head_position'];
						   $sub_array[] = $row_company['founder'];
						   $data[]     = $sub_array;
					}
					}
 
					
	 $row_count=$result_company->num_rows ;
	 $draw=10/*$_POST['draw']*/ ;
	 
	 $output = array(
    'draw' => intval($draw),
    'recordsTotal' =>$row_count,
    'recordsFiltered' => $row_count,
    'data' => $data
);

echo json_encode($output);
?>