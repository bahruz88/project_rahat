<?php
 include('../session.php');
 $status=$_POST['stat'];
 if($status=='2'){
     $emp_st='';
 }else{
     $emp_st=" where emp_status='$status'";
 }

$sql_employees = "select  id, firstname, lastname, surname , emp_status,empno,image_name from $tbl_employees ".$emp_st;

					$result_employees  = $db->query($sql_employees);
					$data = array();
					if ($result_employees ->num_rows > 0) {
							// output data of each row
					while($row_employees  = $result_employees ->fetch_assoc()) {
						if  ($row_employees ['emp_status']==1 )
						{
							$row_employees ['emp_status']='active'	;
						}
						else {
							$row_employees ['emp_status']='deactive';
							
						}
						   $sub_array   = array();
						   $sub_array[] = $row_employees['id'];
//						   $sub_array[] = $row_employees['image_name'];
                        if($row_employees['image_name']){
                            $sub_array[] = '<img class="img-circle elevation-2"
                             src="'.$row_employees['image_name'].'" alt="User" id="default"  style="border-radius: 0;"  width="40px" height="40px">';

                        }else{
                            $sub_array[] = '<img class="img-circle elevation-2" 
                             src="images/users/def.png" alt="User" id="default" style="border-radius: 0;" width="40px" height="40px">';

                        }
						   $sub_array[] = $row_employees['firstname'];
						   $sub_array[] = $row_employees['lastname'];
						   $sub_array[] = $row_employees['surname'];
						   $sub_array[] = $row_employees['empno'];
						   $sub_array[] = $row_employees['emp_status'];
						   $data[]     = $sub_array;
					}
					}
					
	 $row_count=$result_employees->num_rows ;
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