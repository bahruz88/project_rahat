<?php
 include('../session.php');  

$sql_education = "Select  ee.id ,e.lastname,e.firstname,e.surname, qd.qualification ,u.uni_name, ee.faculty,ee.profession, ee.end_date ,ee.diplom_seria_num ,ee.diplom_issue_date  from 
$tbl_education  ee left  join 
$tbl_universities u on ee.institution_id=u.id left  join  
$tbl_qualification_dic qd on ee.qualification_id=qd.id inner  join  
$tbl_employees e on e.id=ee.emp_id  where ee.edu_status =1 and  e.emp_status=1";

					
					$result_education  = $db->query($sql_education );
					$data = array();
					if ($result_education ->num_rows > 0) {
							// output data of each row
					while($row_education  = $result_education ->fetch_assoc()) {

						   $sub_array   = array();
						   $sub_array[] = $row_education['id'];
						   $sub_array[] = $row_education['lastname'].' ' .$row_education['firstname'].' ' .$row_education['surname'];
						   $sub_array[] = $row_education['qualification'];
						   $sub_array[] = $row_education['uni_name'];
						   $sub_array[] = $row_education['faculty'];
						   $sub_array[] = $row_education['profession'];
						   $sub_array[] = $row_education['diplom_seria_num'];
						   $sub_array[] = $row_education['end_date'];
						   $sub_array[] = $row_education['diplom_issue_date'];
								$data[] = $sub_array;
					}
					}
 
					
	 $row_count=$result_education->num_rows ;
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