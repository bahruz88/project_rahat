<?php
 include('../session.php');  

$sql_lang = " 
 SELECT tlk.*,tllr.level_name reading,tlls.level_name speaking,tllw.level_name writting ,tllu.level_name understanding ,
 te.lastname,te.firstname,te.surname,tl.lang_name
FROM  $tbl_language_knowledge tlk  
inner join  $tbl_employees te on tlk.emp_id=te.id 
inner  join  $tbl_emp_lang tl  on tlk.lang_id=tl.id
left join $tbl_lang_level tllr on tlk.lang_reading=tllr.level_id  and tllr.lang_short_name='az'
left join $tbl_lang_level tlls on tlk.lang_speaking=tlls.level_id and tlls.lang_short_name='az'
left join $tbl_lang_level tllw on tlk.lang_writing=tllw.level_id and tllw.lang_short_name='az'
left join $tbl_lang_level tllu on tlk.lang_understanding=tllu.level_id and tllu.lang_short_name='az'
where tlk.lang_status=1 and  te.emp_status=1";

					
					$result_lang  = $db->query($sql_lang );
					$data = array();
					if ($result_lang ->num_rows > 0) {
							// output data of each row
					while($row_lang  = $result_lang ->fetch_assoc()) {

						   $sub_array   = array();
						   $sub_array[] = $row_lang['id'];
						   $sub_array[] = $row_lang['lastname'].' ' .$row_lang['firstname'].' ' .$row_lang['surname'];
						   $sub_array[] = $row_lang['lang_name'];
						   $sub_array[] = $row_lang['reading'];
						   $sub_array[] = $row_lang['speaking'];
						   $sub_array[] = $row_lang['writting'];
						   $sub_array[] = $row_lang['understanding'];
						   $data[] = $sub_array;
					}
					}
 
					
	 $row_count=$result_lang->num_rows ;
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